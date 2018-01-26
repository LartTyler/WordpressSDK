<?php
	namespace DaybreakStudios\WordpressSDK\Client\Criteria;

	use DaybreakStudios\WordpressSDK\Client\Criteria\Features\MenuOrderFilterTrait;
	use DaybreakStudios\WordpressSDK\Client\Criteria\Features\MultiParentFilterTrait;

	class PageCriteria extends PostCriteria implements PageCriteriaInterface {
		use MenuOrderFilterTrait;
		use MultiParentFilterTrait;
	}