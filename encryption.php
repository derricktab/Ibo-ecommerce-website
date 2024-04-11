<?php 

function encrypt3Des($data, $key){

  $encData = openssl_encrypt($data, 'DES-EDE3', $key, OPENSSL_RAW_DATA);
  
    return base64_encode($encData); 

 }

?>