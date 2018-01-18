<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	/**
	 * For use with {@see TypeCapableInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Entity\Features
	 * @see     TypeCapableInterface
	 */
	trait TypeCapableTrait {
		/**
		 * {@inheritdoc}
		 */
		public function getType() {
			return $this->get(TypeCapableInterface::FIELD_TYPE);
		}
	}