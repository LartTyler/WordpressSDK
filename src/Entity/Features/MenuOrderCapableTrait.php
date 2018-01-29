<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	/**
	 * For use with {@see MenuOrderCapableInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Entity\Features
	 * @see     MenuOrderCapableInterface
	 */
	trait MenuOrderCapableTrait {
		/**
		 * @return int
		 */
		public function getMenuOrder() {
			return $this->get(MenuOrderCapableInterface::FIELD_MENU_ORDER, 0);
		}

		/**
		 * @param int $menuOrder
		 *
		 * @return $this
		 */
		public function setMenuOrder($menuOrder) {
			return $this->set(MenuOrderCapableInterface::FIELD_MENU_ORDER, $menuOrder ?: 0);
		}
	}