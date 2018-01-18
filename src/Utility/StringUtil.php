<?php
	namespace DaybreakStudios\WordpressSDK\Utility;

	final class StringUtil {
		/**
		 * StringUtil constructor.
		 */
		private function __construct() {
		}

		/**
		 * @param string $string
		 *
		 * @return string
		 */
		public static function classify($string) {
			return str_replace(' ', '', ucwords(strtr($string, '-_', '  ')));
		}

		/**
		 * @param string $string
		 *
		 * @return string
		 */
		public static function camelize($string) {
			return lcfirst(self::classify($string));
		}

		/**
		 * @param string $string
		 *
		 * @return string
		 */
		public static function underscore($string) {
			if (!$string)
				return $string;

			$output = '';

			for ($i = 0, $ii = strlen($string); $i < $ii; $i++) {
				$char = $string[$i];
				$ord = ord($char);

				if ($ord >= 65 && $ord <= 90)
					$char = ($i > 0 ? '_' : '') . $char;

				$output .= strtolower($char);
			}

			return $output;
		}
	}