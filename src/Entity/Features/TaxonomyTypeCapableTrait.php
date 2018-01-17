<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	use DaybreakStudios\WordpressSDK\Entity\EntityTrait;

	/**
	 * For use with {@see TaxonomyTypeCapableInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Entity\Features
	 * @see     TaxonomyTypeCapableInterface
	 */
	trait TaxonomyTypeCapableTrait {
		use EntityTrait;

		/**
		 * {@inheritdoc}
		 */
		public function getTaxonomyType() {
			return $this->get(TaxonomyTypeCapableInterface::FIELD_TAXONOMY_TYPE);
		}
	}