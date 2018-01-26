<?php
	namespace DaybreakStudios\WordpressSDK\Entity;

	use DaybreakStudios\WordpressSDK\Entity\Features\CountCapableInterface;
	use DaybreakStudios\WordpressSDK\Entity\Features\DescriptionCapableInterface;
	use DaybreakStudios\WordpressSDK\Entity\Features\LinkCapableInterface;
	use DaybreakStudios\WordpressSDK\Entity\Features\NameCapableInterface;
	use DaybreakStudios\WordpressSDK\Entity\Features\SlugCapableInterface;
	use DaybreakStudios\WordpressSDK\Entity\Features\TaxonomyTypeCapableInterface;

	interface TaxonomyObjectInterface extends
		EntityInterface,
		CountCapableInterface,
		DescriptionCapableInterface,
		LinkCapableInterface,
		NameCapableInterface,
		SlugCapableInterface,
		TaxonomyTypeCapableInterface {
	}