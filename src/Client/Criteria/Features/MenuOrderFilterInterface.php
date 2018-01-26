<?php
	namespace DaybreakStudios\WordpressSDK\Client\Criteria\Features;

	interface MenuOrderFilterInterface {
		/**
		 * Limit result set to posts with a specific menu_order value
		 */
		const FILTER_MENU_ORDER = 'menu_order';

		/**
		 * @return int|null
		 */
		public function getMenuOrder();

		/**
		 * @param int|null $menuOrder
		 *
		 * @return $this
		 */
		public function setMenuOrder($menuOrder);
	}