<?php
	namespace DaybreakStudios\WordpressSDK\Client;

	use DaybreakStudios\WordpressSDK\Client\Criteria\Criteria;
	use DaybreakStudios\WordpressSDK\Client\Criteria\CriteriaInterface;
	use DaybreakStudios\WordpressSDK\Client\Exceptions\ResponseException;
	use DaybreakStudios\WordpressSDK\Collections\PagedCollection;
	use DaybreakStudios\WordpressSDK\Collections\PagingInfo;
	use DaybreakStudios\WordpressSDK\Entity\EntityInterface;
	use Psr\Http\Message\UriInterface;

	/**
	 * Class AbstractEndpointGroup
	 *
	 * @package DaybreakStudios\WordpressSDK\Client
	 */
	abstract class AbstractEndpointGroup implements EndpointGroupInterface {
		/**
		 * @var WordpressClientInterface
		 */
		protected $client;

		/**
		 * @var string
		 */
		protected $entityClass;

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
			$response = $this->getWordpressClient()->get($uri);

			if ($response->getStatusCode() === 404)
				return null;
			else if ($response->getStatusCode() !== 200)
				throw new ResponseException($response);

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
			$objects = $this->getObjectsData($path, $params);

			$paging = new PagingInfo((function(array $params) use ($class, $path) {
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

			if ($response->getStatusCode() !== 200)
				throw new ResponseException($response);

			$class = $this->getEntityClass();

			return array_map(function(array $fields) use ($class) {
				return new $class($fields);
			}, json_decode($response->getBody()->getContents(), true));
		}

		/**
		 * @param EntityInterface $entity
		 * @param UriInterface    $uri
		 *
		 * @return bool
		 * @throws ResponseException
		 */
		protected function saveObject(EntityInterface $entity, UriInterface $uri) {
			$changeSet = $entity->getChangeSet();

			if (!$changeSet)
				return false;

			$response = $this->getWordpressClient()->post($uri, json_encode($changeSet));

			if ($response->getStatusCode() !== 200)
				throw new ResponseException($response);

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
			else if ($response->getStatusCode() !== 200)
				throw new ResponseException($response);

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