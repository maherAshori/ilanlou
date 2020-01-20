<?php

namespace App\Utility;
use Cake\Core\Configure;
use App\Utility\SMSVerification;
use App\Utility\WhiteSms;
use App\Utility\SMSAddContacts;

class Sms
{
    //white sms
    public function _send($message, $to){
        $sms = Configure::read('Sms');

        try {
            date_default_timezone_set("Asia/Tehran");

            $APIKey = $sms['ApiKey'];
            $SecretKey = $sms['SecretKey'];

            // Send data
            $SendData = array(
                'Message' => __('کد ورود به وب سایت زبان ایلانلو {0} میباشد', $message),
                'MobileNumbers' => [$to],
                'CanContinueInCaseOfError' => true
            );

            $whiteSms = new WhiteSms($APIKey,$SecretKey);
            $SendByMobileNumbers = $whiteSms->SendByMobileNumbers($SendData);

            if($SendByMobileNumbers->IsSuccessful){
                return true;
            }else{
                return false;
            }

        } catch (Exeption $e) {
            echo 'Error SendByMobileNumbers : '.$e->getMessage();
        }
    }

    //white sms
    public function _addContact($person)
    {
        $sms = Configure::read('Sms');

        try {
            date_default_timezone_set("Asia/Tehran");

            $APIKey = $sms['ApiKey'];
            $SecretKey = $sms['SecretKey'];

            // add contacts data
            $ContactsData = [
                'ContactsDetails' => [
                    [
                        'Prefix' => '',
                        'FirstName' => $person['firstName'],
                        'LastName' => $person['lastName'],
                        'Mobile' => $person['mobile'],
                        'EmojiId' => '1'
                    ]
                ],
                'GroupId' => 61515
            ];

            $data = new SMSAddContacts($APIKey, $SecretKey);
            $AddContacts = $data->AddContacts($ContactsData);

            if($AddContacts->IsSuccessful){
                return true;
            }else{
                return false;
            }

        } catch (Exeption $e) {
            echo 'Error AddContacts : '.$e->getMessage();
        }
    }

    //normal sms
    public function send($code, $to){
        $sms = Configure::read('Sms');

        try {
            date_default_timezone_set("Asia/Tehran");

            // your sms.ir panel configuration
            $APIKey = $sms['ApiKey'];
            $SecretKey = $sms['SecretKey'];

            $APIURL = "https://ws.sms.ir/";

            // your code
            $Code = $code;

            // your mobile number
            $MobileNumber = $to;

            $SmsIR_VerificationCode = new SMSVerification($APIKey, $SecretKey, $APIURL);
            $VerificationCode = $SmsIR_VerificationCode->verificationCode($Code, $MobileNumber);
            if($VerificationCode === "your verification code is sent"){
                return true;
            }else{
                return false;
            }

        } catch (Exeption $e) {
            echo 'Error VerificationCode : ' . $e->getMessage();
        }
    }

}

