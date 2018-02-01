<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	use DaybreakStudios\WordpressSDK\Entity\TagInterface;

	interface TagCapableInterface {
		/**
		 * The terms assigned to the object in the post_tag taxonomy
		 */
		const FIELD_TAGS = 'tags';

		/**
		 * @return int[]
		 */
		public function getTags();

		/**
		 * @param TagInterface[]|int[] $tags
		 *
		 * @return $this
		 */
		public function setTags(array $tags);
	}