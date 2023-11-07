<h2 class="form-horizontal">Setor</h2>
    <form class="form-horizontal" method="POST" action="<?php echo BASE_URL?>index.php/setor/salvar">
    <input type="hidden" name="id" value="<?php echo isset($setor)?$setor->id:'' ?>">
        <div class="control-group">
            <label class="control-label" for="inputSetro">Nome setor:</label>
            <div class="controls">
                <input type="text" id="inputNameSetor" placeholder="nome do setor" name="nome_setor" 
                value="<?php echo isset($setor)?$setor->nome_setor: "" ?>">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="inputSigla">Sigla Setor:</label>
            <div class="controls">
                <input type="text" id="inputSigla" placeholder="sigla" name="sigla_setor" value="<?php echo isset($setor)?$setor->sigla_setor: "" ?>">
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
            <a href="<?php echo BASE_URL. 'index.php/setor'?>" class="btn">Voltar</a>
                <button type="submit" class="btn btn btn-success 	">Salvar</button>
            </div>
        </div>
    </form>
