<? 
	session_start();
	
	@extract($_POST);
	@extract($_GET);
	@extract($_SESSION);

	/*
		$_SESSION['userid']
		$_SESSION['username']
		$_SESSION['usernick']
		$_SESSION['userlevel']

		$num=1  (나야나~~~~~)
        $page=1
	*/

	include "../lib/dbconn.php";

	$sql = "select * from greet where num=$num";
	$result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	$item_num     = $row[num];
	$item_id      = $row[id];
	$item_name    = $row[name];
  	$item_nick    = $row[nick];
	$item_hit     = $row[hit];

    $item_date    = $row[regist_day];

	$item_subject = str_replace(" ", "&nbsp;", $row[subject]);

	$item_content = $row[content];
	$is_html      = $row[is_html];

	if ($is_html!="y")
	{
		$item_content = str_replace(" ", "&nbsp;", $item_content);
		$item_content = str_replace("\n", "<br>", $item_content);
	}	

	$new_hit = $item_hit + 1;

	$sql = "update greet set hit=$new_hit where num=$num";   // 글 조회수 증가시킴
	mysql_query($sql, $connect);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>포스코엠텍:공지사항</title>

    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="./common/css/sub5common.css">
    <link rel="stylesheet" href="./css/view.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
        integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

    <script src="../common/js/prefixfree.min.js"></script>
    <script>
    function del(href) 
        {
            if(confirm("한번 삭제한 자료는 복구할 방법이 없습니다.\n\n정말 삭제하시겠습니까?")) {
                    document.location.href = href; //'delete.php?num=1'
            }
        }
    </script>
    <!--[if IE 9]>  
          <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
    <![endif]-->
</head>
<body>
    <div class="wrap">
        <!-- 상단 헤더 영역 -->
<? include "../common/sub_head.html" ?>
       
       <div class="visual">
            <img src="./common/images/visual.jpg" alt="">
       </div>
       
       <div class="sub_menu">
                <h3>고객센터</h3>
                <p>Customer Bulletin</p>
           <ul>
               <li class="current"><a href="list.php">공지사항</a></li>
               <li><a href="../concert/list.php">뉴스게시판</a></li>
               <li><a href="../sub5/sub5_3.html">채용정보</a></li>
           </ul>
       </div>

       <article id="content">
            <div class="title_area">
                <div class="line_map">
                HOME &gt; 고객센터 &gt; <strong>공지사항</strong>
                </div>
                <h2>공지사항</h2>
                <div class="line"></div>
            </div>
            <div id="view_title">
                <div id="view_title1"><?= $item_subject ?></div>
                <div id="view_title2"><?= $item_nick ?> |  <?= $item_date ?>  
                                    | 조회 : <?= $item_hit ?> </div>	
            </div>

		<div id="view_content">
			<?= $item_content ?>
		</div>

		<div id="view_button">
				<a href="list.php?page=<?=$page?>">목록</a>&nbsp;
<? 
	if($userid==$item_id || $userlevel==1 || $userid=="master")
	{
?>
				<a href="modify_form.php?num=<?=$num?>&page=<?=$page?>">수정</a>&nbsp;
				<a href="javascript:del('delete.php?num=<?=$num?>')">삭제</a>&nbsp;
<?
	}
?>

<? 
	if($userid )
	{
?>
				<a href="write_form.php">글쓰기</a>
<?
	}
?>
		</div>

    </article>

    <!-- 하단 푸터 영역 -->
    <? include "../common/sub_foot.html" ?>

</body>
</html>