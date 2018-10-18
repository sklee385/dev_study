# xss공격방지 

## xss 이란?
XSS (교차 사이트 스크립팅)  
교차 사이트 스크립팅은 웹 클라이언트가 원격 코드를 의도하지 않게 실행하는 것    
사용자가 입력을 받아 웹 페이지에서 직접 출력하는 경우 모든 웹 응용 프로그램이 XSS에 노출 될 수 있다.    
입력 내용이 HTML 또는 JavaScript를 포함하면이 내용이 웹 클라이언트에 의해 렌더링 될 때 원격 코드가 실행될 수 있습니다.  

간단한 예시로 input 란에 <script>alert('XSS')</script> 이라고 입력 했을 때 
텍스트로 나오는 것이 아니라 스크립트가 실행 되면 안된다. 

## 방지
> htmlspecialchars 을 인코딩 하는 방식을 추천 
1. HTML 인코딩
    ```php
    htmlspecialchars($_GET['input'])
    ```
2. URL 인코딩 
    ```php
    urlencode($_GET['input']);
    ```

## 라이브러리를 이용한 방지
1. https://github.com/voku/anti-xss