<div>
    <h2 class="form-horizontal">Militar</h2>
    <form class="form-horizontal" method="POST" action="<?php echo BASE_URL?>index.php/militar/salvar">
    <input type="hidden" name="id" value="<?php echo isset($militar)?$militar->id:'' ?>">
        <div class="control-group">
            <label class="control-label" for="inputEmail">Nome completo:</label>
            <div class="controls">
                <input type="text" id="inputName" placeholder="nome" name="nome"
                value="<?php echo isset($militar)?$militar->nome: "" ?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="inputNome_guerra">Nome de guerra</label>
            <div class="controls">
                <input type="text" id="inputNome_guerra" placeholder="nome de guerra" name="nome_guerra"
                value="<?php echo isset($militar)?$militar->nome_guerra: "" ?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="inputSaram">Saram</label>
            <div class="controls">
                <input type="text" id="inputSaram" placeholder="saram" name="saram"
                value="<?php echo isset($militar)?$militar->saram: "" ?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="inputCpf">CPF:</label>
            <div class="controls">
                <input type="text" id="inputCpf" placeholder="cpf" name="cpf"
                value="<?php echo isset($militar)?$militar->cpf: "" ?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="inputOM">OM:</label>
            <div class="controls">
                <input type="text" id="inputOM" placeholder="om" name="om"
                value="<?php echo isset($militar)?$militar->om: "" ?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="inputdata_nascimento">data de nascimento</label>
            <div class="controls">
                <input type="date" id="inputDataNascimento" placeholder="data de nascimento" name="data_nascimento" 
                value="<?php echo isset($militar)?$militar->data_nascimento: "" ?>">
            </div>
        </div>


        <div class="control-group">
            <label class="control-label" for="inputSetor">Setor:</label>
            <div class="controls">
                <select name="setor" id="inputSetor">
                    <option>Selecione...</option>
                    <?php 
                    foreach ($setores as $setor) : ?>
                        <option value="<?php echo $setor->id ?>"
                        <?php

                        if(isset($militar)):
                            echo $militar->setor_id == $setor->id? "selected": " ";
                        endif
                        ?>
                        ><?php echo $setor->sigla_setor ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="inputCursos">cursos:</label>
            <div class="controls">
                <select name="cursos[]" id="inputCursos" multiple>
                    <?php foreach ($cursos as $curso) : ?>
                        <option value="<?php echo $curso->id ?>"
                        <?php
                        if(isset($militar)):
                            foreach($militar->cursos as $cursoMilitar):
                                echo $curso->id == $cursoMilitar->id? "selected": " ";  
                            endforeach;
                        endif;
                        ?>
                        >
                        <?php echo $curso->sigla_curso ?></option>
                    <?php endforeach ?>
                </select>

            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <a href="<?php echo BASE_URL?>index.php/militar" class="btn">Voltar</a>
                <button type="submit" class="btn btn btn-success">Salvar</button>

            </div>
        </div>
    </form>
</div>