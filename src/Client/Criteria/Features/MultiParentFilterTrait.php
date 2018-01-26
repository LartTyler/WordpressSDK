<?php
	namespace DaybreakStudios\WordpressSDK\Client\Criteria\Features;

	use DaybreakStudios\WordpressSDK\Entity\EntityInterface;

	/**
	 * For use with {@see MultiParentFilterInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Client\Criteria\Features
	 * @see     MultiParentFilterInterface
	 */
	trait MultiParentFilterTrait {
		use AbstractFilterTrait;

		/**
		 * @return int[]
		 */
		public function getIncludedParents() {
			return $this->get(MultiParentFilterInterface::FILTER_INCLUDE_MULTI_PARENT, []);
		}

		/**
		 * @param EntityInterface[]|int[] $parents
		 *
		 * @return $this
		 */
		public function setIncludedParents(array $parents) {
			return $this->set(MultiParentFilterInterface::FILTER_INCLUDE_MULTI_PARENT,
				$this->normalizeParentsArray($parents));
		}

		/**
		 * @return int[]
		 */
		public function getExcludedParents() {
			return $this->get(MultiParentFilterInterface::FILTER_EXCLUDE_MULTI_PARENT, []);
		}

		/**
		 * @param EntityInterface[]|int[] $parents
		 *
		 * @return $this
		 */
		public function setExcludedParents(array $parents) {
			return $this->set(MultiParentFilterInterface::FILTER_EXCLUDE_MULTI_PARENT,
				$this->normalizeParentsArray($parents));
		}

		/**
		 * @param array $parents
		 *
		 * @return array
		 * @internal
		 */
		private function normalizeParentsArray(array $parents) {
			return array_map(function($item) {
				if ($item instanceof EntityInterface)
					$item = $item->getId();

				return $item;
			}, $parents);
		}
	}