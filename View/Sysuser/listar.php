<?php ob_start(); ?>

<main>            
    <table class="table">
        <thead></thead>
        <tfoot>                                                  
        </tfoot>
        <tbody>
            <?php 
                if(count($data) > 0){ 
                foreach($data as $k => $user){ ?>
                <tr id="edit_<?php echo $user->id?>">                       
                    <td><?php echo $user->id; ?></td>
                    <td><?php echo $user->name; ?></td>
                    <td>
                        <a class="btn btn-save" href="editar?id=<?php echo $user->id; ?>" ><span>Editar</span></a>                            <a class="btn btn-cancel" href="delete?id=<?php echo $user->id; ?>"  ><span>Excluir</span></a>                                
                    </td>
                </tr>
            <?php
                    } /*    end foreach */ 
                } /*    end if  */  ?>   
        </tbody>
    </table>           
</main>
