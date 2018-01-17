<?php

	namespace DaybreakStudios\WordpressSDK\Entity;

	trait EntityTrait {
		protected $fields = [];

		/**
		 * {@inheritdoc}
		 */
		public function getId() {
			return $this->get(EntityInterface::FIELD_ID);
		}

		/**
		 * Returns true if a field exists with the given name and is not null, false otherwise.
		 *
		 * @param string $field The field name to check for
		 *
		 * @return bool
		 */
		protected function has($field) {
			return isset($this->fields[$field]);
		}

		/**
		 * Returns the value of the given field, or the value of $def if the field key does not exist or is null.
		 *
		 * @param string $field The field name to retrieve
		 * @param mixed  $def   The value to return if the field key does not exist or is null
		 *
		 * @return mixed
		 */
		protected function get($field, $def = null) {
			if ($this->has($field))
				return $this->fields[$field];

			return $def;
		}

		/**
		 * Updates the value of the given field.
		 *
		 * @param string $field The field key to update
		 * @param mixed  $value The new value for the key
		 *
		 * @return $this
		 */
		protected function set($field, $value) {
			$this->fields[$field] = $value;

			return $this;
		}

		/**
		 * Removes a field, and returns it's previous value.
		 *
		 * @param string $field The field key to remove
		 *
		 * @return bool|mixed The previous value, or false if the key did not exist
		 */
		protected function remove($field) {
			if (!$this->has($field))
				return false;

			$value = $this->get($field);

			unset($this->fields[$field]);

			return $value;
		}
	}