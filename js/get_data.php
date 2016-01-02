<?php
	header("Content-Type:text/html; charset=utf-8");

	require_once 'connect_sql\sql_ap.php';

	//------------尋找會員資料庫---------------------------
	$db_selected = mysql_select_db("message_board_database");

	$sql =  'SELECT * FROM content'; //查詢content表單
	$result = mysql_query($sql,$cn) or die("查詢資料表錯誤");

	$count = mysql_num_rows($result);//計算取得資料的筆數，並回傳計算結果
									 //資料來源 https://www.dotblogs.com.tw/jhsiao/archive/2015/06/17/151582.aspx
	$total_fields=mysql_num_fields($result);// 取得資料欄位數

	//echo $count;
	//echo $total_fields;

	/*while($row=mysql_fetch_array($result)){
		$returnArray = array("Mcontent" => $row['Message_content'],"Mname" =>$row['name'] );
		echo json_encode($returnArray);
	}*/


	for ($i=0;$i<$count;$i++) {
	 	$row = mysql_fetch_assoc($result);
	 	$returnArray[$i] = array("content" => $row['Message_content'], "name" => $row['name']);
	 	$out = array_values($returnArray[$i]);
	 	echo json_encode($out);
	 } //將陣列以欄位名索引*/
  
    

	mysql_close($cn);
?>
