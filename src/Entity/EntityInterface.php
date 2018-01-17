<?php

	namespace DaybreakStudios\WordpressSDK\Entity;

	interface EntityInterface {
		const FIELD_ID = 'id';

		/**
		 * @return int|null
		 */
		public function getId();
	}