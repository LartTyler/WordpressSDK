<?php
	namespace DaybreakStudios\WordpressSDK\Client;

	use DaybreakStudios\WordpressSDK\Client\Criteria\CriteriaInterface;
	use DaybreakStudios\WordpressSDK\Client\Exceptions\ResponseException;
	use DaybreakStudios\WordpressSDK\Collections\PagedCollection;
	use DaybreakStudios\WordpressSDK\Collections\PagingInfo;
	use DaybreakStudios\WordpressSDK\Entity\Category;
	use DaybreakStudios\WordpressSDK\Entity\EntityInterface;
	use DaybreakStudios\WordpressSDK\Entity\Post;
	use Doctrine\Common\Collections\Collection;
	use Doctrine\Common\Collections\Selectable;
	use Http\Client\Common\HttpMethodsClient;
	use Http\Client\Common\Plugin\AuthenticationPlugin;
	use Http\Client\Common\Plugin\BaseUriPlugin;
	use Http\Client\Common\PluginClient;
	use Http\Client\HttpClient;
	use Http\Discovery\HttpClientDiscovery;
	use Http\Discovery\MessageFactoryDiscovery;
	use Http\Discovery\UriFactoryDiscovery;
	use Http\Message\Authentication;
	use Http\Message\RequestFactory;
	use Http\Message\UriFactory;
	use Psr\Http\Message\ResponseInterface;
	use Psr\Http\Message\StreamInterface;
	use Psr\Http\Message\UriInterface;

	class WordpressClient implements WordpressClientInterface {
		/**
		 * @var UriFactory
		 */
		protected $uriFactory;

		/**
		 * @var HttpMethodsClient
		 */
		protected $httpClient;

		/**
		 * WordpressClient constructor.
		 *
		 * @param string              $domain
		 * @param Authentication|null $authentication
		 * @param string              $basePath
		 * @param HttpClient|null     $httpClient
		 * @param RequestFactory|null $requestFactory
		 * @param UriFactory|null     $uriFactory
		 */
		public function __construct(
			$domain,
			Authentication $authentication = null,
			$basePath = null,
			HttpClient $httpClient = null,
			RequestFactory $requestFactory = null,
			UriFactory $uriFactory = null
		) {
			$this->uriFactory = $uriFactory ?: UriFactoryDiscovery::find();

			$plugins = [
				new BaseUriPlugin($this->uriFactory->createUri($domain)->withPath($basePath ?: '/wp-json')),
			];

			if ($authentication)
				$plugins[] = new AuthenticationPlugin($authentication);

			$this->httpClient = new HttpMethodsClient(
				new PluginClient($httpClient ?: HttpClientDiscovery::find(), $plugins),
				$requestFactory ?: MessageFactoryDiscovery::find()
			);
		}

		/**
		 * @return UriFactory
		 */
		protected function getUriFactory() {
			return $this->uriFactory;
		}

		/**
		 * @return HttpMethodsClient
		 */
		protected function getHttpClient() {
			return $this->httpClient;
		}

		/**
		 * {@inheritdoc}
		 */
		public function getPost($id, $context = RequestContext::VIEW, $password = null) {
			$params = [
				'context' => $context,
			];

			if ($password)
				$params['password'] = $password;

			return $this->getObject(Post::class, $this->toUri('/wp/v2/posts/' . $id, $params));
		}

		/**
		 * {@inheritdoc}
		 */
		public function getPosts(CriteriaInterface $criteria = null, $context = RequestContext::VIEW) {
			return $this->getObjects(Post::class, '/wp/v2/posts', $criteria, $context);
		}

		/**
		 * {@inheritdoc}
		 */
		public function savePost(Post $post) {
			return $this->saveObject($post, $this->toUri('/wp/v2/posts/' . $post->getId()));
		}

		/**
		 * {@inheritdoc}
		 */
		public function deletePost($post, $force = false) {
			if ($post instanceof Post)
				$post = $post->getId();

			return $this->deleteObject($this->toUri('/wp/v2/posts/' . $post), $force);
		}

		/**
		 * {@inheritdoc}
		 */
		public function getCategory($id, $context = RequestContext::VIEW) {
			return $this->getObject(Category::class, $this->toUri('/wp/v2/categories/' . $id, [
				'context' => $context,
			]));
		}

		/**
		 * {@inheritdoc}
		 */
		public function getCategories(CriteriaInterface $criteria = null, $context = RequestContext::VIEW) {
			return $this->getObjects(Category::class, '/wp/v2/categories', $criteria, $context);
		}

		/**
		 * {@inheritdoc}
		 */
		public function saveCategory(Category $category) {
			return $this->saveObject($category, $this->toUri('/wp/v2/cateogires/' . $category->getId()));
		}

		/**
		 * {@inheritdoc}
		 */
		public function deleteCategory($category) {
			if ($category instanceof Category)
				$category = $category->getId();

			return $this->deleteObject($this->toUri('/wp/v2/categories/' . $category), true);
		}

		/**
		 * @param string       $class
		 * @param UriInterface $uri
		 *
		 * @return EntityInterface|null
		 * @throws ResponseException
		 * @internal
		 */
		public function getObject($class, UriInterface $uri) {
			$response = $this->get($uri);

			if ($response->getStatusCode() === 404)
				return null;
			else if ($response->getStatusCode() !== 200)
				throw new ResponseException($response);

			return new $class(json_decode($response->getBody()->getContents(), true));
		}

		/**
		 * @param string                 $class
		 * @param string                 $path
		 * @param CriteriaInterface|null $criteria
		 * @param string                 $context
		 *
		 * @return EntityInterface[]|Collection|Selectable
		 * @internal
		 */
		public function getObjects(
			$class,
			$path,
			CriteriaInterface $criteria = null,
			$context = RequestContext::VIEW
		) {
			if (!$criteria->getContext())
				$criteria->setContext($context);

			$params = $criteria->getFilters();
			$objects = $this->getObjectsData($class, $path, $params);

			$client = $this;

			$paging = new PagingInfo(function(array $params) use ($client, $class, $path) {
				return $client->getObjectsData($class, $path, $params);
			}, $params);

			return new PagedCollection($objects, $paging);
		}

		/**
		 * @param string $class
		 * @param string $path
		 * @param array  $filters
		 *
		 * @return EntityInterface[]
		 * @throws ResponseException
		 * @internal
		 */
		public function getObjectsData($class, $path, array $filters) {
			$response = $this->get($this->toUri($path, $filters));

			if ($response->getStatusCode() !== 200)
				throw new ResponseException($response);

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
		 * @internal
		 */
		public function saveObject(EntityInterface $entity, UriInterface $uri) {
			$changeSet = $entity->getChangeSet();

			if (!$changeSet)
				return false;

			$response = $this->post($uri, json_encode($changeSet));

			if ($response->getStatusCode() !== 200)
				throw new ResponseException($response);

			$entity->onChangesPersisted();

			return true;
		}

		/**
		 * @param UriInterface $uri
		 * @param bool         $force
		 *
		 * @return bool
		 * @throws ResponseException
		 */
		public function deleteObject(UriInterface $uri, $force) {
			$response = $this->delete($uri, json_encode([
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
		 * @param string $path
		 * @param array  $queryParams
		 *
		 * @return UriInterface
		 */
		protected function toUri($path, array $queryParams = []) {
			$uri = $this->getUriFactory()->createUri($path);

			if ($queryParams)
				$uri = $uri->withQuery(http_build_query($queryParams));

			return $uri;
		}

		/**
		 * @param UriInterface $uri
		 * @param array        $headers
		 *
		 * @return ResponseInterface
		 */
		protected function get(UriInterface $uri, array $headers = []) {
			return $this->getHttpClient()->get($uri, $headers);
		}

		/**
		 * @param UriInterface           $uri
		 * @param StreamInterface|string $body
		 * @param array                  $headers
		 *
		 * @return ResponseInterface
		 */
		protected function post(UriInterface $uri, $body, array $headers = []) {
			return $this->getHttpClient()->post($uri, $headers + [
					'Content-Type' => 'application/json',
				], $body);
		}

		/**
		 * @param UriInterface                $uri
		 * @param StreamInterface|string|null $body
		 * @param array                       $headers
		 *
		 * @return ResponseInterface
		 */
		protected function delete(UriInterface $uri, $body = null, array $headers = []) {
			return $this->getHttpClient()->delete($uri, $headers + [
					'Content-Type' => 'application/json',
				], $body);
		}
	}