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
		 * {@inheritdoc}
		 */
		public function getPassword() {
			return $this->get(PasswordCapableInterface::FIELD_PASSWORD);
		}

		/**
		 * {@inheritdoc}
		 */
		public function setPassword($password) {
			return $this->set(PasswordCapableInterface::FIELD_PASSWORD, $password);
		}
	}