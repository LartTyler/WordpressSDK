<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	/**
	 * For use with {@see NameCapableInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Entity\Features
	 * @see     NameCapableInterface
	 */
	trait NameCapableTrait {
		/**
		 * @return string
		 */
		public function getName() {
			return $this->get(NameCapableInterface::FIELD_NAME);
		}

		/**
		 * @param string $name
		 *
		 * @return $this
		 */
		public function setName($name) {
			return $this->set(NameCapableInterface::FIELD_NAME, $name);
		}
	}