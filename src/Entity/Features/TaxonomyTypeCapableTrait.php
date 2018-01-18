<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	/**
	 * For use with {@see TaxonomyTypeCapableInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Entity\Features
	 * @see     TaxonomyTypeCapableInterface
	 */
	trait TaxonomyTypeCapableTrait {
		/**
		 * {@inheritdoc}
		 */
		public function getTaxonomyType() {
			return $this->get(TaxonomyTypeCapableInterface::FIELD_TAXONOMY_TYPE);
		}
	}