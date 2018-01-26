<?php
	namespace DaybreakStudios\WordpressSDK\Client\Criteria\Features;

	interface StatusFilterInterface {
		/**
		 * Limit result set to posts assigned one or more statuses
		 */
		const FILTER_STATUS = 'status';

		/**
		 * Indicates that the object has been published.
		 */
		const STATUS_PUBLISHED = 'published';

		/**
		 * @return string|null
		 */
		public function getStatus();

		/**
		 * @param string|null $status
		 *
		 * @return $this
		 */
		public function setStatus($status);
	}