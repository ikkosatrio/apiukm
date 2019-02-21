<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Api extends CI_Controller
{

    public function __construct() {
        parent::__construct();
        $this->load->library('image_lib');
        $this->blade->sebarno('ctrl', $this);
        $this->data['config'] 				= ConfigModel::find(1);
    }

    function getParams($str){
        return isset($_REQUEST[$str]) ? $_REQUEST[$str] : '';
    }

    static function getHttpMessage($code) {
        $status_codes = array(
            100 => 'Continue',
            101 => 'Switching Protocols',
            200 => 'OK',
            201 => 'Created',
            202 => 'Accepted',
            203 => 'Non-Authoritative Information',
            204 => 'No Content',
            205 => 'Reset Content',
            206 => 'Partial Content',
            301 => 'Moved Permanently',
            302 => 'Found',
            303 => 'See Other',
            304 => 'Not Modified',
            305 => 'Use Proxy',
            307 => 'Temporary Redirect',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            403 => 'Forbidden',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            406 => 'Not Acceptable',
            407 => 'Proxy Authentication Required',
            408 => 'Request Timeout',
            409 => 'Conflict',
            410 => 'Gone',
            411 => 'Length Required',
            412 => 'Precondition Failed',
            413 => 'Request Entity Too Large',
            414 => 'Request-URI Too Long',
            415 => 'Unsupported Media Type',
            416 => 'Request Range Not Satisfiable',
            417 => 'Expectation Failed',
            422 => 'Unprocessable Entity',
            429 => 'Too Many Requests',
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
            502 => 'Bad Gateway',
            503 => 'Service Unavailable',
            504 => 'Gateway Timeout',
            505 => 'HTTP Version Not Supported',
        );
        return isset($status_codes[$code]) ? $status_codes[$code] : '';
    }

    static function showMessage($code = 200, $message = "", $arr = array(), $json = true) {
        //1xx is all about information
        //2xx is all about success
        //3xx is all about redirection
        //4xx is all about client errors
        //5xx is all about service errors

        $msg = self::getHttpMessage($code);
        if ($message) {
            $msg = $message;
        }



        $arr_return['Meta'] = array('Code' => $code, 'Message' => $msg);
        if (count($arr) && sizeof($arr)) {
            $arr_return += $arr;
        }

        if ($json) {
            //return json_encode($arr_return, JSON_NUMERIC_CHECK);
            echo json_encode($arr_return);
            return;
        } else {
            return $arr_return;
        }
    }

    function CheckAccessToken() {
        if (!isset($_REQUEST['AccessToken'])) {
            return self::showMessage(401);
        }

        if (!AppsToken::IsAccessTokenExist($_REQUEST['AccessToken'])) {
            return self::showMessage(401);
        }
    }

    function CheckClientID() {
//        var_dump($_REQUEST);
        if (!isset($_REQUEST['ClientID'])) {
            return false;
        }

        if (!AppDataModel::where('ClientID',$_REQUEST['ClientID'])->first()) {

            return false;
        }
        return true;
    }

    function MessageClientID() {
        if (!isset($_REQUEST['ClientID'])) {
            return self::showMessage(401);
        }

        if (!AppDataModel::where('ClientID',$_REQUEST['ClientID'])->first()) {
            return self::showMessage(401);
        }
    }

    function generateImageThumbSmall($path){
        $config['image_library'] = 'gd2';
        $config['source_image'] = $path;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width']         = 320;
        $config['height']       = 480;
        $config['thumb_marker'] = "_small";

        $this->load->library('image_lib', $config);
        $this->image_lib->initialize($config);
//        $this->image_lib->clear();

        $this->image_lib->resize();
    }

    function generateImageThumbMedium($path){
        $config['image_library'] = 'gd2';
        $config['source_image'] = $path;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width']         = 480;
        $config['height']       = 800;
        $config['thumb_marker'] = "_medium";

        $this->load->library('image_lib', $config);
        $this->image_lib->initialize($config);
//        $this->image_lib->clear();

        $this->image_lib->resize();
    }

    function generateImageThumbLarge($path){
        $config['image_library'] = 'gd2';
        $config['source_image'] = $path;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width']         = 720;
        $config['height']       = 1280;
        $config['thumb_marker'] = "_large";

        $this->load->library('image_lib', $config);
        $this->image_lib->initialize($config);
//        $this->image_lib->clear();

        $this->image_lib->resize();
    }

    public function upload($dir,$name ='file',$filename=null){
        $config['upload_path']      = $dir;
        $config['allowed_types']    = 'gif|jpg|png|jpeg|docx|doc|pdf';
        $config['max_size']         = 8000;
        $config['encrypt_name'] 	= FALSE;
        $config['file_name'] 		= $filename;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload($name))
        {
            $data['auth'] 	= false;
            $data['msg'] 	= $this->upload->display_errors();
            return $data;
        }
        else
        {
            $data['auth']	= true;
            $data['msg']	= $this->upload->data();
            return $data;
        }
    }
}