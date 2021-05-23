<?php
    $key = '3e206413f06d522942919b27f67ccad1d';
    $data_str1 = file_get_contents('https://api.corona-19.kr/korea/?serviceKey='.$key);
    $json1 = json_decode($data_str1, true);
    echo 'NowCase: '. $json1['NowCase']. "<br>";
?>
