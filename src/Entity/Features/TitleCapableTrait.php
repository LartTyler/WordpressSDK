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
		 * {@inheritdoc}
		 */
		public function getTitle() {
			return $this->get(TitleCapableInterface::FIELD_TITLE);
		}

		/**
		 * {@inheritdoc}
		 */
		public function setTitle($title) {
			return $this->set(TitleCapableInterface::FIELD_TITLE, $title);
		}
	}