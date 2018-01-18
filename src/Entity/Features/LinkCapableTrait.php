<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	/**
	 * For use with {@see LinkCapableInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Entity\Features
	 * @see     LinkCapableInterface
	 */
	trait LinkCapableTrait {
		/**
		 * {@inheritdoc}
		 */
		public function getLink() {
			return $this->get(LinkCapableInterface::FIELD_LINK);
		}
	}