<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	interface AuthorCapableInterface {
		/**
		 * The ID for the author of the object
		 */
		const FIELD_AUTHOR = 'author';

		/**
		 * @return int
		 */
		public function getAuthor();

		/**
		 * @param int $author
		 *
		 * @return $this
		 */
		public function setAuthor($author);
	}