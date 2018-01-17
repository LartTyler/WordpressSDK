<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	interface MenuOrderCapableInterface {
		const FIELD_MENU_ORDER = 'menuOrder';

		/**
		 * @return int
		 */
		public function getMenuOrder();

		/**
		 * @param int $menuOrder
		 *
		 * @return $this
		 */
		public function setMenuOrder($menuOrder);
	}