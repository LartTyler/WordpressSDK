<?php
	namespace DaybreakStudios\WordpressSDK\Client\Criteria\Features;

	use DaybreakStudios\WordpressSDK\Entity\CategoryInterface;

	/**
	 * For use with {@see CategoryFilterInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Client\Criteria\Features
	 * @see     CategoryFilterInterface
	 */
	trait CategoryFilterTrait {
		use AbstractFilterTrait;

		/**
		 * @return int[]
		 */
		public function getIncludedCategories() {
			return $this->get(CategoryFilterInterface::FILTER_INCLUDED_CATEGORIES, []);
		}

		/**
		 * @param CategoryInterface[]|int[]|null $categories
		 *
		 * @return $this
		 */
		public function setIncludedCategories(array $categories = null) {
			return $this->set(CategoryFilterInterface::FILTER_INCLUDED_CATEGORIES,
				$this->normalizeCategoriesArray($categories));
		}

		/**
		 * @return int[]
		 */
		public function getExcludedCategories() {
			return $this->get(CategoryFilterInterface::FILTER_EXCLUDED_CATEGORIES, []);
		}

		/**
		 * @param CategoryInterface[]|int[]|null $categories
		 *
		 * @return $this
		 */
		public function setExcludedCategories(array $categories = null) {
			return $this->set(CategoryFilterInterface::FILTER_EXCLUDED_CATEGORIES,
				$this->normalizeCategoriesArray($categories));
		}

		/**
		 * @param CategoryInterface[]|int[]|null $categories
		 *
		 * @return int[]
		 * @internal
		 */
		private function normalizeCategoriesArray(array $categories = null) {
			if (!$categories)
				return $categories;

			return array_map(function($item) {
				if ($item instanceof CategoryInterface)
					return $item->getId();

				return $item;
			}, $categories);
		}
	}