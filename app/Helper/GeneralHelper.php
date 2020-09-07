<?php
	/**
		* change plain number to formatted currency
		*
		* @param $number
		* @param $currency
	*/
	

	use App\User;
	use App\Transaction;
	use Illuminate\Support\Facades\Auth; 

	
	
	function string_to_url($url) {
		$url = preg_replace('~[^\\pL0-9_]+~u', '-', $url);
		$url = trim($url, "-");
		$url = iconv("utf-8", "us-ascii//TRANSLIT", $url);
		$url = strtolower($url);
		$url = preg_replace('~[^-a-z0-9_]+~', '', $url);
		return $url;
	}

	function user_id() {
		$user_id = Auth::user()->id;
		return $user_id;
	}






	// Function to get the client IP address
	function get_user_ip() {
	    $ipaddress = '';
	    if (isset($_SERVER['HTTP_CLIENT_IP']))
	        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
	    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
	        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
	    else if(isset($_SERVER['HTTP_X_FORWARDED']))
	        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
	    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
	        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
	    else if(isset($_SERVER['HTTP_FORWARDED']))
	        $ipaddress = $_SERVER['HTTP_FORWARDED'];
	    else if(isset($_SERVER['REMOTE_ADDR']))
	        $ipaddress = $_SERVER['REMOTE_ADDR'];
	    else
	        $ipaddress = 'UNKNOWN';
	    return $ipaddress;
	}
	
	function share_status_badge($distribution_id)
	{
		$badge = "<span class='badge badge-pill badge-danger m-1'>Unpaid</span>";
		if(!is_null($distribution_id) && $distribution_id > 0)
		$badge = '<span class="badge badge-pill badge-success m-1">Paid</span>';
		return $badge;
	}

	function notification_status_badge($status)
	{
		$badge = "<span class='badge badge-pill badge-danger m-1'>Pending</span>";
		if($status==1)
		$badge = '<span class="badge badge-pill badge-success m-1">Approved</span>';
		return $badge;
	}

	function type_badge($status)
	{
		$badge = "<span class='badge badge-pill badge-warning m-1'>Public</span>";
		if($status==1)
		$badge = '<span class="badge badge-pill badge-primary m-1">Private</span>';

		return $badge;
	}

	function profile_pic()
	{
		if(Auth::check()){
			if(!empty(Auth::user()->profile_pic)){
				return Config::get('constants.IMAGE_PATH').Auth::user()->profile_pic;
			}
    	}
    	return Config::get('constants.DEFAULT_IMAGE_PATH').'default-user.jpg';
	}
	function mou_file($file_name)
	{
    	return Config::get('constants.MOU_PATH').$file_name;
	}
	function mou_file_icon()
	{
    	return Config::get('constants.DEFAULT_IMAGE_PATH').'mou-icon.png';
	}
	function defaul_image_view($file)
	{
		if(!empty($file)){
			return Config::get('constants.IMAGE_PATH').$file;
		}
    	return Config::get('constants.DEFAULT_IMAGE_PATH').'default-user.jpg';
	}
	
	function defaul_file_view($file)
	{
		if(!empty($file)){
			return Config::get('constants.IMAGE_PATH').$file;
		}
    	return Config::get('constants.DEFAULT_IMAGE_PATH').'no-image.jpg';
	}
	


	function db_date($input_date)
	{
		$date = NULL;
		if(!empty($input_date)){
			$input_date = str_replace('/', '-', $input_date);
			$date = date('Y-m-d',strtotime($input_date));
		}
		
		return $date;
	}

	function db_to_input_date($db_date)
	{
		$date = NULL;
		if(!empty($db_date)){
			//$input_date = str_replace('/', '-', $input_date);
			$date = date('d/m/Y',strtotime($db_date));
		}
		return $date;
	}
	function db_to_view_date($db_date)
	{
		$date = NULL;
		if(!empty($db_date)){
			//$input_date = str_replace('/', '-', $input_date);
			$date = date('d-M-Y',strtotime($db_date));
		}
		
		return $date;
	}

	function db_month_date($input_date)
	{
		$date = NULL;
		if(!empty($input_date)){
			$input_date = '01-'.str_replace('/', '-', $input_date);
			$date = date('Y-m-d',strtotime($input_date));
		}
		
		return $date;
	}

	function db_month_to_input_date($db_date)
	{
		$date = NULL;
		if(!empty($db_date)){
			//$input_date = str_replace('/', '-', $input_date);
			$date = date('m/Y',strtotime($db_date));
		}
		return $date;
	}
	function db_month_to_view_date($db_date)
	{
		$date = NULL;
		if(!empty($db_date)){
			//$input_date = str_replace('/', '-', $input_date);
			$date = date('M-Y',strtotime($db_date));
		}
		
		return $date;
	}

	function asDollars($value) {
	  if ($value<0) return "-".asDollars(-$value);
	  return '₹ ' . number_format($value);
	}

	 function numberToCurrency($num)
	{


		$whole = floor($num);      // 1
		$fraction = round($num - $whole,2); // .25
		$num = intval($num);

		$len = strlen($num);
	    $m = '';
	    $money = strrev($num);
	    for($i=0;$i<$len;$i++){
	        if(( $i==3 || ($i>3 && ($i-1)%2==0) )&& $i!=$len){
	            $m .=',';
	        }
	        $m .=$money[$i];
	    }
	    $lastint = strrev($m);
	    if($fraction > 0){
	    	$fraction = substr($fraction, 1);
			return '₹ ' . $lastint.$fraction;
		}
	    return '₹ ' . $lastint;
   
//end code first
	
	    if(setlocale(LC_MONETARY, 'en_IN'))
	      	return asDollars($num);
	      	//return money_format('%.0n', $num);
	    else {
	      	$explrestunits = "" ;
			if(strlen($num)>3){
			  $lastthree = substr($num, strlen($num)-3, strlen($num));
			  $restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
			  $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
			  $expunit = str_split($restunits, 2);
			  for($i=0; $i<sizeof($expunit); $i++){
			      // creates each of the 2's group and adds a comma to the end
			      if($i==0)
			      {
			          $explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
			      }else{
			          $explrestunits .= $expunit[$i].",";
			      }
			  }
			  $thecash = $explrestunits.$lastthree;
			} else {
			  $thecash = $num;
			}
	      return '₹ ' . $thecash;
	    }
	}
	function randomString($len = 5){
	 
	  $s = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, $len);
	  return $s;
	  return substr($result, -5);
	}

	

	function get_share_count($amount)
	{
		$count  = array_search($amount, Config::get('constants.AMOUNT_ARRAY'));
		return $count;
	}
