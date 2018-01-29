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
		 * @return string
		 */
		public function getTemplate() {
			return $this->get(TemplateCapableInterface::FIELD_TEMPLATE);
		}

		/**
		 * @param string $template
		 *
		 * @return $this
		 */
		public function setTemplate($template) {
			return $this->set(TemplateCapableInterface::FIELD_TEMPLATE, $template);
		}
	}