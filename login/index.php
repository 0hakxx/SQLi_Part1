<?php
// 세션 시작
session_start();

// 문서 타입 설정: UTF-8 인코딩의 HTML
header("Content-Type: text/html; charset=UTF-8");

// 로그인 여부 확인
if (empty($_SESSION["id"])) {
    // 로그인되지 않은 경우 경고 메시지 출력 후 로그인 페이지로 리다이렉트
    echo "<script>
            alert('로그인 후 접근이 가능합니다.');
            location.href='login.php';
          </script>";
    exit(); // 스크립트 실행 종료
}

// 로그인된 사용자의 ID
$user_id = htmlspecialchars($_SESSION["id"], ENT_QUOTES, 'UTF-8');
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원 전용 페이지</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h3 {
            color: #333;
        }
        p {
            color: #666;
        }
        .logout-btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<div class="container">
    <h3>회원 전용 페이지입니다.</h3>
    <p><?php echo $user_id; ?>님 반갑습니다.</p>
    <button class="logout-btn" onclick="location.href='logout.php'">로그아웃</button>
</div>
</body>
</html>
