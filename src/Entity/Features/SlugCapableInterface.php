<?php

	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	interface SlugCapableInterface {
		/**
		 * An alphanumeric identifier for the object unique to its type
		 */
		const FIELD_SLUG = 'slug';

		/**
		 * @return string
		 */
		public function getSlug();

		/**
		 * @param string $slug
		 *
		 * @return $this
		 */
		public function setSlug($slug);
	}