<?php
	namespace DaybreakStudios\WordpressSDK\Mapping\Types;

	interface TypeInterface {
		/**
		 * @param mixed $value
		 *
		 * @return mixed
		 */
		public function convertToPHPValue($value);

		/**
		 * @param mixed $value
		 *
		 * @return mixed
		 */
		public function convertToAPIValue($value);
	}