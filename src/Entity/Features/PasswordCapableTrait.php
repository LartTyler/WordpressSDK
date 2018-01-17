<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	use DaybreakStudios\WordpressSDK\Entity\EntityTrait;

	/**
	 * For use with {@see PasswordCapableInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Entity\Features
	 * @see     PasswordCapableInterface
	 */
	trait PasswordCapableTrait {
		use EntityTrait;

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