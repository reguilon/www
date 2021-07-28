<? session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>
    <link rel="stylesheet" href="css/login.css">
    <script src="https://kit.fontawesome.com/f8a0f5a24e.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="article">
        <form  name="member_form" method="post" action="login.php"> 
            <span class="log_in">로그인</span>
            <a href="../index.html">
                <img src="../common/images/logo.png" alt="logo">
            </a>
            <div class="line"></div>
            <div id="id_pw_input">
                <ul>
                    <li><input type="text" name="id" class="login_input" required placeholder="아이디를 입력해주세요. (영문/숫자만 가능)"></li>
                    <li><input type="password" name="pass" class="login_input" required placeholder="비밀번호 입력해주세요."></li>
                </ul>						
            </div>
            <div id="login_button">
                <button type="submit"> 로그인 </button>
            </div>
            <span id="loadtext"></span>
                
            
            <ul class="find">
                <li><i class="fas fa-lock"></i>보안접속</li>
                <li>
                    <span><a href="id_find.php">아이디 찾기</a></span>
                    <span><a href="pw_find.php">비밀번호 찾기</a></span>
			    </li>
            </ul>
            
            <div id="join_button">
                아직 회원이 아니신가요? <a href="../member/member_check.html">회원가입하기</a>
            </div>
    </div>
</form>
</body>
</html>