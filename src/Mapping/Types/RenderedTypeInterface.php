<?php
	namespace DaybreakStudios\WordpressSDK\Mapping\Types;

	class RenderedTypeInterface implements TypeInterface {
		const VALUE_KEYS = [
			'raw',
			'rendered',
		];

		/**
		 * @param string $value
		 *
		 * @return string
		 */
		public function convertToAPIValue($value) {
			return $value;
		}

		/**
		 * @param object|array $value
		 *
		 * @return string
		 */
		public function convertToPHPValue($value) {
			if (is_object($value))
				$value = (array)$value;
			else if (!is_array($value))
				throw $this->createInvalidValueException();

			foreach (self::VALUE_KEYS as $key) {
				if (!isset($value[$key]))
					continue;

				return $value[$key];
			}

			throw $this->createInvalidValueException();
		}

		/**
		 * @return \InvalidArgumentException
		 */
		protected function createInvalidValueException() {
			$message = sprintf('$value must be an array or object with one of the following properties: %s',
				implode(', ', self::VALUE_KEYS));

			return new \InvalidArgumentException($message);
		}
	}