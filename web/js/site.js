var number= [1,2,3,4,5,6,7,8,9];
function randomNumber(){
   var ansA =  number[Math.floor(Math.random()*number.length)];
   var ansB =  number[Math.floor(Math.random()*number.length)];
   var ansC =  number[Math.floor(Math.random()*number.length)];
   var result="Empty";
   if(ansA == ansB && ansB == ansC && ansA == ansC)
   {
       result = "First Price";
   }
   else if (ansA == ansB || ansB == ansC)
   {
         result = "Second Price";
   }
   submitData(result);
}

function submitData(result)
{
	
}
