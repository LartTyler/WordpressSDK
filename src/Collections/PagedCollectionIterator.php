<?php
	namespace DaybreakStudios\WordpressSDK\Collections;

	class PagedCollectionIterator implements \Iterator {
		/**
		 * @var PagedCollection
		 */
		protected $collection;

		/**
		 * @var int
		 */
		protected $postition = 0;

		/**
		 * PagedCollectionIterator constructor.
		 *
		 * @param PagedCollection $collection
		 */
		public function __construct(PagedCollection $collection) {
			$this->collection = $collection;
		}

		/**
		 * {@inheritdoc}
		 */
		public function current() {
			return $this->collection->get($this->postition);
		}

		/**
		 * {@inheritdoc}
		 */
		public function next() {
			++$this->postition;

			if ($this->postition >= $this->collection->count())
				$this->collection->fetchNextPage();
		}

		/**
		 * {@inheritdoc}
		 */
		public function key() {
			return $this->postition;
		}

		/**
		 * {@inheritdoc}
		 */
		public function valid() {
			return $this->collection->containsKey($this->postition);
		}

		/**
		 * {@inheritdoc}
		 */
		public function rewind() {
			$this->postition = 0;
		}
	}