<?php
/**
 * Created by PhpStorm.
 * User: Siro
 * Date: 2017-07-28
 * Time: 오후 3:09
 */

    $read = $_POST['hide'];
    //<-------------------------------------------------------------------->
    define("HOST" , "localhost");
    define("USER" , "root");
    define("PASSWORD" , "autoset");
    define("DB_NAME" , "text_board");
    define("TABLE_NAME", "userinfo");
    //<--------------------------------------------------------------------------------------->
    @$db_con = mysql_connect(HOST , USER , PASSWORD);
    mysql_select_db(DB_NAME, $db_con);
    //<--------------------------------------------------------------------------------------->
    $select = "select user_id from board where board_id = ".$read;
    $selectView = mysql_query($select);

    while ($print = mysql_fetch_array($selectView)) {
        echo $print['user_id'];
    };