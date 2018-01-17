<?php

	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	interface LinkCapableInterface {
		/**
		 * URL of the object
		 */
		const FIELD_LINK = 'link';

		/**
		 * @return string
		 */
		public function getLink();
	}