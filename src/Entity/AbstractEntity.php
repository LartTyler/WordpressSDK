<?php
	namespace DaybreakStudios\WordpressSDK\Entity;

	use DaybreakStudios\WordpressSDK\Mapping\Types\Types;
	use DaybreakStudios\WordpressSDK\Utility\StringUtil;

	abstract class AbstractEntity implements EntityInterface, \JsonSerializable {
		use EntityTrait;

		/**
		 * @var array
		 */
		protected $originalData;

		/**
		 * @var string[]
		 */
		protected $fieldTypes = [];

		/**
		 * Contains a mapping of local field names to their API counterparts in the
		 * form `localFieldName => apiFieldName`
		 *
		 * @var array
		 */
		protected $fieldMap = [];

		/**
		 * AbstractEntity constructor.
		 *
		 * @param array $fields
		 * @param array $fieldMap
		 * @param array $types
		 */
		public function __construct(array $fields = [], array $fieldMap = [], array $types = []) {
			$this->fieldMap = array_flip($fieldMap);
			$this->fieldTypes = $types;

			foreach ($fields as $field => $value) {
				$field = StringUtil::camelize($field);
				$field = isset($fieldMap[$field]) ? $fieldMap[$field] : $field;

				if (isset($types[$field]) && $type = $types[$field])
					$value = Types::getType($type)->convertToPHPValue($value);

				$this->set($field, $value);
			}

			$this->originalData = $this->fields;
		}

		/**
		 * {@inheritdoc}
		 */
		public function getChangeSet() {
			if ($this->originalData === $this->fields)
				return [];

			$output = [];

			foreach ($this->fields as $field => $value) {
				// If the key wasn't in the original data, we know we have to persist it
				if (!array_key_exists($field, $this->originalData))
					$output[$field] = $value;
				// If the value has changed since the object was built, it needs to be persisted
				else if ($this->originalData[$field] !== $value)
					$output[$field] = $value;
			}

			return $this->convertToApiFields($output);
		}

		/**
		 * {@inheritdoc}
		 */
		public function onChangesPersisted(array $changes) {
			foreach ($changes as $key => $value) {
				if (isset($this->fields[$key]) && $this->fields[$key] === $value)
					continue;

				$this->fields[$key] = $value;
			}

			$this->originalData = $this->fields;
		}

		/**
		 * {@inheritdoc}
		 */
		public function jsonSerialize() {
			return $this->convertToApiFields($this->fields);
		}

		/**
		 * @param array $data
		 *
		 * @return array
		 */
		protected function convertToApiFields(array $data) {
			$output = [];

			foreach ($data as $localField => $value) {
				if (isset($this->fieldTypes[$localField]) && $type = $this->fieldTypes[$localField])
					$value = Types::getType($type)->convertToAPIValue($value);

				$apiField = StringUtil::underscore(isset($this->fieldMap[$localField]) ? $this->fieldMap[$localField] :
					$localField);

				$output[$apiField] = $value;
			}

			return $output;
		}
	}