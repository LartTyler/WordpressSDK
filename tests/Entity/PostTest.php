<?php
	namespace Tests\DaybreakStudios\WordpressSDK\Entity;

	use DaybreakStudios\WordpressSDK\Entity\Post;
	use PHPUnit\Framework\TestCase;

	class PostTest extends TestCase {
		public function testCreateWithFields() {
			$post = new Post([
				Post::FIELD_PUBLISH_DATE => $expectedDate = '2018-01-01T05:00:00',
			]);

			$this->assertNull($post->getId());
			$this->assertInstanceOf(\DateTime::class, $date = $post->getPublishDate());

			/** @var \DateTime $date */

			$this->assertEquals($expectedDate, $date->format('Y-m-d\\TH:i:s'));
		}
	}