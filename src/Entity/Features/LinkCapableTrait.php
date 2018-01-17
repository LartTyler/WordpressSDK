<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	use DaybreakStudios\WordpressSDK\Entity\EntityTrait;

	/**
	 * For use with {@see LinkCapableInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Entity\Features
	 * @see     LinkCapableInterface
	 */
	trait LinkCapableTrait {
		use EntityTrait;

		/**
		 * {@inheritdoc}
		 */
		public function getLink() {
			return $this->get(LinkCapableInterface::FIELD_LINK);
		}
	}