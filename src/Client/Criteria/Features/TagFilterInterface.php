<?php
	namespace DaybreakStudios\WordpressSDK\Client\Criteria\Features;

	use DaybreakStudios\WordpressSDK\Entity\Tag;

	interface TagFilterInterface {
		/**
		 * Limit result set to all items that have the specified term assigned in the tags taxonomy
		 */
		const FILTER_INCLUDE_TAGS = 'tags';

		/**
		 * Limit result set to all items except those that have the specified term assigned in the tags taxonomy
		 */
		const FILTER_EXCLUDE_TAGS = 'tags_exclude';

		/**
		 * @return int[]
		 */
		public function getIncludedTags();

		/**
		 * @param Tag[]|int[]|null $tags
		 *
		 * @return $this
		 */
		public function setIncludedTags(array $tags = null);

		/**
		 * @return int[]
		 */
		public function getExcludedTags();

		/**
		 * @param Tag[]|int[]|null $tags
		 *
		 * @return $this
		 */
		public function setExcludedTags(array $tags = null);
	}