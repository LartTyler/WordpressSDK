<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	/**
	 * For use with {@see FeaturedMediaCapableInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Entity\Features
	 * @see     FeaturedMediaCapableInterface
	 */
	trait FeaturedMediaCapableTrait {
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