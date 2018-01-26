<?php
	namespace DaybreakStudios\WordpressSDK\Collections;

	use Closure;
	use Doctrine\Common\Collections\ArrayCollection;
	use Doctrine\Common\Collections\Criteria;

	class PagedCollection extends ArrayCollection {
		/**
		 * @var PagingInfo
		 */
		protected $paging;

		protected $hasHead = false;

		/**
		 * LazyArrayCollection constructor.
		 *
		 * @param array      $initialElements
		 * @param PagingInfo $paging
		 */
		public function __construct(array $initialElements, PagingInfo $paging) {
			parent::__construct($initialElements);

			$this->paging = $paging;
			$this->hasHead = $paging->getPage() === 1;
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
			if ($this->getPaging()->isAtEnd())
				return;

			$items = $this->getPaging()->next();

			foreach ($items as $item)
				$this->add($item);
		}

		/**
		 * {@inheritdoc}
		 */
		public function getIterator() {
			return new PagedCollectionIterator($this);
		}

		/**
		 * {@inheritdoc}
		 */
		public function count() {
			$this->fetchAllData();

			return parent::count();
		}

		/**
		 * {@inheritdoc}
		 */
		public function last() {
			$this->fetchAllData();

			return parent::last();
		}

		/**
		 * {@inheritdoc}
		 */
		public function first() {
			if (!$this->hasHead)
				$this->fetchAllData();

			return parent::first();
		}

		/**
		 * {@inheritdoc}
		 */
		public function map(Closure $func) {
			$this->fetchAllData();

			return parent::map($func);
		}

		/**
		 * {@inheritdoc}
		 */
		public function filter(Closure $p) {
			$this->fetchAllData();

			return parent::filter($p);
		}

		/**
		 * {@inheritdoc}
		 */
		public function matching(Criteria $criteria) {
			$this->fetchAllData();

			return parent::matching($criteria);
		}

		/**
		 * @return void
		 */
		protected function fetchAllData() {
			if ($this->getPaging()->isAtEnd())
				return;

			$this->doFetchAllData();
		}

		/**
		 * @return void
		 */
		protected function doFetchAllData() {
			$this->clear();

			$this->getPaging()
				->setPage(0)
				->setPageSize(100);

			while (!$this->getPaging()->isAtEnd())
				$this->fetchNextPage();

			$this->hasHead = true;
		}
	}