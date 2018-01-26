<?php
	namespace DaybreakStudios\WordpressSDK\Client\Criteria\Features;

	use DaybreakStudios\WordpressSDK\Entity\EntityInterface;

	interface AuthorFilterInterface {
		/**
		 * Limit result set to posts assigned to specific authors
		 */
		const FILTER_INCLUDE_AUTHORS = 'author';

		/**
		 * Ensure result set excludes posts assigned to specific authors
		 */
		const FILTER_EXCLUDE_AUTHORS = 'author_exclude';

		/**
		 * @return int[]
		 */
		public function getIncludedAuthors();

		/**
		 * @param EntityInterface[]|int[]|null $includedAuthors
		 *
		 * @return $this
		 *
		 */
		public function setIncludedAuthors(array $includedAuthors);

		/**
		 * @return int[]
		 */
		public function getExcludedAuthors();

		/**
		 * @param EntityInterface[]|int[]|null $excludedAuthors
		 *
		 * @return $this
		 */
		public function setExcludedAuthors(array $excludedAuthors);
	}