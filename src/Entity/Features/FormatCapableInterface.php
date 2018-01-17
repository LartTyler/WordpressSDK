<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	interface FormatCapableInterface {
		/**
		 * The format for the object
		 */
		const FIELD_FORMAT = 'format';

		/**
		 * Indicates that the object uses the standard format
		 *
		 * @see https://codex.wordpress.org/Post_Formats#Supported_Formats
		 */
		const FORMAT_STANDARD = 'standard';

		/**
		 * Indicates that the object uses the aside format
		 *
		 * @see https://codex.wordpress.org/Post_Formats#Supported_Formats
		 */
		const FORMAT_ASIDE = 'aside';

		/**
		 * Indicates that the object uses the chat format
		 *
		 * @see https://codex.wordpress.org/Post_Formats#Supported_Formats
		 */
		const FORMAT_CHAT = 'chat';

		/**
		 * Indicates that the object uses the gallery format
		 *
		 * @see https://codex.wordpress.org/Post_Formats#Supported_Formats
		 */
		const FORMAT_GALLERY = 'gallery';

		/**
		 * Indicates that the object uses the link format
		 *
		 * @see https://codex.wordpress.org/Post_Formats#Supported_Formats
		 */
		const FORMAT_LINK = 'link';

		/**
		 * Indicates that the object uses the image format
		 *
		 * @see https://codex.wordpress.org/Post_Formats#Supported_Formats
		 */
		const FORMAT_IMAGE = 'image';

		/**
		 * Indicates that the object uses the quote format
		 *
		 * @see https://codex.wordpress.org/Post_Formats#Supported_Formats
		 */
		const FORMAT_QUOTE = 'quote';

		/**
		 * Indicates that the object uses the status format
		 *
		 * @see https://codex.wordpress.org/Post_Formats#Supported_Formats
		 */
		const FORMAT_STATUS = 'status';

		/**
		 * Indicates that the object uses the video format
		 *
		 * @see https://codex.wordpress.org/Post_Formats#Supported_Formats
		 */
		const FORMAT_VIDEO = 'video';

		/**
		 * Indicates that the object uses the audio format
		 *
		 * @see https://codex.wordpress.org/Post_Formats#Supported_Formats
		 */
		const FORMAT_AUDIO = 'audio';

		/**
		 * @return string
		 */
		public function getFormat();

		/**
		 * @param string $format
		 *
		 * @return $this
		 */
		public function setFormat($format);
	}