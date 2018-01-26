<?php
	namespace DaybreakStudios\WordpressSDK\Entity;

	use DaybreakStudios\WordpressSDK\Entity\Features\ParentCapableInterface;

	interface CategoryInterface extends TaxonomyObjectInterface, ParentCapableInterface {
	}