var number= [1,2,3,4,5,7];
function randomNumber(){
   var ansA =  number[Math.floor(Math.random()*number.length)];
   var ansB =  number[Math.floor(Math.random()*number.length)];
   var ansC =  number[Math.floor(Math.random()*number.length)];
   var result="Empty";
   var price = 0;
   if(ansA == 7 && ansB == 7 && ansC ==7)
   {
        result = "First Price";
        price = 10;
   }
   if(ansA == ansB && ansB == ansC && ansA == ansC)
   {
       result = "Second Price";
       price = 5;
   }
   else if (ansA == ansB || ansB == ansC)
   {
        result = "Third Price";
        price = 2;
   }
   console.log(price);
   submitData(price);
}

function submitData(price)
{
    $.ajax({
    url: "index.php?r=reward/index",
    type: "post",
    data : {
        price : price,
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
