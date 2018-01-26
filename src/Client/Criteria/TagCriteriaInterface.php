<?php
	namespace DaybreakStudios\WordpressSDK\Client\Criteria;

	use DaybreakStudios\WordpressSDK\Client\Criteria\Features\HideEmptyFilterInterface;
	use DaybreakStudios\WordpressSDK\Client\Criteria\Features\PostFilterInterface;

	interface TagCriteriaInterface extends
		CriteriaInterface,
		HideEmptyFilterInterface,
		PostFilterInterface {
	}