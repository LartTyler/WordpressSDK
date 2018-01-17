<?php
	namespace DaybreakStudios\WordpressSDK\Entity;

	use DaybreakStudios\WordpressSDK\Entity\Features\CountCapableInterface;
	use DaybreakStudios\WordpressSDK\Entity\Features\CountCapableTrait;
	use DaybreakStudios\WordpressSDK\Entity\Features\DescriptionCapableInterface;
	use DaybreakStudios\WordpressSDK\Entity\Features\DescriptionCapableTrait;
	use DaybreakStudios\WordpressSDK\Entity\Features\LinkCapableInterface;
	use DaybreakStudios\WordpressSDK\Entity\Features\LinkCapableTrait;
	use DaybreakStudios\WordpressSDK\Entity\Features\NameCapableInterface;
	use DaybreakStudios\WordpressSDK\Entity\Features\NameCapableTrait;
	use DaybreakStudios\WordpressSDK\Entity\Features\SlugCapableInterface;
	use DaybreakStudios\WordpressSDK\Entity\Features\SlugCapableTrait;
	use DaybreakStudios\WordpressSDK\Entity\Features\TaxonomyTypeCapableInterface;
	use DaybreakStudios\WordpressSDK\Entity\Features\TaxonomyTypeCapableTrait;

	abstract class AbstractTaxonomyObject extends AbstractEntity implements
		CountCapableInterface,
		DescriptionCapableInterface,
		LinkCapableInterface,
		NameCapableInterface,
		SlugCapableInterface,
		TaxonomyTypeCapableInterface
	{
		use CountCapableTrait;
		use DescriptionCapableTrait;
		use LinkCapableTrait;
		use NameCapableTrait;
		use SlugCapableTrait;
		use TaxonomyTypeCapableTrait;

		public function __construct(array $fields = [], array $fieldMap = [], array $types = []) {
			parent::__construct($fields, $fieldMap + [
				'taxonomy' => static::FIELD_TAXONOMY_TYPE,
			], $types);
		}
	}