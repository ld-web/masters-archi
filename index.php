<?php

require_once 'vendor/autoload.php';

use App\Email;
use App\HtmlPrinter;
use App\Request;
use App\SpamCheckerProvider;

$request = new Request();

try {
  $emailQueryString = $request->getParam('email');
  $email = new Email($emailQueryString);
} catch (InvalidArgumentException $e) {
  HtmlPrinter::printAndExit($e->getMessage());
}

$spamChecker = SpamCheckerProvider::getSpamCheckerInstance();

if ($spamChecker->isSpam($email)) {
  HtmlPrinter::printAndExit('Email is spam');
}

echo "Email is valid";
