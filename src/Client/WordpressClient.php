<?php
	namespace DaybreakStudios\WordpressSDK\Client;

	use DaybreakStudios\WordpressSDK\Client\EndpointGroups\CategoryEndpointGroup;
	use DaybreakStudios\WordpressSDK\Client\EndpointGroups\PageEndpointGroup;
	use DaybreakStudios\WordpressSDK\Client\EndpointGroups\PostEndpointGroup;
	use DaybreakStudios\WordpressSDK\Client\EndpointGroups\TagEndpointGroup;
	use DaybreakStudios\WordpressSDK\Entity\Category;
	use DaybreakStudios\WordpressSDK\Entity\Page;
	use DaybreakStudios\WordpressSDK\Entity\Post;
	use DaybreakStudios\WordpressSDK\Entity\Tag;
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
		 * @var array
		 */
		protected $endpointGroups = [
			Post::class => PostEndpointGroup::class,
			Category::class => CategoryEndpointGroup::class,
			Page::class => PageEndpointGroup::class,
			Tag::class => TagEndpointGroup::class,
		];

		/**
		 * @var EndpointGroupInterface[]
		 */
		protected $endpointGroupInstances = [];

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
		 * {@inheritdoc}
		 */
		public function posts() {
			return $this->getEndpointGroup(Post::class);
		}

		/**
		 * {@inheritdoc}
		 */
		public function categories() {
			return $this->getEndpointGroup(Category::class);
		}

		/**
		 * {@inheritdoc}
		 */
		public function pages() {
			return $this->getEndpointGroup(Page::class);
		}

		/**
		 * {@inheritdoc}
		 */
		public function tags() {
			return $this->getEndpointGroup(Tag::class);
		}

		/**
		 * @param string $entityClass
		 *
		 * @return EndpointGroupInterface
		 */
		protected function getEndpointGroup($entityClass) {
			if (isset($this->endpointGroupInstances[$entityClass]))
				return $this->endpointGroupInstances[$entityClass];

			$class = @$this->endpointGroups[$entityClass];

			if (!$class)
				throw new \InvalidArgumentException($entityClass . ' is not a supported entity');

			return $this->endpointGroupInstances[$entityClass] = new $class($this, $entityClass);
		}

		/**
		 * @param string $entityClass
		 * @param string $class
		 *
		 * @return void
		 */
		protected function setEndpointGroup($entityClass, $class) {
			$this->endpointGroups[$entityClass] = $class;

			if (isset($this->endpointGroupInstances[$entityClass]))
				unset($this->endpointGroupInstances[$entityClass]);
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
		 * @param string $path
		 * @param array  $queryParams
		 *
		 * @return UriInterface
		 */
		public function toUri($path, array $queryParams = []) {
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
		public function get(UriInterface $uri, array $headers = []) {
			return $this->getHttpClient()->get($uri, $headers);
		}

		/**
		 * @param UriInterface           $uri
		 * @param StreamInterface|string $body
		 * @param array                  $headers
		 *
		 * @return ResponseInterface
		 */
		public function post(UriInterface $uri, $body, array $headers = []) {
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
		public function delete(UriInterface $uri, $body = null, array $headers = []) {
			return $this->getHttpClient()->delete($uri, $headers + [
					'Content-Type' => 'application/json',
				], $body);
		}
	}