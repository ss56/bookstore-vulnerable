<?php
/**
 * Computer Security Project
 *
 * @author     Sushma Kalle <skalle@uno.edu>
 */
session_start();
require_once("config.php");
require_once("libs/Database.php");
require_once('libs/helpers.php');

$app = array(
    'db'     => new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME)
);
