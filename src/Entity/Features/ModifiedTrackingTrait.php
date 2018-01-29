<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	/**
	 * For use with {@see ModifiedTrackingInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Entity\Features
	 * @see     ModifiedTrackingInterface
	 */
	trait ModifiedTrackingTrait {
		/**
		 * @return \DateTime
		 */
		public function getModifiedDate() {
			return $this->get(ModifiedTrackingInterface::FIELD_MODIFIED_DATE);
		}
	}