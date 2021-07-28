<? 
	session_start(); 
	$table = "concert";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>포스코엠텍:뉴스게시판</title>

    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="./common/css/sub5common.css">
    <link rel="stylesheet" href="./css/list.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
        integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

    <script src="../common/js/prefixfree.min.js"></script>

    <!--[if IE 9]>  
          <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
    <![endif]-->
    <?
    @extract($_POST);
	@extract($_GET);
	@extract($_SESSION);

	include "../lib/dbconn.php";

	if (!$scale){
       $scale=10; 			// 한 화면에 표시되는 글 수
	}

    if ($mode=="search")
	{
		if(!$search)
		{
			echo("
				<script>
				 window.alert('검색할 단어를 입력해 주세요!');
			     history.go(-1);
				</script>
			");
			exit;
		}

		$sql = "select * from $table where $find like '%$search%' order by num desc";
	}
	else
	{
		$sql = "select * from $table order by num desc";
	}

	$result = mysql_query($sql, $connect);

	$total_record = mysql_num_rows($result); // 전체 글 수

	// 전체 페이지 수($total_page) 계산 
	if ($total_record % $scale == 0)     
		$total_page = floor($total_record/$scale);      
	else
		$total_page = floor($total_record/$scale) + 1; 
 
	if (!$page)                 // 페이지번호($page)가 0 일 때
		$page = 1;              // 페이지 번호를 1로 초기화
 
	// 표시할 페이지($page)에 따라 $start 계산  
	$start = ($page - 1) * $scale;      
	$number = $total_record - $start;
?>
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
                <p>News bulletin board</p>
           <ul>
               <li><a href="../greet/list.php">공지사항</a></li>
               <li class="current"><a href="./list.php">뉴스게시판</a></li>
               <li><a href="../sub5/sub5_3.html">채용정보</a></li>
           </ul>
       </div>

       <article id="content">
            <div class="title_area">
                <div class="line_map">
                HOME &gt; 고객센터 &gt; <strong>뉴스게시판</strong>
                </div>
                <h2>뉴스게시판</h2>
                <div class="line"></div>
            </div>
            <form  name="board_form" method="post" action="list.php?table=<?=$table?>&mode=search"> 
                <div id="list_search">
                    <div id="list_search3">
                        <select name="find" class="find">
                            <option value='subject'>제목</option>
                            <option value='content'>내용</option>
                            <option value='nick'>별명</option>
                            <option value='name'>이름</option>
                        </select></div>
                    <div id="list_search4"><input type="text" name="search" class="search_bar"></div>
                    <div id="list_search5"><input type="submit" value="검색" class="search5"></div>
                </div>
            </form>
            <div id="list_search1">▷ 총 <?= $total_record ?> 개의 게시물이 있습니다.  </div>
            <div class="scale_count">
		        <select name="scale" class="view" onchange="location.href='list.php?scale='+this.value">
                    <option value=''>보기</option>
                    <option value='1'>10</option>
                    <option value='2'>15</option>
                    <option value='20'>20</option>
                    <option value='30'>30</option>
                </select>
	    	</div>
            <div id="list_content">
<?		
   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
   {
      mysql_data_seek($result, $i);       
      // 가져올 레코드로 위치(포인터) 이동  
      $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	  $item_num     = $row[num];
	  $item_id      = $row[id];
	  $item_name    = $row[name];
  	  $item_nick    = $row[nick];
	  $item_hit     = $row[hit];
      $item_date    = $row[regist_day];
	  $item_date = substr($item_date, 0, 10);  
	  $item_subject = str_replace(" ", "&nbsp;", $row[subject]);

	  if(!$row[file_copied_0]){
        $thum_img = './data/default.jpg'; 
	  }else{
	  	$thum_img =$row[file_copied_0];  //첫번째 업로드된 이미지 파일  2021_07_22_11_00_35_0.jpg
	  	$thum_img = './data/'.$thum_img;  //   ./data/2021_07_22_11_00_35_0.jpg
	  }
?>
			<div id="list_item">
				<!-- <div id="list_item1"><?= $number ?></div> -->
				<div id="list_item2">
				   <a href="view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>">
				       <img class="list_img" src="<?=$thum_img?>" alt="" width="400" height="300">
                       <p><?= $item_subject ?></p>
                      
				  </a>
				</div>
				<div id="list_item4"><?= $item_date ?></div>
			</div>
<?
   	   $number--;
   }
?>
			<div id="page_button">
				<div id="page_num"> ◀ 이전 &nbsp;&nbsp;&nbsp;&nbsp; 
<?
   // 게시판 목록 하단에 페이지 링크 번호 출력
   for ($i=1; $i<=$total_page; $i++)
   {
		if ($page == $i)     // 현재 페이지 번호 링크 안함
		{
			echo "<b> $i </b>";
		}
		else
		{ 
			echo "<a href='list.php?table=$table&page=$i&scale=$scale'> $i </a>";
		}      
   }
?>			
			&nbsp;&nbsp;&nbsp;&nbsp;다음 ▶
				</div>
				<div id="button">
					<a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>&nbsp;
<? 
	if($userid)
	{
?>
		<a href="write_form.php?table=<?=$table?>">글쓰기</a>
<?
	}
?>
				</div>
			</div> <!-- end of page_button -->		
        </div> <!-- end of list content -->
        </article>

    <!-- 하단 푸터 영역 -->
    <? include "../common/sub_foot.html" ?>
        <!-- JQuery -->
        <script src="../common/js/jquery-1.12.4.js"></script>
    <script src="../common/js/jquery-migrate-1.4.1.js"></script>
    <script src="../common/js/fullnav.js"></script>
    <script src="./js/tab.js"></script>
</body>
</html>