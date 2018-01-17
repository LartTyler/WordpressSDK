<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	interface PingCapableInterface {
		/**
		 * Whether or not the object can be pinged
		 */
		const FIELD_PING_STATUS = 'pingStatus';

		/**
		 * Indicates that the object should respond to pings
		 */
		const PING_STATUS_OPEN = 'open';

		/**
		 * Indicates that the object should NOT respond to pings
		 */
		const PING_STATUS_CLOSED = 'closed';

		/**
		 * @return string
		 */
		public function getPingStatus();

		/**
		 * @param string $pingStatus
		 *
		 * @return $this
		 */
		public function setPingStatus($pingStatus);
	}