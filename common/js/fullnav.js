
$(document).ready(function() {
  
    //2depth 열기/닫기
    $('ul.dropdownmenu').hover(
       function() { 
          $('ul.dropdownmenu li.menu ul').fadeIn('normal',function(){$(this).stop();}); //모든 서브를 다 열어라
          $('#headerArea').animate({height:475},'fast').clearQueue();
       },function() {
          $('ul.dropdownmenu li.menu ul').fadeOut('fast'); //모든 서브를 다 닫아라
          $('#headerArea').animate({height:223},'normal').clearQueue();
     });
     
     //1depth 효과
     $('ul.dropdownmenu li.menu').hover(
       function() { 
           $('.depth1',this).css('color','#f07800');
       },function() {
          $('.depth1',this).css('color','#333');
     });

     //tab 처리
     $('ul.dropdownmenu li.menu .depth1').on('focus', function () {        
        $('ul.dropdownmenu li.menu ul').slideDown('normal');
        $('#headerArea').animate({height:475},'fast').clearQueue();
     });

    $('ul.dropdownmenu li.m6 li:last').find('a').on('blur', function () {        
        $('ul.dropdownmenu li.menu ul').slideUp('fast');
        $('#headerArea').animate({height:50},'normal').clearQueue();
    });
});

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

    //한페이에서 메뉴 클릭시 원하는 위치로 스무스하게 이동시키는 코드 
    $('.slideMenu a').click(function(e){
        e.preventDefault();

        var value=0;

        if($(this).hasClass('link1')){  //첫번째 메뉴 버튼을 클릭하면
           value= $('.slide_con:eq(0)').offset().top - 224 // 해당 요소의 상단(top)까지의 거리 
        }else if($(this).hasClass('link2')){  //두번째 메뉴 버튼을 클릭하면
           value= $('.slide_con:eq(1)').offset().top - 224
        }else if($(this).hasClass('link3')){
           value= $('.slide_con:eq(2)').offset().top - 224
        }else if($(this).hasClass('link4')){
           value= $('.slide_con:eq(3)').offset().top - 24
        }
        
        $("html,body").stop().animate({"scrollTop":value},1000);
    });
});


$(document).ready(function() {
	/*
	$('.select .arrow').click(function(){
		$('.select .aList').fadeIn('slow');			  
	});
	$('.select .aList').mouseleave(function(){
		$(this).fadeOut('slow');		  
	});
	*/
    $('.select .arrow').toggle(function(){
		$('.select .aList').fadeIn('slow');	
	}, function(){
        $('.select .aList').fadeOut('slow');	
	});

	//tab키 처리
	  $('.select .arrow').on('focus', function () {        
              $('.select .aList').show();	
       });

       $('.select .aList li:last').find('a').on('blur', function () {        
              $('.select .aList').hide();
       });  
});
