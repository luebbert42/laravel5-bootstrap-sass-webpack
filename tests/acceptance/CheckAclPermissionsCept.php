<?php 

$I = new AcceptanceTester($scenario);
$I->wantTo('check that acl rights work');

$I->amGoingTo('Admins can access user admin');
$I->loginAsAdmin();
$I->amOnPage('/admin/users');
$I->see("Benutzer");
$I->logout();


$I->amGoingTo('User cannot access user admin');
$I->loginAsUser();
$I->amOnPage('/admin/users');
$I->dontSee("Benutzer");
$I->logout();