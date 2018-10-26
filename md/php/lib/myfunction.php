<?php

function number_format_decimal($no) {
	if( is_float($no) ) {

		if( floatval($no) == intval($no) )
			return number_format($no);
		else
			return number_format($no, 1);
	}
	else {
		return number_format($no);
	}
}

function microtime_float()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$sec + (float)$usec);
}

function fmt_hometax_no($no){
	if( strlen($no)==24 )
	{
		return substr($no,0,8)."-".substr($no,8,8)."-".substr($no,16,8);
	}
	else {
		return $no;
	}
}

function convert_sort_orderby($orderby){
	$retval = '';
	if($orderby=='asc'){
		$retval = 'desc';
	}else{
		$retval = 'asc';
	}
	return $retval;
}
function get_basename($filename)
{
    return preg_replace('/^.+[\\\\\\/]/', '', $filename);
}

function make_dir($dir, $mode=0777)
{
	if( !file_exists($dir) ){
		$old = umask(0);
		$retval = @mkdir($dir, $mode, $recursive=true);
		umask($old);
		return $retval;
	}
	return true;
}

// 숫자만 추출
function parse_num($tel) {
    $tel = preg_replace("/[^0-9]*/s", "", $tel);
    return $tel;
}

function fmt_regno($regno){
    return @substr($regno,0,6)."-".@substr($regno,6,7);
}
function is_alpahbet_string($str)
{
    return eregi("^[a-zA-Z]+$", $str);
}
function is_hangul($char)
{
  	$char = ord($char);
 	//한글만 으로 이루어 졌거나 한글이 맨 앞줄 이면  true를 반환한다.
  	if($char >= 0xa1 && $char <= 0xfe){
	    return 1;
  	}
}
function utf8ToEucKr($_inStr)
{
    $rtnStr = $_inStr;

    if( mb_check_encoding($rtnStr, "UTF-8") == true )
        $rtnStr = @iconv("UTF-8", "EUC-KR", $rtnStr);

    return $rtnStr;
}

function eucKrToUtf8($_inStr)
{
// 	$rtnStr = $_inStr;
// 	if( mb_check_encoding($rtnStr, "EUC-KR") == true )
//     	$rtnStr = @iconv("EUC-KR", "UTF-8", $rtnStr);
// 	return $rtnStr;

    return cp949ToUtf8($_inStr);
}

function cp949ToUtf8($_inStr)
{
    $rtnStr = $_inStr;

    if( mb_check_encoding($rtnStr, "cp949") == true )
        $rtnStr = @iconv("cp949", "UTF-8", $rtnStr);

    return $rtnStr;
}

function korean_ampm($hour)
{
    if( substr($hour,0,2)<=12)  return "오전";
    else {
         return "오후";
    }
}
function mylog($file, $msg)
{
	$fp = fopen($file, 'a+');
	fwrite($fp, $msg);
	fwrite($fp, "\n");
	fclose($fp);
}

function hide_mobile($mobile)
{
    if( strlen($mobile)==10 ){
        return substr($mobile, 0, 3)."-****-". substr($mobile, 6, 4);
    }
    else if(strlen($mobile)>=11){
        return substr($mobile, 0, 3)."-****-". substr($mobile, 7, 4);
    }else{
        return substr($mobile, 0, 3)."-****-". substr($mobile, 7, 4);
    }
}

function myurl_get($url)
{
	$ch = curl_init();

	// set URL and other appropriate options
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HTTPGET, 1);//Since GET is the default, this is only necessary if the request method has been changed.
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_NOSIGNAL, 1);
	// grab URL and pass it to the browser
	$rst = curl_exec($ch);

	// Check if any error occurred
	if(curl_errno($ch))
	{
	    echo 'Curl error: ' . curl_error($ch);
		$rst = -1;
	}

	// close cURL resource, and free up system resources
	curl_close($ch);
	return $rst;
}

function weekend_color_class($week){
    $str='';
    switch($week){
        case 0:$str="trColor0"; break;
        case 1:$str="trColor1"; break;
        case 2:$str="trColor2"; break;
        case 3:$str="trColor3"; break;
        case 4:$str="trColor4"; break;
        case 5:$str="trColor5"; break;
        case 6:$str="trColor6"; break;
    }
    return $str;
}

function weekend_index($yyyymmdd)
{
    $week = date("w", strtotime($yyyymmdd));
    return $week;
}

function weekend_str($yyyymmdd, $abbr=false)
{
    $week = date("w", strtotime($yyyymmdd));
    $str = '';
    switch($week){
        case 0:$str='일';break;
        case 1:$str='월';break;
        case 2:$str='화';break;
        case 3:$str='수';break;
        case 4:$str='목';break;
        case 5:$str='금';break;
        case 6:$str='토';break;
    }
    if(!$abbr) $str.="요일";
    return $str;
}

class MYDate
{
	public static function todate_time()
	{
		return date("YmdHis");
	}

	public static function today($datetime)
	{
		$timestamp = strtotime($datetime);
		return date('Y-m-d', $timestamp);
	}

	public static function format($fmt, $datetime)
	{
		if($datetime=='')	return '';
		$timestamp = strtotime($datetime);
		return date($fmt, $timestamp);
	}

	public static function micro_datetime()
	{
		return date('YmdHis').microtime()*1000000;
	}
}

function getDateMicroTime()
{
	return date('YmdHis').microtime()*1000000;
}


function script_go_url($url)
{
	$script = <<<END
	<script>
		location.href = "$url";
	</script>
END;

	echo $script;
	exit;
}

/**
 * @note
 * msg : 출력 메시지
 * url : 이동 페이지
 */
function script_msg_go_url($msg, $url) {
	$script = <<<END
	<script>
		alert("$msg");
		location.href="$url";
	</script>
END;
	echo $script;
	exit;
}
function script_msg_close($msg){
    $script = <<<END
	<script>
		alert("$msg");
		self.close();
	</script>
END;
    echo $script;
    exit;
}


function get_param_request($param_name, $istrim=false) {
	$valuestr='';
	if( isset($_REQUEST[$param_name]) )		$valuestr = $_REQUEST[$param_name];

	if($istrim)	$valuestr = @trim($valuestr);

	return $valuestr;
}

function get_param_cookie($param_name, $istrim=false) {
	$valuestr='';
	if( isset($_COOKIE[$param_name]) )	$valuestr = $_COOKIE[$param_name];

	if($istrim)	$valuestr = trim($valuestr);

	return $valuestr;
}
function get_days_interval($from, $to)
{
    $day_interval = date_diff(date_create($from), date_create($to));
    return $day_interval->days+1;
}

function formatdate_yyyymmdd($yyyymmdd, $gubun) {
	if( strlen($yyyymmdd) < 8 )
		return $yyyymmdd;

	$yyyy = substr($yyyymmdd, 0, 4);
	$mm = substr($yyyymmdd, 4, 2);
	$dd = substr($yyyymmdd, 6, 2);

	return $yyyy.$gubun.$mm.$gubun.$dd;
}

function formatdate_yyyymmdd_han($yyyymmdd) {
	if( strlen($yyyymmdd) < 8 )
		return $yyyymmdd;

		$yyyy = substr($yyyymmdd, 0, 4);
		$mm = substr($yyyymmdd, 4, 2);
		$dd = substr($yyyymmdd, 6, 2);

		return $yyyy."년 ".$mm."월 ".$dd."일";
}

function formatdate_yymmdd($yyyymmdd, $gubun) {
    if( strlen($yyyymmdd) < 6 )
        return $yyyymmdd;

    $yyyy = @substr($yyyymmdd, 2, 2);
    $mm = @substr($yyyymmdd, 4, 2);
    $dd = @substr($yyyymmdd, 6, 2);

    return $yyyy.$gubun.$mm.$gubun.$dd;
}

function formatdate_mmdd($yyyymmdd, $gubun) {
	if( strlen($yyyymmdd) < 8 )
		return $yyyymmdd;

		$yyyy = substr($yyyymmdd, 0, 4);
		$mm = substr($yyyymmdd, 4, 2);
		$dd = substr($yyyymmdd, 6, 2);

		return $mm.$gubun.$dd;
}

function timeformat_hhmm($stime){
    return substr($stime,0,2) . ":" . substr($stime,2,2);
}

function formattime_hhmm($hhmm, $gubun) {
	if( strlen($hhmm) < 4 )
		return $hhmm;

	$hh = substr($hhmm, 0, 2);
	$mm = substr($hhmm, 2, 2);

	return $hh.$gubun.$mm;
}

function formattime_hhmmss($hhmmss, $gubun) {
	if( strlen($hhmmss) < 6 )
		return $hhmmss;

	$hh = substr($hhmmss, 0, 2);
	$mm = substr($hhmmss, 2, 2);
	$ss = substr($hhmmss, 4, 2);

	return $hh.$gubun.$mm.$gubun.$ss;
}

function format_datetime($datetime)
{
	return formatdate_yyyymmdd($datetime, "/")." ".formattime_hhmm( substr($datetime,8,6), ":" );
}

function format_datetime_ext($datetime, $gubun)
{
	return formatdate_yyyymmdd($datetime, $gubun)." ".formattime_hhmmss( substr($datetime,8,6), ":" );
}

function fmt_mobile_number($no) {
    $no = str_replace("-", "", $no);
    if(strlen($no)<10)   return $no;

    if(strlen($no)==10) $val = substr($no,0,3)."-".substr($no,3,3)."-".substr($no,6);
    else                $val = substr($no,0,3)."-".substr($no,3,4)."-".substr($no,7);
    return $val;
}

function fmt_phone_number($no) {
	$no = str_replace("-", "", $no);
	if(strlen($no)<8)	return $no;

	$val = substr($no, 0, 2);
	if($val=='02')
	{
		if(strlen($no)==10) $val = substr($no,0,2)."-".substr($no,2,4)."-".substr($no,6);
		else			    $val = substr($no,0,2)."-".substr($no,2,3)."-".substr($no,5);
		return $val;
	}
	$val = substr($no,0,1);
	if($val=='0')
	{
		if(strlen($no)==10)	$val = substr($no,0,3)."-".substr($no,3,3)."-".substr($no,6);
		else				$val = substr($no,0,3)."-".substr($no,3,4)."-".substr($no,7);
	}
	else
	{
		if(strlen($no)==8) 	$val = substr($no,0,4)."-".substr($no,4);
		else				$val = substr($no,0,3)."-".substr($no,3);
	}
	return $val;
}

function fmt_invoice_date($in_date) {
	$fmt_date = $in_date;

	if( strlen($in_date) > 0) {
		$sy = substr($in_date, 0,4);
		$sm = substr($in_date, 4,2);
		$sd = substr($in_date, 6,2);
		$sdate = mktime(12,30,30, intval($sm), intval($sd), intval($sy));
		$fmt_date = date("d/M/Y", $sdate);
		$fmt_date = strtoupper($fmt_date);
	}

	return $fmt_date;
}

function file_save($file, $data){
    if($handle = fopen($file, 'w')){
        fwrite($handle, $data);
        fclose($handle);
    }
}
function file_delete($file){
    @unlink($file);
}
function file_write_line($file, $text)
{
    $fp = fopen($file, 'a+');
    fwrite($fp, $text."\n");
    fclose($fp);
}

function get_lastdate($date)
{
    $year = substr($date,0,4);
    $month = substr($date,4,2);
    $end_day = date("t", mktime(0,0,0,$month,1,$year));
    return $end_day;
}
/*
 * 부가세 계산
*/
function cal_tax($tax_type, $supply)
{
	$r = array();
	$r['supply'] = 0;
	$r['tax'] = 0;
	$r['total'] = 0;
	if($tax_type=='A'){ // 있음
		$r['tax'] = get_vat_price($supply);
		$r['supply'] = $supply;
	}else if($tax_type=='B'){ //없음
		$r['tax'] = 0;
		$r['supply'] = $supply;
	}else if($tax_type=='C'){ // 역표시
		$r['tax'] = extract_vat_price($supply) ;
		$r['supply'] = remove_vat_price($supply);
	}
	$r['total'] = $r['supply']+$r['tax'];
	return $r;
}
//
// function cal_tax_by_total($tax_type, $total)
// {
	// $r = array();
	// $r['supply'] = $total;
	// $r['tax'] = 0;
	// $r['total'] = $total;
	// if($tax_type=='A'){ // 있음
		// $r['tax'] = extract_vat_price($total);
		// $r['supply'] = $total-$r['tax'];
	// }else if($tax_type=='B'){ //없음
		// ;
	// }else if($tax_type=='C'){ // 역표시
		// $r['tax'] = extract_vat_price($total) ;
		// $r['supply'] = $total-$r['tax'];
	// }
	// return $r;
// }

function get_vat_price($price) {
	return intval(intval($price) / 10);
}

function remove_vat_price($price) {
	return intval($price) - intval(intval($price) / 11);
}

function extract_vat_price($price) {
	return intval(intval($price) / 11);
}

function month_add($yyyymm, $cnt_month)
{
    if(strlen($yyyymm)==8)  {
        $in_date=$yyyymm;
    }
    else {
        $in_date = $yyyymm."01";
    }

    $date = date_create($in_date);
    date_add($date, date_interval_create_from_date_string($cnt_month . ' month'));
    $str_date = date_format($date, 'Ym');
    return $str_date;
}

function date_add_by_val($yyyymmdd, $n)
{
	$date = date_create($yyyymmdd);
	date_add($date, date_interval_create_from_date_string($n. ' days'));
	$str_date = date_format($date, 'Ymd');
	return $str_date;
}

function fmt_date($dateStr /*yyyymmdd*/ , $fmt)
{
	return date_format(date_create($dateStr),$fmt);
}

function fmt_biz_number($bizno)
{
	if(strlen($bizno) != 10)	return $bizno;

	$v1 = substr($bizno, 0, 3);
	$v2 = substr($bizno, 3, 2);
	$v3 = substr($bizno, 5, 5);

    return sprintf("%s-%s-%s", $v1, $v2, $v3);
}

function fmt_month($yyyymm, $fmt)
{
    return substr($yyyymm, 0, 4).$fmt.substr($yyyymm, 4, 2);
}

function make_time($yyyymmdd, $hhiiss) {
	$yyyy = substr($yyyymmdd, 0, 4);
	$mm = substr($yyyymmdd, 4, 2);
	$dd = substr($yyyymmdd, 6, 2);

	$hh = substr($hhiiss, 0, 2);
	$ii = substr($hhiiss, 2, 2);
	$ss = substr($hhiiss, 4, 2);

	$dt_str = sprintf("%s-%s-%s %s:%s:%s", $yyyy, $mm, $dd, $hh, $ii, $ss);
	return strtotime($dt_str);
}
/*
 * yyyymmddhhiiss 14digit datetime
 * type : Y M D h i s
 * return added yyyymmddhhiiss
*/
function datetime_add($str_datetime, $type, $value)
{
	$datetime = new DateTime($str_datetime);
	$abs_value = abs($value);
	$sign = ($value*1)>0 ? 0 : 1;
	switch($type){
		case 'Y':$fmt = "P{$abs_value}Y";
			break;
		case 'M':$fmt = "P{$abs_value}M";
			break;
		case 'D':$fmt = "P{$abs_value}D";
			break;
		case 'h':$fmt = "PT{$abs_value}H";
			break;
		case 'i': $fmt = "PT{$abs_value}M";
			break;
		case 's': $fmt = "PT{$abs_value}S";
			break;
		default:return false;
			break;
	}
	$interval = new DateInterval($fmt);
	$interval->invert = $sign;
	$datetime->add($interval);
	return $datetime->format("YmdHis");

}

function create_unique_guid() {
	if (function_exists('com_create_guid') === true) {
		return trim(com_create_guid(), '{}');
	}
	return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X'
			, mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535)
			, mt_rand(16384, 20479), mt_rand(32768, 49151)
			, mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
}

function get_short_money($in_val, $ndiv) {
	if(!is_int($in_val))	$in_val = '0';

	$n_val = intval($in_val) / $ndiv;
	$n_val = intval($n_val);
	return $n_val;
}

function get_meter2yardcnt($cnt) {
	if($cnt == '')	return 0;

	// 소수 둘째자리에서 반올림하여, 소수 첫째짜리까지만
	$yc = ( floatval($cnt)*(1.093613) );
	$yc = intval(round($yc, 2) * 10) / 10;

	return $yc;
}
/**
 * 랜덤 문자열 생성
 * @param number $length
 * @return string
 * */
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function reg_dt(){
    return date("Ymd");
}

function null2blank($p) {
	if($p==NULL)	return '';
	else return $p;
}

function parse_excell($cv) {
	return trim(null2blank($cv));
}

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

function print_r2($var){
    ob_start();
    print_r($var);
    $str = ob_get_contents();
    ob_end_clean();
    $str = str_replace(" ", "&nbsp;", $str);
    echo nl2br("<span style='font-family:Tahoma, 굴림; font-size:9pt;'>$str</span>");
}

/*
 *
 */
function rrmdir($path) {
	// Open the source directory to read in files
	$i = new DirectoryIterator($path);
	foreach($i as $f) {
		if($f->isFile()) {
			@unlink($f->getRealPath());
		} else if(!$f->isDot() && $f->isDir()) {
			@rrmdir($f->getRealPath());
		}
	}
	@rmdir($path);
}

function order_num_distributor_compare($a, $b) {
	$adist = intval($a['order_num']);
	$bdist = intval($b['order_num']);
	
	if ($adist == $bdist) {
		return 0;
	}
	return ($adist < $bdist) ? 1 : -1;
}
?>