<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Ikko
 * Date: 12/01/2019
 * Time: 22.07
 */
class MemberApi extends MY_Api
{
    function index()
    {
        return self::showMessage(404, "Anda tersesat");
    }

    function login()
    {
        if (!$this->CheckClientID()) {
            return $this->MessageClientID();
        }

        $where = array(
            'Email' => $_REQUEST['Email'],
            'Password' => md5($_REQUEST['Password']),
        );


        $member = MemberModel::where($where)->first();
//        echo "<pre>";
//        var_dump($member->toArray());
//        die();
        if (!$member) {
            return self::showMessage(404, "Email or password wrong");
        }

        if ($member->Status == "NON-AKTIF") {
            return self::showMessage(404, "Email or password wrong");
        }

        return self::showMessage(200, "Login Sukses", array(
            "Data" => $member->toArray()
        ));

    }

    function edit(){
        
    }

    function registration()
    {

//        var_dump($_REQUEST);
        if (!$this->CheckClientID()) {
            return $this->MessageClientID();
        }

        if (!$this->CheckEmailExist($_REQUEST['Email'])) {
            return self::showMessage(401, "Email Exist");
        }

        $member                 = new MemberModel();
        $member->Name           = $_REQUEST['Name'];
        $member->Email          = $_REQUEST['Email'];
        $member->Password       = md5($_REQUEST['Password']);
        $member->CodeActivation = $this->generateCodeActivation();
        $member->save();
        $member = MemberModel::find($member->id);

        if (!$this->sendEmailRegistration($member)) {
            return self::showMessage(401, 'Tidak bisa dikirim');
        }

        return self::showMessage(200, '', array(
            'Data' => $member->toArray()
        ));
    }


    function sendEmailRegistration($member)
    {
        $mail            = new Magicmailer;
        $email['member'] = $member;
        $email['config'] = $this->data['config'];
        $mail->addAddress($member->Email, $member->Name);
        $mail->Body    = $this->blade->nggambar('email.member.register', $email);
        $mail->Subject = 'Email Konfirmasi Pendaftaran Member';
        $mail->AltBody = "Email Konfirmasi Pendaftaran Member $member->Name";

        if ($mail->send()) {
            return true;
        } else {
            return false;
        }
    }

    function CheckEmailExist($email)
    {
        $member = MemberModel::where("Email", $email)->first();
        if ($member) {
            return false;
        } else {
            return true;
        }
    }

    function generateCodeActivation()
    {
        return md5('Cak' . time());
    }

}