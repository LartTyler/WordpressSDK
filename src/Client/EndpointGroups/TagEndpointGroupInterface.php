<?php
	namespace DaybreakStudios\WordpressSDK\Client\EndpointGroups;

	use DaybreakStudios\WordpressSDK\Client\Criteria\TagCriteriaInterface;
	use DaybreakStudios\WordpressSDK\Client\EndpointGroupInterface;
	use DaybreakStudios\WordpressSDK\Client\RequestContext;
	use DaybreakStudios\WordpressSDK\Entity\Tag;
	use Doctrine\Common\Collections\Collection;
	use Doctrine\Common\Collections\Selectable;

	interface TagEndpointGroupInterface extends EndpointGroupInterface {
		/**
		 * @param int    $id
		 * @param string $context
		 *
		 * @return Tag|null
		 */
		public function get($id, $context = RequestContext::VIEW);

		/**
		 * @param TagCriteriaInterface|null $criteria
		 * @param string                    $context
		 *
		 * @return Tag[]|Collection|Selectable
		 */
		public function getAll(TagCriteriaInterface $criteria = null, $context = RequestContext::VIEW);

		/**
		 * @param Tag $tag
		 *
		 * @return bool
		 */
		public function save(Tag $tag);

		/**
		 * @param Tag|int $tag
		 * @param bool    $force
		 *
		 * @return bool
		 */
		public function delete($tag, $force = false);
	}