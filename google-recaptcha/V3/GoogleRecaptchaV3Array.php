<?php
/**
 * Created by Maatify.dev
 * User: Maatify.dev
 * Date: 2023-03-20
 * Time: 1:27 PM
 */

namespace Maatify\GoogleRecaptcha\V3;

class GoogleRecaptchaV3Array extends GoogleRecaptchaV3
{

    public function Validate(string $action = ''): array
    {
        if(!empty($_ENV['GRCAPV3STATUS'])){
            parent::__construct();
            return parent::Validation($action);
        }else{
            return ['value'=>200];
        }
    }

}