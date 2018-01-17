<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	interface TemplateCapableInterface {
		/**
		 * The theme file to use to display the object
		 */
		const FIELD_TEMPLATE = 'template';

		/**
		 * @return string
		 */
		public function getTemplate();

		/**
		 * @param string $template
		 *
		 * @return $this
		 */
		public function setTemplate($template);
	}