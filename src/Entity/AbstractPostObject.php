<?php
	namespace DaybreakStudios\WordpressSDK\Entity;

	use DaybreakStudios\WordpressSDK\Entity\Features\AuthorCapableInterface;
	use DaybreakStudios\WordpressSDK\Entity\Features\AuthorCapableTrait;
	use DaybreakStudios\WordpressSDK\Entity\Features\CommentCapableInterface;
	use DaybreakStudios\WordpressSDK\Entity\Features\CommentCapableTrait;
	use DaybreakStudios\WordpressSDK\Entity\Features\ContentCapableInterface;
	use DaybreakStudios\WordpressSDK\Entity\Features\ContentCapableTrait;
	use DaybreakStudios\WordpressSDK\Entity\Features\FeaturedMediaCapableInterface;
	use DaybreakStudios\WordpressSDK\Entity\Features\FeaturedMediaCapableTrait;
	use DaybreakStudios\WordpressSDK\Entity\Features\GUIDCapableInterface;
	use DaybreakStudios\WordpressSDK\Entity\Features\GUIDCapableTrait;
	use DaybreakStudios\WordpressSDK\Entity\Features\LinkCapableInterface;
	use DaybreakStudios\WordpressSDK\Entity\Features\LinkCapableTrait;
	use DaybreakStudios\WordpressSDK\Entity\Features\ModifiedTrackingInterface;
	use DaybreakStudios\WordpressSDK\Entity\Features\ModifiedTrackingTrait;
	use DaybreakStudios\WordpressSDK\Entity\Features\PasswordCapableInterface;
	use DaybreakStudios\WordpressSDK\Entity\Features\PasswordCapableTrait;
	use DaybreakStudios\WordpressSDK\Entity\Features\PingCapableInterface;
	use DaybreakStudios\WordpressSDK\Entity\Features\PingCapableTrait;
	use DaybreakStudios\WordpressSDK\Entity\Features\PublishCapableInterface;
	use DaybreakStudios\WordpressSDK\Entity\Features\PublishCapableTrait;
	use DaybreakStudios\WordpressSDK\Entity\Features\SlugCapableInterface;
	use DaybreakStudios\WordpressSDK\Entity\Features\SlugCapableTrait;
	use DaybreakStudios\WordpressSDK\Entity\Features\StatusCapableInterface;
	use DaybreakStudios\WordpressSDK\Entity\Features\StatusCapableTrait;
	use DaybreakStudios\WordpressSDK\Entity\Features\TemplateCapableInterface;
	use DaybreakStudios\WordpressSDK\Entity\Features\TemplateCapableTrait;
	use DaybreakStudios\WordpressSDK\Entity\Features\TitleCapableInterface;
	use DaybreakStudios\WordpressSDK\Entity\Features\TitleCapableTrait;
	use DaybreakStudios\WordpressSDK\Entity\Features\TypeCapableInterface;
	use DaybreakStudios\WordpressSDK\Entity\Features\TypeCapableTrait;
	use DaybreakStudios\WordpressSDK\Mapping\Types\Types;

	abstract class AbstractPostObject extends AbstractEntity implements
		PublishCapableInterface,
		GUIDCapableInterface,
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
		TemplateCapableInterface
	{
		use PublishCapableTrait;
		use GUIDCapableTrait;
		use LinkCapableTrait;
		use ModifiedTrackingTrait;
		use SlugCapableTrait;
		use StatusCapableTrait;
		use TypeCapableTrait;
		use PasswordCapableTrait;
		use TitleCapableTrait;
		use ContentCapableTrait;
		use AuthorCapableTrait;
		use FeaturedMediaCapableTrait;
		use CommentCapableTrait;
		use PingCapableTrait;
		use TemplateCapableTrait;

		public function __construct(array $fields = [], array $fieldMap = [], array $fieldTypes = []) {
			parent::__construct($fields, $fieldMap + [
				'dateGmt' => static::FIELD_PUBLISH_DATE,
				'modifiedGmt' => static::FIELD_MODIFIED_DATE,
			], $fieldTypes + [
				static::FIELD_PUBLISH_DATE => Types::DATETIME,
				static::FIELD_MODIFIED_DATE => Types::DATETIME,
				static::FIELD_GUID => Types::RENDERED,
				static::FIELD_TITLE => Types::RENDERED,
				static::FIELD_CONTENT => Types::RENDERED,
				static::FIELD_EXCERPT => Types::RENDERED,
			]);
		}
	}