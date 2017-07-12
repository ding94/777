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
    var val = JSON.parse(data);
      console.log(val);
      if (val.token==0) {
          document.getElementById("value").value = "";
          document.getElementById("mid").innerHTML = val.ans;
          document.getElementById("min").innerHTML = "";
          document.getElementById("max").innerHTML = "";
          document.getElementById("top").innerHTML = "恭喜你，您就是我们要找的幸运儿";
          document.getElementById("times").innerHTML = "您今天的次数已达成。请明天再来。";

      }else{
        document.getElementById("value").value = "";
      document.getElementById("min").innerHTML = val.min_value;
      document.getElementById("max").innerHTML = val.max_value;
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
