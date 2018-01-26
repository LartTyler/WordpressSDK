<?php
	namespace DaybreakStudios\WordpressSDK\Client\Criteria\Features;

	use DaybreakStudios\WordpressSDK\Entity\PostInterface;

	/**
	 * For use with {@see PostFilterInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Client\Criteria\Features
	 * @see     PostFilterInterface
	 */
	trait PostFilterTrait {
		use AbstractFilterTrait;

		/**
		 * @return int|null
		 */
		public function getPost() {
			return $this->get(PostFilterInterface::FILTER_POST);
		}

		/**
		 * @param PostInterface|int|null $post
		 *
		 * @return $this
		 */
		public function setPost($post) {
			if ($post instanceof PostInterface)
				$post = $post->getId();

			return $this->set(PostFilterInterface::FILTER_POST, $post);
		}
	}