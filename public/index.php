<?php
/**
 * Created by PhpStorm.
 * User: leona
 * Date: 27.8.2019.
 * Time: 10:21
 */

require_once ('../private/initialize.php');

$sql = "SELECT * FROM customers";
$result = $database->query($sql);
$row = $result->fetch_assoc();

echo $row['first_name'];