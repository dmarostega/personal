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
                    <label for="description">Description</label>
                    <input type="text" id="description" name="description" value="" placeholder="Descrição do Tipo">
                    
                    <!-- <label for="quantity">Password</label>
                    <input type="text" id="quantity" name="quantity" value="" placeholder="Repita a senha" required>-->
                </div>
            </div>
            
            <div class="buttons-box">
                <button class="btn btn-save" type="submit" >Salvar</button>
                <button class="btn btn-cancel" onclick="window.location.href='/<?php echo DOMAIN; ?>/sysuser/listar'" type="button" >Cancelar</button>                
            </div>
        </form>            
    </main>
