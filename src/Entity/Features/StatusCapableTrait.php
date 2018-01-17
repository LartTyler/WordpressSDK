<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	use DaybreakStudios\WordpressSDK\Entity\EntityTrait;

	/**
	 * For use with {@see StatusCapableInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Entity\Features
	 * @see     StatusCapableInterface
	 */
	trait StatusCapableTrait {
		use EntityTrait;

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