<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	/**
	 * For use with {@see StatusCapableInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Entity\Features
	 * @see     StatusCapableInterface
	 */
	trait StatusCapableTrait {
		/**
		 * @return string
		 */
		public function getStatus() {
			return $this->get(StatusCapableInterface::FIELD_STATUS);
		}

		/**
		 * @param string $status
		 *
		 * @return $this
		 */
		public function setStatus($status) {
			return $this->set(StatusCapableInterface::FIELD_STATUS, $status);
		}
	}