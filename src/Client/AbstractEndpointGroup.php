<?php
	namespace DaybreakStudios\WordpressSDK\Client;

	use DaybreakStudios\WordpressSDK\Client\Criteria\Criteria;
	use DaybreakStudios\WordpressSDK\Client\Criteria\CriteriaInterface;
	use DaybreakStudios\WordpressSDK\Client\Exceptions\ResponseException;
	use DaybreakStudios\WordpressSDK\Collections\PagedCollection;
	use DaybreakStudios\WordpressSDK\Collections\PagingInfo;
	use DaybreakStudios\WordpressSDK\Entity\EntityInterface;
	use Psr\Http\Message\UriInterface;
	use Psr\Log\LoggerAwareInterface;
	use Psr\Log\LoggerInterface;

	/**
	 * Class AbstractEndpointGroup
	 *
	 * @package DaybreakStudios\WordpressSDK\Client
	 */
	abstract class AbstractEndpointGroup implements EndpointGroupInterface, LoggerAwareInterface {
		/**
		 * @var WordpressClientInterface
		 */
		protected $client;

		/**
		 * @var string
		 */
		protected $entityClass;

		/**
		 * @var LoggerInterface|null
		 */
		protected $logger = null;

		/**
		 * AbstractEndpointGroup constructor.
		 *
		 * @param WordpressClientInterface $client
		 * @param string                   $entityClass
		 */
		public function __construct(WordpressClientInterface $client, $entityClass) {
			$this->client = $client;
			$this->entityClass = $entityClass;
		}

		/**
		 * @param LoggerInterface|null $logger
		 *
		 * @return void
		 */
		public function setLogger(LoggerInterface $logger = null) {
			$this->logger = $logger;
		}

		/**
		 * @return string
		 */
		public function getEntityClass() {
			return $this->entityClass;
		}

		/**
		 * @return WordpressClientInterface
		 */
		protected function getWordpressClient() {
			return $this->client;
		}

		/**
		 * @param string $path
		 * @param array  $queryParams
		 *
		 * @return UriInterface
		 */
		protected function toUri($path, array $queryParams = []) {
			return $this->getWordpressClient()->toUri($path, $queryParams);
		}

		/**
		 * @param UriInterface $uri
		 *
		 * @return EntityInterface|null
		 * @throws ResponseException
		 */
		protected function getObject(UriInterface $uri) {
			if ($this->logger)
				$this->logger->debug('Retrieving object located at ' . $uri);

			$response = $this->getWordpressClient()->get($uri);

			if ($response->getStatusCode() === 404) {
				if ($this->logger)
					$this->logger->debug('WP object not found', [
						'uri' => (string)$uri,
					]);

				return null;
			} else if ($response->getStatusCode() !== 200) {
				if ($this->logger)
					$this->logger->error('Encountered an unhandled HTTP status code while retrieving object', [
						'uri' => (string)$uri,
						'statusCode' => $response->getStatusCode(),
						'reasonPhrase' => $response->getReasonPhrase(),
						'responseHeaders' => $response->getHeaders(),
						'responseBody' => $response->getBody()->getContents(),
					]);

				throw new ResponseException($response);
			}

			$class = $this->getEntityClass();

			return new $class(json_decode($response->getBody()->getContents(), true));
		}

		/**
		 * @param string                 $path
		 * @param CriteriaInterface|null $criteria
		 * @param string                 $context
		 *
		 * @return PagedCollection
		 */
		protected function getObjects($path, CriteriaInterface $criteria = null, $context = RequestContext::VIEW) {
			$criteria = $criteria ?: $this->createDefaultCriteria();

			if (!$criteria->getContext())
				$criteria->setContext($context);

			$class = $this->getEntityClass();
			$params = $criteria->getFilters();

			$logger = $this->logger;

			if ($logger)
				$logger->debug('Retrieving collection located at ' . $path, [
					'filters' => $params,
				]);

			$objects = $this->getObjectsData($path, $params);

			$paging = new PagingInfo((function(array $params) use ($class, $path, $logger) {
				if ($logger)
					$logger->debug('Retrieving next page from ' . $path, [
						'filters' => $params,
					]);

				return $this->getObjectsData($path, $params);
			})->bindTo($this), $params);

			return new PagedCollection($objects, $paging);
		}

		/**
		 * @param string $path
		 * @param array  $filters
		 *
		 * @return EntityInterface[]
		 * @throws ResponseException
		 */
		protected function getObjectsData($path, array $filters) {
			$response = $this->getWordpressClient()->get($this->getWordpressClient()->toUri($path, $filters));

			if ($response->getStatusCode() !== 200) {
				if ($this->logger)
					$this->logger->error('Encountered an unhandled HTTP status code while retrieving object collection', [
						'path' => $path,
						'statusCode' => $response->getStatusCode(),
						'reasonPhrase' => $response->getReasonPhrase(),
						'responseHeaders' => $response->getHeaders(),
						'responseBody' => $response->getBody()->getContents(),
					]);

				throw new ResponseException($response);
			}

			$class = $this->getEntityClass();

			return array_map(function(array $fields) use ($class) {
				return new $class($fields);
			}, json_decode($response->getBody()->getContents(), true));
		}

		/**
		 * @param string          $path
		 * @param EntityInterface $entity
		 *
		 * @return bool
		 * @throws ResponseException
		 *
		 */
		protected function saveObject($path, EntityInterface $entity) {
			$changeSet = $entity->getChangeSet();

			if (!$changeSet)
				return false;

			if ($entity->getId())
				$uri = $this->toUri(rtrim($path, '/') . '/' . $entity->getId());
			else
				$uri = $this->toUri($path);


			if ($this->logger)
				$this->logger->debug('Saving object to ' . $uri, [
					'isNewEntity' => $entity->getId() === null,
				]);

			$response = $this->getWordpressClient()->post($uri, json_encode($changeSet));
			$status = $response->getStatusCode();

			if ($status !== 200 && $status !== 201) {
				if ($this->logger)
					$this->logger->error('Encountered an unhandled HTTP status code while saving an object', [
						'uri' => (string)$uri,
						'statusCode' => $response->getStatusCode(),
						'reasonPhrase' => $response->getReasonPhrase(),
						'responseHeaders' => $response->getHeaders(),
						'responseBody' => $response->getBody()->getContents(),
					]);

				throw new ResponseException($response);
			}

			$entity->onChangesPersisted(json_decode($response->getBody()->getContents(), true));

			return true;
		}

		/**
		 * @param UriInterface $uri
		 * @param bool         $force
		 *
		 * @return bool
		 * @throws ResponseException
		 */
		protected function deleteObject(UriInterface $uri, $force) {
			$response = $this->getWordpressClient()->delete($uri, json_encode([
				'force' => $force,
			]));

			if ($response->getStatusCode() === 410)
				return false;
			else if ($response->getStatusCode() === 403)
				return false;
			else if ($response->getStatusCode() !== 200) {
				if ($this->logger)
					$this->logger->error('Encountered an unhandled HTTP status code while deleting an object', [
						'uri' => (string)$uri,
						'statusCode' => $response->getStatusCode(),
						'reasonPhrase' => $response->getReasonPhrase(),
						'responseHeaders' => $response->getHeaders(),
						'responseBody' => $response->getBody()->getContents(),
					]);

				throw new ResponseException($response);
			}

			return true;
		}

		/**
		 * @return Criteria
		 */
		protected function createDefaultCriteria() {
			return new Criteria();
		}

		/**
		 * @param mixed       $thing
		 * @param string|null $entityClass
		 *
		 * @return int
		 */
		protected function toEntityId($thing, $entityClass = null) {
			if ($thing instanceof EntityInterface) {
				if (!$entityClass || is_a($thing, $entityClass))
					return $thing->getId();
			} else if (is_numeric($thing))
				return (int)$thing;

			throw new \InvalidArgumentException(sprintf('%s does not match the expected type of `int` or %s',
				is_object($thing) ? get_class($thing) : gettype($thing), $entityClass ?: EntityInterface::class));
		}
	}