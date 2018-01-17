<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	interface CountCapableInterface {
		/**
		 * Number of published items for the object
		 */
		const FIELD_COUNT = 'count';

		/**
		 * @return int
		 */
		public function getCount();
	}