<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	/**
	 *
	 * For use with {@see AuthorCapableInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Entity\Features
	 * @see     AuthorCapableInterface
	 */
	trait AuthorCapableTrait {
		/**
		 * {@inheritdoc}
		 */
		public function getAuthor() {
			return $this->get(AuthorCapableInterface::FIELD_AUTHOR);
		}

		/**
		 * @param int $author
		 *
		 * @return $this
		 */
		public function setAuthor($author) {
			return $this->set(AuthorCapableInterface::FIELD_AUTHOR, $author);
		}
	}