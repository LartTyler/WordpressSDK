<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	interface ParentCapableInterface {
		/**
		 * The ID of the parent of the object
		 */
		const FIELD_PARENT = 'parent';

		/**
		 * @return int|null
		 */
		public function getParent();

		/**
		 * @param int|null $parent
		 *
		 * @return $this
		 */
		public function setParent($parent);
	}