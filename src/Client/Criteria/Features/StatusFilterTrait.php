<?php
	namespace DaybreakStudios\WordpressSDK\Client\Criteria\Features;

	/**
	 * For use with {@see StatusFilterInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Client\Criteria\Features
	 * @see     StatusFilterInterface
	 */
	trait StatusFilterTrait {
		use AbstractFilterTrait;

		/**
		 * @return string|null
		 */
		public function getStatus() {
			return $this->get(StatusFilterInterface::FILTER_STATUS);
		}

		/**
		 * @param string|null $status
		 *
		 * @return $this
		 */
		public function setStatus($status) {
			return $this->set(StatusFilterInterface::FILTER_STATUS, $status);
		}
	}