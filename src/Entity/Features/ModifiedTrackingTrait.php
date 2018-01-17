<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	use DaybreakStudios\WordpressSDK\Entity\EntityTrait;

	/**
	 * For use with {@see ModifiedTrackingInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Entity\Features
	 * @see     ModifiedTrackingInterface
	 */
	trait ModifiedTrackingTrait {
		use EntityTrait;

		/**
		 * {@inheritdoc}
		 */
		public function getModifiedDate() {
			return $this->get(ModifiedTrackingInterface::FIELD_MODIFIED_DATE);
		}
	}