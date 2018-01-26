<?php
	namespace DaybreakStudios\WordpressSDK\Client\Criteria\Features;

	use DaybreakStudios\WordpressSDK\Entity\EntityInterface;

	/**
	 * Interface MultiParentFilterInterface
	 *
	 * @package DaybreakStudios\WordpressSDK\Client\Criteria\Features
	 */
	interface MultiParentFilterInterface {
		/**
		 * Limit result set to items with particular parent IDs
		 */
		const FILTER_INCLUDE_MULTI_PARENT = 'parent';

		/**
		 * Limit result set to all items except those of a particular parent ID
		 */
		const FILTER_EXCLUDE_MULTI_PARENT = 'parent_exclude';

		/**
		 * @return int[]
		 */
		public function getIncludedParents();

		/**
		 * @param EntityInterface[]|int[] $parents
		 *
		 * @return $this
		 */
		public function setIncludedParents(array $parents);

		/**
		 * @return int[]
		 */
		public function getExcludedParents();

		/**
		 * @param EntityInterface[]|int[] $parents
		 *
		 * @return $this
		 */
		public function setExcludedParents(array $parents);
	}