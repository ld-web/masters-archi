const EMAIL_PARAM_NAME = 'email';
const SPAM_DOMAINS = ['spamming.com', 'mailinator.com', 'oneminutemail.com'];

if (!hasEmailGetParam()) {
    echo "Please provide a valid email address";
    exit;
}

$email = $_GET['email'];

if (!isValidEmail($email)) {
    echo "Invalid email address";
    exit;
}

$emailDomain = getDomainOfEmail($email);

if (!$emailDomain) {
    echo "Unable to extract domain from email address";
    exit;
}


if (isSpammingDomain($emailDomain)) {
    echo "Email is spam";
    exit;
}

echo "Email is valid";


/**
 * Check if parameter get 'email' is present in the request
 *
 * @return bool
 */
function hasEmailGetParam(): bool
{
    if (empty($_GET) || empty($_GET[EMAIL_PARAM_NAME])) {
        return false;
    }

    return true;
}

/**
 * Check if email is valid
 *
 * @param string $email
 * @return bool
 */
function isValidEmail(string $email): bool
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }

    return true;
}

/**
 * Get email domain
 *
 * @param string $email
 * @return string email domain. Empty string on error
 */
function getDomainOfEmail(string $email): string {
    $emailParts = explode('@', $email);

    if ($emailParts === false || count($emailParts) !== 2) {
        return '';
    }

    return $emailParts[1];
}

/**
 * Test if a domain is registered has spam blacklist
 *
 * @param string $domain
 * @return bool
 */
function isSpammingDomain(string $domain): bool {
    if (in_array($domain, SPAM_DOMAINS)) {
        return true;
    }

    return false;
}
