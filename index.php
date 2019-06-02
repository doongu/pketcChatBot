<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

# 시간설정
date_default_timezone_set('Asia/Seoul');

# url
$url = isset($_GET['id']) ? $_GET['id'] : '';
$url = explode('/', $url);
$page = $url[ 0 ];
$method = $_SERVER['REQUEST_METHOD'];

# page
switch ( $page ) {
	case "keyboard":
		if ( $method !== "GET" ) { exit( "Method is not valid" ); }
		require "{$page}.php";
		break;
	case "message":
		if ( $method !== "POST" ) { exit( "Method is not valid" ); }
		require "{$page}.php";
		break;
	case "friend":
		if ( $method === "POST" || $method === "DELETE" ) {
			// bot_room( $method, $user_key, 'friend' );
		} else {
			exit( "Method is not valid" );
		}
		break;
	case "chat_room":
		if ( $method === "DELETE" ) {
			// bot_room( $method, $user_key, 'chat_room' );
		} else {
			exit( "Method is not valid" );
		}
		break;
	default:
		exit( "Page not requested" );
}
?>