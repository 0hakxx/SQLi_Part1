<?php
include_once("../common.php");
// SQL 관련 오류만 표시하도록 설정
error_reporting(E_ERROR | E_PARSE);
ini_set('display_errors', 1);

// 데이터베이스 연결
$db_conn = mysql_conn();

# 검색 로직
$search_type = $_POST["search_type"];
$keyword = $_POST["keyword"];

// 검색 조건에 따른 쿼리 생성
if(empty($search_type) && empty($keyword)) {
    $query = "select * from {$tb_name}";
} else {
    if($search_type == "all") {
        $query = "select * from {$tb_name} where title like '%{$keyword}%' or writer like '%{$keyword}%' or content like '%{$keyword}%'";
    } else {
        $query = "select * from {$tb_name} where {$search_type} like '%{$keyword}%'";
    }
}

# 정렬 로직
$sort = $_GET["sort"];
$sort_column = $_GET["sort_column"];

// 정렬 조건 추가
if(empty($sort_column) && empty($sort)) {
    $query .= " order by idx desc";
} else {
    $query .= " order by {$sort_column} {$sort}";
}

// 쿼리 실행
$result = $db_conn->query($query) or die($db_conn->error);
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

    <!-- Bootstrap CSS 및 커스텀 CSS 로드 -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/pricing.css" rel="stylesheet">
</head>

<body>
<!-- 헤더 섹션 -->
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">MYSQL SIMPLE BOARD</h1>
    <hr>
</div>

<div class="container">
    <!-- 글쓰기 버튼 -->
    <div class="text-right">
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='write.php'">Write</button>
    </div>
    <br>
    <!-- 게시글 목록 테이블 -->
    <table class="table">
        <thead class="thead-light">
        <tr>
            <!-- 각 열에 정렬 링크 추가 -->
            <th width="10%" scope="col" class="text-center"><a href="index.php?sort_column=idx&sort=desc" class="stretched-link text-dark">No</a></th>
            <th width="50%" scope="col" class="text-center"><a href="index.php?sort_column=title&sort=desc" class="stretched-link text-dark">Title</a></th>
            <th width="20%" scope="col" class="text-center"><a href="index.php?sort_column=writer&sort=desc" class="stretched-link text-dark">Write</a></th>
            <th width="20%" scope="col" class="text-center"><a href="index.php?sort_column=regdate&sort=desc" class="stretched-link text-dark">Date</a></th>
        </tr>
        </thead>
        <tbody>
        <?php
        if($num != 0) {
            // 게시글이 있을 경우 목록 출력
            for ( $i=0; $i<$num; $i++ ) {
                $row = $result->fetch_assoc();
                ?>
                <tr>
                    <th scope="row" class="text-center"><?=$row["idx"]?></th>
                    <?php if($row["secret"]=="y") { ?>
                        <!-- 비밀글일 경우 자물쇠 아이콘 표시 및 인증 페이지로 링크 -->
                        <td><span style="display:inline-block; height:15px; width:15px;" data-feather="lock"></span>&nbsp;<a href="auth.php?idx=<?=$row["idx"]?>&mode=view"><?=$row["title"]?></a></td>
                    <?php } else { ?>
                        <!-- 일반 글일 경우 바로 view 페이지로 링크 -->
                        <td><a href="view.php?idx=<?=$row["idx"]?>"><?=$row["title"]?></a></td>
                    <?php } ?>
                    <td class="text-center"><?=$row["writer"]?></td>
                    <td class="text-center"><?=$row["regdate"]?></td>
                </tr>
                <?php
            }
        } else {
            // 게시글이 없을 경우 메시지 출력
            ?>
            <tr>
                <td colspan="4" class="text-center">Posts does not exist.</td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>

    <!-- 검색 폼 -->
    <form action="index.php" method="POST">
        <div class="input-group mb-3">
            <div class="col-auto my-1">
                <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">search</label>
                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="search_type">
                    <option value="all" selected>All</option>
                    <option value="title">title</option>
                    <option value="writer">writer</option>
                    <option value="content">content</option>
                </select>
            </div>
            <input type="text" class="form-control" placeholder="Keyword Input" name="keyword">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </div>
    </form>
</div>
<!-- Feather 아이콘 스크립트 -->
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
    feather.replace()
</script>
<!-- Bootstrap 관련 JavaScript 파일 로드 -->
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
