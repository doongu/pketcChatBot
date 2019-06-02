<?php
    
header("Content-Type: application/json; charset=utf-8");
$raw_post_data = file_get_contents( "php://input" );
// $data = json_decode( $raw_post_data, true ); // array
$data = json_decode( $raw_post_data ); // stdClass Object
$user_key = $data->user_key;
$text = $data->content;
//얘내는 위쪽에 몰아둬야함


$main_key =  ["★플러스친구 추천인 이벤트 응모","컴퓨터공학과 일정 안내","컴퓨터공학과 공지사항", "도서관 남은 좌석","오늘 날씨","강의실 찾기","문의 사항"];
$sub_key =["A","B","C","E","처음으로"];
$sub2_key = ["공과대학 재학생 대상 결핵검사", "돌아가기"];


$libname = array('-중앙도서관 
PC / 노트북 / 어합(LAB)','401열람실(북쪽)','401열람실(남쪽)','4층 노트북실','
-학습 도서관 
제 3열람실', '제 4열람실', '노트북실','제 5열람실','제 6열람실');

if( $text == "★플러스친구 추천인 이벤트 응모"){ 
$message = array(
    'message' => array('text' => "컴퓨터공학과 플러스친구 추천인 이벤트가 진행중입니다! ",
      'message_button' =>array(
      "label" => "이벤트 참여하기!",
      "url" => "https://forms.gle/Vi3wJWMh9gXT6pqRA"),
      'photo' => array(
      'url'=>"https://imgur.com/ZO6OWYp.png",
      "width"  => 780,
      "height" =>969)
    ),

      //$notice, 이미지 주소 직접넣는거는 안뜸 .
 
    'keyboard' => array(
      'type' => 'buttons',
      'buttons' => $main_key
    )
  );
}
if( $text == "오늘 긱사밥은 뭘깡!?"){
  $mysqli = mysqli_connect('52.79.168.84', 'root', 'rlflsdPrh12', 'sejongbab');
  mysqli_select_db($mysqli, 'sejongbab') or die('dd');
  mysqli_query($mysqli, "set names utf8");
  $sql = "SELECT bab FROM sejongbab";
  $result_meal = mysqli_query($mysqli,$sql);
  $meal = "";
  for($j=0; $j<4; $j++){
    $data_10= mysqli_fetch_array($result_meal);
    if($j==0){
       $meal = "오늘"."(".$data_10[0]."일".")"."의"."  세종관 식사입니당 흐힛 맛있께 드세연"."\n"."\n";
       continue;
    }
    else if($j==1){
    $meal =$meal."🍲"."아침"."(07:30 ~09:00)"."\n".$data_10[0]."\n"; //중앙도서관
  }
   else if($j==2){
    $meal =  $meal."🥘"."점심"."(11:30 ~ 13:30)"."\n".$data_10[0]."\n"; //중앙도서관
  }
   else if($j==3){
    $meal =  $meal."🍝"."저녁"."(17:00 ~ 18:30)"."\n".$data_10[0]; //중앙도서관
  }
}

$message = array(
    'message' => array('text' => " ".$meal."조은 하루 보내세요오😝",
      'message_button' =>array(
      "label" => "세종 밥 홈페이지",
      "url" => "http://dormitory.pknu.ac.kr/03_notice/notice01.php")
    ),

      //$notice, 이미지 주소 직접넣는거는 안뜸 .
 
    'keyboard' => array(
      'type' => 'buttons',
      'buttons' => $main_key
    )
  );
}
else if ( $text == "컴퓨터공학과 공지사항" ) {
  $mysqli = mysqli_connect('52.79.168.84','root','rlflsdPrh12', 'cenotice');
  mysqli_select_db($mysqli, 'cenotice') or die('dd');
  mysqli_query($mysqli,"set names utf8");
  $notice= "";
  $sql = "SELECT notice FROM cenotice";
  $result = mysqli_query($mysqli,$sql);  //mysql에서 꺼내올 떄 ??오류 떠서 이렇게 넣으면 해결 됌
  for($i=0; $i<5; $i++){
    $data = mysqli_fetch_array($result);
    $notice = $notice."-".$data[0]."\n"."\n"; //.은 문자열 합치기 
  }
  $message = array(
    'message' => array('text' => "현재 컴퓨터공학과 공지사항 입니다.\n\n"."\n"."\n"."\n".$notice,
      'message_button' =>array(
      "label" => "공지사항 홈페이지",
      "url" => "http://cms.pknu.ac.kr/ced/view.do?no=11084")
    ),

      //$notice, 이미지 주소 직접넣는거는 안뜸 .
 
    'keyboard' => array(
      'type' => 'buttons',
      'buttons' => $main_key
    )
  );
}
else if ( $text == "공과대학 재학생 대상 결핵검사" ) {
  $message = array(
    'message' => array('text' => "공과대학 내에서 전염성 결핵환자 발생으로 인한 결핵확산 방지 차원으로 단과대학에서는 결핵검진을 실시하오니 반드시 검진하시기 바랍니다.\n\n컴퓨터공학과 검진일자 : 2019.04.24.(수) 09:00 ~16:00\n검진장소 : 위드센터B11 앞\n검진내용 : 흉부X-선 검사(무료)\n검진결과 : 약 2주후, 유 소견자 개별 별도 통보예정\n검진시 필요한 서류 : 휴부엑스선검진 접수증 작성 1부",
      'message_button' =>array(
      "label" => "공지사항 홈페이지",
      "url" => "http://cms.pknu.ac.kr/ced/view.do?no=11084&idx=384384&view=view&pageIndex=1&sv=&sw=")
    ),
     //$notice, 이미지 주소 직접넣는거는 안뜸 .
 
    'keyboard' => array(
      'type' => 'buttons',
      'buttons' => $main_key
    )
  );
}
else if ( $text == "컴퓨터공학과 일정 안내" ) {
  $message = array(
    'message' => array('text' => "현재 예정된 컴퓨터공학과 일정을 안내하겠습니다."),
     //$notice, 이미지 주소 직접넣는거는 안뜸 .
 
    'keyboard' => array(
      'type' => 'buttons',
      'buttons' => $sub2_key
    )
  );
}
/*else if ( $text == "재학생 일정 안내" ) {
  $message = array(
    'message' => array('text' => "현재 재학생 일정을 안내하겠습니다."),
     //$notice, 이미지 주소 직접넣는거는 안뜸 .
 
    'keyboard' => array(
      'type' => 'buttons',
      'buttons' => $sub3_key
    )
  );
}*/

else if ( $text == "도서관 남은 좌석" ) {
  $mysqli_1 = mysqli_connect('52.79.168.84','root','rlflsdPrh12', 'rdlib');
  mysqli_select_db($mysqli_1, 'rdlib') or die('dd');
  mysqli_query($mysqli_1,"set names utf8");
  $sql_lib = "SELECT rd FROM rdlib";
  $result_lib = mysqli_query($mysqli_1,$sql_lib);
  $rdlib ="";
  for($j=0; $j<9; $j++){
    $data_1= mysqli_fetch_array($result_lib);
    $rdlib = $rdlib.$libname[$j]." : ".$data_1[0]."석"."\n"; //중앙도서관
  }
  $message = array(
    'message' => array('text' => "실시간 도서관 남은 좌석 수 입니다.\n\n".$rdlib,
      'message_button' => array(
        "label"=> "도서관 홈페이지",
        "url" => "https://libweb.pknu.ac.kr/")),
     //$notice, 이미지 주소 직접넣는거는 안뜸 .
 
    'keyboard' => array(
      'type' => 'buttons',
      'buttons' => $main_key
    )
  );
}

else if ( $text == "오늘 날씨" ) {
  $mysqli_2 = mysqli_connect('52.79.168.84','root','rlflsdPrh12', 'weather');
  mysqli_select_db($mysqli_2, 'weather') or die('dd');
  mysqli_query($mysqli_2,"set names utf8"); 
  $sql_wea = "SELECT day,tem FROM weather";
  $result_wea = mysqli_query($mysqli_2,$sql_wea);
   //$data[res] = 1
  $wea = "";
  //while ㅡ쓰면안댐아마 ..?
  for($p=0; $p<2; $p++){
    $data_2 = mysqli_fetch_array($result_wea);
    $wea = $wea."===========\n".$data_2[0]."===========\n".$data_2[1]."\n";  
  }
  $message = array(
    'message' => array('text' => $wea."==========="),
     //$notice, 이미지 주소 직접넣는거는 안뜸 .
 
    'keyboard' => array(
      'type' => 'buttons',
      'buttons' => $main_key
    )
  );
} 

else if ( $text == "강의실 찾기" ) {
  $message = array(
    'message' => array('text' => "찾으시는 강의실의 카테고리를 선택해 주세요😆😆\nA : \n미래관 디자인관 나래관 \n대학본부 웅비관 누리관 \n향파관 돌집(워커하우스)\nB : \n자연과학1관 충무관 환경해양관 \n학습도서관 잔디광장 가온관\n 구학생회관(구학) 신학생회관(신학)\nC : \n자연과학2관 호연관 건축관 \n인문사회경영관 수산과학관 해양공동연구관 장영실관\nE : \n장보고관 농구장 중앙도서관\n정보전산원 체육관 풋살장\n대운동장 테니스장 대학극장\n공학관 한솔관\n세종2관 세종1관 행복기숙사\n\n(디자인 참조:부경in)",

        'message_button' =>array(
      "label" => "크게 보기",
      "url" => "https://imgur.com/a/a9P6AeP"),
      
      'photo' => array(
    'url'=>"https://i.imgur.com/fGWxjYm.png",
    "width"  => 720,
    "height" =>560)
    ),
    'keyboard' => array(
      'type' => 'buttons',
      'buttons' => $sub_key
    )
  );
}

else if ( $text == "A" ) {
  $message = array(
    'message' => array( 
      'message_button' =>array(
      "label" => "크게 보기",
      "url" => "https://imgur.com/a/MYacoab"),
      
      'photo' => array(
    'url'=>"https://i.imgur.com/IHL1cI4.png",
    "width"  => 720,
    "height" =>560)
),
     //$notice, 이미지 주소 직접넣는거는 안뜸 .
 
    'keyboard' => array(
      'type' => 'buttons',
      'buttons' => $sub_key
    )
  );
}

else if ( $text == "B" ) {
  $message = array(
    'message' => array( 
      'message_button' =>array(
      "label" => "크게 보기",
      "url" => "https://imgur.com/a/tIycOJU"),

      'photo' => array(
    'url'=>"https://i.imgur.com/8jPtI83.png",
    "width"  => 720,
    "height" =>560)
    ),
     //$notice, 이미지 주소 직접넣는거는 안뜸 .
 
    'keyboard' => array(
      'type' => 'buttons',
      'buttons' => $sub_key
    )
  );
}

else if ( $text == "C" ) {
  $message = array(
    'message' => array(

      'message_button' =>array(
      "label" => "크게 보기",
      "url" => "https://imgur.com/a/qdHF7Cg"),

      'photo' => array(
      'url'=>"https://i.imgur.com/ELmQV4E.png",
      "width"  => 720,
      "height" =>560)
    ),
     //$notice, 이미지 주소 직접넣는거는 안뜸 .
 
    'keyboard' => array(
      'type' => 'buttons',
      'buttons' => $sub_key
    )
  );
}

else if ( $text == "E" ) {
  $message = array(
    'message' => array('message_button' =>array(
      "label" => "크게 보기",
      "url" => "https://imgur.com/a/VqykIfA"),
      'photo' => array(
    'url'=>"https://i.imgur.com/yUOIZYk.png",
    "width"  => 720,
    "height" =>560)
  
  ),
 
    'keyboard' => array(
      'type' => 'buttons',
      'buttons' => $sub_key
    )
  );
}
/*else if ( $text == "재학생 한마당" ) {
  $message = array(
    'message' => array('message_button' =>array(
      "label" => "크게 보기",
      "url" => "https://imgur.com/a/0yT0fH2"),
      'photo' => array(
    'url'=>"https://i.imgur.com/nzThwNt.png",
    "width"  => 320,
    "height" =>384)
  
  ),
 
    'keyboard' => array(
      'type' => 'buttons',
      'buttons' => $sub3_key
    )
  );
}
else if ( $text == "멘토링 멘토 모집" ) {
  $message = array(
    'message' => array('message_button' =>array(
      "label" => "크게 보기",
      "url" => "https://imgur.com/a/0yT0fH2"),
      'photo' => array(
    'url'=>"https://i.imgur.com/TGdW5Wt.png",
    "width"  => 320,
    "height" =>384)
  
  ),
 
    'keyboard' => array(
      'type' => 'buttons',
      'buttons' => $sub3_key
    )
  );
}*/
else if ( $text == "처음으로" ) {
  $message = array(
    'message' => array('text' => "처음으로 돌아갑니다."),
     //$notice, 이미지 주소 직접넣는거는 안뜸 .
 
    'keyboard' => array(
      'type' => 'buttons',
      'buttons' => $main_key
    )
  );
}


else if ( $text == "문의 사항" ) {
  $message = array(
    'message' => array('text' => "컴퓨터공학과 챗봇을 이용해 주셔서 감사합니다 문의사항은 [상담원으로 전환하기] 버튼 혹은 아래로 연락주시길 바랍니다\n\n☎학생회장 : 01057887729\n☎버그문의 카카오톡 ID : must1080"),
     //$notice, 이미지 주소 직접넣는거는 안뜸 .
 
    'keyboard' => array(
      'type' => 'buttons',
      'buttons' => $main_key
    )
  );
}
/*else if ( $text == "신입생 단톡방 안내" ) {
  $message = array(
    'message' => array('text' => "부경대학교 컴퓨터공학과 합격을 축하드립니다🤗\n다음 절차를 따라 주시길 바랍니다\n\n1. 아래의 [상담원으로 전환하기] 클릭\n2. 합격증명서(사진)\n   신분증 및 학생증(사진)\n   전화번호\n   카카오톡ID\n\n위 순서대로 보내주시면 신입생 단톡방에 초대해 드리겠습니다.\n\n다시한번 부경대학교 컴퓨터공학과에 합격하신 것을 축하드립니다😎"),
     //$notice, 이미지 주소 직접넣는거는 안뜸 .
 
    'keyboard' => array(
      'type' => 'buttons',
      'buttons' => $main_key
    )
  );
}*/
/*else if ( $text == "사물함 안내" ) {
  $message = array(
  
    'message' => array('text' => "[★ 2019-1학기 사물함 신청 ★ ]

* 기간 : 2019년 3월 4일(월) ~ 8일(금)
* 대상 : 사물함을 사용하고자 하는 재학생
* 방법 : 아래의 링크 접속 후 신청서 양식에 맞춰 신청

 - 신입생분들은 사물함 철거작업이 끝난 후 11일부터 사물함 사용이 가능합니다.

★ 자세한 내용은 포스터 참고

* 비고 : 
1) 기간내에 연장하지 않은 사물함은 철거
→ 철거 후 일주일간 과방에 짐 보관 후 폐기

2) 기간내에 신청하지 않은 경우 사물함 가장 마지막 배정",
'message_button' =>array(
      "label" => "신청하러 가기",
      "url" => "https://sites.google.com/view/01pkce"),
      'photo' => array(
    'url'=>"https://i.imgur.com/jP3zmU9.png",
    "width"  => 720,
    "height" =>1080)
  
  ),
 
    'keyboard' => array(
      'type' => 'buttons',
      'buttons' => $main_key
    )
  );
}*/
else if ( $text == "학과 일정 안내" ) {
  $message = array(
    'message' => array('text' => "부경대학교 컴퓨터공학과 신입생 여러분들의 진행 일정 예정입니다.\n\n2월 7일 : 신입생 환영회\n2월 15일 : 오리엔테이션\n2월 25일~27일 : 새내기 새로배움터\n\n모두 재미있고 신나는 대학생활을 위해 많이 노력하겠습니다.\n-컴퓨터공학과 학생회 일동-"),
     //$notice, 이미지 주소 직접넣는거는 안뜸 .
 
    'keyboard' => array(
      'type' => 'buttons',
      'buttons' => $sub2_key
    )
  );
}
/*else if ( $text == "신입생 환영회" ) {
  $message = array(
    'message' => array('text' => "신입생 환영회는\n\n일시 : 2월 7일 오후 3시\n장소 : A13 누리관(2호관) 1층 2125강의실\n\n에서 진행됩니다.\n강의실의 위치는 '돌아가기'버튼->'강의실 찾기'버튼을 통해 찾으실 수 있습니다."),
     //$notice, 이미지 주소 직접넣는거는 안뜸 .
 
    'keyboard' => array(
      'type' => 'buttons',
      'buttons' => $sub2_key
    )
  );
}
else if ( $text == "학생회 집부 면접 안내" ) {
   $message = array(
  
    'message' => array('text' => "지원해주셔서 감사합니다. 응시자들은 금일 오후 5시까지 A-13 2318 강의실로 와주시면 감사하겠습니다.",
'message_button' =>array(
      "label" => "신청하러 가기",
      "url" => "https://goo.gl/forms/JxZuqlL9M1zGWwAW2"),
      'photo' => array(
    'url'=>"https://i.imgur.com/69ICdJq.png",
    "width"  => 720,
    "height" =>1080)
  
  ),
 
    'keyboard' => array(
      'type' => 'buttons',
      'buttons' => $main_key
    )
  );
}
else if ( $text == "개강총회 안내" ) {
  $message = array(
    'message' => array('text' => "미정입니다."),
     //$notice, 이미지 주소 직접넣는거는 안뜸 .
 
    'keyboard' => array(
      'type' => 'buttons',
      'buttons' => $main_key
    )
  );
}
else if ( $text == "MT 안내" ) {
  $message = array(
    'message' => array('text' => "[컴퓨터공학과 MT 안내]\n- 일시 : 3월 30일 ~ 31일\n- 장소 : 송정해수욕장 명진 게스트하우스."),
     //$notice, 이미지 주소 직접넣는거는 안뜸 .
 
    'keyboard' => array(
      'type' => 'buttons',
      'buttons' => $sub2_key
    )
  );
}*/
else if ( $text == "돌아가기" ) {
  $message = array(
    'message' => array('text' => "이용해 주셔서 감사합니다. 처음 화면으로 돌아갑니다."),
     //$notice, 이미지 주소 직접넣는거는 안뜸 .
 
    'keyboard' => array(
      'type' => 'buttons',
      'buttons' => $main_key
    )
  );
}
else if ( !isset($message) ) { //주관식으로 질문이 들어왔을때 하는 대답 인듯.
   $message = array(
      'message' => array('text' => "오류입니다. 카톡 : must1080으로 문의주세용" ),
      'keyboard' => array(
         'type' => 'buttons',
         'buttons' => $main_key //다시 버튼으로 하는 대답으로 돌아감.
      )
   );
}


echo json_encode( $message );
// echo json_encode( $message, JSON_UNESCAPED_UNICODE );
// print_r($message);

?>
