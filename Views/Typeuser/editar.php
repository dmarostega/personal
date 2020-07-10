<main>
    <form action="save?id=<?php echo $data->id; ?>" method="POST">                
        <div class="row">
            <div class="col col-2">
                <label for="id">Código</label>
                <input type="text" id="id" name="id" value="<?php echo $data->id; ?>" readonly>
        
                <label for="name">Nome:</label>
                <input type="text" id="name" name="name" value="<?php echo $data->name; ?>" placeholder="Nome" required>
            </div>
            <div class="col col-2">
                <label for="description">Descrição</label>
                <input type="text" id="description" name="description" value="<?php echo $data->description; ?>" placeholder="Nome de  usuário">            
            </div>
        </div>               
        
        <div class="buttons-box">
            <button class="btn btn-save" type="submit" >Salvar</button>
<!--                <button class="btn btn-reset" type="reset" >Limpar</button>-->
            <button class="btn btn-cancel" onclick="window.location.href='/<?php echo DOMAIN; ?>/sysuser/listar'" type="button" >Cancelar</button>                
        </div>
    </form>            
</main>
