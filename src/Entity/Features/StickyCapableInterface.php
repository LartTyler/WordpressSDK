<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	interface StickyCapableInterface {
		/**
		 * Whether or not the object should be treated as sticky
		 */
		const FIELD_STICKY = 'sticky';

		/**
		 * @return bool
		 */
		public function isSticky();

		/**
		 * @param bool $sticky
		 *
		 * @return $this
		 */
		public function setSticky($sticky);
	}