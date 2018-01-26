<?php
	namespace DaybreakStudios\WordpressSDK\Entity;

	use DaybreakStudios\WordpressSDK\Entity\Features\MenuOrderCapableTrait;
	use DaybreakStudios\WordpressSDK\Entity\Features\ParentCapableTrait;

	class Page extends AbstractPostObject implements PageInterface {
		use ParentCapableTrait;
		use MenuOrderCapableTrait;

		/**
		 * Page constructor.
		 *
		 * @param array $fields
		 */
		public function __construct(array $fields) {
			parent::__construct($fields);
		}
	}