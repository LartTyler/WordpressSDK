<?php
	namespace DaybreakStudios\WordpressSDK\Client\Criteria;

	use DaybreakStudios\WordpressSDK\Client\Criteria\Features\HideEmptyFilterTrait;
	use DaybreakStudios\WordpressSDK\Client\Criteria\Features\ParentFilterTrait;
	use DaybreakStudios\WordpressSDK\Client\Criteria\Features\PostFilterTrait;

	class CategoryCriteria extends Criteria implements CategoryCriteriaInterface {
		use ParentFilterTrait;
		use PostFilterTrait;
		use HideEmptyFilterTrait;
	}