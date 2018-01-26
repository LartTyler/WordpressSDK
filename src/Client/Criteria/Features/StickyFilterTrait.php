<?php
	namespace DaybreakStudios\WordpressSDK\Client\Criteria\Features;

	/**
	 * For use with {@see StickyFilterInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Client\Criteria\Features
	 * @see     StickyFilterInterface
	 */
	trait StickyFilterTrait {
		use AbstractFilterTrait;

		/**
		 * @return bool
		 */
		public function getStickyOnly() {
			return $this->get(StickyFilterInterface::FILTER_STICKY, false);
		}

		/**
		 * @param bool $sticky
		 *
		 * @return $this
		 */
		public function setStickyOnly($sticky) {
			return $this->set(StickyFilterInterface::FILTER_STICKY, $sticky);
		}
	}