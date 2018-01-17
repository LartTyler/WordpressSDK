<?php
	namespace DaybreakStudios\WordpressSDK\Mapping\Types;

	class DateTimeTypeInterface implements TypeInterface {
		/**
		 * @param \DateTime $value
		 *
		 * @return string
		 */
		public function convertToAPIValue($value) {
			return $value->format('Y-m-d\\TH:i:s');
		}

		/**
		 * @param string $value
		 *
		 * @return \DateTime
		 */
		public function convertToPHPValue($value) {
			return new \DateTime($value);
		}
	}