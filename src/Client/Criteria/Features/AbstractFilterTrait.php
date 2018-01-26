<?php
	namespace DaybreakStudios\WordpressSDK\Client\Criteria\Features;

	/**
	 * For use in any filter traits. Simply enforces the presence of a get / set method for filter properties.
	 *
	 * @package DaybreakStudios\WordpressSDK\Client\Criteria\Features
	 */
	trait AbstractFilterTrait {
		/**
		 * @param string $key
		 * @param mixed  $def
		 *
		 * @return mixed
		 */
		public abstract function get($key, $def = null);

		/**
		 * @param string $key
		 * @param mixed  $value
		 *
		 * @return $this
		 */
		public abstract function set($key, $value);

		/**
		 * @param string $key
		 *
		 * @return bool
		 */
		public abstract function has($key);

		/**
		 * @param string $key
		 *
		 * @return $this
		 */
		public abstract function remove($key);
	}