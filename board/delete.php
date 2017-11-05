<?php
/**
 * Created by PhpStorm.
 * User: Siro
 * Date: 2017-07-26
 * Time: 오후 7:14
 */
    $read = $_POST['hide'];
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
    $select = "delete from board where board_id = ".$read;
    echo $select;
    $selectView = mysql_query($select);

