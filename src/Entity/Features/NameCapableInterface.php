<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	interface NameCapableInterface {
		/**
		 * HTML title for the object
		 */
		const FIELD_NAME = 'name';

		/**
		 * @return string
		 */
		public function getName();

		/**
		 * @param string $name
		 *
		 * @return $this
		 */
		public function setName($name);
	}