<?php
	namespace DaybreakStudios\WordpressSDK\Client;

	use DaybreakStudios\WordpressSDK\Client\Criteria\CriteriaInterface;
	use DaybreakStudios\WordpressSDK\Entity\EntityInterface;
	use Doctrine\Common\Collections\Collection;
	use Doctrine\Common\Collections\Selectable;
	use Psr\Http\Message\UriInterface;

	/**
	 * For use with {@see AbstractEndpointGroup}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Client
	 * @see     AbstractEndpointGroup
	 */
	trait CrudEndpointsTrait {
		protected $baseEndpoint = null;

		// region Required Methods
		protected abstract function getObject(UriInterface $uri);

		protected abstract function getObjects($path, CriteriaInterface $criteria = null, $context = RequestContext::VIEW);

		protected abstract function saveObject(EntityInterface $entity, UriInterface $uri);

		protected abstract function deleteObject(UriInterface $uri, $force = false);

		protected abstract function toUri($path, array $queryParams = []);
		// endregion

		/**
		 * @param int    $id
		 * @param string $context
		 * @param array  $params
		 *
		 * @return EntityInterface|null
		 */
		private function doGet($id, $context = RequestContext::VIEW, array $params = []) {
			$params = [
				'context' => $context,
			] + $params;

			return $this->getObject($this->toUri($this->baseEndpoint . '/' . $id, $params));
		}

		/**
		 * @param CriteriaInterface|null $criteria
		 * @param string                 $context
		 *
		 * @return EntityInterface[]|Collection|Selectable
		 */
		private function doGetAll(CriteriaInterface $criteria = null, $context = RequestContext::VIEW) {
			return $this->getObjects($this->baseEndpoint, $criteria, $context);
		}

		/**
		 * @param EntityInterface $entity
		 *
		 * @return bool
		 */
		private function doSave(EntityInterface $entity) {
			return $this->saveObject($entity, $this->toUri($this->baseEndpoint . '/' . $entity->getId()));
		}

		/**
		 * @param EntityInterface|int $object
		 * @param bool                $force
		 *
		 * @return bool
		 */
		private function doDelete($object, $force = false) {
			if ($object instanceof EntityInterface)
				$object = $object->getId();

			return $this->deleteObject($this->toUri($this->baseEndpoint . '/' . $object), $force);
		}
	}