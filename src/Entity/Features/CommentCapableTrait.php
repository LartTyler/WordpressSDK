<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	use DaybreakStudios\WordpressSDK\Entity\EntityTrait;

	/**
	 * For use with {@see CommentCapableInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Entity\Features
	 * @see     CommentCapableInterface
	 */
	trait CommentCapableTrait {
		use EntityTrait;

		/**
		 * {@inheritdoc}
		 */
		public function getCommentStatus() {
			return $this->get(CommentCapableInterface::FIELD_COMMENT_STATUS);
		}

		/**
		 * {@inheritdoc}
		 */
		public function setCommentStatus($commentStatus) {
			return $this->set(CommentCapableInterface::FIELD_COMMENT_STATUS, $commentStatus);
		}
	}