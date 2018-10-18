# regexp 

## 목록
- [정규식](#정규식)

## 정규식 
```js
var check = /[ㄱ-ㅎ|ㅏ-ㅣ|가-힣]/;      // 한글이 있는지 체크
var check = /^[ㄱ-ㅎ|ㅏ-ㅣ|가-힣]*$/;   // 한글만 체크
var check = /^[A-Za-z0-9+]*$/;         // 영어 숫자만 
```
```js 
if(check.test('문자')){
    console.log('동작');
}
```



