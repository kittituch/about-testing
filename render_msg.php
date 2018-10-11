<?php
function flex_msg($keyword)
{
	$server = "us-cdbr-iron-east-01.cleardb.net";
    $username = "b798786b8aa714";
    $password = "2e0e0451";
    $db = "heroku_ce52199dd4f50e1";
    $conn = new mysqli($server, $username, $password, $db);
	mysqli_query($conn, "SET NAMES utf8");
	
	$sql_key_search = "SELECT * FROM inserttesting WHERE office LIKE '%".$keyword."%'";
	$key_query = mysqli_query($conn,$sql_key_search);
    $numrows = mysqli_num_rows($key_query);
	$objsearch = mysqli_fetch_array($key_query);
	if($numrows > 1)
	{
		$url = "line://app/1613340620-lDEDan3A?keyword=".$keyword;
		$txtresult = $numrows." items";
		$btn_txt = "รายละเอียดเพิ่มเติม";
	}
	else if($numrows == 1)
	{
		$url = "line://app/1613340620-lDEDan3A?keyword=".$keyword;
		$txtresult = "จำนวน ".$numrows." รายการ";
		$btn_txt = "รายละเอียดเพิ่มเติม";
	}
	else if ($numrows < 1)
	{
		$url = "https://nutt-i.com/psqv2";
		$txtresult = "ไม่พบข้อมูล";
		$btn_txt = "ติดต่อผู้ดูแล";
	}
	$json1 = '{
				"type":"flex",
				"altText":"PQ PEAS1",
				"contents":{
  "type": "bubble",
  "hero": {
    "type": "image",
    "url": "https://abouttestings.herokuapp.com/J675LEOY58NM8E9T59D2AUF7H.jpg",
    "size": "full",
    "aspectRatio": "16:9",
    "aspectMode": "fit",
    "action": {
      "type": "uri",
      "uri": "http://linecorp.com/"
    }
  },
  "body": {
    "type": "box",
    "layout": "vertical",
    "contents": [
      {
        "type": "text",
        "text": "ผลการค้นหา",
        "weight": "bold",
        "size": "xl"
      },
      {
        "type": "box",
        "layout": "vertical",
        "margin": "lg",
        "spacing": "sm",
        "contents": [
          {
            "type": "box",
            "layout": "baseline",
            "spacing": "sm",
            "contents": [
              {
                "type": "text",
                "text": "'.$txtresult.'",
                "wrap": true,
                "color": "#666666",
                "size": "md",
                "flex": 5
              }
            ]
          }
        ]
      }
    ]
  },
  "footer": {
    "type": "box",
    "layout": "vertical",
    "spacing": "sm",
    "contents": [
      {
        "type": "button",
        "style": "primary",
        "height": "sm",
        "action": {
          "type": "uri",
          "label": "Click",
          "uri": "'.$url.'"
        }
      },
     
      {
        "type": "spacer",
        "size": "sm"
      }
    ],
    "flex": 0
  }
}
	}';
	$result = json_decode($json1);
	return $result;
}
?>