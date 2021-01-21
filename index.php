<?php

require_once 'constants.php';
require_once 'functions.php';

if (!hasGetParam(EMAIL_PARAM_NAME)) {
  error("Please provide a valid email address");
}

$email = $_GET['email'];

if (!isEmailValid($email)) {
  error("Invalid email address");
}

$domain = getDomainFromEmail($email);
if ($domain === null) {
  error("Unable to extract domain from email address");
}

if (isSpam($domain, SPAM_DOMAINS)) {
  error("Email is spam");
}

echo "Email is valid";
