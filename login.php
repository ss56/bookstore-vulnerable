<?php
/**
 * Computer Security Project
 *
 * @author     Sushma Kalle <skalle@uno.edu>
 */
include_once("common.php");

if ($_POST) {
    $uname = isset($_POST['username']) ? $_POST['username'] : '';
    $pass = isset($_POST['password']) ? $_POST['password'] : '';
    $sql = "SELECT * FROM users LEFT JOIN profiles ON users.id = profiles.user_id WHERE users.uname = '{$uname}' AND users.pass = '{$pass}'";
    echo $pass;
    $app['db']->query($sql);
    if ($app['db']->count() > 0) {
        $user = $app['db']->first();
        $_SESSION['logged'] = true;
        $_SESSION['user'] = $user;
        if ($user['is_admin']) {
            $_SESSION['is_admin'] = true;
        }
        flash_message('You have successfully logged in.', 'success');
        redirect('account.php');
    } else {
        flash_message('Username or password is incorrect, try again!', 'danger');
    }
}

$content = render('login');
include("layout.php");
