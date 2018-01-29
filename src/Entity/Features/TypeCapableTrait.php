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
		 * @return string
		 */
		public function getType() {
			return $this->get(TypeCapableInterface::FIELD_TYPE);
		}
	}