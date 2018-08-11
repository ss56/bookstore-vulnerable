<?php
/**
 * Computer Security Project
 *
 * @author     Sushma Kalle <skalle@uno.edu>
 */
include_once("common.php");

/**
 * Categories
 */
$sql = "SELECT * FROM categories";
$app['db']->query($sql);
$categories = $app['db']->all();
$menus = '';
foreach($categories as $category) {
    $menus .= "<a href='view.php?by=category&id={$category['id']}' class='list-group-item'>{$category['name']}</a>";
}

/**
 * Books
 */
$sql = "SELECT * FROM books ORDER BY created_at DESC LIMIT 6";
$app['db']->query($sql);
$books = $app['db']->all();
$featured_book = '';
foreach($books as $book) {
    $featured_book .= "<div class=\"col-6 col-sm-6 col-lg-10\" >
        <dl>
          <dt><h2>{$book['title']}</h2></dt>
          <dd>" . truncate($book['description']) . "</dd>
        </dl>
        <p><a class=\"btn btn-info\" href=\"view.php?by=book&id={$book['id']}\" role=\"button\">View details &raquo;</a></p>
    </div>";
}

$content = render('home', array('menus' => $menus, 'featured' => $featured_book));
include("layout.php");
