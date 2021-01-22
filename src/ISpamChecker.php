<?php

namespace App;

interface ISpamChecker
{
  public function isSpam(Email $email): bool;
}
