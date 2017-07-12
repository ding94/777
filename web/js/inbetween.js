$(document).ready(function(){
})

function enterValue(userInput)
{
    $.ajax({
    url: "index.php?r=inbetween/index",
    type: "post",
    data : {
        record: userInput,
        _csrf: '<?=Yii::$app->request->getCsrfToken()?>',
    },
   success: function (data) {
      console.log(data.search);
      getVal();
   },

   error: function (request, status, error) {
    alert(request.responseText);
    }
});
}



function getVal(){
  $.ajax({
    url: "index.php?r=inbetween/getinput",
    type: "get",
    data : {
        _csrf: '<?=Yii::$app->request->getCsrfToken()?>',
    },
   success: function (data) {
    var result = JSON.parse(data);
      console.log(result);
      if (result.token==0) {
          document.getElementById("value").value = "";
          document.getElementById("mid").innerHTML = result.ans;
          document.getElementById("min").innerHTML = "";
          document.getElementById("max").innerHTML = "";
          document.getElementById("top").innerHTML = "恭喜你，您就是我们要找的幸运儿!";
          document.getElementById("times").innerHTML = "您今天的次数已达成。请明天再来。";

      }else{
        document.getElementById("value").value = "";
        document.getElementById("min").innerHTML = result.min_value;
        document.getElementById("mid").innerHTML = "到";
        document.getElementById("max").innerHTML = result.max_value;
        $("#max").toggle('bounce', {times:3}, 500);
        if (result.usedTime >= 5) { 
          document.getElementById("times").innerHTML = "您今天的次数已达成。请明天再来。";
      }
      else {
       document.getElementById("times").innerHTML = "您还有"+(5 - result.usedTime)+"次机会哟。";
      }

    }
   },

   error: function (request, status, error) {
    alert(request.responseText);
    }
});
}

$('#value').keypress(function(e){
  if(e.which == 13)
  {
    enterValue($(this).val());
  }

});
