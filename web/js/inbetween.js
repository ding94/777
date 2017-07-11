$(document).ready(function(){
    //randomNumber();
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
