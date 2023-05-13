<?php
/**
 * Created by Maatify.dev
 * User: Maatify.dev
 * Date: 2023-03-20
 * Time: 1:17 PM
 */

namespace Maatify\GoogleRecaptcha\V3;

use Maatify\GoogleRecaptcha\GoogleRecaptcha;

abstract class GoogleRecaptchaV3 extends GoogleRecaptcha
{
    public function __construct()
    {
        $this->secret = $_ENV['GRCAPV3SECRET'];
    }

}