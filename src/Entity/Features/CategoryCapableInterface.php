<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	interface CategoryCapableInterface {
		/**
		 * The terms assigned to the object in the category taxonomy
		 */
		const FIELD_CATEGORIES = 'categories';

		/**
		 * @return int[]
		 */
		public function getCategories();

		/**
		 * @param int[] $categories
		 *
		 * @return $this
		 */
		public function setCategories(array $categories);
	}