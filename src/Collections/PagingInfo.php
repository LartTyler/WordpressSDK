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
			] + $this->params;

			/** @var EntityInterface[] $array */
			$array = $this->getPager()->call($this, $params);

			if (sizeof($array) !== $this->pageSize)
				$this->atEnd = true;

			return $array;
		}
	}