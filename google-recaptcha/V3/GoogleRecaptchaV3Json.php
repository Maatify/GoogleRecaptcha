<?php
/**
 * Created by Maatify.dev
 * User: Maatify.dev
 * Date: 2023-03-20
 * Time: 1:27 PM
 */

namespace Maatify\GoogleRecaptcha\V3;

class GoogleRecaptchaV3Json extends GoogleRecaptchaV3
{
    public function __construct(string $action = '')
    {
        parent::__construct();
        if(!empty($_ENV['GRCAPV3STATUS'])){
            $this->JsonValidation($action);
        }
    }
}