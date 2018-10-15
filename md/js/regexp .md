# regexp 
정규식 

## 한글
- 한글이 있는지 검토
```js
var plainText = 'HELLO 반갑습니다.';
var check = /[ㄱ-ㅎ|ㅏ-ㅣ|가-힣]/;      // 한글이 있는지 체크
var check = /^[ㄱ-ㅎ|ㅏ-ㅣ|가-힣]*$/;   // 한글만 체크

if(check.test(plainText)){
    console.log('한글이 있습니다.');
}

```
- 한글인지 체크 함수 
```js
function is_hangul_char(ch) {
    c = ch.charCodeAt(0);
    if( 0x1100<=c && c<=0x11FF ) return true;
    if( 0x3130<=c && c<=0x318F ) return true;
    if( 0xAC00<=c && c<=0xD7A3 ) return true;
    return false;
}
```

## 영어 숫자만
```js
var regType1 = /^[A-Za-z0-9+]*$/;

```