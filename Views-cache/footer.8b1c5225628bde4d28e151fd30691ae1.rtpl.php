<?php if(!class_exists('Rain\Tpl')){exit;}?>            </main>
        <footer>
            <p>Rock Code 2020</p>
        </footer>
        <!-- SCRIPTS  -->
        <?php $counter1=-1;  if( isset($Script) && ( is_array($Script) || $Script instanceof Traversable ) && sizeof($Script) ) foreach( $Script as $key1 => $value1 ){ $counter1++; ?><?php echo $value1->run(); ?><?php } ?>        
   </body>
</html>