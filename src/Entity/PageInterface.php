<?php
	namespace DaybreakStudios\WordpressSDK\Entity;

	use DaybreakStudios\WordpressSDK\Entity\Features\ParentCapableInterface;
	use DaybreakStudios\WordpressSDK\Entity\Features\MenuOrderCapableInterface;

	interface PageInterface extends CommonPostObjectInterface, ParentCapableInterface, MenuOrderCapableInterface {
	}