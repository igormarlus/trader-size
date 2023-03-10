<?php
$qr_token = $this->db->query("SELECT * FROM token");
#echo $qr_token->num_rows();
$token_betfair = $qr_token->row()->token;


$argv = array();
$argv[0] = '';
// 53845 vendor id
//$argv[1] = '6A1cQNtoRmi0GDOS'; // meu id vendor
#$argv[1] = 'qD8D8WZ300PJGjbN'; // sem deley
#$argv[1] = 'sl4K5RkqJvpsKvPc';
$argv[1] =  'sl4K5RkqJvpsKvPc'; // AUGUSTO
#$argv[1] =  'y0clajxo6wMU4bn0'; // CYANE




#$argv[2] = 'WbGq/+LhHwMTjKDQiVSgy7hqC7skcDlBYfxUVIOcfck='; // igormarlus
$argv[2] = $token_betfair; // igormarlus



#echo $argv[2];
if (count($argv) != 3) {
    echo 'usage: php -f jsonrpc.php AppKey SessionToken';
    exit(-1);
}
$APP_KEY = $argv[1];
$SESSION_TOKEN = $argv[2];
?>