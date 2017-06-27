var number= [1,2,3,4,5,7];
function randomNumber(){
   var ansA = $(".a").val();
   var ansB = $(".b").val();
   var ansC = $(".c").val();
   var result="Empty";
   if(ansA == 7 && ansB == 7 && ansC ==7)
   {
        result = "First Price";
   }
   else if(ansA == ansB && ansB == ansC && ansA == ansC)
   {
       result = "Second Price";
   }
   else if (ansA == ansB || ansB == ansC)
   {
        result = "Third Price";
   }
   console.log(result);
   //submitData(result);
}

function submitData(result)
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
