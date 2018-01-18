<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	/**
	 * For use with {@see GUIDCapableInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Entity\Features
	 * @see     GUIDCapableInterface
	 */
	trait GUIDCapableTrait {
		/**
		 * {@inheritdoc}
		 */
		public function getGUID() {
			return $this->get(GUIDCapableInterface::FIELD_GUID);
		}
	}