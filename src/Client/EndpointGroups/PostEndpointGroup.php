<?php
	namespace DaybreakStudios\WordpressSDK\Client\EndpointGroups;

	use DaybreakStudios\WordpressSDK\Client\AbstractEndpointGroup;
	use DaybreakStudios\WordpressSDK\Client\Criteria\PostCriteriaInterface;
	use DaybreakStudios\WordpressSDK\Client\RequestContext;
	use DaybreakStudios\WordpressSDK\Entity\PostInterface;

	class PostEndpointGroup extends AbstractEndpointGroup implements PostEndpointGroupInterface {
		/**
		 * {@inheritdoc}
		 */
		public function get($id, $password = null, $context = RequestContext::VIEW) {
			return $this->getObject($this->toUri('/wp/v2/posts/' . $id));
		}

		/**
		 * {@inheritdoc}
		 */
		public function getAll(PostCriteriaInterface $criteria = null, $context = RequestContext::VIEW) {
			return $this->getObjects('/wp/v2/posts', $criteria, $context);
		}

		/**
		 * {@inheritdoc}
		 */
		public function save(PostInterface $post) {
			return $this->saveObject($post, $this->toUri('/wp/v2/posts/' . $post->getId()));
		}

		/**
		 * {@inheritdoc}
		 */
		public function delete($post, $force = false) {
			return $this->deleteObject($this->toUri('/wp/v2/posts/' . $this->toEntityId($post)), $force);
		}

		/**
		 * {@inheritdoc}
		 */
		protected function toEntityId($thing, $entityClass = null) {
			return parent::toEntityId($thing, $entityClass ?: PostInterface::class);
		}
	}