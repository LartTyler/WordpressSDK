<?php
	namespace DaybreakStudios\WordpressSDK\Entity;

	use DaybreakStudios\WordpressSDK\Entity\Features\CategoryCapableTrait;
	use DaybreakStudios\WordpressSDK\Entity\Features\FormatCapableTrait;
	use DaybreakStudios\WordpressSDK\Entity\Features\StickyCapableTrait;
	use DaybreakStudios\WordpressSDK\Entity\Features\TagCapableTrait;

	class Post extends AbstractPostObject implements PostInterface {
		use FormatCapableTrait;
		use StickyCapableTrait;
		use CategoryCapableTrait;
		use TagCapableTrait;

		/**
		 * Post constructor.
		 *
		 * @param array $fields
		 */
		public function __construct(array $fields = []) {
			parent::__construct($fields);
		}
	}