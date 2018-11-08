# regexp 

## 목록
- [정규식](#정규식)

## 정규식 
```js
var check = /[ㄱ-ㅎ|ㅏ-ㅣ|가-힣]/;      // 한글이 있는지 체크
var check = /^[ㄱ-ㅎ|ㅏ-ㅣ|가-힣]*$/;   // 한글만 체크
var check = /^[A-Za-z0-9+]*$/;         // 영어 숫자만 
var check = /^[A-Za-z0-9+]*$/;         // 영어 숫자만 
```
```js 
if(check.test('문자')){
    console.log('동작');
}

str.replace(/[^0-9]/g,"");            // 숫자만 남기기

$('.number').on('keyup', function () {
  var val = $(this).val();
  val = replace(/[^0-9.]/g,""); 
  
  var first_str = val.substr(0, 1);
  var last_str = val.substr(val.length-1, 1);
  if(first_str == '.'){
    val = val.substr(1, val.length-1)  ;
  }
  

  $(this).val(val);
});
```



