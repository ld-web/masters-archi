<?php

/**
 * Check if $_GET array has given parameter
 *
 * @param string $paramName
 * @return boolean
 */
function hasGetParam(string $paramName): bool
{
  return !empty($_GET) && !empty($_GET[$paramName]);
}

/**
 * Checks if given value has a valid email address format
 *
 * @param string $value
 * @return boolean
 */
function isEmailValid(string $value): bool
{
  $formattedValue = filter_var($value, FILTER_VALIDATE_EMAIL);
  return $formattedValue !== false;
}

/**
 * Extracts domain from given email address, returns null on failure
 *
 * @param string $email
 * @return null|string
 */
function getDomainFromEmail(string $email): ?string
{
  $emailParts = explode('@', $email);
  if ($emailParts === false || count($emailParts) !== 2) {
    return null;
  }
  return $emailParts[1];
}

/**
 * Checks if a domain is a spam from a given spam domain list
 *
 * @param string $domain
 * @param array $spamDomains
 * @return boolean
 */
function isSpam(string $domain, array $spamDomains): bool
{
  return in_array($domain, $spamDomains);
}

/**
 * Displays an error and exits
 *
 * @param string $message
 * @return void
 */
function error(string $message): void
{
  echo $message;
  exit;
}
