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
		 * @return int|null
		 */
		public function getFeaturedMedia() {
			return $this->get(FeaturedMediaCapableInterface::FIELD_FEATURED_MEDIA);
		}

		/**
		 * @param int $featuredMedia
		 *
		 * @return $this
		 */
		public function setFeaturedMedia($featuredMedia) {
			return $this->set(FeaturedMediaCapableInterface::FIELD_FEATURED_MEDIA, $featuredMedia);
		}
	}