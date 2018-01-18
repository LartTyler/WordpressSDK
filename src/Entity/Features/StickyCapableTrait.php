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
		 * {@inheritdoc}
		 */
		public function isSticky() {
			return $this->get(StickyCapableInterface::FIELD_STICKY);
		}

		/**
		 * {@inheritdoc}
		 */
		public function setSticky($sticky) {
			return $this->set(StickyCapableInterface::FIELD_STICKY, $sticky);
		}
	}