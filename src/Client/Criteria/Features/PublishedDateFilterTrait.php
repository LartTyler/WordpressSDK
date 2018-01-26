<?php
	namespace DaybreakStudios\WordpressSDK\Client\Criteria\Features;

	/**
	 * For use with {@see PublishedAfterFilterInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Client\Criteria\Features
	 * @see     PublishedDateFilterInterface
	 */
	trait PublishedDateFilterTrait {
		use AbstractFilterTrait;

		/**
		 * @return \DateTime|null
		 */
		public function getPublishedAfterDate() {
			return $this->get(PublishedDateFilterInterface::FILTER_PUBLISHED_AFTER);
		}

		/**
		 * @param \DateTime|null $publishedAfter
		 *
		 * @return $this
		 */
		public function setPublishedAfterDate(\DateTime $publishedAfter = null) {
			return $this->set(PublishedDateFilterInterface::FILTER_PUBLISHED_AFTER, $publishedAfter);
		}

		/**
		 * @return \DateTime|null
		 */
		public function getPublishedBeforeDate() {
			return $this->get(PublishedDateFilterInterface::FILTER_PUBLISHED_BEFORE);
		}

		/**
		 * @param \DateTime|null $publishedBefore
		 *
		 * @return $this
		 */
		public function setPublishedBeforeDate(\DateTime $publishedBefore = null) {
			return $this->set(PublishedDateFilterInterface::FILTER_PUBLISHED_BEFORE, $publishedBefore);
		}

		/**
		 * @param array $filters
		 *
		 * @return array
		 */
		protected function normalizePublishedDateFilters(array $filters) {
			if ($after = $this->getPublishedAfterDate())
				$filters[PublishedDateFilterInterface::FILTER_PUBLISHED_AFTER] = $after->format(\DateTime::ISO8601);

			if ($before = $this->getPublishedBeforeDate())
				$filters[PublishedDateFilterInterface::FILTER_PUBLISHED_BEFORE] = $before->format(\DateTime::ISO8601);

			return $filters;
		}
	}