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
    $full_name = isset($_POST['full_name']) ? $_POST['full_name'] : '';
    $phone_no = isset($_POST['phone_no']) ? $_POST['phone_no'] : '';
    
    $sql = "INSERT INTO users SET uname = '{$uname}', pass = '{$pass}', created_at = NOW(), updated_at = NOW()";
    $app['db']->query($sql);
    $app['db']->execute();
    $user_id = $app['db']->lastInsertId();

    $sql = "INSERT INTO profiles SET full_name = '{$full_name}', phone_no = '{$phone_no}', user_id = {$user_id}";
    $app['db']->query($sql);
    $app['db']->execute();

    flash_message('You have successfully registered.', 'success');
    redirect('login.php');
}

$content = render('register');
include("layout.php");
