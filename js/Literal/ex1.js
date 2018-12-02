var value = 1; 

var test = {
  value  : 100 ,
  a : ()=>{
    console.log(this);
    console.log(this.value);
  }
}

var t = test.a.bind(test);
t();


var numbers = {  
  array: [3, 5, 10],
  getNumbers: function() {
    return this.array;    
  }
};
// 바인딩 함수
var boundGetNumbers = numbers.getNumbers.bind(numbers);  
boundGetNumbers(); // => [3, 5, 10]  
console.log(boundGetNumbers());
// 객체로부터 메소드를 추출 = 함수 호출
var simpleGetNumbers = numbers.getNumbers;  
simpleGetNumbers(); // => undefined 혹은 error(엄격 모드)
console.log(simpleGetNumbers());
