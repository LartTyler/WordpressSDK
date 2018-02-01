<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	use DaybreakStudios\WordpressSDK\Entity\TagInterface;

	/**
	 * For use with {@see TagCapableInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Entity\Features
	 * @see     TagCapableInterface
	 */
	trait TagCapableTrait {
		/**
		 * @return int[]
		 */
		public function getTags() {
			return $this->get(TagCapableInterface::FIELD_TAGS, []);
		}

		/**
		 * @param TagInterface[]|int[] $tags
		 *
		 * @return $this
		 */
		public function setTags(array $tags) {
			return $this->set(TagCapableInterface::FIELD_TAGS, $this->normalizeTagsArray($tags));
		}

		/**
		 * @param TagInterface[]|int[] $tags
		 *
		 * @return int[]
		 * @internal
		 */
		private function normalizeTagsArray(array $tags) {
			if (!$tags)
				return $tags;

			return array_map(function($item) {
				if ($item instanceof TagInterface)
					return $item->getId();

				return $item;
			}, $tags);
		}
	}