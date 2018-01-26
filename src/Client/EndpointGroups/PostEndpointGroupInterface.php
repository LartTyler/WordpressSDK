<?php
	namespace DaybreakStudios\WordpressSDK\Client\EndpointGroups;

	use DaybreakStudios\WordpressSDK\Client\Criteria\PostCriteriaInterface;
	use DaybreakStudios\WordpressSDK\Client\RequestContext;
	use DaybreakStudios\WordpressSDK\Entity\PostInterface;
	use Doctrine\Common\Collections\Collection;
	use Doctrine\Common\Collections\Selectable;

	interface PostEndpointGroupInterface {
		/**
		 * @param int    $id
		 * @param string $password
		 * @param string $context
		 *
		 * @return PostInterface|null
		 */
		public function get($id, $password = null, $context = RequestContext::VIEW);

		/**
		 * @param PostCriteriaInterface|null $criteria
		 * @param string                     $context
		 *
		 * @return PostInterface[]|Collection|Selectable
		 */
		public function getAll(PostCriteriaInterface $criteria = null, $context = RequestContext::VIEW);

		/**
		 * @param PostInterface $post
		 *
		 * @return bool
		 */
		public function save(PostInterface $post);

		/**
		 * @param PostInterface|int $post
		 * @param bool              $force
		 *
		 * @return bool
		 */
		public function delete($post, $force = false);
	}