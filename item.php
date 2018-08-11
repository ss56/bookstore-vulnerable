<?php
/**
 * Computer Security Project
 *
 * @author     Sushma Kalle <skalle@uno.edu>
 */
include_once("common.php");

function add($id) {
    global $app;
    $sql = "SELECT * FROM books WHERE id = {$id}";
    $app['db']->query($sql);
    $book = $app['db']->first();
    if ( ! isset($_COOKIE['items'])) {
        $value = json_encode(array(array(
            'title' => $book['title'],
            'price' => $book['price']
        )));
    } else {
        $items = (array)json_decode($_COOKIE['items']);
        $value[] = array(
            'title' => $book['title'],
            'price' => $book['price']
        );
        $value = json_encode(array_merge($value, $items));
    }
    setcookie("items", $value, time()+3600);
    redirect('cart.php');
}
$action = !empty($_GET['action']) ? $_GET['action'] : 'add';
$id = !empty($_GET['id']) ? $_GET['id'] : 0;
$view = $action($id);
$content = render('book', array('view' => $view));
include('layout.php');
