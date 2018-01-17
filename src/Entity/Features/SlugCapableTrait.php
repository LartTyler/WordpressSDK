<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	use DaybreakStudios\WordpressSDK\Entity\EntityTrait;

	/**
	 * For use with {@see SlugCapableInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Entity\Features
	 * @see     SlugCapableInterface
	 */
	trait SlugCapableTrait {
		use EntityTrait;

		/**
		 * {@inheritdoc}
		 */
		public function getSlug() {
			return $this->get(SlugCapableInterface::FIELD_SLUG);
		}

		/**
		 * {@inheritdoc}
		 */
		public function setSlug($slug) {
			return $this->set(SlugCapableInterface::FIELD_SLUG, $slug);
		}
	}