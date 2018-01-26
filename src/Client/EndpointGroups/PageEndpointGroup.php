<?php
	namespace DaybreakStudios\WordpressSDK\Client\EndpointGroups;

	use DaybreakStudios\WordpressSDK\Client\AbstractEndpointGroup;
	use DaybreakStudios\WordpressSDK\Client\Criteria\PageCriteriaInterface;
	use DaybreakStudios\WordpressSDK\Client\RequestContext;
	use DaybreakStudios\WordpressSDK\Entity\PageInterface;

	class PageEndpointGroup extends AbstractEndpointGroup implements PageEndpointGroupInterface {
		/**
		 * {@inheritdoc}
		 */
		public function get($id, $context = RequestContext::VIEW) {
			return $this->getObject($this->toUri('/wp/v2/pages/' . $id, [
				'context' => $context,
			]));
		}

		/**
		 * {@inheritdoc}
		 */
		public function getAll(PageCriteriaInterface $criteria = null, $context = RequestContext::VIEW) {
			return $this->getObjects('/wp/v2/pages', $criteria, $context);
		}

		/**
		 * {@inheritdoc}
		 */
		public function save(PageInterface $page) {
			return $this->saveObject($page, $this->toUri('/wp/v2/pages/' . $page->getId()));
		}

		/**
		 * {@inheritdoc}
		 */
		public function delete($page, $force = false) {
			return $this->deleteObject($this->toUri('/wp/v2/pages/' . $this->toEntityId($page)), $force);
		}

		/**
		 * {@inheritdoc}
		 */
		protected function toEntityId($thing, $entityClass = null) {
			return parent::toEntityId($thing, $entityClass ?: PageInterface::class);
		}
	}