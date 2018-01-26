<?php
	namespace DaybreakStudios\WordpressSDK\Client\Criteria;

	use DaybreakStudios\WordpressSDK\Client\Criteria\Features\AuthorFilterTrait;
	use DaybreakStudios\WordpressSDK\Client\Criteria\Features\CategoryFilterTrait;
	use DaybreakStudios\WordpressSDK\Client\Criteria\Features\PublishedDateFilterTrait;
	use DaybreakStudios\WordpressSDK\Client\Criteria\Features\StatusFilterTrait;
	use DaybreakStudios\WordpressSDK\Client\Criteria\Features\StickyFilterTrait;
	use DaybreakStudios\WordpressSDK\Client\Criteria\Features\TagFilterTrait;

	class PostCriteria extends Criteria implements PostCriteriaInterface {
		use PublishedDateFilterTrait;
		use AuthorFilterTrait;
		use StatusFilterTrait;
		use CategoryFilterTrait;
		use TagFilterTrait;
		use StickyFilterTrait;

		/**
		 * {@inheritdoc}
		 */
		public function getFilters() {
			return $this->normalizePublishedDateFilters(parent::getFilters());
		}
	}