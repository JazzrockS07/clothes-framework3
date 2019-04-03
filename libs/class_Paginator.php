<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 04.02.2019
 * Time: 14:55
 */

class Paginator {
	static $total = 1;
	static $start_item = 1;
	static $page = 1;
	static $pages = '';
	static $howpages = 7;
	static $sidepage = 2;

	static function start_item($limit,$count) {
		self::$total = intval(($count-1)/$limit)+1;
		if (empty(self::$pages)) {
			self::$page = 1;
		} elseif (self::$pages > self::$total) {
			self::$page = self::$total;
		} else {
			self::$page = self::$pages;
		}
		self::$start_item = self::$page*$limit - $limit;
	}
	static function showPaginator() {
		self::$sidepage=(self::$howpages-3)/2;
	}
}