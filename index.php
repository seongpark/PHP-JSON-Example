<?php
    $key = 'shinekey';
    $data_str1 = file_get_contents('https://api.corona-19.kr/korea/?serviceKey='.$key);
    $json1 = json_decode($data_str1, true);
    echo 'NowCase: '. $json1['NowCase']. "<br>";
?>
