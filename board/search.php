<?php
/**
 * Created by PhpStorm.
 * User: Siro
 * Date: 2017-07-27
 * Time: 오후 5:01
 */

    $select = $_POST['selectA'];
    $search = $_POST['search'];
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
    $sql = "select * from board where ".$select." && board_pid = 0 like '%$search%' order by reg_date desc limit 0, 5";
    $selectView = mysql_query($sql);
    //<--------------------------------------------------------------------------------------->
    while ($print = mysql_fetch_array($selectView)) {
        echo "<tr>
                    <td> $print[board_id] </td>
                    <td><a id='$print[board_id]' onclick='readPage(event)'>$print[subject]</a></td>
                    <td> $print[user_id] </td>
                    <td> $print[reg_date] </td>
                    <td>$print[hits]</td>
                </tr>";
    };

