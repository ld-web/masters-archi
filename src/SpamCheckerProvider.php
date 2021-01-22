<?php

namespace App;

class SpamCheckerProvider
{
  public static function getSpamCheckerInstance(): ISpamChecker
  {
    // On pourrait mettre tout autre type réalisant ISpamChecker
    return new ArraySpamChecker();
  }
}
