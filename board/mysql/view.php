<?php
// 공통 파일 포함
include_once("../common.php");

// 데이터베이스 연결
$db_conn = mysql_conn();
// URL 파라미터에서 게시글 인덱스 가져오기
$idx = $_REQUEST["idx"];
// POST 요청에서 비밀번호 가져오기
$password = $_POST["password"];

// 비밀번호가 없으면 공개 게시글만 조회
if(empty($password)) {
    $query = "select * from {$tb_name} where idx={$idx} and secret='n'";
} else {
    // 비밀번호가 있으면 해당 비밀번호로 게시글 조회
    $query = "select * from {$tb_name} where idx={$idx} and password='{$password}'";
}

// 쿼리 실행
$result = $db_conn->query($query) or die($db_conn->error);
// 결과 행 수 가져오기
$num = $result->num_rows;
?>
<!doctype html>
<html lang="en">
<head>
    <!-- 메타 태그 및 타이틀 설정 -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>::CREHACKTIVE SIMPLE BOARD - MYSQL::</title>

    <!-- Bootstrap CSS 및 커스텀 CSS 파일 로드 -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/pricing.css" rel="stylesheet">
</head>

<body>
<!-- 페이지 헤더 -->
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">View Page</h1>
    <hr>
</div>

<div class="container">
    <?php
    // 조회된 게시글이 있는 경우
    if($num != 0) {
    $row = $result->fetch_assoc();
    ?>
    <!-- 게시글 내용 테이블 -->
    <table class="table table-bordered">
        <tbody>
        <tr>
            <th scope="row" width="20%" class="text-center">Title</th>
            <td><?=$row["title"]?></td>
        </tr>
        <tr>
            <th scope="row" width="20%" class="text-center">Writer</th>
            <td><?=$row["writer"]?></td>
        </tr>
        <tr>
            <th scope="row" width="20%" class="text-center">Date</th>
            <td><?=$row["regdate"]?></td>
        </tr>
        <tr>
            <th scope="row" width="20%" class="text-center">Contents</th>
            <td><?=$row["content"]?></td>
        </tr>
        </tbody>
    </table>
    <!-- 버튼 그룹 -->
    <div class="text-right">
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='modify.php?idx=<?=$row["idx"]?>'">Modify</button>
        <button type="button" class="btn btn-outline-danger" onclick="location.href='auth.php?mode=delete&idx=<?=$row["idx"]?>'">Delete</button>
        <button type="button" class="btn btn-outline-warning" onclick="location.href='index.php'">List</button>
    </div>
</div>
<?php
} else {
    // 조회된 게시글이 없는 경우
    ?>
    <script>alert("존재하지 않는 게시글 입니다.");history.back(-1);</script>
    <?php
}
?>
<!-- JavaScript 라이브러리 로드 -->
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
