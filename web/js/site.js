var opts = ['1', '2', '3', '4', '5','6','7'];

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
      $("#a #theImg").replaceWith('<img id="theImg"  class="img-responsive" src="img/' + opts[ctr] + '.PNG" />');
    });
  };
  $("#a").slideDown(800,function(){
    $("#a #theImg").replaceWith('<img id="theImg"  class="img-responsive" src="img/' + obj.fnum + '.PNG" />');
    });
    for(i = 0; i < 12; i++) {
      $("#b").slideToggle(320,function(){
      var ctr = Math.floor(Math.random()*opts.length);
      $("#b #theImg").replaceWith('<img id="theImg"  class="img-responsive" src="img/' + opts[ctr] + '.PNG" />');
    });
  };
  $("#b").slideDown(800,function(){
    $("#b #theImg").replaceWith('<img id="theImg"  class="img-responsive" src="img/' + obj.snum + '.PNG" />');
    })
    for(i = 0; i < 12; i++) {
      $("#c").slideToggle(260,function(){
      var ctr = Math.floor(Math.random()*opts.length);
      $("#c #theImg").replaceWith('<img id="theImg"  class="img-responsive" src="img/' + opts[ctr] + '.PNG" />');
    });
  };
  $("#c").slideDown(800,function(){
    $("#c #theImg").replaceWith('<img id="theImg"  class="img-responsive" src="img/' + obj.tnum + '.PNG" />');
    });
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
      alert('You get the First Price');   
   }
   else if (((obj.fnum == obj.snum) === true) && ((obj.snum == obj.tnum) === true))
   {
       alert('You get the Second Price');   
   }
   else if(obj.fnum == obj.snum || obj.snum == obj.tnum)
   {
      alert('You get the Third Price'); 
   }
}


$(document).ready(function(){

	var one = $("[value='1']");
  $(one).prepend('<img id="theImg"  class="img-responsive" src="img/1.PNG" />');
  var two = $("[value='2']");
  $(two).prepend('<img id="theImg" class="img-responsive" src="img/2.PNG" />');
  var three = $("[value='3']");
  $(three).prepend('<img id="theImg"  class="img-responsive" src="img/3.PNG" />');
  var four = $("[value='4']");
  $(four).prepend('<img id="theImg" class="img-responsive" src="img/4.PNG" />');
  var five = $("[value='5']");
  $(five).prepend('<img id="theImg" class="img-responsive" src="img/5.PNG" />');
  var six = $("[value='6']");
  $(six).prepend('<img id="theImg" class="img-responsive" src="img/6.PNG" />');
  var seven = $("[value='7']");
  $(seven).prepend('<img id="theImg" class="img-responsive" src="img/7.PNG" />');
  if($('#g').val() >= 6)
  {
      $('#disableOrEnable').prop('disabled', true);
  }


})
