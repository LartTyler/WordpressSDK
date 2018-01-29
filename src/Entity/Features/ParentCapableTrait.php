<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	/**
	 * For use with {@see ParentCapableInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Entity\Features
	 * @see     ParentCapableInterface
	 */
	trait ParentCapableTrait {
		/**
		 * @return int|null
		 */
		public function getParent() {
			return $this->get(ParentCapableInterface::FIELD_PARENT);
		}

		/**
		 * @param int $parent
		 *
		 * @return $this
		 */
		public function setParent($parent) {
			return $this->set(ParentCapableInterface::FIELD_PARENT, $parent);
		}
	}