<?php
/**
 * Created by PhpStorm.
 * User: Siro
 * Date: 2017-07-27
 * Time: 오후 3:53
 */
    define("HOST" , "localhost");
    define("USER" , "root");
    define("PASSWORD" , "autoset");
    define("DB_NAME" , "text_board");
    define("TABLE_NAME", "board");
    $board_id = $_POST['hiddenNum'];
    $subjects = $_POST['subjects'];
    $contents = $_POST['contents'];
    //<--------------------------------------------------------------------------------------->
    $hits = 0;
    $Current_time = date("Y-m-d H:i:s");
    //$contents = str_replace("\n" , "<br />" , $contents);
    //<--------------------------------------------------------------------------------------->
    @$db_con = mysql_connect(HOST , USER , PASSWORD);
    mysql_select_db(DB_NAME, $db_con);
    //<--------------------------------------------------------------------------------------->
    $query = "update board set subject = '$subjects' , contents = '$contents' , reg_date = '$Current_time' where board_id = '$board_id'";
    mysql_query($query);
    //<--------------------------------------------------------------------------------------->