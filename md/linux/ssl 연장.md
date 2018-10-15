# ssl 연장 
- [가비아ssl연장](#가비아ssl연장)

## 가비아ssl연장
1. 가비아 로그인 
2. my가비아 에서 해당 ssl 연장 선택
3. csr 키값 입력 
    > csr 값은 기존에 만들어 놓은 csr 값 
4. 결재 
5. 메일 인증    
    > 본인이 맞는지 인증 
6. 메일 인증이 끝나면 3개의 파일이 온다. 
    - RootCA_ChainCA.zip
        - ChainCA1.crt                // 사용 안함
        - ChainCA2.crt                // 사용 안함
        - 도메인_Chain_RootCA_Bundle.crt     // www_bizring_net_chainCA.crt
        - 도메인_RootCA.crt                  // www_bizring_net_rootCA.crt
    - 20181015%2F도메인.zip
        - 도메인_cert.pem
        - 도메인_csr.pem
    - Seal_sample.zip               // 이건 무시 해도 됨 

7. 서버에 ssl 적용
참고 사이트 : https://www.comodossl.co.kr/certificate/ssl-installation-guides/Apache-csr-crt.aspx
    ```conf
    # 포트는 변경 가능
    NameVirtualHost 서버아이피:443      
    
    <VirtualHost 서버아이피:443      >
    # 웹 루트 경로 
    DocumentRoot "/home/www"        
    ServerName 서버도메인:443
    AddDefaultCharset off
    ErrorLog logs/https.도메인.error_log
    TransferLog logs/https.도메인.access_log
    LogLevel warn

    SSLEngine on
    SSLProtocol All -SSLv2 -SSLv3
    SSLCipherSuite ECDHE-RSA-AES128-SHA256:AES128-GCM-SHA256:RC4:HIGH:!MD5:!aNULL:!EDH
    #   Server Certificate:
    SSLCertificateFile /인증서저장경로/도메인_cert.pem
    #   Server Private Key:
    SSLCertificateKeyFile /etc/httpd/ssl_crt/도메인_nopass.key
    # Server root
    SSLCACertificateFile /인증서저장경로/도메인_RootCA.crt
    SSLCertificateChainFile /인증서저장경로/도메인_Chain_RootCA_Bundle.crt

    <Files ~ "\.(cgi|shtml|phtml|php3?)$">
        SSLOptions +StdEnvVars
    </Files>
    <Directory "/var/www/cgi-bin">
        SSLOptions +StdEnvVars
    </Directory>
    SetEnvIf User-Agent ".*MSIE.*" nokeepalive ssl-unclean-shutdown downgrade-1.0 force-response-1.0
    CustomLog logs/https.www.bizring.net.ssl_request_log "%t %h %{SSL_PROTOCOL}x %{SSL_CIPHER}x \"%r\" %b"
    </VirtualHost>
    ```
