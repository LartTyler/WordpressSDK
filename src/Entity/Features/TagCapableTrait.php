<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	use DaybreakStudios\WordpressSDK\Entity\EntityTrait;

	/**
	 * For use with {@see TagCapableInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Entity\Features
	 * @see     TagCapableInterface
	 */
	trait TagCapableTrait {
		use EntityTrait;

		/**
		 * {@inheritdoc}
		 */
		public function getTags() {
			return $this->get(TagCapableInterface::FIELD_TAGS, []);
		}

		/**
		 * {@inheritdoc}
		 */
		public function setTags(array $tags) {
			return $this->set(TagCapableInterface::FIELD_TAGS, $tags);
		}
	}