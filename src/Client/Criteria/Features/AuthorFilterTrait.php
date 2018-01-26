<?php
	namespace DaybreakStudios\WordpressSDK\Client\Criteria\Features;

	use DaybreakStudios\WordpressSDK\Entity\EntityInterface;

	/**
	 * For use with {@see AuthorFilterInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Client\Criteria\Features
	 * @see     AuthorFilterInterface
	 */
	trait AuthorFilterTrait {
		use AbstractFilterTrait;

		/**
		 * @return int[]
		 */
		public function getIncludedAuthors() {
			return $this->get(AuthorFilterInterface::FILTER_INCLUDE_AUTHORS, []);
		}

		/**
		 * @param EntityInterface[]|int[]|null $includedAuthors
		 *
		 * @return $this
		 */
		public function setIncludedAuthors($includedAuthors) {
			return $this->set(AuthorFilterInterface::FILTER_INCLUDE_AUTHORS,
				$this->normalizeAuthorsArray($includedAuthors));
		}

		/**
		 * @return int[]
		 */
		public function getExcludedAuthors() {
			return $this->get(AuthorFilterInterface::FILTER_EXCLUDE_AUTHORS, []);
		}

		/**
		 * @param EntityInterface[]|int[]|null $excludedAuthors
		 *
		 * @return $this
		 */
		public function setExcludedAuthors($excludedAuthors) {
			return $this->set(AuthorFilterInterface::FILTER_EXCLUDE_AUTHORS,
				$this->normalizeAuthorsArray($excludedAuthors));
		}

		/**
		 * @param array|null $authors
		 *
		 * @return array|null
		 * @internal
		 */
		private function normalizeAuthorsArray($authors) {
			if (!$authors)
				return $authors;

			return array_map(function($item) {
				if ($item instanceof EntityInterface)
					$item = $item->getId();

				return $item;
			}, $authors);
		}
	}