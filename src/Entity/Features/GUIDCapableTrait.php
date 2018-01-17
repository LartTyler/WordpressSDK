<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	use DaybreakStudios\WordpressSDK\Entity\EntityTrait;

	/**
	 * For use with {@see GUIDCapableInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Entity\Features
	 * @see     GUIDCapableInterface
	 */
	trait GUIDCapableTrait {
		use EntityTrait;

		/**
		 * {@inheritdoc}
		 */
		public function getGUID() {
			return $this->get(GUIDCapableInterface::FIELD_GUID);
		}
	}