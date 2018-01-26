<?php
	namespace DaybreakStudios\WordpressSDK\Client\Criteria\Features;

	use DaybreakStudios\WordpressSDK\Entity\Category;

	interface CategoryFilterInterface {
		/**
		 * Limit result set to all items that have the specified term assigned in the categories taxonomy
		 */
		const FILTER_INCLUDED_CATEGORIES = 'categories';

		/**
		 * Limit result set to all items except those that have the specified term assigned in the categories taxonomy
		 */
		const FILTER_EXCLUDED_CATEGORIES = 'categories_exclude';

		/**
		 * @return int[]
		 */
		public function getIncludedCategories();

		/**
		 * @param Category[]|int[]|null $categories
		 *
		 * @return $this
		 */
		public function setIncludedCategories(array $categories = null);

		/**
		 * @return int[]
		 */
		public function getExcludedCategories();

		/**
		 * @param Category[]|int[]|null $categories
		 *
		 * @return mixed
		 */
		public function setExcludedCategories(array $categories = null);
	}