<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	/**
	 * For use with {@see TemplateCapableInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Entity\Features
	 * @see     TemplateCapableInterface
	 */
	trait TemplateCapableTrait {
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