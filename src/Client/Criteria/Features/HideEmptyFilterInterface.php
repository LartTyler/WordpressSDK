<?php
	namespace DaybreakStudios\WordpressSDK\Client\Criteria\Features;

	interface HideEmptyFilterInterface {
		/**
		 * Whether to hide terms not assigned to any posts
		 */
		const FILTER_HIDE_EMPTY = 'hide_empty';

		/**
		 * @return bool
		 */
		public function getHideEmpty();

		/**
		 * @param bool $hideEmpty
		 *
		 * @return $this
		 */
		public function setHideEmpty($hideEmpty);
	}