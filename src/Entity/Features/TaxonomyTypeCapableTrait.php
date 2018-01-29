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
		 * @return string
		 */
		public function getTaxonomyType() {
			return $this->get(TaxonomyTypeCapableInterface::FIELD_TAXONOMY_TYPE);
		}
	}