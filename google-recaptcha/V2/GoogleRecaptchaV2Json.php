<?php
/**
 * Created by Maatify.dev
 * User: Maatify.dev
 * Date: 2023-03-20
 * Time: 1:25 PM
 */

namespace Maatify\GoogleRecaptcha\V2;

class GoogleRecaptchaV2Json extends GoogleRecaptchaV2
{

    public function __construct()
    {
        parent::__construct();
        if(!empty($_ENV['GRCAPV2STATUS'])){
            $this->JsonValidation();
        }
    }

}