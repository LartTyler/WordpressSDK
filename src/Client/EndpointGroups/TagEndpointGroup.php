<?php
	namespace DaybreakStudios\WordpressSDK\Client\EndpointGroups;

	use DaybreakStudios\WordpressSDK\Client\AbstractEndpointGroup;
	use DaybreakStudios\WordpressSDK\Client\Criteria\TagCriteriaInterface;
	use DaybreakStudios\WordpressSDK\Client\RequestContext;
	use DaybreakStudios\WordpressSDK\Entity\Tag;
	use DaybreakStudios\WordpressSDK\Entity\TagInterface;

	class TagEndpointGroup extends AbstractEndpointGroup implements TagEndpointGroupInterface {
		/**
		 * {@inheritdoc}
		 */
		public function get($id, $context = RequestContext::VIEW) {
			return $this->getObject($this->toUri('/wp/v2/tags/' . $id, [
				'context' => $context,
			]));
		}

		/**
		 * {@inheritdoc}
		 */
		public function getAll(TagCriteriaInterface $criteria = null, $context = RequestContext::VIEW) {
			return $this->getObjects('/wp/v2/tags', $criteria, $context);
		}

		/**
		 * {@inheritdoc}
		 */
		public function save(Tag $tag) {
			return $this->saveObject($tag, $this->toUri('/wp/v2/tags/' . $tag->getId()));
		}

		/**
		 * {@inheritdoc}
		 */
		public function delete($tag, $force = false) {
			return $this->deleteObject($this->toUri('/wp/v2/tags/' . $this->toEntityId($tag)), $force);
		}

		/**
		 * {@inheritdoc}
		 */
		protected function toEntityId($thing, $entityClass = null) {
			return parent::toEntityId($thing, $entityClass ?: TagInterface::class);
		}
	}