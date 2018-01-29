<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	/**
	 * For use with {@see SlugCapableInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Entity\Features
	 * @see     SlugCapableInterface
	 */
	trait SlugCapableTrait {
		/**
		 * @return string
		 */
		public function getSlug() {
			return $this->get(SlugCapableInterface::FIELD_SLUG);
		}

		/**
		 * @param string $slug
		 *
		 * @return $this
		 */
		public function setSlug($slug) {
			return $this->set(SlugCapableInterface::FIELD_SLUG, $slug);
		}
	}