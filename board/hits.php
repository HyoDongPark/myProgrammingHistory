<?php
/**
 * Created by PhpStorm.
 * User: Siro
 * Date: 2017-07-27
 * Time: 오후 7:26
 */
    $num = $_POST['hideValue'];
    $temp = 0;
    //<-------------------------------------------------------------------->
    define("HOST" , "localhost");
    define("USER" , "root");
    define("PASSWORD" , "autoset");
    define("DB_NAME" , "text_board");
    define("TABLE_NAME", "board");
    //<--------------------------------------------------------------------------------------->
    @$db_con = mysql_connect(HOST , USER , PASSWORD);
    mysql_select_db(DB_NAME, $db_con);
    //<--------------------------------------------------------------------------------------->
    $select = "select hits from board where board_id = ".$num;
    $selectView = mysql_query($select);
    //<--------------------------------------------------------------------------------------->
    while ($print = mysql_fetch_array($selectView)) {
        $temp = $print['hits'];
    };
    //<--------------------------------------------------------------------------------------->
    $temp++;
    $select = "update board set hits = ".$temp." where board_id = ".$num;
    $selectView = mysql_query($select);
    //<--------------------------------------------------------------------------------------->
    $select = "select board_id , subject , user_id , reg_date , hits from board where board_pid = 0 order by reg_date desc limit 0, 5";
    $selectView = mysql_query($select);
    //<--------------------------------------------------------------------------------------->