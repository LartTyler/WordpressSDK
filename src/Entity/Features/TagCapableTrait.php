<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

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
		 * @param int[] $tags
		 *
		 * @return $this
		 */
		public function setTags(array $tags) {
			return $this->set(TagCapableInterface::FIELD_TAGS, $tags);
		}
	}