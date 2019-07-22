$(document).ready(function(){
  var int
  $(".item").each(function(index,el){
    var wid = $(this).width();
    $(this).css("left",index*wid);
  });
  var i=0;
  var len=$(".item").length;
  var j=0;
  var intr;
  function gotonext(){
    {
      if((0>j)||(j>=len)){
        j=0;
      }
      $(".item").each(function(index,element){
        var wid = $(this).width();
        $(this).css("left",(-j+index)*wid);
        console.log(-j+index);
      });
      j++;
    }
  }
  intr=setInterval(gotonext, 5000);
  $(".left-item").first().click(function(){
    clearInterval(intr);
    j=j-2;
    gotonext();
    intr=setInterval(gotonext, 5000);
  });
  $(".right-item").first().click(function(){
    clearInterval(intr);
    j++;
    gotonext();
    intr=setInterval(gotonext, 6000);
  });
});