<?php
	namespace DaybreakStudios\WordpressSDK\Client\Criteria\Features;

	use DaybreakStudios\WordpressSDK\Entity\TagInterface;

	/**
	 * For use with {@see TagFilterInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Client\Criteria\Features
	 * @see     TagFilterInterface
	 */
	trait TagFilterTrait {
		use AbstractFilterTrait;

		/**
		 * @return int[]
		 */
		public function getIncludedTags() {
			return $this->get(TagFilterInterface::FILTER_INCLUDE_TAGS, []);
		}

		/**
		 * @param TagInterface[]|int[]|null $tags
		 *
		 * @return $this
		 */
		public function setIncludedTags(array $tags = null) {
			return $this->set(TagFilterInterface::FILTER_INCLUDE_TAGS, $this->normalizeTagsArray($tags));
		}

		/**
		 * @return int[]
		 */
		public function getExcludedTags() {
			return $this->get(TagFilterInterface::FILTER_EXCLUDE_TAGS, []);
		}

		/**
		 * @param TagInterface[]|int[]|null $tags
		 *
		 * @return $this
		 */
		public function setExcludedTags(array $tags = null) {
			return $this->set(TagFilterInterface::FILTER_EXCLUDE_TAGS, $this->normalizeTagsArray($tags));
		}

		/**
		 * @param TagInterface[]|int[]|null $tags
		 *
		 * @return int[]
		 * @internal
		 */
		private function normalizeTagsArray(array $tags = null) {
			if (!$tags)
				return $tags;

			return array_map(function($item) {
				if ($item instanceof TagInterface)
					return $item->getId();

				return $item;
			}, $tags);
		}
	}