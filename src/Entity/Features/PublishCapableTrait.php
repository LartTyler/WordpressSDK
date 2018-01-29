<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	/**
	 * For use with {@see PublishCapableInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Entity
	 * @see     PublishCapableInterface
	 */
	trait PublishCapableTrait {
		/**
		 * @return \DateTime
		 */
		public function getPublishDate() {
			return $this->get(PublishCapableInterface::FIELD_PUBLISH_DATE);
		}

		/**
		 * @param \DateTime $publishDate
		 *
		 * @return $this
		 */
		public function setPublishDate(\DateTime $publishDate) {
			return $this->set(PublishCapableInterface::FIELD_PUBLISH_DATE, $publishDate);
		}
	}