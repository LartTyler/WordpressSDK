<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	use DaybreakStudios\WordpressSDK\Entity\EntityTrait;

	/**
	 * For use with {@see DescriptionCapableInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Entity\Features
	 * @see     DescriptionCapableInterface
	 */
	trait DescriptionCapableTrait {
		use EntityTrait;

		/**
		 * {@inheritdoc}
		 */
		public function getDescription() {
			return $this->get(DescriptionCapableInterface::FIELD_DESCRIPTION);
		}

		/**
		 * {@inheritdoc}
		 */
		public function setDescription($description) {
			return $this->set(DescriptionCapableInterface::FIELD_DESCRIPTION, $description);
		}
	}