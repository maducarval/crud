<h2 class="form-horizontal">Curso</h2>
    <form class="form-horizontal" method="POST" action="<?php echo base_url('index.php/curso/salvar')?>">
        <input type="hidden" name="id" value="<?php echo isset($curso)?$curso->id:'' ?>">
        <div class="control-group">
            <label class="control-label" for="inputNome">Nome curso:</label>
            <div class="controls">
                <input type="text" id="inputNome" 
                    placeholder="nome do curso" 
                    name="nome_curso" 
                    value="<?php echo isset($curso)?$curso->nome_curso: "" ?>">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="inputSigla">Sigla Curso:</label>
            <div class="controls">
                <input type="text" id="inputSigla" placeholder="curso" name="sigla_curso" 
                value="<?php echo isset($curso)?$curso->sigla_curso:""?>">
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <a href="<?php echo base_url('index.php/curso')?>" class="btn">Voltar</a>
                <button type="submit" class="btn btn-success">Salvar</button>
            </div>
        </div>
    </form>