<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	use DaybreakStudios\WordpressSDK\Entity\EntityTrait;

	/**
	 * For use with {@see NameCapableInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Entity\Features
	 * @see     NameCapableInterface
	 */
	trait NameCapableTrait {
		use EntityTrait;

		/**
		 * {@inheritdoc}
		 */
		public function getName() {
			return $this->get(NameCapableInterface::FIELD_NAME);
		}

		/**
		 * {@inheritdoc}
		 */
		public function setName($name) {
			return $this->set(NameCapableInterface::FIELD_NAME, $name);
		}
	}