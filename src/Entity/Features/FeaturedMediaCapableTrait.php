<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	use DaybreakStudios\WordpressSDK\Entity\EntityTrait;

	/**
	 * For use with {@see FeaturedMediaCapableInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Entity\Features
	 * @see     FeaturedMediaCapableInterface
	 */
	trait FeaturedMediaCapableTrait {
		use EntityTrait;

		/**
		 * {@inheritdoc}
		 */
		public function getFeaturedMedia() {
			return $this->get(FeaturedMediaCapableInterface::FIELD_FEATURED_MEDIA);
		}

		/**
		 * {@inheritdoc}
		 */
		public function setFeaturedMedia($featuredMedia) {
			return $this->set(FeaturedMediaCapableInterface::FIELD_FEATURED_MEDIA, $featuredMedia);
		}
	}