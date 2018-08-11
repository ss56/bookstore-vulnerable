<?php
/**
 * Computer Security Project
 *
 * @author     Sushma Kalle <skalle@uno.edu>
 */
include_once("common.php");
if ( ! is_admin()) {
    flash_message('Please log in to continue.', 'warning');
    redirect('login.php');
}

if ($_POST) {
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    if ( ! empty($name)) {
        $sql = "INSERT INTO categories SET name = '{$name}'";
        $app['db']->query($sql);
        $app['db']->execute();
        flash_message('New category has been added!', 'success');
        redirect('category_admin.php');
    } else {
        flash_message('Please insert category name.', 'danger');
    }
}

$sidebar = file_get_contents('contents/admin_sidebar.html');
$content = render('new_category', array('sidebar' => $sidebar));
include("layout.php");
