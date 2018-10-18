# date
## 목록 
1. [날짜포맷변환](#fmt_date)


## fmt_date
- yyyymmdd -> yyyy-mm-dd, yyyy/mm/dd 등으로 변환
```js
function fmt_date(date, gubun) {
	if(date==null)	return '';
	gubun = gubun || "/";

	var fmt_date=date;
	if(date.length>=8) {
		fmt_date = date.substr(0,4);
		fmt_date += gubun;
		fmt_date += date.substr(4,2);
		fmt_date += gubun;
		fmt_date += date.substr(6,2);
	}
	else if(date.length==6) {
		fmt_date = date.substr(0,2);
		fmt_date += gubun;
		fmt_date += date.substr(2,2);
		fmt_date += gubun;
		fmt_date += date.substr(4,2);
	}
	return fmt_date;
}
fmt_date('20180101', '/');      // 2018-01-01
```
