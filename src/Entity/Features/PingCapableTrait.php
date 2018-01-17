<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	use DaybreakStudios\WordpressSDK\Entity\EntityTrait;

	/**
	 * For use with {@see PingCapableInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Entity\Features
	 * @see     PingCapableInterface
	 */
	trait PingCapableTrait {
		use EntityTrait;

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