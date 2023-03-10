<?php
$argv = array();
$argv[0] = '';
// 53845 vendor id
$argv[1] = '6A1cQNtoRmi0GDOS'; // meu id vendor

$argv[2] = 'oCsWYT/wVWvEUgUqGEr+SFDmA167FhtihCpfZthbty8='; // igormarlus
if (count($argv) != 3) {
    echo 'usage: php -f jsonrpc.php AppKey SessionToken';
    exit(-1);
}
$APP_KEY = $argv[1];
$SESSION_TOKEN = $argv[2];
?>