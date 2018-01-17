<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	interface PublishCapableInterface {
		/**
		 * The date the object was published, in UTC
		 */
		const FIELD_PUBLISH_DATE = 'publishDate';

		/**
		 * @return \DateTime
		 */
		public function getPublishDate();

		/**
		 * @param \DateTime $publishDate
		 *
		 * @return $this
		 */
		public function setPublishDate(\DateTime $publishDate);
	}