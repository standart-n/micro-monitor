<?php 
require "AsteriskManager.php";
$params = array('server' => '127.0.0.1', 'port' => '5038');
$ast = new Net_AsteriskManager($params);

try {
    $ast->connect();
} catch (PEAR_Exception $e) {
    echo $e;
}

try {
    $ast->login('admin', 'yJaBkTn');
} catch(PEAR_Exception $e) {
    echo $e;
}

try {
    $Sip1 = $ast->getSipPeers();
} catch (PEAR_Exception $e) {
    echo $e;
}

echo $Sip1;

?>
