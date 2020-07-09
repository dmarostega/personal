<!doctype html>
<html lang="pt-br">
    <head>
        <title> Sys Market  </title>
        <meta charset="utf-8">
        <meta name="author" content="Diogo Marostega de Oliveira   ">
        <meta name="description" content="base para sistema PHP MVC">
        <meta name="keywords" content="sistema, php, web, base">
        <link  rel="stylesheet" type="text/css"  href="../view/css/personalite.css">
        <style>
            main{
                width: 90%;
                margin:auto;
            }
            form{
                width: 90%;
                margin: auto;
                padding: 15px;
            }
            
            label,div,input,select{
                display:block;
                width: 50%;
                margin: auto;
            }
        </style>        
    </head>  
    <body>
           <nav>
                <ul>
                    <li class="drop-down">
                        <a href="#">Cadastros</a>
                        <ul>
                            <li>
                                <a href="/<?php echo DOMAIN;?>/sysuser/cadastrar">Usuário</a>
                            </li>
                            <li>
                                <a href="/<?php echo DOMAIN;?>/typeuser/cadastrar">Tipos de usuário</a>
                            </li>                            
                        </ul>
                    </li>
                    
                    <li  class="drop-down">
                        <a href="#">Listagens</a>
                        <ul>
                            <li>
                                <a href="/<?php echo DOMAIN;?>/sysuser/listar">Usuários</a>
                            </li>
                            <li>
                                <a href="/<?php echo DOMAIN;?>/typeuser/listar">Tipos de Usuário</a>
                            </li>
                        </ul>                       
                    </li> 
                  <li  class="drop-down">
                        <a href="/<?php echo DOMAIN;?>">Inicio</a>  
                    </li> 
                </ul>
            </nav>          
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
        <footer>
            <p>Copyright &copy; Diogo Marostega de Oliveira - 2019</p>
        </footer>
    </body>
</html>