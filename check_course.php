<?php
$GLOBALS['changeFlag'] = "add";

$code = $showSearched['courseCode'][$i];
$sec = $showSearched['section'][$i];

for($a=0; $a<count($planning['courseCode']); $a++){
  if($code == $planning['courseCode'][$a]){
    if($sec == $planning['section'][$a]){
      $GLOBALS['changeFlag'] = "drop";
      return;
    }
    else{
      $GLOBALS['changeFlag'] = "change";
      return;
    }
  }
}
?>
