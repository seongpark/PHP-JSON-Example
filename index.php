<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, Chrome=1" />
    <title>코로나</title>
	<meta name="description" content="">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

	<style>
        body,p,h1,h2,h3,h4,h5,h6,ul,ol,li,dl,dt,dd,table,th,td,form,fieldset,legend,input,textarea,button,select{margin:0;padding:0}
        body,input,textarea,select,button,table{font-family:Dotum,AppleGothic,sans-serif;font-size:12px}
        img,fieldset{border:0}
        ul,ol{list-style:none}
        em,address{font-style:normal}
        a{text-decoration:none}
        a:hover,a:active,a:focus{text-decoration:underline}

		h1 {font-size: 16px;font-weight:bold;padding:0 0 20px 0;}

        .wrap {padding : 10px;}
        .srch{width:100%;}
        .srch legend{overflow:hidden;visibility:hidden;position:absolute;top:0;left:0;width:1px;height:1px;font-size:0;line-height:0}
        .srch{color:#c4c4c4;text-align:left}
        .srch select,.srch input{margin:-1px 0 1px;font-size:12px;color:#373737;vertical-align:middle}
        .srch .keyword{margin-left:1px;padding:2px 3px 5px;border:1px solid #b5b5b5;font-size:12px;line-height:15px}

        .search_api {border-top:2px solid #dcdcdc;}
        .tbl_type,.tbl_type th,.tbl_type td{border:0}
        .tbl_type{width:100%;border-bottom:2px solid #dcdcdc;font-family:Tahoma;font-size:12px;}
        .tbl_type caption{display:none}
        .tbl_type th{padding:10px;border-top:1px solid #dcdcdc;border-left:1px solid #e5e5e5;background-color:#f5f7f9;color:#666;font-family:'돋움',dotum;font-size:12px;font-weight:bold}
        .tbl_type td{padding:10px;border-top:1px solid #e5e5e5;border-left:1px solid #e5e5e5;color:#4c4c4c}
        .tbl_type th:first-child {border-left:none;text-align: center}
        .tbl_type td:first-child {border-left:none;text-align: center}
        .tbl_type td:first-child + td + td + td {text-align: center}
        .tbl_type td:first-child + td + td + td + td {text-align: center}

		.updateTime {text-align:right;padding: 10px 0;}
		.sumArea {text-align:right;padding: 10px 0;}
		.sumArea p:nth-child(1) {flex: none;}
		.sumArea p:nth-child(2) {margin-left: auto;font-size:14px}
		.sumArea p:nth-child(1) span {color:#f00; font-weight: bold;}
	</style>

</head>
<body>

<?php
    $key = "3e206413f06d522942919b27f67ccad1d";
    $url = "https://api.corona-19.kr/korea/?serviceKey=".$key; // json 결과
    $is_post = false;
    $ch = curl_init(); 	//curl 초기화

    curl_setopt($ch, CURLOPT_URL, $url); //URL 지정하기
    curl_setopt($ch, CURLOPT_POST, $is_post);  //true시 post 전송 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //요청 결과를 문자열로 반환  true or false 
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    $response = curl_exec ($ch);
    $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE); // OPTION에 대한 정보를 요청합니다. 

    curl_close ($ch); // curl을 닫습니다. 

    if($status_code == 200) {
        $arr = json_decode($response);
       
        // 루프로 결과값얻기 (아래 foreach 주석해제하면 전체결과값을 보여줍니다..)
        // foreach ($arr as $key => $value) {
        //     echo $key . " : " . $value . "<br>";
        // }        
        
    } else {
        echo "Error 내용:".$response;
    }
?>

    <div class="wrap">
		<h1>코로나 현황</h1>

		<div class="sumArea">
			<p>요청결과 : <span><?php echo $arr->resultMessage ?></span></p>
		</div>

        <div class="search_api">
			<table cellspacing="0" summary="API 결과" class="tbl_type">
				<caption>키워드 API 결과</caption>
				<colgroup>
                    <col width="20%">
                    <col width="*">
				</colgroup>
				<tbody>
					<tr>
                        <th scope="col">TotalCase </th>
                        <td><?php echo $arr->TotalCase ?></td>
					</tr>
                    <tr>
                        <th scope="col">TotalRecovered </th>
                        <td><?php echo $arr->TotalRecovered ?></td>
                    </tr>
					<tr>
                        <th scope="col">TotalDeath  </th>
                        <td><?php echo $arr->TotalDeath ?></td>
					</tr>
					<tr>
                        <th scope="col">NowCase </th>
                        <td><?php echo $arr->NowCase ?></td>
					</tr>
					<tr>
                        <th scope="col">TotalChecking</th>
                        <td><?php echo $arr->TotalChecking ?></td>
					</tr>
					<tr>
                        <th scope="col">TodayRecovered</th>
                        <td><?php echo $arr->TodayRecovered ?></td>
					</tr>
					<tr>
                        <th scope="col">TodayDeath  </th>
                        <td><?php echo $arr->TodayDeath ?></td>
					</tr>
					<tr>
                        <th scope="col">TotalCaseBefore</th>
                        <td><?php echo $arr->TotalCaseBefore ?></td>
					</tr>
				</tbody>
			</table>
        </div>
		<div class="updateTime">
            <p>updateTime : <span><?php echo $arr->updateTime ?></span></p>
		</div>
	</div>
</body>
</html>
