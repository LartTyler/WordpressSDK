<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	/**
	 * For use with {@see CommentCapableInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Entity\Features
	 * @see     CommentCapableInterface
	 */
	trait CommentCapableTrait {
		/**
		 * @return string|null
		 */
		public function getCommentStatus() {
			return $this->get(CommentCapableInterface::FIELD_COMMENT_STATUS);
		}

		/**
		 * @param string $commentStatus
		 *
		 * @return $this
		 */
		public function setCommentStatus($commentStatus) {
			return $this->set(CommentCapableInterface::FIELD_COMMENT_STATUS, $commentStatus);
		}
	}