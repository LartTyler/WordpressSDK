<?php

	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	interface GuidCapableInterface {
		/**
		 * The GUID for the object
		 */
		const FIELD_GUID = 'guid';

		/**
		 * @return string
		 */
		public function getGuid();
	}