<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	interface StatusCapableInterface {
		/**
		 * A named status for the object
		 */
		const FIELD_STATUS = 'status';

		/**
		 * Indicates the object has been published
		 */
		const STATUS_PUBLISHED = 'publish';

		/**
		 * Indicates the object will be published at a future date (usually indicated by the publishDate field)
		 */
		const STATUS_FUTURE = 'future';

		/**
		 * Indicates the object is a draft
		 */
		const STATUS_DRAFT = 'draft';

		/**
		 * Indicates the object is pending editor review before being published
		 */
		const STATUS_PENDING = 'pending';

		/**
		 * Indicates the object is private, and may only be viewed by the creator and admins
		 */
		const STATUS_PRIVATE = 'private';

		/**
		 * @return string
		 */
		public function getStatus();

		/**
		 * @param string $status
		 *
		 * @return $this
		 */
		public function setStatus($status);
	}