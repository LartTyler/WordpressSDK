<?php
	namespace DaybreakStudios\WordpressSDK\Collections;

	use DaybreakStudios\WordpressSDK\Entity\EntityInterface;

	class PagingInfo {
		/**
		 * @var \Closure
		 */
		protected $pager;

		/**
		 * @var array
		 */
		protected $params;

		/**
		 * @var int
		 */
		protected $page;

		/**
		 * @var int
		 */
		protected $pageSize;

		/**
		 * @var bool
		 */
		protected $atEnd = false;

		/**
		 * Pager constructor.
		 *
		 * @param \Closure $pager
		 * @param array    $params
		 * @param int      $page
		 * @param int      $pageSize
		 */
		public function __construct(\Closure $pager, array $params, $page = null, $pageSize = null) {
			$this->pager = $pager;
			$this->params = $params;

			$this->page = $page ?: @$params['page'] ?: 1;
			$this->pageSize = $pageSize ?: @$params['per_page'] ?: 10;
		}

		/**
		 * @return int
		 */
		public function getPage() {
			return $this->page;
		}

		/**
		 * @param int $page
		 *
		 * @return $this
		 */
		public function setPage($page) {
			$this->page = $page;

			return $this;
		}

		/**
		 * @return int
		 */
		public function getPageSize() {
			return $this->pageSize;
		}

		/**
		 * @param int $pageSize
		 *
		 * @return $this
		 */
		public function setPageSize($pageSize) {
			$this->pageSize = $pageSize;

			return $this;
		}

		/**
		 * @return \Closure
		 */
		protected function getPager() {
			return $this->pager;
		}

		/**
		 * @return bool
		 */
		public function isAtEnd() {
			return $this->atEnd;
		}

		/**
		 * @return array
		 */
		public function next() {
			if ($this->isAtEnd())
				return [];

			$params = [
				'page' => ++$this->page,
				'per_page' => $this->pageSize,
			] + $this->params;

			/** @var EntityInterface[] $array */
			$array = call_user_func($this->getPager(), $params);

			if (sizeof($array) !== $this->pageSize)
				$this->atEnd = true;

			return $array;
		}
	}