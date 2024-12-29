<?php
    // 세션 시작
    @session_start();
    // UTF-8 인코딩 설정
    header("Content-Type: text/html; charset=utf-8");

    // MySQL 데이터베이스 연결
    // localhost: 호스트명, root: 사용자명, crehacktive: 비밀번호, login_example: 데이터베이스명
    $db_conn = new mysqli("localhost", "root", "123456", "login_example");

    // POST 방식으로 전달된 id와 pw 값 가져오기
    $id = $_POST["id"];  // 사용자가 입력한 아이디
    $pw = md5($_POST["pw"]);  // 사용자가 입력한 비밀번호를 MD5로 암호화

    // member 테이블에서 입력받은 id와 pw가 일치하는 데이터 조회
    $query = "select * from member where id='{$id}' and pw='{$pw}'";
    $tmp = $db_conn->query($query);

    // 조회된 행의 개수 확인
    $cnt = $tmp->num_rows;
    // 결과 데이터 가져오기
    $user = $tmp->fetch_assoc();

    // 로그인 실패 시 처리
    if($cnt == 0) {
        // 실패 메시지 출력 후 이전 페이지로 이동
        echo "<script>alert('아이디 혹은 패스워드가 일치하지않습니다.');</script>";
        exit();
    }

    // 로그인 성공 시 세션에 사용자 ID 저장
    $_SESSION["id"] = $user["id"];

    // 메인 페이지로 리다이렉트
    echo "<script>location.href='index.php';</script>";
?>
