<?php
/**
 * Created by PhpStorm.
 * User: Siro
 * Date: 2017-07-26
 * Time: 오후 9:16
 */
    $read = $_GET['hiddenNum'];
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
    $select = "select subject from board where board_id = ".$read;
    $selectView = mysql_query($select);
    //<--------------------------------------------------------------------------------------->
    while ($print = mysql_fetch_array($selectView)) {
        echo $print['subject'];
    };