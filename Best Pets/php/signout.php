<?php
  session_start();
  unset($_SESSION['uname']);
  echo '<script>location.href="../best pets/index.php"</script>';