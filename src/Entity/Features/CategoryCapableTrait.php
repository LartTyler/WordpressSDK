<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	use DaybreakStudios\WordpressSDK\Entity\CategoryInterface;

	/**
	 * For use with {@see CategoryCapableInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Entity\Features
	 * @see     CategoryCapableInterface
	 */
	trait CategoryCapableTrait {
		/**
		 * @return int[]
		 */
		public function getCategories() {
			return $this->get(CategoryCapableInterface::FIELD_CATEGORIES, []);
		}

		/**
		 * @param CategoryInterface[]|int[] $categories
		 *
		 * @return $this
		 */
		public function setCategories(array $categories) {
			return $this->set(CategoryCapableInterface::FIELD_CATEGORIES, $this->normalizeCategoriesArray($categories));
		}

		/**
		 * @param CategoryInterface[]|int[] $categories
		 *
		 * @return int[]
		 * @internal
		 */
		private function normalizeCategoriesArray(array $categories) {
			if (!$categories)
				return $categories;

			return array_map(function($item) {
				if ($item instanceof CategoryInterface)
					return $item->getId();

				return $item;
			}, $categories);
		}
	}