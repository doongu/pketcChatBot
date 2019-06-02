<?php
# type 2
$main_key =  ["★플러스친구 추천인 이벤트 응모","컴퓨터공학과 일정 안내","컴퓨터공학과 공지사항", "도서관 남은 좌석","오늘 날씨","오늘 긱사밥은 뭘깡!?","강의실 찾기","문의 사항"];
$message = array(
	'type' => 'buttons',
	'buttons' => $main_key
);

echo json_encode( $message, JSON_UNESCAPED_UNICODE );

# type 1
// echo <<< EOT
// {
// "type" : "buttons",
// "buttons" : ["버튼1", "버튼2", "버튼3"]
// }
// EOT;
?>