<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	use DaybreakStudios\WordpressSDK\Entity\CategoryInterface;

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
		 * @param CategoryInterface[]|int[] $categories
		 *
		 * @return $this
		 */
		public function setCategories(array $categories);
	}