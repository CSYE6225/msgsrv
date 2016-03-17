<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$redis = new Redis();
$redis->connect('127.0.0.1', 6379);

if (isset($_GET['cmd']) === true) {
  header('Content-Type: application/json');
  if ($_GET['cmd'] == 'set') {
    $redis->set($_GET['key'], $_GET['value']);
    print('{"message": "Updated"}');
  } else {
    $value = $redis->get($_GET['key']);
    print('{"data": "' . $value . '"}');
  }
} else {
  phpinfo();
} ?>
