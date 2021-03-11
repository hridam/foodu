<?php
 if (isset($_SESSION['email'])){
    echo "u r in session";
    session_unset();
    session_destroy();

  }
  else{
    echo "u r not in session";
  }
exit;

?>