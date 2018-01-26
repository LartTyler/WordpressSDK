<?php
	namespace DaybreakStudios\WordpressSDK\Client\Criteria;

	use DaybreakStudios\WordpressSDK\Client\Criteria\Features\HideEmptyFilterTrait;
	use DaybreakStudios\WordpressSDK\Client\Criteria\Features\PostFilterTrait;

	class TagCriteria extends Criteria implements TagCriteriaInterface {
		use HideEmptyFilterTrait;
		use PostFilterTrait;
	}