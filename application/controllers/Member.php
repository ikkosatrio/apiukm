<?php
/**
 * Created by PhpStorm.
 * User: Ikko
 * Date: 13/01/2019
 * Time: 18.19
 */

class Member extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->blade->sebarno('ctrl', $this);
        $this->data['config'] 				= ConfigModel::find(1);
    }

    function confirmation($code){
        if(!$code){
            echo "code not found";
            return;
        }else{
            $member = MemberModel::where("CodeActivation",$code)->first();
            if(!$member){
                echo  "code doesn't exist";
                return;
            }
            $member->Status = "AKTIF";
            $member->save();
            echo "sukses";
            die();
        }
    }
}