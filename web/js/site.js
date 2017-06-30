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
  for(i = 0; i < 5; i++) {
  $("#a").slideDown(220,function(){
  $("#a").prepend('<img id="theImg" src="img/1.PNG" />');
  });
  $("#a").slideToggle(220,function(){
  $("#a").prepend('<img id="theImg" src="img/2.PNG" />');
  });
  $("#a").slideToggle(220,function(){
  $("#a").prepend('<img id="theImg" src="img/3.PNG" />');
  });
  $("#a").slideToggle(220,function(){
  $("#a").prepend('<img id="theImg" src="img/4.PNG" />');
  });
  $("#a").slideToggle(220,function(){
  $("#a").prepend('<img id="theImg" src="img/5.PNG" />');
  });
  $("#a").slideToggle(220,function(){
  $("#a").prepend('<img id="theImg" src="img/6.PNG" />');
  });
  $("#a").slideToggle(220,function(){
  $("#a").prepend('<img id="theImg" src="img/7.PNG" />');
  });
};
$("#a").slideDown(1000,function(){
  $("#a").text("hi");
  });

  submitData();
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

$(document).ready(function(){
	var one = $("[value='1']");
  $(one).prepend('<img id="theImg" src="img/1.PNG" />');
  var two = $("[value='2']");
  $(two).prepend('<img id="theImg" src="img/2.PNG" />');
  var three = $("[value='3']");
  $(three).prepend('<img id="theImg" src="img/3.PNG" />');
  var four = $("[value='4']");
  $(four).prepend('<img id="theImg" src="img/4.PNG" />');
  var five = $("[value='5']");
  $(five).prepend('<img id="theImg" src="img/5.PNG" />');
  var six = $("[value='6']");
  $(six).prepend('<img id="theImg" src="img/6.PNG" />');
  var seven = $("[value='7']");
  $(seven).prepend('<img id="theImg" src="img/7.PNG" />');

  // $(".buttonRandom").click(function(){
  // })
})
