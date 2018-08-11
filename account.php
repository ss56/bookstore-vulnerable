<?php
/**
 * Computer Security Project
 *
 * @author     Sushma Kalle <skalle@uno.edu>
 */
include_once('common.php');

$content = render('account', array('full_name' => $_SESSION['user']['full_name']));
include('layout.php');
