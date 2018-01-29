<?php

	namespace DaybreakStudios\WordpressSDK\Entity;

	interface EntityInterface {
		const FIELD_ID = 'id';

		/**
		 * @return int|null
		 */
		public function getId();

		/**
		 * @return array
		 */
		public function getChangeSet();

		/**
		 * @param array $changes
		 *
		 * @return void
		 * @internal
		 */
		public function onChangesPersisted(array $changes);
	}