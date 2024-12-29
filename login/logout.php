<?php
    // 로그아웃 처리를 위한 PHP 파일
    // 세션 시작
    @session_start();

    // 'id' 세션 변수 제거
    unset($_SESSION["id"]);

    // 모든 세션 데이터 삭제
    session_destroy();

    // 로그인 페이지로 리다이렉트하기 위한 JavaScript 코드 출력
    echo "<script>location.href='login.php'</script>";
?>
