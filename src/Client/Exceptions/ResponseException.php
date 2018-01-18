<?php
	namespace DaybreakStudios\WordpressSDK\Client\Exceptions;

	use Psr\Http\Message\ResponseInterface;

	class ResponseException extends \Exception {
		/**
		 * ResponseException constructor.
		 *
		 * @param ResponseInterface $response
		 */
		public function __construct(ResponseInterface $response) {
			parent::__construct('Could not complete request, server responded with: ' . $response->getStatusCode() .
				' ' . $response->getReasonPhrase());
		}
	}