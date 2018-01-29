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
		 * @return string|null
		 */
		public function getDescription() {
			return $this->get(DescriptionCapableInterface::FIELD_DESCRIPTION);
		}

		/**
		 * @param string $description
		 *
		 * @return $this
		 */
		public function setDescription($description) {
			return $this->set(DescriptionCapableInterface::FIELD_DESCRIPTION, $description);
		}
	}