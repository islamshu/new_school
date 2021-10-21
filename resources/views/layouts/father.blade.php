<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Father | Dashboard</title>
    <link rel="stylesheet" href="{{asset('father_style/libs/fontawesome-pro-5.14.0-web/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('father_style/libs/Hover-master/Hover-master/css/hover-min.css')}}">
    <link rel="stylesheet" href="{{asset('father_style/libs/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('father_style/libs/WOW-master/css/libs/animate.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('father_style/css/style.css')}}">
</head>
<body class="bg-light">



<div class="panel">

    <div class="row">
       @include('father.parts.aside')


                @include('father.parts.nav')

        <div class="content text-right" id="panel">
<div class ="container" style=" ">

          @yield('content')
           </div>
          </div>
        </div>

    

</div>





<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

<script src="{{asset('father_style/libs/fontawesome-pro-5.14.0-web/js/all.min.js')}}"></script>
<script src="{{asset('father_style/libs/WOW-master/dist/wow.min.js')}}"></script>
<script src="{{asset('father_style/js/custom.js')}}"></script>

<script type="text/javascript">

  function setTime(){
var d = new Date();
currentDay = d.getTime();
return currentDay;


}




</script>
<script>
            $(document).ready(function(){
  function getnotifications(){
    
    $.get("{{ route('father.user_not',Auth::id()) }}",{ dx: setTime(),},
function(data,status){
           var tersmwobj = jQuery.parseJSON(data);



      var response = tersmwobj ;

          if (tersmwobj == undefined || typeof response.id == 'undefined' || response.id < '1' || response.id == '-1' ) {
  
   window.open("{{ url('/') }}",'_blank');

   return false;}

if (response.count > 0) {

$('.notificount').html(response.count);
$('.notificount').show();
var thedata = response.data;

if (response.data  && response.data!=='' && thedata.length > 0) {

var $datxxxa = '' ;

thedata.forEach(function(mj){

var test= new Date(mj.created_at).toString();

                  $datxxxa += '          <a class="dropdown-item"href="'+mj.data.url+'">    '+ mj.data.title;
                  $datxxxa += '          </a>';


});





var pane = $('.notifiuser');
$('.notifiuser').html($datxxxa);


}


}


});
}



getnotifications();
var dsklfjsd =  setInterval(function(){
  getnotifications();
}, 10000);

$("#read_not").on("click", function(){
      $.ajax({
                   type: "get",
            dataType: "json",
            url: '{{ route('father.user_not_read') }}',
            data: {"_token": "{{csrf_token()}}"},
            success: function (data) {
                console.log(data.message);
            }
        });
});
});



</script>


</body>
</html>