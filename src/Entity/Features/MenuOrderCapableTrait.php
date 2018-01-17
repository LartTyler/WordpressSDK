<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	use DaybreakStudios\WordpressSDK\Entity\EntityTrait;

	/**
	 * For use with {@see MenuOrderCapableInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Entity\Features
	 * @see     MenuOrderCapableInterface
	 */
	trait MenuOrderCapableTrait {
		use EntityTrait;

		/**
		 * {@inheritdoc}
		 */
		public function getMenuOrder() {
			return $this->get(MenuOrderCapableInterface::FIELD_MENU_ORDER, 0);
		}

		/**
		 * {@inheritdoc}
		 */
		public function setMenuOrder($menuOrder) {
			return $this->set(MenuOrderCapableInterface::FIELD_MENU_ORDER, $menuOrder ?: 0);
		}
	}