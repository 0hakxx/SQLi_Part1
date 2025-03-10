<?php
header("Content-Type: text/html; charset=UTF-8");

// MySQL 데이터베이스 연결 설정
$db_conn = new mysqli("localhost", "root", "123456", "login_example");

// GET 방식으로 전달된 id 파라미터 받기
$id = $_GET["id"];

// id가 비어있지 않은 경우 실행
if(!empty($id)) {
    // member 테이블에서 입력받은 id와 일치하는 데이터 조회
    $query = "select * from member where id='{$id}'";
    $tmp = $db_conn->query($query);
    $flag = $tmp->num_rows;
    $user = $tmp->fetch_assoc();

    // 조회된 결과가 없는 경우
    if($flag == 0) {
        $msg = "<font color='blue'>아이디 '{$user['id']}' 아이디는 사용 가능 합니다.</font>";
        // 조회된 결과가 있는 경우 (이미 존재하는 아이디)
    } else {
        $msg = "<font color='red'>아이디 '{$user['id']}' 아이디는 사용 불가능 합니다.</font>";
    }
}
?>
<!-- ID 중복 체크를 위한 입력 폼 -->
<form action="id_check.php" method="GET">
    <input type="text" name="id"> <input type="submit" value="조회">
</form>
<hr>
<?=$msg?>
