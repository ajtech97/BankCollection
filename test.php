<?php
  $value=4;
  function scoper()
  {
    global $value;
    echo "Inside:".$value;
  }
  scoper();
  // echo "Outside:".$value
?>
