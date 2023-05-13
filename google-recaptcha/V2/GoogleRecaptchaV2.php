<?php
/**
 * Created by Maatify.dev
 * User: Maatify.dev
 * Date: 2023-03-20
 * Time: 1:17 PM
 */

namespace Maatify\GoogleRecaptcha\V2;

use Maatify\GoogleRecaptcha\GoogleRecaptcha;

abstract class GoogleRecaptchaV2 extends GoogleRecaptcha
{

    public function __construct()
    {
        $this->secret = $_ENV['GRCAPV2SECRET'];
    }

}