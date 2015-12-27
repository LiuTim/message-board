<?php
	header("Content-Type:text/html; charset=utf-8");

	require_once 'connect_sql\sql_ap.php';

	//------------建立資料庫與資料表------------------

	if(mysql_select_db("mysql")){
       $newdb='create database Message_board_database';
       mysql_query($newdb, $cn);
    }
    if(mysql_select_db("Message_board_database")){
        $album_db="create table content(name varchar(20),
										Message_content varchar(50)
										)";                                                                   
        mysql_query($album_db);
    }

    //------------讀取Cookie內容-----------------------------
    $user_name =  $_COOKIE["Cookie_name"]; 
 	$user_message = $_COOKIE["Cookie_message"];

 	//-----------搜尋資料庫----------------------------------
 	$sql = "SELECT * FROM content";
 	$result = mysql_query($sql,$cn);
    $row = mysql_fetch_row($result);

 	//-----------寫入資料庫----------------------------------
 	$sql="INSERT INTO content(name,Message_content)
			 VALUES('$user_name','$user_message')";
	mysql_query($sql,$cn);

	//-----------關閉資料庫連結----------------------------------
	mysql_close($cn);

 	//$str_info = explode(",",$cookie_info); //以逗號將Cookie資料取出
	//print_r($str_info) ; //印出陣列資料
	
	

?>
