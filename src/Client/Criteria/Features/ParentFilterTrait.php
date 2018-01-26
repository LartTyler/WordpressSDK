<?php
	namespace DaybreakStudios\WordpressSDK\Client\Criteria\Features;

	use DaybreakStudios\WordpressSDK\Entity\EntityInterface;

	/**
	 * For use with {@see ParentFilterInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Client\Criteria\Features
	 * @see     ParentFilterInterface
	 */
	trait ParentFilterTrait {
		use AbstractFilterTrait;

		/**
		 * @return int|null
		 */
		public function getParent() {
			return $this->get(ParentFilterInterface::FILTER_PARENT);
		}

		/**
		 * @param EntityInterface|int|null $parent
		 *
		 * @return $this
		 */
		public function setParent($parent) {
			if ($parent instanceof EntityInterface)
				$parent = $parent->getId();

			return $this->set(ParentFilterInterface::FILTER_PARENT, $parent);
		}
	}