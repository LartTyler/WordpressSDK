<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	interface PasswordCapableInterface {
		/**
		 * A password to protect access to the content and excerpt
		 */
		const FIELD_PASSWORD = 'password';

		/**
		 * @return string|null
		 */
		public function getPassword();

		/**
		 * @param string|null $password
		 *
		 * @return $this
		 */
		public function setPassword($password);
	}