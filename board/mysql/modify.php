<?php
// 공통 파일 포함
include_once("../common.php");

// 데이터베이스 연결
$db_conn = mysql_conn();
// GET 요청으로 받은 게시글 인덱스
$idx = $_GET["idx"];

// 해당 인덱스의 게시글 정보를 조회하는 쿼리
$query = "select * from {$tb_name} where idx={$idx}";

// 쿼리 실행 및 오류 처리
$result = $db_conn->query($query) or die($db_conn->error);
// 결과 행 수 확인
$num = $result->num_rows;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>::CREHACKTIVE SIMPLE BOARD - MYSQL::</title>

    <!-- Bootstrap CSS 파일 연결 -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- 사용자 정의 CSS 파일 연결 -->
    <link href="../css/pricing.css" rel="stylesheet">
</head>

<body>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Modify Page</h1>
    <hr>
</div>
<?php
// 게시글이 존재하는 경우
if($num != 0) {
    // 게시글 정보 가져오기
    $row = $result->fetch_assoc();
    ?>
    <div class="container">
        <form action="action.php" method="POST">
            <div class="form-group">
                <label>Title</label>
                <!-- 제목 입력 필드, 기존 제목 표시 -->
                <input type="text" class="form-control" name="title" placeholder="Title Input" value="<?=$row["title"]?>">
            </div>
            <div class="form-group">
                <label>Writer</label>
                <!-- 작성자 입력 필드, 기존 작성자 표시 -->
                <input type="text" class="form-control" name="writer" placeholder="Writer Input" value="<?=$row["writer"]?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <!-- 비밀번호 입력 필드 -->
                <input type="password" class="form-control" name="password" placeholder="Password Input">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Contents</label>
                <!-- 내용 입력 필드, 기존 내용 표시 -->
                <textarea class="form-control" name="content" rows="5" placeholder="Contents Input"><?=$row["content"]?></textarea>
            </div>
            <div class="custom-control custom-checkbox">
                <!-- 비밀글 설정 체크박스, 기존 설정 반영 -->
                <input type="checkbox" class="custom-control-input" id="customCheck1" name="secret" <?php if($row["secret"]=="y") echo "checked"; ?>>
                <label class="custom-control-label" for="customCheck1">Secret Post</label>
            </div>
            <div class="text-right">
                <!-- 게시글 인덱스와 수정 모드를 hidden 필드로 전송 -->
                <input type="hidden" name="idx" value="<?=$row["idx"]?>">
                <input type="hidden" name="mode" value="modify">
                <button type="submit" class="btn btn-outline-secondary">Modify</button>
                <button type="button" class="btn btn-outline-danger" onclick="history.back(-1);">Back</button>
            </div>
        </form>
    </div>
<?php
} else {
// 게시글이 존재하지 않는 경우
?>
    <script>alert("존재하지 않는 게시글 입니다.");history.back(-1);</script>
    <?php
}
?>
<!-- Icons -->
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
    feather.replace()
</script>
<!-- Bootstrap core JavaScript -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../js/jquery-slim.min.js"><\/script>')</script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/holder.min.js"></script>
<script>
    Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
    });
</script>
</body>
</html>
<?php
// 데이터베이스 연결 종료
$db_conn->close();
?>
