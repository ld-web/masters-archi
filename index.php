<?php

// Définitions de constantes
const EMAIL_PARAM_NAME = 'email';
const SPAM_DOMAINS = ['spamming.com', 'mailinator.com', 'oneminutemail.com'];

// Vérification présence du paramètre dans tableau $_GET
if (empty($_GET) || empty($_GET[EMAIL_PARAM_NAME])) {
  // Affichage erreur et quitte
  echo "Please provide a valid email address";
  exit;
}

// Affectation
$email = $_GET['email'];

// Vérification de la validité du format de l'email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  // Affichage erreur et quitte
  echo "Invalid email address";
  exit;
}

// Extraction du domaine de l'email, si possible
$emailParts = explode('@', $email);
if ($emailParts === false || count($emailParts) !== 2) {
  // Affichage erreur et quitte
  echo "Unable to extract domain from email address";
  exit;
}
$domain = $emailParts[1];

// Vérification que l'email n'est pas un spam
if (in_array($domain, SPAM_DOMAINS)) {
  // Affichage erreur et quitte
  echo "Email is spam";
  exit;
}

echo "Email is valid";
