// 상단이동 코드

$(document).ready(function () {
            
    $('.topMove').hide();  //top버튼 보이지마~~~
  
    $(window).on('scroll',function(){   // 스크롤의 위치가 바뀌면 발생하는 이벤트
         var scroll = $(window).scrollTop();  //스크롤의 상단 부터의 거리
        
        
         $('.text').text(scroll);  // 스크롤의 거리를 출력
 
         if(scroll>500){    //스트롤 top의 거리가 500px 보다 커지면
             $('.topMove').fadeIn('slow');  //top메뉴가 보인다
         }else{
             $('.topMove').fadeOut('fast'); //top메뉴가 안보인다
         }
    });
  
     // top메뉴를 클릭하면 상단으로 이동시킨다 
     $('.topMove').click(function(e){
         e.preventDefault();
         //상단으로 스르륵 이동합니다.
        $("html,body").stop().animate({"scrollTop":0},1000); // 스크롤의 위치를 이동시킨다
     });
    });