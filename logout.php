<?php
/**
 * Computer Security Project
 *
 * @author     Sushma Kalle <skalle@uno.edu>
 */
include_once('common.php');

session_destroy();
flash_message('You have logged out!', 'success');
redirect('index.php');
