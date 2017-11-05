<?php
/**
 * Created by PhpStorm.
 * User: Siro
 * Date: 2017-07-28
 * Time: 오전 10:47
 */
    $search = $_POST['hidden_id'];
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
    $sql = "select username from userinfo where userid = '$search'";
    $selectView = mysql_query($sql);
    //<--------------------------------------------------------------------------------------->
    while ($print = mysql_fetch_array($selectView)) {
        echo $print['username'];
    };