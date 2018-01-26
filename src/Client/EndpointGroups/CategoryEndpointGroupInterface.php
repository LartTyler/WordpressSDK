<?php
	namespace DaybreakStudios\WordpressSDK\Client\EndpointGroups;

	use DaybreakStudios\WordpressSDK\Client\Criteria\CategoryCriteriaInterface;
	use DaybreakStudios\WordpressSDK\Client\RequestContext;
	use DaybreakStudios\WordpressSDK\Entity\CategoryInterface;
	use Doctrine\Common\Collections\Collection;
	use Doctrine\Common\Collections\Selectable;

	interface CategoryEndpointGroupInterface {
		/**
		 * @param int    $id
		 * @param string $context
		 *
		 * @return CategoryInterface|null
		 */
		public function get($id, $context = RequestContext::VIEW);

		/**
		 * @param CategoryCriteriaInterface|null $criteria
		 * @param string                         $context
		 *
		 * @return CategoryInterface[]|Collection|Selectable
		 */
		public function getAll(CategoryCriteriaInterface $criteria = null, $context = RequestContext::VIEW);

		/**
		 * @param CategoryInterface $category
		 *
		 * @return bool
		 */
		public function save(CategoryInterface $category);

		/**
		 * @param CategoryInterface|int $category
		 * @param bool                  $force
		 *
		 * @return bool
		 */
		public function delete($category, $force = false);
	}