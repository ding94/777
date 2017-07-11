$(document).ready(function(){
    randomNumber();
})

function randomNumber()
{
    $.ajax({
    url: "index.php?r=inbetween/index",
    type: "post",
    data : {
        record: 51,
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
