<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2016, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2016, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter URL Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/user_guide/helpers/url_helper.html
 */

// ------------------------------------------------------------------------

if ( ! function_exists('read_more'))
{
	/**
	 * Site URL
	 *
	 * Create a local URL based on your basepath. Segments can be passed via the
	 * first parameter either as a string or an array.
	 *
	 * @param	string	$uri
	 * @param	string	$protocol
	 * @return	string
	 */
	function read_more($string,$limit=100)
	{
		$length = strlen(strip_tags($string));
		if ($length>$limit){
			// return substr(strip_tags($string),0,$limit).' . . . ';
			$isi_halaman = strip_tags($string);
			$isi = substr($isi_halaman,0,$limit);
			$isi = substr($isi_halaman,0,strrpos($isi," "));

			return $isi;

		}
		else {
			return strip_tags($string);
		}
	}
}

if (! function_exists('goResult')){

	function goResult($def,$msg){
    	$data['auth'] 	= $def;
		$data['msg'] 	= $msg;
		return toJson($data);
    }
}

if ( ! function_exists('youtube_preview'))
{
	/**
	 * Site URL
	 *
	 * Create a local URL based on your basepath. Segments can be passed via the
	 * first parameter either as a string or an array.
	 *
	 * @param	string	$uri
	 * @param	string	$protocol
	 * @return	string
	 */
	function youtube_preview($url)
	{
		//https://www.youtube.com/watch?v=3p4MZJsexEs
		//https://img.youtube.com/vi/3p4MZJsexEs/mqdefault.jpg
		$bodytag = str_replace("https://www.youtube.com/watch?v=", "https://img.youtube.com/vi/", $url);
		return $bodytag.'/mqdefault.jpg';
	}
}

if ( ! function_exists('youtube_embed'))
{
	/**
	 * Site URL
	 *
	 * Create a local URL based on your basepath. Segments can be passed via the
	 * first parameter either as a string or an array.
	 *
	 * @param	string	$uri
	 * @param	string	$protocol
	 * @return	string
	 */
	function youtube_embed($url)
	{
		//https://www.youtube.com/watch?v=3p4MZJsexEs
		//https://img.youtube.com/vi/3p4MZJsexEs/mqdefault.jpg
		$bodytag = str_replace("https://www.youtube.com/watch?v=", "//www.youtube.com/embed/", $url);
		return $bodytag.'/mqdefault.jpg';
	}
}



if ( ! function_exists('find_replace'))
{
	/**
	 * Site URL
	 *
	 * Create a local URL based on your basepath. Segments can be passed via the
	 * first parameter either as a string or an array.
	 *
	 * @param	string	$uri
	 * @param	string	$protocol
	 * @return	string
	 */
	function find_replace($string,$find)
	{
		$bodytag = str_replace($find, "<b><u>".$find."</u></b>", $string);
		return $bodytag;
	}
}

if ( ! function_exists('toJson'))
{
	function toJson($var) {
	    header('Content-Type: application/json');
	    return json_encode($var);
	}
}


if ( ! function_exists('seo'))
{
	function seo($s) {
	    $c = array (' ');
	    $d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');
	    $s = str_replace($d, '', $s); // Hilangkan karakter yang telah disebutkan di array $d
	    $s = strtolower(str_replace($c, '-', $s)); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
	    return $s;
		}
}

if ( ! function_exists('seo_gbr'))
{
	function seo_gbr($s) {
	    $c = array (' ');
	    $d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');
	    $s = str_replace($d, '', $s); // Hilangkan karakter yang telah disebutkan di array $d
	    $s = str_replace($c, '-', $s); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
	    return $s;
		}
}

if ( ! function_exists('match'))
{
	function match($val,$val2,$return){
		if ($val==$val2){
			return $return;
		}
	}
}

if ( ! function_exists('daysLeft'))
{
	function daysLeft($date,$day){
		date_default_timezone_set('Asia/Jakarta');
		$tanggal = Date('Y-m-d');
		$now 	= new DateTime($tanggal);
		$date 	= new DateTime($date);
		$result = $now->diff($date);

		return (($day - $result->days)<=0) ? 0 : $day - $result->days ;
	}
}


if ( ! function_exists('zero'))
{
	function zero($data,$url){
		if(count($data)<=0){
			redirect($url);
			exit;
		}
	}
}


if ( ! function_exists('remFile'))
{
	function remFile($path){
		if(file_exists($path)){
			if(unlink($path)){
				return true;	
			}
			return false;
		}

		return false;
	}
}



if (!function_exists('img_holder')){
	function img_holder($type=null){
		switch ($type) {
			case 'food':
				return base_url().'assets/images/placeholder/food.png';
				break;
			case 'profile':
			    return base_url().'assets/images/placeholder/avatar.png';
				break;
			case 'polsek':
			    return base_url().'assets/images/placeholder/polsek.png';
				break;
			default:
				return base_url().'assets/images/placeholder/basic.png';
				# code...
				break;
		}
	}
}

if (!function_exists('img_artikel')) {
	function img_artikel($img=null){
		return base_url().'assets/images/artikel/'.$img;
	}
}

if (!function_exists('img_struktur')) {
    function img_struktur($img=null){
        return base_url().'assets/images/struktur/'.$img;
    }
}

if (!function_exists('img_album')) {
	function img_album($img=null){
		return base_url().'assets/images/gallery/'.$img;
	}
}

if (!function_exists('img_potensi')) {
	function img_potensi($img=null){
		return base_url().'assets/images/potensi/'.$img;
	}
}

if (!function_exists('img_produk')) {
	function img_produk($img=null){
		return base_url().'assets/images/produk/'.$img;
	}
}

if (!function_exists('img_slider')) {
	function img_slider($img=null){
		return base_url().'assets/images/slider/'.$img;
	}
}

if (!function_exists('img_pejabat')) {
	function img_pejabat($img=null){
		return base_url().'assets/images/pejabat/'.$img;
	}
}

if (!function_exists('img_profil')) {
	function img_profil($img=null){
		return base_url().'assets/images/profil/'.$img;
	}
}

if (!function_exists('img_header')) {
	function img_header($img=null){
		return base_url().'assets/images/header/'.$img;
	}
}


if (!function_exists('notif_type')){
	function notif_type($data,$type=null){

		switch ($data) {
			case 'restaurant':
				$hasil 		= ($type==null) ? '<span class="label label-danger  label-icon"><i class="fa fa-cutlery"></i></span>' : '<span class="label label-danger  label-icon"><i class="fa fa-cutlery"></i></span>';
				break;
			case 'users':
			    $hasil 		= ($type==null) ? '<span class="label label-primary  label-icon"><i class="fa fa-users"></i></span>' : '<span class="label label-primary  label-icon"><i class="fa fa-users"></i></span>';
				break;
			case 'preorder':
			    $hasil 		= ($type==null) ? '<span class="label label-success  label-icon"><i class="fa fa-truck"></i></span>' : '<span class="label label-success  label-icon"><i class="fa fa-truck"></i></span>';
				break;
			case 'promo':
			    $hasil 		= ($type==null) ? '<span class="label label-warning  label-icon"><i class="fa fa-gift"></i></span>' : '<span class="label label-warning  label-icon"><i class="fa fa-gift"></i></span>';
				break;
			case 'review':
			    $hasil 		= ($type==null) ? '<span class="label label-info  label-icon"><i class="fa fa-newspaper-o"></i></span>' : '<span class="label label-info  label-icon"><i class="fa fa-newspaper-o"></i></span>';
				break;
			case 'message':
			    $hasil 		= ($type==null) ? '<span class="label bg-purple  label-icon"><i class="fa fa-envelope-o"></i></span>' : '<span class="label bg-inverse  label-icon"><i class="fa fa-envelope-o"></i></span>';
				break;
			default:
				$hasil 		= ($type==null) ? '<span class="label label-default  label-icon"><i class="fa fa-question"></i></span>' : '<span class="label label-default  label-icon"><i class="fa fa-question"></i></span>';
				# code...
				break;
		}

		return $hasil;
	}
}

if ( ! function_exists('toTime'))
{
	function toTime($date){
		$time=strtotime($date);
		return date("H:i",$time);
	}
}

if ( ! function_exists('countSoal')) 
{
	function countSoal($kuesioner)
	{
	    $CI =& get_instance();

	    $query = $CI->db->query("SELECT * FROM soal WHERE id_kuesioner = $kuesioner->id_kuesioner");
	    if($query->num_rows() > 0)
	    {
	        return $query->num_rows();
	    }else
	    {
	        return 0; 
	    }
	}
}

if ( ! function_exists('countJawaban')) 
{
	function countJawaban($kuesioner)
	{
	    $CI =& get_instance();

	    $query = $CI->db->query("SELECT * FROM jawaban WHERE id_kuesioner = $kuesioner->id_kuesioner");
	    if($query->num_rows() > 0)
	    {
	        return $query->num_rows();
	    }else
	    {
	        return 0; 
	    }
	}
}


// ------------------------------------------------------------------------
if (!function_exists('tgl_indo')){
	function tgl_indo($tgl){
     	$tanggal = substr($tgl,8,2);
     	switch (substr($tgl,5,2)){
					case '01': 
						$bulan= "Januari";
						break;
					case '02':
						$bulan= "Februari";
						break;
					case '03':
						$bulan= "Maret";
						break;
					case '04':
						$bulan= "April";
						break;
					case '05':
						$bulan= "Mei";
						break;
					case '06':
						$bulan= "Juni";
						break;
					case '07':
						$bulan= "Juli";
						break;
					case '08':
						$bulan= "Agustus";
						break;
					case '09':
						$bulan= "September";
						break;
					case '10':
						$bulan= "Oktober";
						break;
					case '11':
						$bulan= "November";
						break;
					case '12':
						$bulan= "Desember";
						break;
				}

		$tahun = substr($tgl,0,4);
		return $tanggal.' '.$bulan.' '.$tahun;
     }
}

if (!function_exists('dateRange')){
	function dateRange($strDateFrom,$strDateTo)
	{
	    $aryRange=array();

	    $iDateFrom=mktime(1,0,0,substr($strDateFrom,5,2),     substr($strDateFrom,8,2),substr($strDateFrom,0,4));
	    $iDateTo=mktime(1,0,0,substr($strDateTo,5,2),     substr($strDateTo,8,2),substr($strDateTo,0,4));

	    if ($iDateTo>=$iDateFrom)
	    {
	        array_push($aryRange,date('Y-m-d',$iDateFrom)); // first entry
	        while ($iDateFrom<$iDateTo)
	        {
	            $iDateFrom+=86400; // add 24 hours
	            array_push($aryRange,date('Y-m-d',$iDateFrom));
	        }
	    }
	    return $aryRange;
	}
}