<?php
namespace Craft;

class LockSectionVariable
{

    // Check if access cookie is set
    public function accessGranted()
    {
        $cookieName = md5('cookieNameToBeHashed');
        return array_key_exists($cookieName, $_COOKIE);
    }

}