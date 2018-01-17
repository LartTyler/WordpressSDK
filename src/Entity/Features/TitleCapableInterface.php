<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	interface TitleCapableInterface {
		/**
		 * The title for the object
		 */
		const FIELD_TITLE = 'title';

		/**
		 * @return string
		 */
		public function getTitle();

		/**
		 * @param string $title
		 *
		 * @return $this
		 */
		public function setTitle($title);
	}