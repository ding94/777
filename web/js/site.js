function randomNumber(){
   var ansA = $(".a").val();
   var ansB = $(".b").val();
   var ansC = $(".c").val();

   if(ansA == 7 && ansB == 7 && ansC ==7)
   {

   }
   else if(ansA == ansB && ansB == ansC && ansA == ansC)
   {

   }
   else if (ansA == ansB || ansB == ansC)
   {
       
       
   }
   submitData();
}

function submitData()
{
    $.ajax({
    url: "index.php?r=reward/index",
    type: "post",
    data : {
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
