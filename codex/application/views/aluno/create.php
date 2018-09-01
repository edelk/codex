<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-xs-12 col-lg-8 col-sm-6">         
                <h3>Novo Aluno(a)</h3>
                <hr />
                <ol class="breadcrumb">
                  <li><a href="<?php echo site_url ('/principal/index') ?>">Principal</a></li>
                  <li><a href="<?php echo site_url ('/aluno/index') ?>">Alunos</a></li>
                  <li class="active">Novo Aluno</li>
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
                                <input type="text" class="form-control" name="nome" placeholder="Nome..." value="<?php echo set_value('nome')?>">
                            </div>
                        </div>

                        <div class="col-xs-12 col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label>RGA</label>
                                <input type="text" class="form-control" name="rga" placeholder="RGA..." value="<?php echo set_value('rga')?>">
                            </div>
                        </div>

                        <div class="col-xs-12 col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label>CPF</label>
                                <input type="text" class="form-control" name="cpf" placeholder="CPF..." value="<?php echo set_value('cpf')?>">
                            </div>
                        </div>

                        <div class="col-xs-12 col-lg-8 col-sm-12">
                            <div class="form-group">
                                <label>E-mail</label>
                                <input type="email" class="form-control" name="email" placeholder="E-mail..." value="<?php echo set_value('email')?>">
                            </div>
                        </div>

                        <div class="col-xs-12 col-lg-4 col-sm-12">
                            <div class="form-group">
                                <label>Telefone</label>
                                <input type="tel" class="form-control" name="telefone" placeholder="Telefone..." value="<?php echo set_value('telefone')?>">
                            </div>
                        </div>

                        <div class="col-xs-12 col-lg-8 col-sm-6">
                            <div class="form-group">
                                <label>Unidade</label>
                                <select class="form-control" name="idunidade">
                                    <?php 
                                        $user = $this->ion_auth->user()->row();
                                        foreach ($unidade as $unid) {
                                            if ($user->campus == $unid->campus) {
                                                echo '<option value="'.$unid->idunidade.'">'.$unid->nome.' - '.$unid->campus.'</option>';
                                            } 
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-12 col-lg-4 col-sm-12">
                            <div class="form-group">
                                <label>Curso</label>
                                <input type="text" class="form-control" name="curso" placeholder="Curso..." value="<?php echo set_value('curso')?>">
                            </div>
                        </div>

                        <div class="col-xs-12 col-lg-6 col-sm-6">
                            <div class="form-group">
                                <label>Banco</label>
                                <select class="form-control" name="banco">
                                    <option value="001 - BANCO DO BRASIL S/A">001 - BANCO DO BRASIL S/A</option>
                                    <option value="104 - CAIXA ECONOMICA FEDERAL">104 - CAIXA ECONOMICA FEDERAL</option>
                                    <option value="341 - BANCO ITAU S.A">341 - BANCO ITAU S.A</option>
                                    <option value="237 - BANCO BRADESCO S.A">237 - BANCO BRADESCO S.A</option>
                                    <option value="502 - BANCO SANTANDER S.A">502 - BANCO SANTANDER S.A</option>
                                    <option value="748 – BANCO COOPERATIVO SICREDI S.A.">748 – BANCO COOPERATIVO SICREDI S.A.</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-12 col-lg-3 col-sm-12">
                            <div class="form-group">
                                <label>Agência</label>
                                <input type="text" class="form-control" name="agencia" placeholder="Agência..." value="<?php echo set_value('agencia')?>">
                            </div>
                        </div>

                        <div class="col-xs-12 col-lg-3 col-sm-12">
                            <div class="form-group">
                                <label>Conta</label>
                                <input type="text" class="form-control" name="conta" placeholder="Conta..." value="<?php echo set_value('conta')?>">
                            </div>
                        </div>

                        <div class="col-xs-12 col-lg-4 col-sm-6">
                            <div class="form-group">
                                <label>Situação</label>
                                <select class="form-control" name="status">
                                    <option value="1" selected>Ativo</option>
                                    <option value="0">Inativo</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-12 col-lg-12 col-sm-12">
                            <div class="form-group">
                                <button class="btn btn-success" form="form" type="submit">Cadastrar</button>
                                <a href="<?php echo site_url ('aluno') ?>" class="btn btn-primary">Cancelar</a>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
        