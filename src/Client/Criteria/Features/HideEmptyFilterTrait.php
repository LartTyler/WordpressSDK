<?php
	namespace DaybreakStudios\WordpressSDK\Client\Criteria\Features;

	/**
	 * For use with {@see HideEmptyFilterInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Client\Criteria\Features
	 * @see     HideEmptyFilterInterface
	 */
	trait HideEmptyFilterTrait {
		use AbstractFilterTrait;

		/**
		 * @return bool
		 */
		public function getHideEmpty() {
			return $this->get(HideEmptyFilterInterface::FILTER_HIDE_EMPTY, false);
		}

		/**
		 * @param bool $hideEmpty
		 *
		 * @return $this
		 */
		public function setHideEmpty($hideEmpty) {
			return $this->set(HideEmptyFilterInterface::FILTER_HIDE_EMPTY, $hideEmpty);
		}
	}