<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	/**
	 * For use with {@see ContentCapableInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Entity\Features
	 * @see     ContentCapableInterface
	 */
	trait ContentCapableTrait {
		/**
		 * {@inheritdoc}
		 */
		public function getContent() {
			return $this->get(ContentCapableInterface::FIELD_CONTENT);
		}

		/**
		 * {@inheritdoc}
		 */
		public function setContent($content) {
			return $this->set(ContentCapableInterface::FIELD_CONTENT, $content);
		}

		/**
		 * {@inheritdoc}
		 */
		public function getExcerpt() {
			return $this->get(ContentCapableInterface::FIELD_EXCERPT);
		}

		/**
		 * {@inheritdoc}
		 */
		public function setExcerpt($excerpt) {
			return $this->set(ContentCapableInterface::FIELD_EXCERPT, $excerpt);
		}
	}