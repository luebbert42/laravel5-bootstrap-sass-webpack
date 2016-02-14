<?php 

$I = new AcceptanceTester($scenario);
$I->wantTo('Codecept smoke test: Check If Google Home page contains Google');

$I->amOnPage('http://google.de');
$I->see('Google');
