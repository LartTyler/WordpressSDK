<?php
	namespace DaybreakStudios\WordpressSDK\Client\EndpointGroups;

	use DaybreakStudios\WordpressSDK\Client\AbstractEndpointGroup;
	use DaybreakStudios\WordpressSDK\Client\Criteria\CategoryCriteriaInterface;
	use DaybreakStudios\WordpressSDK\Client\RequestContext;
	use DaybreakStudios\WordpressSDK\Entity\CategoryInterface;

	class CategoryEndpointGroup extends AbstractEndpointGroup implements CategoryEndpointGroupInterface {
		/**
		 * {@inheritdoc}
		 */
		public function get($id, $context = RequestContext::VIEW) {
			return $this->getObject($this->toUri('/wp/v2/categories/' . $id, [
				'context' => $context,
			]));
		}

		/**
		 * {@inheritdoc}
		 */
		public function getAll(CategoryCriteriaInterface $criteria = null, $context = RequestContext::VIEW) {
			return $this->getObjects('/wp/v2/categories', $criteria, $context);
		}

		/**
		 * {@inheritdoc}
		 */
		public function save(CategoryInterface $category) {
			return $this->saveObject('/wp/v2/categories', $category);
		}

		/**
		 * {@inheritdoc}
		 */
		public function delete($category, $force = false) {
			if ($category instanceof CategoryInterface)
				$category = $category->getId();

			return $this->deleteObject($this->toUri('/wp/v2/categories/' . $this->toEntityId($category)), $force);
		}

		/**
		 * {@inheritdoc}
		 */
		protected function toEntityId($thing, $entityClass = null) {
			return parent::toEntityId($thing, $entityClass ?: CategoryInterface::class);
		}
	}