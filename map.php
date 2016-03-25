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
       //$all_keys = $redis->keys('*es*');
       if (empty($_GET['pattern']))
	$pattern='*';
       else
	$pattern=$_GET['pattern'];
       $all_keys = $redis->keys($pattern);
       foreach ($all_keys as $key){
	 $val = $redis->get($key);
         print('{'. $key . ":" . $val .'}'.PHP_EOL);
       }
       break;
    case 'scan':
       $it = NULL; /* Initialize our iterator to NULL */
       $redis->setOption(Redis::OPT_SCAN, Redis::SCAN_RETRY); /* retry when we get no keys back */
       while($arr_keys = $redis->scan($it)) {
         foreach($arr_keys as $str_key) {
            echo "Here is a key: $str_key\n";
         }
         echo "No more keys to scan!\n";
       }
       break;
    default:
       print('http://host/map.php?cmd=set&key=key1&value=val1'.PHP_EOL);
       print('http://host/map.php?cmd=get&key=key1'.PHP_EOL);
       print('http://host/map.php?cmd=keys'.PHP_EOL);
       print('http://host/map.php?cmd=get_all'.PHP_EOL);
       print('http://host/map.php?cmd=get_all&pattern=*a*'.PHP_EOL);
  }
} else {
  print('http://host/map.php?cmd');
  phpinfo();
} ?>
