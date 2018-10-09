<?php
function reply_msg($txtback,$replyToken)//สร้างข้อความและตอบกลับ
{
    $access_token = 'gjNIH+NmRE2UubUIwtdgdCYSn2fqeBlW9lk3jOseknNL33bVZF0L1QBPGccbPBOPSXKh2H4RJWsgEW0P0u143UNFB/PmaL7q/c3L/323iVaIIV8r06Vsfvjeciykpd4aZrxDLQCnT99ex9NQgfF9ugdB04t89/1O/w1cDnyilFU=';
    $messages = ['type' => 'text','text' => $txtback];//สร้างตัวแปร 
    $url = 'https://api.line.me/v2/bot/message/reply';
    $data = [
                'replyToken' => $replyToken,
                'messages' => [$messages],
            ];
    $post = json_encode($data);
    $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $result = curl_exec($ch);
    curl_close($ch);
    echo $result . "\r\n";
}
      $content = file_get_contents('php://input');//ประกาศตัวแปรชื่อ content เพื่อรับข้อมูลที่พิมจากไลน์มาเก็บที่ตัวเเปร contents
	  $events = json_decode($content, true);//แปลง json เป็น php เเล้วเก็บในข้อมูล event
	  if (!is_null($events['events'])) //check ค่าในตัวแปร $events
	  {
			foreach ($events['events'] as $event) 
            {
				if ($event['type'] == 'message' && $event['message']['type'] == 'text')
				{
					$replyToken = $event['replyToken']; //เก็บ reply token เอาไว้ตอบกลับ
					$txtin = $event['message']['text'];//เอาข้อความจากไลน์ใส่ตัวแปร $txtin
					$sqltext = "SELECT * FROM tbl_hope WHERE name = '".$txtin."'";
					$query = mysqli_query($conn,$sql_text);
					while($obj = mysqli_fetch_array($query))
					{
						$txtback = $obj["lastname"];
						reply_msg($txtback,$replyToken);
					}	
				}
			}
	  }
	  ?>	 

