# lib 

## 다운로드 헤더
```php
/*
 * 다운로드 관련
 */
function put_download_headers($filename) {

	$isIE = is_IE();

	if ($isIE) {
        $filename=rawurlencode($filename);
        header ("Pragma: public");
        header ("Cache-Control: no-store, max-age=0, no-cache, must-revalidate"); // HTTP/1.1
        header ("Cache-Control: post-check=0, pre-check=0", false);
        header ("Cache-Control: private");
        //header ("Content-Disposition: inline; filename=$filename");
	}

	header ("Content-Type: application/octet-stream; name=\"$filename\"");
	header ("Content-Disposition: attachment; filename=\"$filename\"");

	if($isIE) {
		header ("Content-Type: application/force-download; name=\"$filename\"");
	}

}
function is_IE() {
	$brtn = false;

	$ua = $_SERVER['HTTP_USER_AGENT'];
	//IE 11,10,9,8
	if( preg_match('/Trident\/(\d.\d)/i', $ua, $matches) ) {
		if( $matches[1] == "7.0" ) return true; //rv = "IE11";
		else if( $matches[1] == "6.0" ) return true; //rv = "IE10";
		else if( $matches[1] == "5.0" ) return true; //rv = "IE9";
		else if( $matches[1] == "4.0" ) return true; // rv = "IE8";
		else {
			if( intval($matches[1]) > 7.0 ) {
				return true; // rv = "IE11";
			}
		}
	}

	if( preg_match('/MSIE (.*?);/', $ua, $matches) ) {
		$brtn = true;
	}
	else
		$brtn = false;

	return $brtn;
}
```