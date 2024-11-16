<?php session_start();

function  destroy_session_and_data()
{
  session_unset();
  session_destroy();
}

function  count_requests()
{
  if (!isset($_SESSION[' count ']))
    $_SESSION[' count '] =  1;// create a new session variable
  else $_SESSION[' count ']++;
  return  $_SESSION[' count '];
}

function  name()
{
  if (!isset($_SESSION[' name ']))
    $_SESSION[' name '] =  "CST8285";// create a new seesion variable

  return  $_SESSION[' name '];
}
