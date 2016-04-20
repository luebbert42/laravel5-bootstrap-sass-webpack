<?php


/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = null)
 *
 * @SuppressWarnings(PHPMD)
*/
class AcceptanceTester extends \Codeception\Actor
{
    use _generated\AcceptanceTesterActions;

   /**
    * Define custom actions here
    */

    public function login( $name, $email,$password) {
        $I = $this;
        $I->amOnPage('/auth/login');
        $I->submitForm('.loginform', [
            'email' => $email,
            'password' => $password
        ]);
        $I->see($name, '.navbar');
    }

    public function loginAsAdmin() {
        $I = $this;
        $this->login('Admin','admin@example.com', 'AdminUser!');
    }

    public function loginAsUser() {
        $I = $this;
        $this->login('User','user@example.com', 'RegularUser!');
    }

    public function logout() {
        $I = $this;
        $I->amOnPage('/auth/logout');
    }


}
