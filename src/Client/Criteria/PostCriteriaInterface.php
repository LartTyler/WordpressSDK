<?php
	namespace DaybreakStudios\WordpressSDK\Client\Criteria;

	use DaybreakStudios\WordpressSDK\Client\Criteria\Features\AuthorFilterInterface;
	use DaybreakStudios\WordpressSDK\Client\Criteria\Features\CategoryFilterInterface;
	use DaybreakStudios\WordpressSDK\Client\Criteria\Features\PublishedDateFilterInterface;
	use DaybreakStudios\WordpressSDK\Client\Criteria\Features\StatusFilterInterface;
	use DaybreakStudios\WordpressSDK\Client\Criteria\Features\StickyFilterInterface;
	use DaybreakStudios\WordpressSDK\Client\Criteria\Features\TagFilterInterface;

	interface PostCriteriaInterface extends
		PublishedDateFilterInterface,
		AuthorFilterInterface,
		StatusFilterInterface,
		CategoryFilterInterface,
		TagFilterInterface,
		StickyFilterInterface {
	}