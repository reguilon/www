function initialize() {
  var myLatlng = new google.maps.LatLng(37.47471705555295, 126.96337506699892);
  var myOptions = {
   zoom: 15,
   center: myLatlng

  }
  var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
 
  var marker = new google.maps.Marker({
   position: myLatlng,
   map: map,
   title:"(주)낙성스타교실"
  });  
  
 
  var infowindow = new google.maps.InfoWindow({
   content: "(주)낙성스타교실 봉천동 196-6"
  });
 
  infowindow.open(map,marker);
 }
 
 
 window.onload=function(){
  initialize();
 }