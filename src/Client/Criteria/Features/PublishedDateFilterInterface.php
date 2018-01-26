<?php
	namespace DaybreakStudios\WordpressSDK\Client\Criteria\Features;

	interface PublishedDateFilterInterface {
		/**
		 * Limit response to posts published after a given ISO8601 compliant date
		 */
		const FILTER_PUBLISHED_AFTER = 'after';

		/**
		 * Limit response to posts published before a given ISO8601 compliant date
		 */
		const FILTER_PUBLISHED_BEFORE = 'before';

		/**
		 * @return \DateTime|null
		 */
		public function getPublishedAfterDate();

		/**
		 * @param \DateTime|null $publishedAfter
		 *
		 * @return $this
		 */
		public function setPublishedAfterDate(\DateTime $publishedAfter = null);

		/**
		 * @return \DateTime|null
		 */
		public function getPublishedBeforeDate();

		/**
		 * @param \DateTime|null $publishedBefore
		 *
		 * @return $this
		 */
		public function setPublishedBeforeDate(\DateTime $publishedBefore = null);
	}