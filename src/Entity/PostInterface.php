<?php
	namespace DaybreakStudios\WordpressSDK\Entity;

	use DaybreakStudios\WordpressSDK\Entity\Features\CategoryCapableInterface;
	use DaybreakStudios\WordpressSDK\Entity\Features\FormatCapableInterface;
	use DaybreakStudios\WordpressSDK\Entity\Features\StickyCapableInterface;
	use DaybreakStudios\WordpressSDK\Entity\Features\TagCapableInterface;

	interface PostInterface extends
		CommonPostObjectInterface,
		FormatCapableInterface,
		StickyCapableInterface,
		CategoryCapableInterface,
		TagCapableInterface {
	}