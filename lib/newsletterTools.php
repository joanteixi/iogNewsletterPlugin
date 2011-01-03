<?php

class newsletterTools {

  public static function validarEmail($mail) {

    $re = '/^([^@\s]+)@((?:[-a-z0-9]+\.)+[a-z]{2,})$/i';
    if (!preg_match($re, $mail)) {
      return false;
    } else {
      return true;
    }
  }

}