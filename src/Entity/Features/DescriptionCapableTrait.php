<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	/**
	 * For use with {@see DescriptionCapableInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Entity\Features
	 * @see     DescriptionCapableInterface
	 */
	trait DescriptionCapableTrait {
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