<?php

	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	interface GUIDCapableInterface {
		/**
		 * The GUID for the object
		 */
		const FIELD_GUID = 'guid';

		/**
		 * @return string
		 */
		public function getGUID();
	}