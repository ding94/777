var opts = ['1', '2', '3', '4', '5','6','7'];

function randomNumber(){
  //  var ansA = $(".a").val();
  //  var ansB = $(".b").val();
  //  var ansC = $(".c").val();
   //
  //  $('div > div[id=a]').text(ansA);
  //  $('div > div[id=b]').text(ansB);
  //  $('div > div[id=c]').text(ansC);
   //
  //  if(ansA == 7 && ansB == 7 && ansC ==7)
  //  {
   //
  //  }
  //  else if(ansA == ansB && ansB == ansC && ansA == ansC)
  //  {
   //
  //  }
  //  else if (ansA == ansB || ansB == ansC)
  //  {
   //
  //  }

  animation().done(submitData());



}

function submitData()
{
    $.ajax({
    url: "index.php?r=chance/index",
    type: "post",
    data : {
        _csrf: '<?=Yii::$app->request->getCsrfToken()?>',
    },
    success: function (data) {
        console.log(data.search);
        location.reload(false);
   },
   error: function (request, status, error) {
    alert(request.responseText);
    }
});
}

function animation(i)
{
  var def = $.Deferred();
  $("button").click(function(){
    for(i = 0; i < 12; i++) {
      $("#a").slideToggle(220,function(){
      var ctr = Math.floor(Math.random()*opts.length);
      $("#a #theImg").replaceWith('<img id="theImg"  class="img-responsive" src="img/' + opts[ctr] + '.PNG" />');
    });
  };
  $("#a").slideDown(800,function(){
    $("#a #theImg").replaceWith('<img id="theImg"  class="img-responsive" src="img/' + first + '.PNG" />');
    });
    for(i = 0; i < 12; i++) {
      $("#b").slideToggle(320,function(){
      var ctr = Math.floor(Math.random()*opts.length);
      $("#b #theImg").replaceWith('<img id="theImg"  class="img-responsive" src="img/' + opts[ctr] + '.PNG" />');
    });
  };
  $("#b").slideDown(800,function(){
    $("#b #theImg").replaceWith('<img id="theImg"  class="img-responsive" src="img/' + second + '.PNG" />');
    });
    for(i = 0; i < 12; i++) {
      $("#c").slideToggle(260,function(){
      var ctr = Math.floor(Math.random()*opts.length);
      $("#c #theImg").replaceWith('<img id="theImg"  class="img-responsive" src="img/' + opts[ctr] + '.PNG" />');
    });
  };
  $("#c").slideDown(800,function(){
    $("#c #theImg").replaceWith('<img id="theImg"  class="img-responsive" src="img/' + third + '.PNG" />');
    });
     def.resolve();
  });
  return def.promise();
}

$(document).ready(function(){
  var first = "<?php echo $model[1]['fnum']?>";
  var second = "<?php echo $model[1]['second']?>";
  var third = "<?php echo $model[1]['tnum']?>";

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

  // $("button").click(function(){
  //   for(i = 0; i < 12; i++) {
  //     $("#a").slideToggle(220,function(){
  //     var ctr = Math.floor(Math.random()*opts.length);
  //     $("#a #theImg").replaceWith('<img id="theImg"  class="img-responsive" src="img/' + opts[ctr] + '.PNG" />');
  //   });
  // };
  // $("#a").slideDown(800,function(){
  //   $("#a #theImg").replaceWith('<img id="theImg"  class="img-responsive" src="img/' + first + '.PNG" />');
  //   });
  //   for(i = 0; i < 12; i++) {
  //     $("#b").slideToggle(320,function(){
  //     var ctr = Math.floor(Math.random()*opts.length);
  //     $("#b #theImg").replaceWith('<img id="theImg"  class="img-responsive" src="img/' + opts[ctr] + '.PNG" />');
  //   });
  // };
  // $("#b").slideDown(800,function(){
  //   $("#b #theImg").replaceWith('<img id="theImg"  class="img-responsive" src="img/' + second + '.PNG" />');
  //   });
  //   for(i = 0; i < 12; i++) {
  //     $("#c").slideToggle(260,function(){
  //     var ctr = Math.floor(Math.random()*opts.length);
  //     $("#c #theImg").replaceWith('<img id="theImg"  class="img-responsive" src="img/' + opts[ctr] + '.PNG" />');
  //   });
  // };
  // $("#c").slideDown(800,function(){
  //   $("#c #theImg").replaceWith('<img id="theImg"  class="img-responsive" src="img/' + third + '.PNG" />');
  //   });
  // })

  if($('#g').val() >= 6)
  {
      $('#disableOrEnable').prop('disabled', true);
  }


})
