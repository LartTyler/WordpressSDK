<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	use DaybreakStudios\WordpressSDK\Entity\EntityTrait;

	/**
	 * For use with {@see TemplateCapableInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Entity\Features
	 * @see     TemplateCapableInterface
	 */
	trait TemplateCapableTrait {
		use EntityTrait;

		/**
		 * {@inheritdoc}
		 */
		public function getTemplate() {
			return $this->get(TemplateCapableInterface::FIELD_TEMPLATE);
		}

		/**
		 * {@inheritdoc}
		 */
		public function setTemplate($template) {
			return $this->set(TemplateCapableInterface::FIELD_TEMPLATE, $template);
		}
	}