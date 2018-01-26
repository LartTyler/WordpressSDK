<?php
	namespace DaybreakStudios\WordpressSDK\Client\Criteria\Features;

	interface StickyFilterInterface {
		/**
		 * Limit result set to items that are sticky
		 */
		const FILTER_STICKY = 'sticky';

		/**
		 * @return bool
		 */
		public function getStickyOnly();

		/**
		 * @param bool $sticky
		 *
		 * @return $this
		 */
		public function setStickyOnly($sticky);
	}