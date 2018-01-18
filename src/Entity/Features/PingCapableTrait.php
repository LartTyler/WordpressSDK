<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	/**
	 * For use with {@see PingCapableInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Entity\Features
	 * @see     PingCapableInterface
	 */
	trait PingCapableTrait {
		/**
		 * {@inheritdoc}
		 */
		public function getPingStatus() {
			return $this->get(PingCapableInterface::FIELD_PING_STATUS);
		}

		/**
		 * {@inheritdoc}
		 */
		public function setPingStatus($pingStatus) {
			return $this->set(PingCapableInterface::FIELD_PING_STATUS, $pingStatus);
		}
	}