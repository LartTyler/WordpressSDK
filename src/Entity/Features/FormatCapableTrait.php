<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	use DaybreakStudios\WordpressSDK\Entity\EntityTrait;

	/**
	 * For use with {@see FormatCapableInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Entity\Features
	 * @see     FormatCapableInterface
	 */
	trait FormatCapableTrait {
		use EntityTrait;

		/**
		 * {@inheritdoc}
		 */
		public function getFormat() {
			return $this->get(FormatCapableInterface::FIELD_FORMAT);
		}

		/**
		 * @param string $format
		 *
		 * @return $this
		 */
		public function setFormat($format) {
			return $this->set(FormatCapableInterface::FIELD_FORMAT, $format);
		}
	}