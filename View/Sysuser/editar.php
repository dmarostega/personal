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
                <label for="username">Usename</label>
                <input type="text" id="username" name="username" value="<?php echo $data->username; ?>" placeholder="Nome de  usuário">

                <label for="password">Password</label>
                <input type="password" id="password" name="password" value="<?php echo $data->password; ?>" password="Valor" placeholder="Senha do usuário" required>
        
            </div>
        </div>

                
        <div class="row">
            <div class="col col-2">
                <label for="typeuser">Categoria</label>
                <select id="typeuser" name="idtypeuser" required>                    
                    <option value="0">Selecione</option>
                    <?php foreach(DB::results("SELECT * FROM typeuser ORDER BY id ASC ") as $v){ ?>
                        <option value="<?php echo $v->id; ?>" 
                                <?php echo ($data->idtypeuser == $v->id ? " selected " : ""); ?>      >
                                        <?php echo $v->name; ?>
                    </option>                    
                    <?php } ?>
                </select>                                
            </div>
        </div>
        
        <div class="buttons-box">
            <button class="btn btn-save" type="submit" >Salvar</button>
<!--                <button class="btn btn-reset" type="reset" >Limpar</button>-->
            <button class="btn btn-cancel"  type="button" >Cancelar</button>                
        </div>
    </form>            
</main>
  