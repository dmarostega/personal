<main>
    <form action="save" method="POST">
        
        <div class="row">
            <div class="col col-2">
                <label for="id">Código</label>
                <input type="text" id="id" name="id" value="" readonly>
        
                <label for="name">Nome:</label>
                <input type="text" id="name" name="name" value="" placeholder="Nome" required>
            </div>
            <div class="col col-2">
                <label for="username">Usename</label>
                <input type="text" id="username" name="username" value="" placeholder="Nome de  usuário"  required>

                <label for="password">Password</label>
                <input type="text" id="password" name="password" value="" password="Valor" placeholder="Senha do usuário" required>
                
                <!-- <label for="quantity">Password</label>
                <input type="text" id="quantity" name="quantity" value="" placeholder="Repita a senha" required>-->
            </div>
        </div>

                
        <div class="row">
            <div class="col col-2">
                <label for="typeuser">Categoria</label>
                <select id="typeuser" name="idtypeuser" required>                    
                    <option value="">Selecione</option>
                    <?php foreach(DB::results("SELECT * FROM typeuser ORDER BY id ASC ") as $v){ ?>
                        <option value="<?php echo $v->id; ?>"><?php echo $v->name; ?></option>                    
                    <?php } ?>
                </select>                                
            </div>
        </div>
        
        <div class="buttons-box">
            <button class="btn btn-save" type="submit" >Salvar</button>
            <button class="btn btn-cancel" onclick="window.location.href='/<?php echo DOMAIN; ?>/sysuser/listar'" type="button" >Cancelar</button>                
        </div>
    </form>            
</main>
