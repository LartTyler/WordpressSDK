<?php
	namespace DaybreakStudios\WordpressSDK\Entity;

	use DaybreakStudios\WordpressSDK\Entity\Features\ParentCapableTrait;

	class Category extends AbstractTaxonomyObject implements CategoryInterface {
		use ParentCapableTrait;

		/**
		 * Category constructor.
		 *
		 * @param array $fields
		 */
		public function __construct(array $fields = []) {
			parent::__construct($fields);
		}
	}