<?php
/*
Plugin Name: WordPress Any Word Search
Plugin URI: https://github.com/TheMonkeys/WordPress-Any-Word-Search
Description: A very simple WordPress plugin that makes the WordPress search box find posts that contain ANY of the words entered instead of only posts that contain ALL of the words; that is, it makes the search use the OR operator instead of the default AND operator.
Version: 1.0
Author: The Monkeys
Author URI: http://www.themonkeys.com.au/
Author Email: developers@themonkeys.com.au
License: GPL2

  Copyright 2013 The Monkeys (developers@themonkeys.com.au)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as 
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
  
*/

/**
 * Filter that alters the search section of the database query, changing the AND operators that WordPress inserts
 * between search terms into OR operators.
 *
 * See the \WP_Query::get_posts() method for the code that generates the database query that this filter will modify.
 *
 * @param $search the search section of the database query
 * @param $query instance of the current WP_Query object
 * @return string the modified search section of the database query as a string
 */
function wordpress_any_word_search_posts_search_filter($search, &$query) {
    if ($query->is_search) {
        // example query:
        // AND (((wp_posts.post_title LIKE '%word1%') OR (wp_posts.post_content LIKE '%word1%')) AND ((wp_posts.post_title LIKE '%word2%') OR (wp_posts.post_content LIKE '%word2%')))  AND (wp_posts.post_password = '')
        // want to change these ANDs into ORs
        // --------------------------------------------------------------------------------------^^^

        $search = preg_replace('/(\\(\\([^\\)]+LIKE[^\\)]+\\)\\s+OR\\s+\\([^\\)]+LIKE[^\\)]+\\)\\))\\s+AND/', '$1 OR', $search);
    }
    return $search;
}
add_filter('posts_search', 'wordpress_any_word_search_posts_search_filter', 10, 2);