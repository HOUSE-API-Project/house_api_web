<?php
require_once "HTTP/Request.php";
$req =& new HTTP_Request("http://house-api-project.org/api/shibuhouse/wifi");
if (!PEAR::isError($req->sendRequest())) {
}

$json_wifi = file_get_contents('http://house-api-project.org/api/shibuhouse/wifi');
$obj_wifi = json_decode($json_wifi);

$json_1f = file_get_contents('http://house-api-project.org/api/shibuhouse/1f/temperature');
$obj_one = json_decode($json_1f);
$wifi_temperature = $obj_wifi->{'temperature'};
$wifi_clients = $obj_wifi -> {'clients'};
$onef_temperature = $obj_one -> {'temperature'};

$json_digi_hum = file_get_contents('http://house-api-project.org/api/shibuhouse/1f/humidity');
$obj_digi_hum = json_decode($json_digi_hum);

$json_wifi_digi = file_get_contents('http://house-api-project.org/api/shibuhouse/wifi/1f/clients');
$obj_wifi_digi = json_decode($json_wifi_digi);

$json_wifi_2f = file_get_contents('http://house-api-project.org/api/shibuhouse/wifi/2f/clients');
$obj_wifi_2f = json_decode($json_wifi_2f);

$json_wifi_bf = file_get_contents('http://house-api-project.org/api/shibuhouse/wifi/bf/clients');
$obj_wifi_bf = json_decode($json_wifi_bf);

$json_digi_pir = file_get_contents('http://house-api-project.org/api/shibuhouse/1f/pir');
$obj_digi_pir = json_decode($json_digi_pir);

$json_ayafuji = file_get_contents('http://house-api-project.org/api/ayafuji/temperature');
$obj_ayafuji = json_decode($json_ayafuji);


#wifi_digi_pirのjs配列出力
$array_digi_pir = file_get_contents('http://house-api-project.org/api/shibuhouse/1f/pir?limit=100?sort=asc');
$obj_array_digi_pir = json_decode($array_digi_pir);
print('<script type="text/javascript">');
print('var array_digi_pir_length = '.count($obj_array_digi_pir).';');
print(PHP_EOL);
print('var array_digi_pir = []; // 配列の初期化');
for ($i = 0; $i <= count($obj_array_digi_pir) - 1; $i++) {
  print(PHP_EOL);
  print('array_digi_pir[array_digi_pir.length] = '.$obj_array_digi_pir[$i] ->count[0] -> count.';');
}
print('</script>');


#デジ部屋のwifiの数
$array_wifi_digi = file_get_contents('http://house-api-project.org/api/shibuhouse/wifi/1f/clients?limit=100');
$obj_array_wifi_digi = json_decode($array_wifi_digi);
print('<script type="text/javascript">');
print('var array_wifi_digi = []; // 配列の初期化');
for ($i = 0; $i <= 99; $i++) {
		print(PHP_EOL);
		print('array_wifi_digi[array_wifi_digi.length] = '.$obj_array_wifi_digi[$i] -> {'all_clients'}.';');
	}
print('</script>');

#wifi_clientsのjs配列出力
$array_json = file_get_contents('http://house-api-project.org/api/shibuhouse/wifi?limit=100?sort=asc');
$obj_array = json_decode($array_json);
print('<script type="text/javascript">');
print('var array_wifi_clients = []; // 配列の初期化');
for ($i = 0; $i <= 99; $i++) {
  print(PHP_EOL);
  print('array_wifi_clients[array_wifi_clients.length] = '.$obj_array[$i] -> {'clients'}.';');
}
print('</script>');

#2fのwifiのクライアント
$array_wifi_twof = file_get_contents('http://house-api-project.org/api/shibuhouse/wifi/2f/clients?limit=100');
$obj_array_wifi_twof = json_decode($array_wifi_twof);
print('<script type="text/javascript">');
print('var array_wifi_twof = []; // 配列の初期化');
for ($i = 0; $i <= 99; $i++) {
		print(PHP_EOL);
		print('array_wifi_twof[array_wifi_twof.length] = '.$obj_array_wifi_twof[$i] -> {'all_clients'}.';');
	}
print('</script>');

#bfのwifiのクライアント
$array_wifi_bf = file_get_contents('http://house-api-project.org/api/shibuhouse/wifi/bf/clients?limit=100');
$obj_array_wifi_bf = json_decode($array_wifi_bf);
print('<script type="text/javascript">');
print('var array_wifi_bf = []; // 配列の初期化');
for ($i = 0; $i <= 99; $i++) {
    	print(PHP_EOL);
                print('array_wifi_bf[array_wifi_bf.length] = '.$obj_array_wifi_bf[$i] -> {'all_clients'}.';');
        }
print('</script>');

#デジ部屋温度のjs配列出力
$array_digi_temp = file_get_contents('http://house-api-project.org/api/shibuhouse/1f/temperature?limit=100?sort=asc');
$obj_array_digi_temp = json_decode($array_digi_temp);
print('<script type="text/javascript">');
print('var array_digi_temp = []; // 配列の初期化');
for ($i = 0; $i <= 99; $i++) {
		print(PHP_EOL);
		print('array_digi_temp[array_digi_temp.length] = '.$obj_array_digi_temp[$i] -> {'temperature'}.';');
	}
print('</script>');

?>