<?php
	namespace DaybreakStudios\WordpressSDK\Entity;

	use DaybreakStudios\WordpressSDK\Entity\Features\CategoryCapableInterface;
	use DaybreakStudios\WordpressSDK\Entity\Features\CategoryCapableTrait;
	use DaybreakStudios\WordpressSDK\Entity\Features\FormatCapableInterface;
	use DaybreakStudios\WordpressSDK\Entity\Features\FormatCapableTrait;
	use DaybreakStudios\WordpressSDK\Entity\Features\StickyCapableInterface;
	use DaybreakStudios\WordpressSDK\Entity\Features\StickyCapableTrait;
	use DaybreakStudios\WordpressSDK\Entity\Features\TagCapableInterface;
	use DaybreakStudios\WordpressSDK\Entity\Features\TagCapableTrait;
	use DaybreakStudios\WordpressSDK\Entity\Features\TemplateCapableInterface;
	use DaybreakStudios\WordpressSDK\Entity\Features\TemplateCapableTrait;

	class Post extends AbstractPostObject implements
		FormatCapableInterface,
		StickyCapableInterface,
		TemplateCapableInterface,
		CategoryCapableInterface,
		TagCapableInterface
	{
		use FormatCapableTrait;
		use StickyCapableTrait;
		use TemplateCapableTrait;
		use CategoryCapableTrait;
		use TagCapableTrait;
	}