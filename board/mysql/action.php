<?php
// UTF-8 인코딩 설정
header("Content-Type: text/html; charset=UTF-8");
// 공통 PHP 파일 포함
include ( '../common.php' );

// GET 또는 POST로 전달된 'mode' 파라미터 가져오기
$mode = $_REQUEST["mode"];
// 데이터베이스 연결
$db_conn = mysql_conn();

// 글 작성 모드
if($mode == "write") {
    // POST로 전달된 데이터 가져오기
    $title = $_POST["title"];
    $writer = $_POST["writer"];
    $password = $_POST["password"];
    $content = $_POST["content"];
    $secret = $_POST["secret"];

    // 필수 필드 검사
    if(empty($title) || empty($writer) || empty($password) || empty($content)) {
        echo "<script>alert('빈칸이 존재합니다.');history.back(-1);</script>";
        exit();
    }

    // 비밀글 설정
    if($secret == "on") {
        $secret = "y";
    } else {
        $secret = "n";
    }

    // 줄바꿈 처리
    $content = str_replace("\r\n", "<br>", $content);

    // 데이터베이스에 글 삽입
    $query = "insert into {$tb_name}(title, writer, password, content, secret, regdate) values('{$title}', '{$writer}', '{$password}', '{$content}', '{$secret}', now())";
    $db_conn->query($query) or die($db_conn->error);
}
// 글 수정 모드
else if($mode == "modify") {
    // POST로 전달된 데이터 가져오기
    $idx = $_POST["idx"];
    $title = $_POST["title"];
    $writer = $_POST["writer"];
    $password = $_POST["password"];
    $content = $_POST["content"];
    $secret = $_POST["secret"];

    // 필수 필드 검사
    if(empty($idx) || empty($title) || empty($writer) || empty($password) || empty($content)) {
        echo "<script>alert('빈칸이 존재합니다.');history.back(-1);</script>";
        exit();
    }

    // 비밀번호 확인
    $query = "select * from {$tb_name} where idx={$idx} and password='{$password}'";
    $result = $db_conn->query($query);
    $num = $result->num_rows;

    if($num == 0) {
        echo "<script>alert('패스워드가 일치하지 않습니다.');history.back(-1);</script>";
        exit();
    }

    // 비밀글 설정
    if($secret == "on") {
        $secret = "y";
    } else {
        $secret = "n";
    }

    // 줄바꿈 처리
    $content = str_replace("\r\n", "<br>", $content);

    // 데이터베이스에서 글 수정
    $query = "update {$tb_name} set title='{$title}', writer='{$writer}', content='{$content}', secret='{$secret}', regdate=now() where idx={$idx}";
    $db_conn->query($query) or die($db_conn->error);
}
// 글 삭제 모드
else if($mode == "delete") {
    // POST로 전달된 데이터 가져오기
    $idx = $_POST["idx"];
    $password = $_POST["password"];

    // 비밀번호 확인
    $query = "select * from {$tb_name} where idx={$idx} and password='{$password}'";
    $result = $db_conn->query($query);
    $num = $result->num_rows;

    if($num == 0) {
        echo "<script>alert('패스워드가 일치하지 않습니다.');history.back(-1);</script>";
        exit();
    }

    // 데이터베이스에서 글 삭제
    $query = "delete from {$tb_name} where idx={$idx}";
    $db_conn->query($query) or die($db_conn->error);
}

// 작업 완료 후 인덱스 페이지로 리다이렉트
echo "<script>location.href='index.php';</script>";
// 데이터베이스 연결 종료
$db_conn->close();
?>
