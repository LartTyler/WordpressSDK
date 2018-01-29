<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	/**
	 * For use with {@see StickyCapableInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Entity\Features
	 * @see     StickyCapableInterface
	 */
	trait StickyCapableTrait {
		/**
		 * @return bool
		 */
		public function isSticky() {
			return $this->get(StickyCapableInterface::FIELD_STICKY);
		}

		/**
		 * @param bool $sticky
		 *
		 * @return $this
		 */
		public function setSticky($sticky) {
			return $this->set(StickyCapableInterface::FIELD_STICKY, $sticky);
		}
	}