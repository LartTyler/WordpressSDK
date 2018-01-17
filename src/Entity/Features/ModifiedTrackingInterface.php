<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	interface ModifiedTrackingInterface {
		/**
		 * The date the object was last modified, in UTC
		 */
		const FIELD_MODIFIED_DATE = 'modifiedDate';

		/**
		 * @return \DateTime
		 */
		public function getModifiedDate();
	}