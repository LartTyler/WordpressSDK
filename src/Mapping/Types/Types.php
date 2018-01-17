<?php
	namespace DaybreakStudios\WordpressSDK\Mapping\Types;

	final class Types {
		const RENDERED = 'rendered';
		const DATETIME = 'datetime';

		/**
		 * @var array
		 */
		private static $typeMap = [
			self::DATETIME => DateTimeTypeInterface::class,
			self::RENDERED => RenderedTypeInterface::class,
		];

		/**
		 * @var TypeInterface[]
		 */
		private static $instances = [];

		/**
		 * Types constructor.
		 */
		private function __construct() {
		}

		/**
		 * @param string $name
		 *
		 * @return TypeInterface
		 * @throws MappingException
		 */
		public static function getType($name) {
			if (!isset(self::$instances[$name])) {
				if (!isset(self::$typeMap[$name]))
					throw MappingException::unknownType($name);

				self::$instances[$name] = new self::$typeMap[$name]();
			}

			return self::$instances[$name];
		}

		/**
		 * @param string $name
		 * @param string $class
		 *
		 * @return void
		 * @throws MappingException
		 */
		public static function addType($name, $class) {
			if (!is_a($class, TypeInterface::class, true))
				throw MappingException::mustImplementTypeInterface($class);

			self::$typeMap[$name] = $class;
		}
	}