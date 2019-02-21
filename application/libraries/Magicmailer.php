<?php

class Magicmailer extends \PHPMailer\PHPMailer\PHPMailer
{

    function __construct()
    {
        parent::__construct();
        $this->isSMTP();                                      // Set mailer to use SMTP
        $this->setFrom($_ENV['EMAIL_USER'], 'UKM Center');
        $this->Host       = $_ENV['EMAIL_HOST'];                // Specify main and backup SMTP servers
        $this->SMTPAuth   = true;                               // Enable SMTP authentication
        $this->Username   = $_ENV['EMAIL_USER'];                 // SMTP username
        $this->Password   = $_ENV['EMAIL_PASS'];                           // SMTP password
        $this->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
//        $this->SMTPDebug = 2;
        $this->isHTML(true);
        $this->Port = $_ENV['EMAIL_PORT'];
    }
}