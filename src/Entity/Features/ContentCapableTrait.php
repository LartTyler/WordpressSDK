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
		 * @return string|null
		 */
		public function getContent() {
			return $this->get(ContentCapableInterface::FIELD_CONTENT);
		}

		/**
		 * @param string $content
		 *
		 * @return $this
		 */
		public function setContent($content) {
			return $this->set(ContentCapableInterface::FIELD_CONTENT, $content);
		}

		/**
		 * @return string|null
		 */
		public function getExcerpt() {
			return $this->get(ContentCapableInterface::FIELD_EXCERPT);
		}

		/**
		 * @param string $excerpt
		 *
		 * @return $this
		 */
		public function setExcerpt($excerpt) {
			return $this->set(ContentCapableInterface::FIELD_EXCERPT, $excerpt);
		}
	}