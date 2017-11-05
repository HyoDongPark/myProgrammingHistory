<?php
    define("HOST" , "localhost");
    define("USER" , "root");
    define("PASSWORD" , "autoset");
    define("DB_NAME" , "text_board");
    define("TABLE_NAME", "board");
    //<--------------------------------------------------------------------------------------->
    $coment_Number = 0;
    $UserID = $_POST['hidden_id'];
    $UserName = $_POST['hidden_userName'];
    $title = $_POST['title'];
    $contents = $_POST['contents'];
    //<--------------------------------------------------------------------------------------->
    $hits = 0;
    $Current_time = date("Y-m-d H:i:s");
    //<--------------------------------------------------------------------------------------->
    //$contents = str_replace("\n" , "<br />" , $contents);
    @$db_con = mysql_connect(HOST , USER , PASSWORD);
    mysql_select_db(DB_NAME, $db_con);
    //<--------------------------------------------------------------------------------------->
    $query = "insert into board (board_id,board_pid,user_id, user_name, subject, contents, hits , reg_date) values ('','$coment_Number','$UserID' ,'$UserName' ,'$title' ,'$contents' , '$hits' , '$Current_time')";
    mysql_query($query);
    //<--------------------------------------------------------------------------------------->



