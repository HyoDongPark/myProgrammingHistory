<?php
/**
 * Created by PhpStorm.
 * User: Siro
 * Date: 2017-07-27
 * Time: 오후 8:25
 */
    @session_start();
    if(!isset($_POST['is_ajax'])) exit;
    if(!isset($_POST['user_id'])) exit;
    if(!isset($_POST['user_pw'])) exit;
    $is_ajax=$_POST['is_ajax'];
    $user_id = $_POST['user_id'];
    $user_pw = $_POST['user_pw'];
    $temp_user_id = '';
    $temp_user_pw = '';
    $temp_user_na = '';
    //<--------------------------------------------------------------------------------------->
    define("HOST" , "localhost");
    define("USER" , "root");
    define("PASSWORD" , "autoset");
    define("DB_NAME" , "text_board");
    define("TABLE_NAME", "userinfo");
    //<--------------------------------------------------------------------------------------->
    @$db_con = mysql_connect(HOST , USER , PASSWORD);
    mysql_select_db(DB_NAME, $db_con);
    //<--------------------------------------------------------------------------------------->
    $select = "select * from userinfo where userid = '$user_id'";
    $selectView = mysql_query($select);
    //<--------------------------------------------------------------------------------------->
    while ($print = mysql_fetch_array($selectView)) {
        $temp_user_id = $print['userid'];
        $temp_user_pw = $print['password'];
        $temp_user_na = $print['username'];
    };
    //<--------------------------------------------------------------------------------------->
    if(!$is_ajax) exit;
    if(!isset($temp_user_id)) exit;
    if($temp_user_pw != $user_pw) exit;
    $_SESSION['user_id'] = $user_id;
    $_SESSION['user_name'] = $temp_user_na;
    echo "success";
?>

