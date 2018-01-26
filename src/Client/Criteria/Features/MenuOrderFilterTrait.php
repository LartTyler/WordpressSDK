<?php
	namespace DaybreakStudios\WordpressSDK\Client\Criteria\Features;

	/**
	 * For use with {@see MenuOrderFilterInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Client\Criteria\Features
	 * @see     MenuOrderFilterInterface
	 */
	trait MenuOrderFilterTrait {
		use AbstractFilterTrait;

		/**
		 * @return int|null
		 */
		public function getMenuOrder() {
			return $this->get(MenuOrderFilterInterface::FILTER_MENU_ORDER);
		}

		/**
		 * @param int|null $menuOrder
		 *
		 * @return $this
		 */
		public function setMenuOrder($menuOrder) {
			return $this->set(MenuOrderFilterInterface::FILTER_MENU_ORDER, $menuOrder);
		}
	}