<?php
	namespace DaybreakStudios\WordpressSDK\Client;

	use DaybreakStudios\WordpressSDK\Client\Criteria\CriteriaInterface;
	use DaybreakStudios\WordpressSDK\Entity\Category;
	use DaybreakStudios\WordpressSDK\Entity\Post;
	use Doctrine\Common\Collections\Collection;
	use Doctrine\Common\Collections\Selectable;

	interface WordpressClientInterface {
		/**
		 * @param int         $id
		 * @param string      $context
		 * @param string|null $password
		 *
		 * @return Post|null
		 */
		public function getPost($id, $context = RequestContext::VIEW, $password = null);

		/**
		 * @param CriteriaInterface|null $criteria
		 * @param string                 $context
		 *
		 * @return Post[]|Collection|Selectable
		 */
		public function getPosts(CriteriaInterface $criteria = null, $context = RequestContext::VIEW);

		/**
		 * @param Post $post
		 *
		 * @return bool
		 */
		public function savePost(Post $post);

		/**
		 * @param Post|int $post
		 * @param bool     $force
		 *
		 * @return bool
		 */
		public function deletePost($post, $force = false);

		/**
		 * @param int    $id
		 * @param string $context
		 *
		 * @return Category|null
		 */
		public function getCategory($id, $context = RequestContext::VIEW);

		/**
		 * @param CriteriaInterface|null $criteria
		 * @param string                 $context
		 *
		 * @return Category[]|Collection|Selectable
		 */
		public function getCategories(CriteriaInterface $criteria = null, $context = RequestContext::VIEW);

		/**
		 * @param Category $category
		 *
		 * @return bool
		 */
		public function saveCategory(Category $category);

		/**
		 * @param Category|int $category
		 *
		 * @return bool
		 */
		public function deleteCategory($category);
	}