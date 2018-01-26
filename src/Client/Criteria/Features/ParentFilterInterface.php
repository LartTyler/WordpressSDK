<?php
	namespace DaybreakStudios\WordpressSDK\Client\Criteria\Features;

	use DaybreakStudios\WordpressSDK\Entity\EntityInterface;

	interface ParentFilterInterface {
		/**
		 * Limit result set to terms assigned to a specific parent
		 */
		const FILTER_PARENT = 'parent';

		/**
		 * @return int|null
		 */
		public function getParent();

		/**
		 * @param EntityInterface|int|null $parent
		 *
		 * @return $this
		 */
		public function setParent($parent);
	}