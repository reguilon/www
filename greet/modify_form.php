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
		$page=2
	*/
	
	include "../lib/dbconn.php";

	$sql = "select * from greet where num=$num";
	$result = mysql_query($sql, $connect);

	$row = mysql_fetch_array($result);       	
	$item_subject     = $row[subject];
	$item_content     = $row[content];
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
    <link rel="stylesheet" href="./css/write_form.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
        integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

    <script src="../common/js/prefixfree.min.js"></script>

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
            <form  name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>"> 
		<div id="write_form">
			<div class="write_line"></div>
			<div id="write_row1">
				<div class="col1"> 닉네임 </div>
				<div class="col2"><?=$usernick?></div>
			</div>
			<div class="write_line"></div>
			<div id="write_row2"><div class="col1"> 제목   </div>
			                     <div class="col2"><input type="text" name="subject" value="<?=$item_subject?>" ></div>
			</div>
			<div class="write_line"></div>
			<div id="write_row3"><div class="col1"> 내용   </div>
			                     <div class="col2"><textarea rows="15" cols="79" name="content"><?=$item_content?></textarea></div>
			</div>
			<div class="write_line"></div>
		</div>

		<div id="write_button"><input type="submit" value="확인">&nbsp;
			<a href="list.php?page=<?=$page?>">목록</a>
		</div>
		</form>

    </article>

    <!-- 하단 푸터 영역 -->
    <? include "../common/sub_foot.html" ?>

</body>
</html>