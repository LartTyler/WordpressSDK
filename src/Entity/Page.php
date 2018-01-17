<?php
	namespace DaybreakStudios\WordpressSDK\Entity;

	use DaybreakStudios\WordpressSDK\Entity\Features\MenuOrderCapableInterface;
	use DaybreakStudios\WordpressSDK\Entity\Features\MenuOrderCapableTrait;
	use DaybreakStudios\WordpressSDK\Entity\Features\ParentCapableInterface;
	use DaybreakStudios\WordpressSDK\Entity\Features\ParentCapableTrait;

	class Page extends AbstractPostObject implements ParentCapableInterface, MenuOrderCapableInterface {
		use ParentCapableTrait;
		use MenuOrderCapableTrait;
	}