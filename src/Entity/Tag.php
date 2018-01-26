<?php
	namespace DaybreakStudios\WordpressSDK\Entity;

	class Tag extends AbstractTaxonomyObject implements TagInterface {
		/**
		 * Tag constructor.
		 *
		 * @param array $fields
		 */
		public function __construct(array $fields = []) {
			parent::__construct($fields);
		}
	}