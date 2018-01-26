<?php
	namespace DaybreakStudios\WordpressSDK\Entity;

	use DaybreakStudios\WordpressSDK\Entity\Features\GuidCapableInterface;
	use DaybreakStudios\WordpressSDK\Entity\Features\PublishCapableInterface;
	use DaybreakStudios\WordpressSDK\Entity\Features\LinkCapableInterface;
	use DaybreakStudios\WordpressSDK\Entity\Features\ModifiedTrackingInterface;
	use DaybreakStudios\WordpressSDK\Entity\Features\SlugCapableInterface;
	use DaybreakStudios\WordpressSDK\Entity\Features\StatusCapableInterface;
	use DaybreakStudios\WordpressSDK\Entity\Features\TypeCapableInterface;
	use DaybreakStudios\WordpressSDK\Entity\Features\PasswordCapableInterface;
	use DaybreakStudios\WordpressSDK\Entity\Features\TitleCapableInterface;
	use DaybreakStudios\WordpressSDK\Entity\Features\ContentCapableInterface;
	use DaybreakStudios\WordpressSDK\Entity\Features\AuthorCapableInterface;
	use DaybreakStudios\WordpressSDK\Entity\Features\FeaturedMediaCapableInterface;
	use DaybreakStudios\WordpressSDK\Entity\Features\CommentCapableInterface;
	use DaybreakStudios\WordpressSDK\Entity\Features\PingCapableInterface;
	use DaybreakStudios\WordpressSDK\Entity\Features\TemplateCapableInterface;

	interface CommonPostObjectInterface extends
		EntityInterface,
		PublishCapableInterface,
		GuidCapableInterface,
		LinkCapableInterface,
		ModifiedTrackingInterface,
		SlugCapableInterface,
		StatusCapableInterface,
		TypeCapableInterface,
		PasswordCapableInterface,
		TitleCapableInterface,
		ContentCapableInterface,
		AuthorCapableInterface,
		FeaturedMediaCapableInterface,
		CommentCapableInterface,
		PingCapableInterface,
		TemplateCapableInterface {
	}