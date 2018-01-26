<?php
	namespace DaybreakStudios\WordpressSDK\Client\Criteria\Features;

	use DaybreakStudios\WordpressSDK\Entity\Post;

	interface PostFilterInterface {
		/**
		 * Limit result set to terms assigned to a specific post
		 */
		const FILTER_POST = 'post';

		/**
		 * @return int|null
		 */
		public function getPost();

		/**
		 * @param Post|int|null $post
		 *
		 * @return $this
		 */
		public function setPost($post);
	}