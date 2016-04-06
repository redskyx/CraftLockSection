<?php
namespace Craft;

class LockSectionController extends BaseController
{
    protected $allowAnonymous = true;

    // Login authorization action
    public function actionAuthorize()
    {
        // Get password
        $pwSubmitted = craft()->request->getPost('pw');

        // Check access
        if ($this->_validPassword($pwSubmitted)) {

            // Set access cookie
            $expires = time() + (60*60*24*7); // One week
            setcookie(md5('cookieNameToBeHashed'), 1, $expires, '/');

            // Redirect
            $this->redirect(craft()->request->getPath());

        } else {

            // Output error message
            craft()->urlManager->setRouteVariables(array(
                'error' => 'Invalid access code'
            ));

        }

    }

    // Check if password is valid
    private function _validPassword($pwSubmitted)
    {
      	  
	    // Get global set
       // $globalSet = craft()->globals->getSetById(1728);
       $globalSet = craft()->globals->getSetByHandle('locksection');

        // Get target password
        $pwTarget = $globalSet->password;

		//$pwTarget = 'password';
        // Return whether password matches
        return ($pwSubmitted === $pwTarget);
    }

}