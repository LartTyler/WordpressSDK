<?php
	namespace DaybreakStudios\WordpressSDK\Client\Criteria;

	use DaybreakStudios\WordpressSDK\Client\Criteria\Features\HideEmptyFilterInterface;
	use DaybreakStudios\WordpressSDK\Client\Criteria\Features\ParentFilterInterface;
	use DaybreakStudios\WordpressSDK\Client\Criteria\Features\PostFilterInterface;

	interface CategoryCriteriaInterface extends
		CriteriaInterface,
		ParentFilterInterface,
		PostFilterInterface,
		HideEmptyFilterInterface {
	}