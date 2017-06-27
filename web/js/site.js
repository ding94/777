var number= [1,2,3,4,5,6,7,8,9];
function randomNumber(){
   var ansA =  number[Math.floor(Math.random()*number.length)];
   var ansB =  number[Math.floor(Math.random()*number.length)];
   var ansC =  number[Math.floor(Math.random()*number.length)];
   console.log(ansA);
   console.log(ansB);
   console.log(ansC);
}
