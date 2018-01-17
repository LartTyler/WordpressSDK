<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	use DaybreakStudios\WordpressSDK\Entity\EntityTrait;

	/**
	 * For use with {@see ParentCapableInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Entity\Features
	 * @see     ParentCapableInterface
	 */
	trait ParentCapableTrait {
		use EntityTrait;

		/**
		 * {@inheritdoc}
		 */
		public function getParent() {
			return $this->get(ParentCapableInterface::FIELD_PARENT);
		}

		/**
		 * {@inheritdoc}
		 */
		public function setParent($parent) {
			return $this->set(ParentCapableInterface::FIELD_PARENT, $parent);
		}
	}