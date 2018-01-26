<?php
	namespace DaybreakStudios\WordpressSDK\Client;

	use DaybreakStudios\WordpressSDK\Client\EndpointGroups\CategoryEndpointGroupInterface;
	use DaybreakStudios\WordpressSDK\Client\EndpointGroups\PageEndpointGroupInterface;
	use DaybreakStudios\WordpressSDK\Client\EndpointGroups\PostEndpointGroupInterface;
	use DaybreakStudios\WordpressSDK\Client\EndpointGroups\TagEndpointGroupInterface;
	use Psr\Http\Message\ResponseInterface;
	use Psr\Http\Message\StreamInterface;
	use Psr\Http\Message\UriInterface;

	interface WordpressClientInterface {
		/**
		 * @return PostEndpointGroupInterface
		 */
		public function posts();

		/**
		 * @return PageEndpointGroupInterface
		 */
		public function pages();

		/**
		 * @return CategoryEndpointGroupInterface
		 */
		public function categories();

		/**
		 * @return TagEndpointGroupInterface
		 */
		public function tags();

		/**
		 * @param string $path
		 * @param array  $queryParams
		 *
		 * @return UriInterface
		 */
		public function toUri($path, array $queryParams = []);

		/**
		 * @param UriInterface $uri
		 * @param array        $headers
		 *
		 * @return ResponseInterface
		 */
		public function get(UriInterface $uri, array $headers = []);

		/**
		 * @param UriInterface           $uri
		 * @param StreamInterface|string $body
		 * @param array                  $headers
		 *
		 * @return ResponseInterface
		 */
		public function post(UriInterface $uri, $body, array $headers = []);

		/**
		 * @param UriInterface                $uri
		 * @param StreamInterface|string|null $body
		 * @param array                       $headers
		 *
		 * @return ResponseInterface
		 */
		public function delete(UriInterface $uri, $body = null, array $headers = []);
	}