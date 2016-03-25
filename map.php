<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$redis = new Redis();
$redis->connect('127.0.0.1', 6379);

if (isset($_GET['cmd']) === true) {
  header('Content-Type: application/json');
  switch ($_GET['cmd']){
    case 'set':
       $redis->set($_GET['key'], $_GET['value']);
       print('{'. $_GET['key'] . ":" . $_GET['value'].'}');
       break;
    case 'get':
       $value = $redis->get($_GET['key']);
       print('{'. $_GET['key'] . ":" . $value.'}'.PHP_EOL);
       break;
    case 'keys':
       $all_keys = $redis->$_GET['cmd']('*');
       print_r($all_keys);
       break;
    case 'get_all':
       $all_keys = $redis->keys('*');
       foreach ($all_keys as $key){
	 $val = $redis->get($key);
         print('{'. $key . ":" . $val .'}'.PHP_EOL);
       }
       break;
    default:
       print('http://40.112.220.187/app.php?cmd=set&key=key1&value=val1'.PHP_EOL);
       print('http://40.112.220.187/app.php?cmd=get&key=key1'.PHP_EOL);
       print('http://40.112.220.187/app.php?cmd=keys'.PHP_EOL);
  }
} else {
  print('http://40.112.220.187/app.php?cmd');
  phpinfo();
} ?>
