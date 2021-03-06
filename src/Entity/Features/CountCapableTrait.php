<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	/**
	 * For use with {@see CountCapableInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Entity\Features
	 * @see     CountCapableInterface
	 */
	trait CountCapableTrait {
		/**
		 * @return int
		 */
		public function getCount() {
			return $this->get(CountCapableInterface::FIELD_COUNT, 0);
		}
	}