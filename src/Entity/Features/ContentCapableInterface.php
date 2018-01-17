<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	interface ContentCapableInterface {
		/**
		 * The content for the object
		 */
		const FIELD_CONTENT = 'content';

		/**
		 * The excerpt for the object
		 */
		const FIELD_EXCERPT = 'excerpt';

		/**
		 * @return string
		 */
		public function getContent();

		/**
		 * @param string $content
		 *
		 * @return $this
		 */
		public function setContent($content);

		/**
		 * @return string
		 */
		public function getExcerpt();

		/**
		 * @param string $excerpt
		 *
		 * @return $this
		 */
		public function setExcerpt($excerpt);
	}