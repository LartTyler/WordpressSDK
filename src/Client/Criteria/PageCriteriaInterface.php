<?php
	namespace DaybreakStudios\WordpressSDK\Client\Criteria;

	use DaybreakStudios\WordpressSDK\Client\Criteria\Features\MenuOrderFilterInterface;
	use DaybreakStudios\WordpressSDK\Client\Criteria\Features\MultiParentFilterInterface;

	interface PageCriteriaInterface extends
		PostCriteriaInterface,
		MenuOrderFilterInterface,
		MultiParentFilterInterface {
	}