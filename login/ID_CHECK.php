<?php
header("Content-Type: text/html; charset=UTF-8");

$db_conn = new mysqli("localhost", "root", "123456", "login_example");

$id = $_GET["id"];

if(!empty($id)) {
    $query = "select * from member where id='{$id}'";
    $tmp = $db_conn->query($query);
    $flag = $tmp->num_rows;
    $user = $tmp->fetch_assoc();

    if($flag == 0) {
        $msg = "<font color='red'>아이디 '{$user['id']}' 아이디는 불가능 합니다.</font>";
    } else {
        $msg = "<font color='red'>아이디 '{$user['id']}' 아이디는 불가능 합니다.</font>";
    }
}
?>

    <form action="id_check.php" method="GET">
        <input type="text" name="id" /><input type="submit" value="조회" />
    </form>

    <br>
<?=$msg?>