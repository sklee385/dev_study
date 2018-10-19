# composer 

## 목록 
1. [참고사이트](#참고사이트)
1. [composer](#composer)
1. [설치](설치)

## 참고사이트
http://xpressengine.github.io/Composer-korean-docs/doc/01-basic-usage.md/

## composer
php 의존성 관리도구     
필요한 확장 기능을 쉽게 설치해주는 기능을 제공  
프로젝트에서 필요한 확장 기능을 통합해서 관리해주는 도구
node 의 npm 

## 설치 
- linux
    ```bash
    curl -sS https://getcomposer.org/installer | php
    ```
- windows 
    https://getcomposer.org/Composer-Setup.exe      
    다운 받아 설치 

## packagist 
컴포저의 메인 저장소
https://packagist.org/

## composer.json
node 의 package.json 과 같은 것
 
## composer command
    - composer init 
        > composer.json 파일 생성   
        > npm init 과 동일한 명령어
    - composer install 
        > composer.json에 기술한 패키지 설치    
        > npm install 과 동일한 명령어
    - composer update 
        > composer.json 변경시 update로 패키지 업데이트