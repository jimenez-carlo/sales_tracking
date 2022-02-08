<?php

function msg_success($message = 'Action')
{
  // primary
  // info
  // teal
  // success
  // warning
  // danger
  return '<div class="alert bg-info" role="alert"><em class="fa fa-lg fa-check">&nbsp;</em> ' . $message . ' Successfull! <a href="#" class="pull-right" data-dismiss="alert"><em class="fa fa-lg fa-close"></em></a></div>';
}

function msg_error($message = 'Something Went Wrong!')
{
  // primary
  // info
  // teal
  // success
  // warning
  // danger
  return '<div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> Error ' . $message . ' <a href="#" class="pull-right" data-dismiss="alert"><em class="fa fa-lg fa-close"></em></a></div>';
}

function id_format($id = 0)
{
  return str_pad(intval($id), 6, '0', STR_PAD_LEFT);
}
