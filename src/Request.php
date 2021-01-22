<?php

namespace App;

use InvalidArgumentException;

class Request
{
  /**
   * Returns the get param at given index
   *
   * @param string $index
   * @return mixed
   * @throws InvalidArgumentException if given index does not exist or is empty
   */
  public function getParam(string $index)
  {
    if (!$this->hasGetParam($index)) {
      throw new InvalidArgumentException($index . ' parameter is required.');
    }

    return $_GET[$index];
  }

  private function hasGetParam(string $index): bool
  {
    return !empty($_GET) && !empty($_GET[$index]);
  }
}
