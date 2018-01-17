<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	interface TaxonomyTypeCapableInterface {
		/**
		 * Taxonomy type attribution for the object
		 */
		const FIELD_TAXONOMY_TYPE = 'taxonomy';

		/**
		 * @see https://codex.wordpress.org/Taxonomies#Category
		 */
		const TAXONOMY_TYPE_CATEGORY = 'category';

		/**
		 * @see https://codex.wordpress.org/Taxonomies#Tag
		 */
		const TAXONOMY_TYPE_POST_TAG = 'post_tag';

		/**
		 * This taxonomy type is not mentioned or documented outside of the REST API documentation
		 */
		const TAXONOMY_TYPE_NAV_MENU = 'nav_menu';

		/**
		 * @see https://codex.wordpress.org/Taxonomies#Link_Category
		 */
		const TAXONOMY_TYPE_LINK_CATEGORY = 'link_category';

		/**
		 * @see https://codex.wordpress.org/Taxonomies#Post_Formats
		 */
		const TAXONOMY_TYPE_POST_FORMAT = 'post_format';

		/**
		 * @return string
		 */
		public function getTaxonomyType();
	}