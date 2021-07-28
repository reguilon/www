// JavaScript Document

$(document).ready(function() {

    var timeonoff;   //타이머 처리  홍길동 정보
    var imageCount=3;   //이미지개수 ***
    var cnt=1;   //이미지 순서 1 2 3 4 5 1 2 3 4 5....
    var onoff=true; // true=>타이머 동작중 , false=>동작하지 않을때
    
    $('.btn1').css('background','#043f67'); //첫번째 불켜 d
    $('.visual .link1').fadeIn('slow'); //첫번째 이미지 보인다..
 
    function moveg(){
      cnt++;  //카운트 1씩 증가.. 5가되면 다시 초기화 0  1 2 3 4 5 1 2 3 4 5..
     /*    
     for(var i=1;i<=imageCount;i++){ // 1~5
            $('.gallery .link'+i).hide(); //모든 이미지를 보이지 않게.
     }
     */
     $('.visual ul li').hide();   
     $('.visual .link'+cnt).fadeIn('slow'); //자신만 이미지가 보인다..
	 /*		                    
     for(var i=1;i<=imageCount;i++){
      $('.btn'+i).css('background','url(images/bnt.png)'); //버튼불다꺼!!
      }
      */
 $('.mbutton').css('background','rgb(255, 255,255)');  $('.btn'+cnt).css('background','#043f67'); //자신만 불켜                  d ss
       if(cnt==imageCount)cnt=0; //카운터의 초기화
     }
    timeonoff= setInterval( moveg , 4000);// 타이머를 동작 1~5이미지를 순서대로 자동 처리
      //setInterval( function(){처리코드} , 4000)
    //setInterval( 함수명 , 4000)
 
 
   $('.mbutton').click(function(event){  //각각의 버튼 클릭시
	     var $target=$(event.target); // var $target=$(this); 변수명앞에 $를 사용하면 예약어/명령어를 변수명으로 사용가능
          //클릭한 버튼의 정보 $target
         clearInterval(timeonoff); //타이머 중지     
	    /*
	     for(var i=1;i<=imageCount;i++){
	         $('.gallery .link'+i).hide(); //모든 이미지 안보인다.
         }
         */
	     $('.visual ul li').hide(); //모든 이미지를 안보이게
       
		  if($target.is('.btn1')){ //버튼1번 클릭?  ***
				 cnt=1;
		  }else if($target.is('.btn2')){//버튼2번 클릭?
				 cnt=2; 
		  }else if($target.is('.btn3')){ 
				 cnt=3;
		  } 
       
		  $('.visual .link'+cnt).fadeIn('slow');  //자기 자신만 이미지가 보인다
		  /*
		  for(var i=1;i<=imageCount;i++){
			  $('.btn'+i).css('background','url(images/bnt.png)'); //버튼 모두불꺼
		  }
          */
       $('.mbutton').css('background','rgb(255, 255,255)');  //ss
       $('.btn'+cnt).css('background','#043f67');//자신 버튼만 불켜 dd
          if(cnt==imageCount)cnt=0;  //카운트 초기화
          
          timeonoff= setInterval( moveg , 4000); //타이머의 부활!!!
      
          if(onoff==false){ //타이머가 멈춰있는 경우
		   onoff=true; // true
		   $('.ps').css('background','url(images/stop.jpg)');  // 버튼만 stop()
	     }
      
    });

  
	 //stop/play 버튼 클릭시 타이머 동작/중지
  $('.ps').click(function(){ 
       if(onoff==true){  // 타이머가 동작중인 상태에서 버튼클릭? stop버튼 클릭시
	       clearInterval(timeonoff);   // stop버튼 클릭시
		   $(this).css('background','url(images/play.jpg)');
           onoff=false;   
	   }else{  // false // 타이머가 중지상태에서 버튼클릭?
		  timeonoff= setInterval( moveg , 4000); //play버튼 클릭시
		   $(this).css('background','url(images/stop.jpg)');
		   onoff=true; 
	   }
  });	
 

});