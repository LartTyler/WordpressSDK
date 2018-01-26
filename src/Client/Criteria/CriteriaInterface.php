<?php
	namespace DaybreakStudios\WordpressSDK\Client\Criteria;

	interface CriteriaInterface {
		/**
		 * Scope under which the request is made; determines fields present in response
		 */
		const FILTER_CONTEXT = 'context';

		/**
		 * Current page of the collection
		 */
		const FILTER_PAGE = 'page';

		/**
		 * Maximum number of items to be returned in result set
		 */
		const FILTER_PAGE_SIZE = 'per_page';

		/**
		 * Limit results to those matching a string
		 */
		const FILTER_SEARCH_STRING = 'search';

		/**
		 * Ensure result set excludes specific IDs
		 */
		const FILTER_EXCLUDED_IDS = 'exclude';

		/**
		 * Limit result set to specific IDs
		 */
		const FILTER_INCLUDED_IDS = 'include';

		/**
		 * Offset the result set by a specific number of items
		 */
		const FILTER_OFFSET = 'offset';

		/**
		 * Order sort attribute ascending or descending
		 */
		const FILTER_ORDER_DIRECTION = 'order';

		/**
		 * Sort collection by object attribute
		 */
		const FILTER_ORDER_FIELD = 'orderby';

		/**
		 * Limit result set to posts with one or more specific slugs
		 */
		const FILTER_SLUG = 'slug';

		/**
		 * Order collection ascending
		 */
		const SORT_ASCENDING = 'asc';

		/**
		 * Order collection descending
		 */
		const SORT_DESCENDING = 'desc';

		/**
		 * @return string
		 */
		public function getContext();

		/**
		 * @param string $context
		 *
		 * @return $this
		 * @see RequestContext
		 */
		public function setContext($context);

		/**
		 * @return int
		 */
		public function getPage();

		/**
		 * @param int $page
		 *
		 * @return $this
		 */
		public function setPage($page);

		/**
		 * @return int
		 */
		public function getPageSize();

		/**
		 * @param int $pageSize
		 *
		 * @return $this
		 */
		public function setPageSize($pageSize);

		/**
		 * @return int|null
		 */
		public function getOffset();

		/**
		 * @param int|null $offset
		 *
		 * @return $this
		 */
		public function setOffset($offset);

		/**
		 * @return string|null
		 */
		public function getSearchString();

		/**
		 * @param string|null $searchString
		 *
		 * @return $this
		 */
		public function setSearchString($searchString);

		/**
		 * @return int[]
		 */
		public function getExcludedIds();

		/**
		 * @param array $excludedIds
		 *
		 * @return $this
		 */
		public function setExcludedIds(array $excludedIds);

		/**
		 * @return int[]
		 */
		public function getIncludedIds();

		/**
		 * @param int[] $includedIds
		 *
		 * @return $this
		 */
		public function setIncludedIds(array $includedIds);

		/**
		 * @return string
		 */
		public function getOrderDirection();

		/**
		 * @param string $direction
		 *
		 * @return $this
		 */
		public function setOrderDirection($direction);

		/**
		 * @return string|null
		 */
		public function getOrderField();

		/**
		 * @param string|null $field
		 *
		 * @return $this
		 */
		public function setOrderField($field);

		/**
		 * @return string[]
		 */
		public function getSlug();

		/**
		 * @param string[] $slug
		 *
		 * @return $this
		 */
		public function setSlug(array $slug);

		/**
		 * @return array
		 */
		public function getFilters();

		/**
		 * Imports values from another Criteria object into this one.
		 *
		 * @param CriteriaInterface $criteria
		 *
		 * @return $this
		 */
		public function import(CriteriaInterface $criteria);

		/**
		 * Creates a new Criteria object using the values present in an existing Criteria object.
		 *
		 * @param CriteriaInterface $criteria
		 *
		 * @return static
		 */
		public static function from(CriteriaInterface $criteria);
	}