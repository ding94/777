var opts = ['1', '2', '3', '4', '5','6','7'];
var imgurl = window.location.origin;

/*
 *post ajax when user press play button
 *success the go to getData
 */
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

/*
 *setTimeout to let animation finsih first
 *pass obj to reward to detect wheter user get prize
 *chacnce less than 5 unlock button click function
 *add red color css to when chance more than 5
 *
 */
function animation(obj)
{
    for(i = 0; i < 12; i++) {
      $("#a").slideToggle(220,function(){
      var ctr = Math.floor(Math.random()*opts.length);
      $("#a #theImg").replaceWith('<img id="theImg"  class="img-responsive" src="'+ imgurl + '/777/web/img/' + opts[ctr] + '.PNG" />');
    });
  };
  $("#a").slideDown(800,function(){
    $("#a #theImg").replaceWith('<img id="theImg"  class="img-responsive" src="'+ imgurl + '/777/web/img/' + obj.fnum + '.PNG" />');
    });
    for(i = 0; i < 12; i++) {
      $("#b").slideToggle(320,function(){
      var ctr = Math.floor(Math.random()*opts.length);
      $("#b #theImg").replaceWith('<img id="theImg"  class="img-responsive" src="'+ imgurl + '/777/web/img/' + opts[ctr] + '.PNG" />');
    });
  };
  $("#b").slideDown(800,function(){
    $("#b #theImg").replaceWith('<img id="theImg"  class="img-responsive" src="'+ imgurl + '/777/web/img/' + obj.snum + '.PNG" />');
    })
    for(i = 0; i < 12; i++) {
      $("#c").slideToggle(260,function(){
      var ctr = Math.floor(Math.random()*opts.length);
      $("#c #theImg").replaceWith('<img id="theImg"  class="img-responsive" src="'+ imgurl + '/777/web/img/' + opts[ctr] + '.PNG" />');
    });
  };
  $("#c").slideDown(800,function(){
    $("#c #theImg").replaceWith('<img id="theImg"  class="img-responsive" src="'+ imgurl + '/777/web/img/' + obj.tnum + '.PNG" />');
    });

    setTimeout(function(){
      alertReward(obj);
      var chanceLeft = 5-obj.chance;
      if(obj.chance < 5)
      {
        $(".chanceValue").text("Today's chance left :" + chanceLeft );
          $('#disableOrEnable').prop('disabled', false);
      }
      else{
        $(".chanceValue").text("Today's Chance has finished!!");
        $(".chanceValue").css("color","red");
      }
    },4000);
}

/*
 *receive data and pass to animation
 *disable button click function to prevent user press when animation run
 */

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
      $('#disableOrEnable').prop('disabled', true);
      animation(obj);
      
   },
   error: function (request, status, error) {
    alert(request.responseText);
   }

   });
}


/*
 *get data from reward and add to table
 */
function getRewardData()
{
   $.ajax({
   url :"index.php?r=reward/getdata",
   type: "get",
   data :{

   },
   success: function (data) {
        if(data.length > 0)
        {
            var obj = JSON.parse(data);
            console.log(obj);
            $('.userReward').find('tr:first').after("<tr class='reward-table-tr'><td>RM "+obj.price+"</td><td class='dateEm'>"+obj.createtime+"</td></tr>");
             $('.allReward').find('tr:first').after("<tr class='reward-table-tr'><td>"+obj.userid+"</td><td>RM "+obj.price+"</td><td class='dateEm'>"+obj.createtime+"</td></tr>");
        }
      
   },
   error: function (request, status, error) {
    alert(request.responseText);
   }

   });
}


/*
 *if user get reward alert and go to another getRewardData
 *to add table
 */
function alertReward(obj)
{
   if (obj.fnum == 7 && obj.snum == 7 && obj.tnum == 7)
   {
        alert('Congratulation! You have won RM 10 SGreward!');
        getRewardData();
   }
   else if (((obj.fnum == obj.snum) === true) && ((obj.snum == obj.tnum) === true))
   {
       alert('Congratulation! You have won RM 5 SGreward!');
       getRewardData();
       
   }
   else if(obj.fnum == obj.snum || obj.snum == obj.tnum)
   {
      alert('Congratulation! You have won RM 2 SGreward!');
      getRewardData();
   }
   else{
        alert('Play it again, you are almost get it!');
   }
}


$(document).ready(function(){
  for(i = 1; i <= 7; i++) {
    $("[value='"+ i +"']").prepend('<img id="theImg" class="img-responsive" src="'+ imgurl + '/777/web/img/'+ i + '.PNG" />');
  }
  if($('#chanceHidden').val() >= 6)
  {
      $('#disableOrEnable').prop('disabled', true);
  }
})
