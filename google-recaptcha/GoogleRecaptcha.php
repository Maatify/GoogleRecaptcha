<?php
/**
 * Created by Maatify.dev
 * User: Maatify.dev
 * Date: 2023-03-20
 * Time: 12:10 PM
 */

namespace Maatify\GoogleRecaptcha;

use Maatify\Json\Json;
use Maatify\Logger\Logger;
use ReCaptcha\ReCaptcha;

abstract class GoogleRecaptcha
{

    protected string $secret;


    protected function Validation(string $actionName = ''): array
    {
        $response['value'] = 503;
        if(! empty($_POST['g-recaptcha-response'])){
            $remoteIp = $_SERVER['REMOTE_ADDR'];
            $gRecaptchaResponse = $_POST['g-recaptcha-response'];
            $recaptcha = new ReCaptcha($this->secret);
            if(!empty($actionName)){
                $recaptcha->setExpectedAction($actionName);
            }
            $resp = $recaptcha->verify($gRecaptchaResponse, $remoteIp);
            if ($resp->isSuccess()) {
                $response['value'] = 200;
            } else {
                $response['error'] = $resp->getErrorCodes();
                Logger::RecordLog($response['error'], __CLASS__);
            }
        }else{
            $response['error'] = 'Invalid Token';
        }
        return $response;
    }

    protected function JsonValidation(string $actionName = ''): void
    {
        //g-recaptcha-response
        //g_recaptcha
        if(! empty($_POST['g-recaptcha-response'])){
            $remoteIp = $_SERVER['REMOTE_ADDR'];
            $gRecaptchaResponse = $_POST['g-recaptcha-response'];
            $recaptcha = new ReCaptcha($this->secret);
            if(!empty($actionName)){
                $recaptcha->setExpectedAction($actionName);
            }
            $resp = $recaptcha->verify($gRecaptchaResponse, $remoteIp);
            if (!$resp->isSuccess()) {
                Json::Incorrect('g-recaptcha-response', Json::JsonFormat($resp->getErrorCodes()));
            }
        }else{
            Json::Missing('g-recaptcha-response', 'Invalid G-Recaptcha Token');
        }
    }


    // ===================== this to be a reference for use in the future
/**
    public function ValidationSet(string $gRecaptchaResponse, string $action = '')
    {
        $remoteIp = $_SERVER['REMOTE_ADDR'];

        $recaptcha = new ReCaptcha($this->secret);

        $resp = $recaptcha->setExpectedHostname('recaptcha-demo.appspot.com')
            ->setExpectedApkPackageName($apkPackageName)
            ->setExpectedAction('homepage')
            ->setScoreThreshold(0.5)
            ->verify($gRecaptchaResponse, $remoteIp);

        if ($resp->isSuccess()) {
            // Verified!
        } else {
            $errors = $resp->getErrorCodes();
        }
    }
 */
}