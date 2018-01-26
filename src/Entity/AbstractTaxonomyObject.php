<?php
	namespace DaybreakStudios\WordpressSDK\Entity;

	use DaybreakStudios\WordpressSDK\Entity\Features\CountCapableTrait;
	use DaybreakStudios\WordpressSDK\Entity\Features\DescriptionCapableTrait;
	use DaybreakStudios\WordpressSDK\Entity\Features\LinkCapableTrait;
	use DaybreakStudios\WordpressSDK\Entity\Features\NameCapableTrait;
	use DaybreakStudios\WordpressSDK\Entity\Features\SlugCapableTrait;
	use DaybreakStudios\WordpressSDK\Entity\Features\TaxonomyTypeCapableTrait;

	abstract class AbstractTaxonomyObject extends AbstractEntity implements TaxonomyObjectInterface {
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