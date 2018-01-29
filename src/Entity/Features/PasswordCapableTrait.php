<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	/**
	 * For use with {@see PasswordCapableInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Entity\Features
	 * @see     PasswordCapableInterface
	 */
	trait PasswordCapableTrait {
		/**
		 * @return string|null
		 */
		public function getPassword() {
			return $this->get(PasswordCapableInterface::FIELD_PASSWORD);
		}

		/**
		 * @param string $password
		 *
		 * @return $this
		 */
		public function setPassword($password) {
			return $this->set(PasswordCapableInterface::FIELD_PASSWORD, $password);
		}
	}