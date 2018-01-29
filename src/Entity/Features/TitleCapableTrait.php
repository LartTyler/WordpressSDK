<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	/**
	 * For use with {@see TitleCapableInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Entity\Features
	 * @see     TitleCapableInterface
	 */
	trait TitleCapableTrait {
		/**
		 * @return string|null
		 */
		public function getTitle() {
			return $this->get(TitleCapableInterface::FIELD_TITLE);
		}

		/**
		 * @param string $title
		 *
		 * @return $this
		 */
		public function setTitle($title) {
			return $this->set(TitleCapableInterface::FIELD_TITLE, $title);
		}
	}