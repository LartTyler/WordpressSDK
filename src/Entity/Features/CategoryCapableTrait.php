<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

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
		 * @param int[] $categories
		 *
		 * @return $this
		 */
		public function setCategories(array $categories) {
			return $this->set(CategoryCapableInterface::FIELD_CATEGORIES, $categories);
		}
	}