<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	use DaybreakStudios\WordpressSDK\Entity\EntityTrait;

	/**
	 * For use with {@see TypeCapableInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Entity\Features
	 * @see     TypeCapableInterface
	 */
	trait TypeCapableTrait {
		use EntityTrait;

		/**
		 * {@inheritdoc}
		 */
		public function getType() {
			return $this->get(TypeCapableInterface::FIELD_TYPE);
		}
	}