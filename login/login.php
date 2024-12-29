<?php
// 세션 시작
@session_start();
// 문서 타입을 UTF-8 인코딩의 HTML로 설정
header("Content-Type: text/html; charset=UTF-8");
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <!-- 반응형 디자인을 위한 뷰포트 메타 태그 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>
    <style>
        /* 전체 페이지 스타일 */
        body {
            font-family: Arial, sans-serif; /* 기본 폰트 설정 */
            background-color: #f0f2f5; /* 배경색 설정 */
            display: flex; /* flexbox 레이아웃 사용 */
            justify-content: center; /* 가로 중앙 정렬 */
            align-items: center; /* 세로 중앙 정렬 */
            height: 100vh; /* 뷰포트 높이의 100%로 설정 */
            margin: 0; /* 기본 마진 제거 */
        }

        /* 로그인 컨테이너 스타일 */
        .login-container {
            background-color: white; /* 배경색을 흰색으로 설정 */
            padding: 2rem; /* 내부 여백 설정 */
            border-radius: 8px; /* 모서리 둥글게 처리 */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* 그림자 효과 추가 */
        }

        /* 제목 스타일 */
        h3 {
            color: #1877f2; /* 제목 색상 설정 (Facebook 블루) */
            text-align: center; /* 중앙 정렬 */
            margin-bottom: 1.5rem; /* 하단 여백 추가 */
        }

        /* 폼 스타일 */
        form {
            display: flex;
            flex-direction: column; /* 세로 방향으로 요소 배치 */
        }

        /* 입력 그룹 스타일 */
        .input-group {
            margin-bottom: 1rem; /* 하단 여백 추가 */
        }

        /* 라벨 스타일 */
        label {
            display: block; /* 블록 레벨 요소로 설정 */
            margin-bottom: 0.5rem; /* 하단 여백 추가 */
            color: #606770; /* 라벨 색상 설정 */
        }

        /* 텍스트 및 비밀번호 입력 필드 스타일 */
        input[type="text"], input[type="password"] {
            width: 100%; /* 너비를 100%로 설정 */
            padding: 0.5rem; /* 내부 여백 설정 */
            border: 1px solid #dddfe2; /* 테두리 설정 */
            border-radius: 6px; /* 모서리 둥글게 처리 */
            font-size: 1rem; /* 폰트 크기 설정 */
        }

        /* 제출 버튼 스타일 */
        input[type="submit"] {
            background-color: #1877f2; /* 배경색 설정 (Facebook 블루) */
            color: white; /* 텍스트 색상을 흰색으로 설정 */
            border: none; /* 테두리 제거 */
            padding: 0.75rem; /* 내부 여백 설정 */
            border-radius: 6px; /* 모서리 둥글게 처리 */
            font-size: 1.1rem; /* 폰트 크기 설정 */
            cursor: pointer; /* 마우스 오버 시 커서 변경 */
            transition: background-color 0.3s; /* 배경색 변경 시 부드러운 전환 효과 */
        }

        /* 제출 버튼 호버 효과 */
        input[type="submit"]:hover {
            background-color: #166fe5; /* 호버 시 배경색 변경 */
        }
    </style>
</head>
<body>
<div class="login-container">
    <h3>로그인</h3>
    <!-- 로그인 폼 시작 -->
    <form action="loginAction.php" method="POST">
        <div class="input-group">
            <label for="id">아이디</label>
            <!-- 아이디 입력 필드 -->
            <input type="text" id="id" name="id" required>
        </div>
        <div class="input-group">
            <label for="pw">비밀번호</label>
            <!-- 비밀번호 입력 필드 -->
            <input type="password" id="pw" name="pw" required>
        </div>
        <!-- 로그인 버튼 -->
        <input type="submit" value="로그인">
    </form>
    <!-- 로그인 폼 끝 -->
</div>
</body>
</html>
