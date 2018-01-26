<?php
	namespace DaybreakStudios\WordpressSDK\Client\Criteria;

	use DaybreakStudios\WordpressSDK\Client\Criteria\Features\AbstractFilterTrait;

	class Criteria implements CriteriaInterface {
		use AbstractFilterTrait;

		/**
		 * @var array
		 */
		protected $filters;

		/**
		 * Criteria constructor.
		 *
		 * @param array $filters
		 */
		public function __construct(array $filters = []) {
			$this->filters = $filters + [
				'page' => 1,
				'per_page' => 10,
			];
		}

		/**
		 * {@inheritdoc}
		 */
		public function getContext() {
			return $this->get(static::FILTER_CONTEXT);
		}

		/**
		 * {@inheritdoc}
		 */
		public function setContext($context) {
			return $this->set(static::FILTER_CONTEXT, $context);
		}

		/**
		 * {@inheritdoc}
		 */
		public function getPage() {
			return $this->get(static::FILTER_PAGE, 1);
		}

		/**
		 * {@inheritdoc}
		 */
		public function setPage($page) {
			return $this->set(static::FILTER_PAGE, $page);
		}

		/**
		 * {@inheritdoc}
		 */
		public function getPageSize() {
			return $this->get(static::FILTER_PAGE_SIZE, 10);
		}

		/**
		 * {@inheritdoc}
		 */
		public function setPageSize($pageSize) {
			return $this->set(static::FILTER_PAGE_SIZE, $pageSize);
		}

		/**
		 * {@inheritdoc}
		 */
		public function getOffset() {
			return $this->get(static::FILTER_OFFSET);
		}

		/**
		 * {@inheritdoc}
		 */
		public function setOffset($offset) {
			return $this->set(static::FILTER_OFFSET, $offset);
		}

		/**
		 * {@inheritdoc}
		 */
		public function getSearchString() {
			return $this->get(static::FILTER_SEARCH_STRING);
		}

		/**
		 * {@inheritdoc}
		 */
		public function setSearchString($searchString) {
			return $this->set(static::FILTER_SEARCH_STRING, $searchString);
		}

		/**
		 * {@inheritdoc}
		 */
		public function getExcludedIds() {
			return $this->get(static::FILTER_EXCLUDED_IDS, []);
		}

		/**
		 * {@inheritdoc}
		 */
		public function setExcludedIds(array $excludedIds) {
			return $this->set(static::FILTER_EXCLUDED_IDS, $excludedIds);
		}

		/**
		 * {@inheritdoc}
		 */
		public function getIncludedIds() {
			return $this->get(static::FILTER_INCLUDED_IDS, []);
		}

		/**
		 * {@inheritdoc}
		 */
		public function setIncludedIds(array $includedIds) {
			return $this->set(static::FILTER_INCLUDED_IDS, $includedIds);
		}

		/**
		 * {@inheritdoc}
		 */
		public function getOrderDirection() {
			return $this->get(static::FILTER_ORDER_DIRECTION);
		}

		/**
		 * {@inheritdoc}
		 */
		public function setOrderDirection($direction) {
			return $this->set(static::FILTER_ORDER_DIRECTION, $direction);
		}

		/**
		 * {@inheritdoc}
		 */
		public function getOrderField() {
			return $this->get(static::FILTER_ORDER_FIELD);
		}

		/**
		 * {@inheritdoc}
		 */
		public function setOrderField($field) {
			return $this->set(static::FILTER_ORDER_FIELD, $field);
		}

		/**
		 * {@inheritdoc}
		 */
		public function getSlug() {
			return $this->get(static::FILTER_SLUG);
		}

		/**
		 * {@inheritdoc}
		 */
		public function setSlug(array $slug) {
			return $this->set(static::FILTER_SLUG, $slug);
		}

		/**
		 * {@inheritdoc}
		 */
		public function getFilters() {
			return $this->filters;
		}

		/**
		 * {@inheritdoc}
		 */
		protected function has($key) {
			return isset($this->filters[$key]);
		}

		/**
		 * {@inheritdoc}
		 */
		protected function get($key, $def = null) {
			if ($this->has($key))
				return $this->filters[$key];

			return $def;
		}

		/**
		 * {@inheritdoc}
		 */
		protected function set($key, $value) {
			if ($value === null || (is_array($value) && !$value))
				return $this->remove($key);

			$this->filters[$key] = $value;

			return $this;
		}

		/**
		 * {@inheritdoc}
		 */
		protected function remove($key) {
			unset($this->filters[$key]);

			return $this;
		}

		/**
		 * {@inheritdoc}
		 */
		public function import(CriteriaInterface $criteria) {
			$this->filters = $criteria->getFilters() + $this->getFilters();

			return $this;
		}

		/**
		 * {@inheritdoc}
		 */
		public static function from(CriteriaInterface $criteria) {
			return new static($criteria->getFilters());
		}
	}