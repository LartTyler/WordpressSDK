<?php
	namespace DaybreakStudios\WordpressSDK\Mapping\Types;

	class MappingException extends \Exception {
		/**
		 * @param string $name
		 *
		 * @return static
		 */
		public static function unknownType($name) {
			return new static($name . ' is not a recognized type');
		}

		/**
		 * @param string $class
		 *
		 * @return static
		 */
		public static function mustImplementTypeInterface($class) {
			return new static($class . ' must implement ' . TypeInterface::class);
		}
	}