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
		 * {@inheritdoc}
		 */
		public function getStatus() {
			return $this->get(StatusCapableInterface::FIELD_STATUS);
		}

		/**
		 * {@inheritdoc}
		 */
		public function setStatus($status) {
			return $this->set(StatusCapableInterface::FIELD_STATUS, $status);
		}
	}