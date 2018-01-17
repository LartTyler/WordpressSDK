<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	interface CommentCapableInterface {
		/**
		 * Whether or not comments are open on the object
		 */
		const FIELD_COMMENT_STATUS = 'commentStatus';

		/**
		 * Indicates that the object allows comments
		 */
		const COMMENT_STATUS_OPEN = 'open';

		/**
		 * Indicates that the object does NOT allow comments
		 */
		const COMMENT_STATUS_CLOSED = 'closed';

		/**
		 * @return string
		 */
		public function getCommentStatus();

		/**
		 * @param string $commentStatus
		 *
		 * @return $this
		 */
		public function setCommentStatus($commentStatus);
	}