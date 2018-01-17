<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	use DaybreakStudios\WordpressSDK\Entity\EntityTrait;

	/**
	 * For use with {@see CategoryCapableInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Entity\Features
	 * @see     CategoryCapableInterface
	 */
	trait CategoryCapableTrait {
		use EntityTrait;

		/**
		 * {@inheritdoc}
		 */
		public function getCategories() {
			return $this->get(CategoryCapableInterface::FIELD_CATEGORIES, []);
		}

		/**
		 * {@inheritdoc}
		 */
		public function setCategories(array $categories) {
			return $this->set(CategoryCapableInterface::FIELD_CATEGORIES, $categories);
		}
	}