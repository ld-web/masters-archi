<?php

namespace App;

class HtmlPrinter
{
  public static function printAndExit(string $msg)
  {
    echo $msg;
    exit;
  }
}
