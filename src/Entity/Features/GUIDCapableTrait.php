<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	/**
	 * For use with {@see GUIDCapableInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Entity\Features
	 * @see     GuidCapableInterface
	 */
	trait GUIDCapableTrait {
		/**
		 * {@inheritdoc}
		 */
		public function getGUID() {
			return $this->get(GuidCapableInterface::FIELD_GUID);
		}
	}