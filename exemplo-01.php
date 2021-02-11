<?php

define('SECRET_IV', pack('a16', 'c0nt0s')); // senha pode ser alterada
define('SECRET', pack('a16', 'f@d@s')); // senha pode ser alterada

$data = [
	"nome"=>"1234567890123456"
];

$openssl = openssl_encrypt(
	json_encode($data),
	'AES-128-CBC', // metodo de cryptografia
	SECRET, // primeira chave
	0, // pode manter 0
	SECRET_IV // segunda chave
);

echo $openssl;

$string = openssl_decrypt($openssl, 'AES-128-CBC', SECRET, 0, SECRET_IV);

echo "<br><br>";

var_dump(json_decode($string, true));

echo "<br><br>";

echo base64_encode(base64_encode($openssl)); 
// Uma senha com até 16 caracters ciyptografada via openssl dessa forma com 2 base64_encode gera uma string de até 80 caracters
?>