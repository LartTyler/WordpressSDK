<?php
	namespace DaybreakStudios\WordpressSDK\Client\EndpointGroups;

	use DaybreakStudios\WordpressSDK\Client\Criteria\PageCriteriaInterface;
	use DaybreakStudios\WordpressSDK\Client\EndpointGroupInterface;
	use DaybreakStudios\WordpressSDK\Client\RequestContext;
	use DaybreakStudios\WordpressSDK\Entity\PageInterface;
	use Doctrine\Common\Collections\Collection;
	use Doctrine\Common\Collections\Selectable;

	interface PageEndpointGroupInterface extends EndpointGroupInterface {
		/**
		 * @param int    $id
		 * @param string $context
		 *
		 * @return PageInterface|null
		 */
		public function get($id, $context = RequestContext::VIEW);

		/**
		 * @param PageCriteriaInterface|null $criteria
		 * @param string                     $context
		 *
		 * @return PageInterface[]|Collection|Selectable
		 */
		public function getAll(PageCriteriaInterface $criteria = null, $context = RequestContext::VIEW);

		/**
		 * @param PageInterface $page
		 *
		 * @return bool
		 */
		public function save(PageInterface $page);

		/**
		 * @param PageInterface|int $page
		 * @param bool              $force
		 *
		 * @return bool
		 */
		public function delete($page, $force = false);
	}