<?php if(!class_exists('Rain\Tpl')){exit;}?>    
  
    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        Anything you want
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2020-2020 <a href="https://rockcode.net">RockCode.net</a>.</strong> All rights reserved.
    </footer>
  </div>
  <!-- ./wrapper -->
  
  <!-- REQUIRED SCRIPTS -->
   <!-- SCRIPTS  -->
   <?php $counter1=-1;  if( isset($Script) && ( is_array($Script) || $Script instanceof Traversable ) && sizeof($Script) ) foreach( $Script as $key1 => $value1 ){ $counter1++; ?><?php echo $value1->run(); ?><?php } ?>        
  <!-- jQuery -->
  <!-- <script src="plugins/jquery/jquery.min.js"></script> -->
  <!-- Bootstrap 4 -->
  <!-- <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
  <!-- AdminLTE App -->
  <!-- <script src="dist/js/adminlte.min.js"></script> -->
  </body>
  </html>
  