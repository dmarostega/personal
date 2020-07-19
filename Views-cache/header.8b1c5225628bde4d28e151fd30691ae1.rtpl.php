<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html>
    <head>
        <title>Rock Code Labs</title>
        <link rel="icon" type="image/png" href="<?php echo $Source['img']->render('favicon', '.ico'); ?>">
        <meta charset="UTF-8">
        <?php $counter1=-1;  if( isset($Style) && ( is_array($Style) || $Style instanceof Traversable ) && sizeof($Style) ) foreach( $Style as $key1 => $value1 ){ $counter1++; ?><?php echo $value1->run(); ?><?php } ?>        
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    </head>
    <body  class="bg-default">
        <header>
            <img src="<?php echo $Source['img']->render('logo'); ?>" alt="RockCode Logo!">
            <nav>
                <ul>
                    <li>
                        <a href="#about">sobre</a>                        
                    </li>
                    <li>
                        <a href="#experience">Experiência</a>
                    </li>
                    <li>
                        <a href="#education">Educação</a>
                    </li>
                    <li>
                        <a href="#portfolio">PortFólio</a>
                    </li>
                    <li>
                        <a href="#contact">Contato</a>
                    </li>
                </ul>
            </nav>
        </header>
    <main>
