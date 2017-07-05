var opts = ['1', '2', '3', '4', '5','6','7'];
var imgurl = window.location.origin;

function randomNumber()
{
    $.ajax({
    url: "index.php?r=chance/index",
    type: "post",
    data : {
        _csrf: '<?=Yii::$app->request->getCsrfToken()?>',
    },
   success: function (data) {
      console.log(data.search);
      getData();
   },
   error: function (request, status, error) {
    alert(request.responseText);
    }
});
}

function animation(obj)
{
    for(i = 0; i < 12; i++) {
      $("#a").slideToggle(220,function(){
      var ctr = Math.floor(Math.random()*opts.length);
      $("#a #theImg").replaceWith('<img id="theImg"  class="img-responsive" src="'+ imgurl + '/777/web/img/' + opts[ctr] + '.PNG" />');
    });
  };
  $("#a").slideDown(800,function(){
    $("#a #theImg").replaceWith('<img id="theImg"  class="img-responsive" src="'+ imgurl + '/777/web/img/' + obj.fnum + '.PNG" />');
    });
    for(i = 0; i < 12; i++) {
      $("#b").slideToggle(320,function(){
      var ctr = Math.floor(Math.random()*opts.length);
      $("#b #theImg").replaceWith('<img id="theImg"  class="img-responsive" src="'+ imgurl + '/777/web/img/' + opts[ctr] + '.PNG" />');
    });
  };
  $("#b").slideDown(800,function(){
    $("#b #theImg").replaceWith('<img id="theImg"  class="img-responsive" src="'+ imgurl + '/777/web/img/' + obj.snum + '.PNG" />');
    })
    for(i = 0; i < 12; i++) {
      $("#c").slideToggle(260,function(){
      var ctr = Math.floor(Math.random()*opts.length);
      $("#c #theImg").replaceWith('<img id="theImg"  class="img-responsive" src="'+ imgurl + '/777/web/img/' + opts[ctr] + '.PNG" />');
    });
  };
  $("#c").slideDown(800,function(){
    $("#c #theImg").replaceWith('<img id="theImg"  class="img-responsive" src="'+ imgurl + '/777/web/img/' + obj.tnum + '.PNG" />');
    });

    setTimeout(function(){
      alertReward(obj);
      var chanceLeft = 5-obj.chance;
      if(obj.chance < 5)
      {
        $(".chanceValue").text("Today's chance left :" + chanceLeft );
      }
      else{
        $(".chanceValue").text("Today's Chance has finished!!");
      }
    },4000);
}

function getData()
{
   $.ajax({
   url :"index.php?r=chance/getdata",
   type: "get",
   data :{

   },
   success: function (data) {
      console.log(data);
      var obj = JSON.parse(data);
      animation(obj);
      if(obj.chance >= 5)
      {
          $('#disableOrEnable').prop('disabled', true);
      }
   },
   error: function (request, status, error) {
    alert(request.responseText);
   }

   });
}

function alertReward(obj)
{
   if (obj.fnum == 7 && obj.snum == 7 && obj.tnum == 7)
   {
      alert('Congratulation! You have won RM 10 SGreward!');
   }
   else if (((obj.fnum == obj.snum) === true) && ((obj.snum == obj.tnum) === true))
   {
       alert('Congratulation! You have won RM 5 SGreward!');
   }
   else if(obj.fnum == obj.snum || obj.snum == obj.tnum)
   {
      alert('Congratulation! You have won RM 2 SGreward!');
   }
   else{
        alert('Play it again, you are almost get it!');
   }
}


$(document).ready(function(){
  for(i = 1; i <= 7; i++) {
    $("[value='"+ i +"']").prepend('<img id="theImg" class="img-responsive" src="'+ imgurl + '/777/web/img/'+ i + '.PNG" />');
  }
  if($('#chanceHidden').val() >= 6)
  {
      $('#disableOrEnable').prop('disabled', true);
  }


})
