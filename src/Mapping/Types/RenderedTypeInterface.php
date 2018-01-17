<?php
	namespace DaybreakStudios\WordpressSDK\Mapping\Types;

	class RenderedTypeInterface implements TypeInterface {
		/**
		 * @param string $value
		 *
		 * @return string
		 */
		public function convertToAPIValue($value) {
			return $value;
		}

		/**
		 * @param object $value
		 *
		 * @return string
		 */
		public function convertToPHPValue($value) {
			return $value->rendered;
		}
	}