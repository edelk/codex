<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-xs-12 col-lg-8 col-sm-6">         
                <h3>Editar Aluno(a)</h3>
                <hr />
                <ol class="breadcrumb">
                  <li><a href="<?php echo site_url ('/principal/index') ?>">Principal</a></li>
                  <li><a href="<?php echo site_url ('/aluno/index') ?>">Alunos</a></li>
                  <li class="active">Editar Aluno</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-xs-12 col-lg-8 col-sm-6">
                <?php 
                    erros_validacao();
                    get_msg('msgerro');
                    get_msg('msgsucess');
                ?>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-lg-8 col-sm-6">
                <form class="" id="form" name="form" method="POST">
                    <div class="row">
                        <div class="col-xs-12 col-lg-12 col-sm-12">
                            <div class="form-group">
                                <label>Nome</label>
                                <input type="text" class="form-control" name="nome" placeholder="Nome..." value="<?php echo set_value('nome', $dados->nome)?>">
                            </div>
                        </div>

                        <div class="col-xs-12 col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label>RGA</label>
                                <input type="text" class="form-control" name="rga" placeholder="RGA..." value="<?php echo set_value('rga', $dados->rga)?>">
                            </div>
                        </div>

                        <div class="col-xs-12 col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label>CPF</label>
                                <input type="text" class="form-control" name="cpf" placeholder="CPF..." value="<?php echo set_value('cpf', $dados->cpf)?>">
                            </div>
                        </div>

                        <div class="col-xs-12 col-lg-8 col-sm-12">
                            <div class="form-group">
                                <label>E-mail</label>
                                <input type="email" class="form-control" name="email" placeholder="E-mail..." value="<?php echo set_value('email', $dados->email)?>">
                            </div>
                        </div>

                        <div class="col-xs-12 col-lg-4 col-sm-12">
                            <div class="form-group">
                                <label>Telefone</label>
                                <input type="tel" class="form-control" name="telefone" placeholder="Telefone..." value="<?php echo set_value('telefone', $dados->telefone)?>">
                            </div>
                        </div>

                        <div class="col-xs-12 col-lg-8 col-sm-6">
                            <div class="form-group">
                                <label>Unidade</label>
                                <select class="form-control" name="idunidade" id="idunidade">
                                    <?php 
                                        foreach ($unidade as $unid) {
                                            echo '<option value="'.$unid->idunidade.'" '. ($unid->idunidade == $dados->idunidade ? 'selected=""' : '') .'>'.$unid->nome.' - '.$unid->campus.'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-12 col-lg-4 col-sm-12">
                            <div class="form-group">
                                <label>Curso</label>
                                <input type="text" class="form-control" name="curso" placeholder="Curso..." value="<?php echo set_value('curso', $dados->curso)?>">
                            </div>
                        </div>

                        <div class="col-xs-12 col-lg-4 col-sm-6">
                            <div class="form-group">
                                <label>Banco</label>
                                <select class="form-control" name="banco">
                                    <option value="<?php echo set_value('banco', $dados->banco)?>"><?php echo($dados->banco)?></option>
                                    <option value="001 - BANCO DO BRASIL S/A">001 - BANCO DO BRASIL S/A</option>
                                    <option value="104 - CAIXA ECONOMICA FEDERAL">104 - CAIXA ECONOMICA FEDERAL</option>
                                    <option value="341 - BANCO ITAU S.A">341 - BANCO ITAU S.A</option>
                                    <option value="237 - BANCO BRADESCO S.A">237 - BANCO BRADESCO S.A</option>
                                    <option value="502 - BANCO SANTANDER S.A">502 - BANCO SANTANDER S.A</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-12 col-lg-4 col-sm-12">
                            <div class="form-group">
                                <label>Agência</label>
                                <input type="text" class="form-control" name="agencia" placeholder="Agência..." value="<?php echo set_value('agencia', $dados->agencia)?>">
                            </div>
                        </div>

                        <div class="col-xs-12 col-lg-4 col-sm-12">
                            <div class="form-group">
                                <label>Conta</label>
                                <input type="text" class="form-control" name="conta" placeholder="Conta..." value="<?php echo set_value('conta', $dados->conta)?>">
                            </div>
                        </div>

                        <div class="col-xs-12 col-lg-4 col-sm-6">
                            <div class="form-group">
                                <label>Situação</label>
                                <select class="form-control" name="status">
                                    <option value="1" <?php echo($dados->status == 1 ? 'selected=""' : '') ?>>Ativo</option>
                                    <option value="0" <?php echo($dados->status == 0 ? 'selected=""' : '')?>>Inativo</option>
                                </select>
                            </div>
                        </div>

                        <input type="hidden" value="<?php echo $dados->idaluno ?>" name="idaluno">

                        <div class="col-xs-12 col-lg-12 col-sm-12">
                            <div class="form-group">
                                <button class="btn btn-success" form="form" type="submit">Atualizar</button>
                                <a href="<?php echo site_url ('aluno') ?>" class="btn btn-primary">Cancelar</a>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
        