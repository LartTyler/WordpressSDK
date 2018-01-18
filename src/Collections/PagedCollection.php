<?php
	namespace DaybreakStudios\WordpressSDK\Collections;

	use Doctrine\Common\Collections\ArrayCollection;

	class PagedCollection extends ArrayCollection {
		/**
		 * @var PagingInfo
		 */
		protected $paging;

		/**
		 * LazyArrayCollection constructor.
		 *
		 * @param array      $initialElements
		 * @param PagingInfo $paging
		 */
		public function __construct(array $initialElements, PagingInfo $paging) {
			parent::__construct($initialElements);

			$this->paging = $paging;
		}

		/**
		 * @return PagingInfo
		 */
		protected function getPaging() {
			return $this->paging;
		}

		/**
		 * @return void
		 */
		public function fetchNextPage() {
			if ($this->paging->isAtEnd())
				return;

			$items = $this->paging->next();

			foreach ($items as $item)
				$this->add($item);
		}

		/**
		 * {@inheritdoc}
		 */
		public function getIterator() {
			return new PagedCollectionIterator($this);
		}
	}