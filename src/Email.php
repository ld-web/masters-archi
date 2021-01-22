<?php

namespace App;

use InvalidArgumentException;

class Email
{
  private $email;

  public function __construct(string $email)
  {
    if (!$this->isFormatValid($email)) {
      throw new InvalidArgumentException('Email format is invalid');
    }
    $this->email = $email;
  }

  public function getDomain(): string
  {
    $emailParts = explode('@', $this->email);
    return $emailParts[1];
  }

  public function isFormatValid(string $email): bool
  {
    $filteredEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
    return $filteredEmail !== false;
  }
}
