<?php
if(isset($messages)){
   foreach($messages as $message){
      echo '
      <div class="message alert alert-success d-flex justify-content-between" role="alert">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>