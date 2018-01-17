<?php
	namespace DaybreakStudios\WordpressSDK\Entity;

	use DaybreakStudios\WordpressSDK\Mapping\Types\Types;
	use DaybreakStudios\WordpressSDK\Utility\StringUtil;

	abstract class AbstractEntity implements EntityInterface, \JsonSerializable {
		use EntityTrait;

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

				if ($localField = $fieldMap[$field]) {
					$this->fieldMap[$localField] = $field;

					$field = $localField;
				}

				if ($type = @$types[$field]) {
					$value = Types::getType($type)->convertToPHPValue($value);

					$this->fieldTypes[$field] = $type;
				}

				$this->fields[$field] = $value;
			}

			$this->fields = $fields;
		}

		/**
		 * {@inheritdoc}
		 */
		public function jsonSerialize() {
			$output = [];

			foreach ($this->fields as $localField => $value) {
				if ($type = @$this->fieldTypes[$localField])
					$value = Types::getType($type)->convertToAPIValue($value);

				$apiField = StringUtil::underscore(@$this->fieldMap[$localField] ?: $localField);

				$output[$apiField] = $value;
			}

			return $output;
		}
	}