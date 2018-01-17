<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	interface DescriptionCapableInterface {
		/**
		 * HTML description of the object
		 */
		const FIELD_DESCRIPTION = 'description';

		/**
		 * @return string
		 */
		public function getDescription();

		/**
		 * @param string $description
		 *
		 * @return $this
		 */
		public function setDescription($description);
	}