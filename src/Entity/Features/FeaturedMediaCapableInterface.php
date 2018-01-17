<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	interface FeaturedMediaCapableInterface {
		/**
		 * The ID of the featured media for the object
		 */
		const FIELD_FEATURED_MEDIA = 'featuredMedia';

		/**
		 * @return int|null
		 */
		public function getFeaturedMedia();

		/**
		 * @param int|null $featuredMedia
		 *
		 * @return $this
		 */
		public function setFeaturedMedia($featuredMedia);
	}