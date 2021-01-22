<?php

namespace App;

class ArraySpamChecker implements ISpamChecker
{
  private const SPAM_DOMAINS = ['spamming.com', 'mailinator.com', 'oneminutemail.com'];

  public function isSpam(Email $email): bool
  {
    return in_array($email->getDomain(), self::SPAM_DOMAINS);
  }
}
