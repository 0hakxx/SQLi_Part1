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
<!-- 페이지 헤더 -->
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Write Page</h1>
    <hr>
</div>

<!-- 메인 컨테이너 -->
<div class="container">
    <!-- 글쓰기 폼 시작 -->
    <form action="action.php" method="POST">
        <!-- 제목 입력 필드 -->
        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" name="title" placeholder="Title Input">
        </div>
        <!-- 작성자 입력 필드 -->
        <div class="form-group">
            <label>Writer</label>
            <input type="text" class="form-control" name="writer" placeholder="Writer Input">
        </div>
        <!-- 비밀번호 입력 필드 -->
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password Input">
        </div>
        <!-- 내용 입력 필드 -->
        <div class="form-group">
            <label for="exampleInputPassword1">Contents</label>
            <textarea class="form-control" name="content" rows="5" placeholder="Contents Input"></textarea>
        </div>
        <!-- 비밀글 설정 체크박스 -->
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="customCheck1" name="secret">
            <label class="custom-control-label" for="customCheck1">Secret Post</label>
        </div>

        <!-- 폼 제출 및 뒤로가기 버튼 -->
        <div class="text-right">
            <input type="hidden" name="mode" value="write">
            <button type="submit" class="btn btn-outline-secondary">Write</button>
            <button type="button" class="btn btn-outline-danger" onclick="history.back(-1);">Back</button>
        </div>
    </form>
    <!-- 글쓰기 폼 끝 -->
</div>

<!-- Feather 아이콘 라이브러리 스크립트 -->
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
    feather.replace()
</script>

<!-- Bootstrap 핵심 JavaScript -->
<!-- 페이지 로딩 속도를 높이기 위해 문서 끝에 배치 -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../js/jquery-slim.min.js"><\/script>')</script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/holder.min.js"></script>
<!-- Holder.js 테마 설정 -->
<script>
    Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
    });
</script>
</body>
</html>
