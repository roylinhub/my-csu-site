<?php
function validate($name) {
  if($name == '') {
    return '';
  }

  if(strlen($name) < 3) {
    return "<span id=\"warn\">Username too short</span>\n";
  }

  switch($name) {
    case 'bob':
    case 'jim':
    case 'joe':
    case 'carol':
      return "<span id=\"warn\">Username already taken</span>\n";
  }

  return "<span id=\"notice\">Username ok!</span>\n";
}

echo validate(trim($_REQUEST['name'])); 
?>