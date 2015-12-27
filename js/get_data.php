<?php
	header("Content-Type:text/html; charset=utf-8");

	require_once 'connect_sql\sql_ap.php';

	//------------尋找會員資料庫---------------------------
	$db_selected = mysql_select_db("message_board_database");

	$sql =  'SELECT * FROM content'; //查詢content表單
	$result = mysql_query($sql,$cn) or die("查詢資料表錯誤");

	$count = mysql_num_rows($result);//計算取得資料的筆數，並回傳計算結果
									 //資料來源 https://www.dotblogs.com.tw/jhsiao/archive/2015/06/17/151582.aspx

	while($row=mysql_fetch_array($result)){

		$returnArray = array($row['Message_content'],
							 $row['name']
							 );

	}
	echo json_encode($returnArray);

	mysql_close($cn);
?>
