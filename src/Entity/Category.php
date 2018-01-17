<?php
	namespace DaybreakStudios\WordpressSDK\Entity;

	use DaybreakStudios\WordpressSDK\Entity\Features\ParentCapableInterface;
	use DaybreakStudios\WordpressSDK\Entity\Features\ParentCapableTrait;

	class Category extends AbstractTaxonomyObject implements ParentCapableInterface {
		use ParentCapableTrait;
	}