<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	use DaybreakStudios\WordpressSDK\Entity\EntityTrait;

	/**
	 * For use with {@see CountCapableInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Entity\Features
	 * @see     CountCapableInterface
	 */
	trait CountCapableTrait {
		use EntityTrait;

		/**
		 * {@inheritdoc}
		 */
		public function getCount() {
			return $this->get(CountCapableInterface::FIELD_COUNT, 0);
		}
	}