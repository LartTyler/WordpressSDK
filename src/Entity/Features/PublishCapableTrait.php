<?php
	namespace DaybreakStudios\WordpressSDK\Entity\Features;

	use DaybreakStudios\WordpressSDK\Entity\EntityTrait;

	/**
	 * For use with {@see PublishCapableInterface}.
	 *
	 * @package DaybreakStudios\WordpressSDK\Entity
	 * @see     PublishCapableInterface
	 */
	trait PublishCapableTrait {
		use EntityTrait;

		/**
		 * {@inheritdoc}
		 */
		public function getPublishDate() {
			return $this->get(PublishCapableInterface::FIELD_PUBLISH_DATE);
		}

		/**
		 * {@inheritdoc}
		 */
		public function setPublishDate(\DateTime $publishDate) {
			return $this->set(PublishCapableInterface::FIELD_PUBLISH_DATE, $publishDate);
		}
	}