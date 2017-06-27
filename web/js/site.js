var number= [1,2,3,4,5,7];
function randomNumber(){
   var ansA =  number[Math.floor(Math.random()*number.length)];
   var ansB =  number[Math.floor(Math.random()*number.length)];
   var ansC =  number[Math.floor(Math.random()*number.length)];
   var result="Empty";
   if(ansA == 7 && ansB == 7 && ansC ==7)
   {
        result = "First Price";
   }
   if(ansA == ansB && ansB == ansC && ansA == ansC)
   {
       result = "Second Price";
   }
   else if (ansA == ansB || ansB == ansC)
   {
        result = "Third Price";
   }
   submitData(result);
}

function submitData(result)
{
   console.log(result);
}
