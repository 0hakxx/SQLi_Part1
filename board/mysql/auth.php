<?php
// 공통 함수와 설정을 포함하는 파일을 불러옵니다.
include_once("../common.php");

// MySQL 데이터베이스 연결을 설정합니다.
$db_conn = mysql_conn();

// GET 또는 POST 요청에서 'mode'와 'idx' 파라미터를 가져옵니다.
$mode = $_REQUEST["mode"];
$idx = $_REQUEST["idx"];

// 'mode' 값에 따라 다른 페이지로 폼을 제출할 지 결정합니다.
if($mode == "view") {
    $page = "view.php";
} else if($mode == "delete") {
    $page = "action.php";
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>::CREHACKTIVE SIMPLE BOARD - MYSQL::</title>

    <!-- Bootstrap CSS 파일을 불러옵니다 -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- 사용자 정의 CSS 파일을 불러옵니다 -->
    <link href="../css/pricing.css" rel="stylesheet">
</head>

<body>
<!-- 페이지 헤더 -->
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Auth Page</h1>
    <hr>
</div>

<!-- 메인 컨테이너 -->
<div class="container">
    <!-- 인증 폼 -->
    <form action="<?=$page?>" method="POST">
        <div class="form-group ">
            <label>Password</label>
            <input type="password" class="form-control " name="password" placeholder="Password Input">
        </div>
        <div class="text-center">
            <!-- 히든 필드로 idx와 mode 값을 전달합니다 -->
            <input type="hidden" name="idx" value="<?=$idx?>">
            <input type="hidden" name="mode" value="<?=$mode?>">
            <button type="submit" class="btn btn-outline-info">Auth</button>
            <button type="button" class="btn btn-outline-danger" onclick="history.back(-1);">Back</button>
        </div>
    </form>
</div>

<!-- Feather 아이콘 라이브러리를 불러옵니다 -->
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
    feather.replace()
</script>

<!-- Bootstrap 관련 JavaScript 파일들을 불러옵니다 -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../js/jquery-slim.min.js"><\/script>')</script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/holder.min.js"></script>
<script>
    // Holder.js 테마 설정
    Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
    });
</script>
</body>
</html>
<?php
// 데이터베이스 연결을 닫습니다.
$db_conn->close();
?>
