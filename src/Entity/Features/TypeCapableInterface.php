<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	interface TypeCapableInterface {
		/**
		 * Type of Post for the object
		 */
		const FIELD_TYPE = 'type';

		/**
		 * @return string
		 */
		public function getType();
	}