<?php
/**
 * Computer Security Project
 *
 * @author     Sushma Kalle <skalle@uno.edu>
 */
include_once('common.php');

setcookie('items', json_encode(array()), -3600);
flash_message('Your cart is empty', 'warning');
redirect('cart.php');
