<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-xs-12 col-lg-8 col-sm-6">         
                <h3>Editar Coordenador</h3>
                <hr />
                <ol class="breadcrumb">
                  <li><a href="<?php echo site_url ('/principal/index') ?>">Principal</a></li>
                  <li><a href="<?php echo site_url ('/coordenador/index') ?>">Coordenadores</a></li>
                  <li class="active">Novo Coordenador</li>
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
                                <label>Nome coordenador</label>
                                <input type="text" class="form-control" name="nome" placeholder="Nome..." value="<?php echo set_value('nome', $dados->nome)?>">
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
                                        $user = $this->ion_auth->user()->row();
                                        foreach ($unidade as $unid) {
                                            if ($user->campus == $unid->campus) {
                                                echo '<option value="'.$unid->idunidade.'" '. ($unid->idunidade == $dados->idunidade ? 'selected=""' : '') .'>'.$unid->nome.' - '.$unid->campus.'</option>';
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>


                        <div class="col-xs-12 col-lg-4 col-sm-6">
                            <div class="form-group">
                                <label>Situação</label>
                                <select class="form-control" name="status">
                                    <option value="1" <?php echo ($dados->status == 1 ? 'selected=""' : '') ?>>Ativo</option>
                                    <option value="0" <?php echo ($dados->status == 0 ? 'selected=""' : '') ?>>Inativo</option>
                                </select>
                            </div>
                        </div>

                        <input type="hidden" name="id" value="<?php echo $dados->idcoordenador ?>">

                        <div class="col-xs-12 col-lg-12 col-sm-12">
                            <div class="form-group">
                                <button class="btn btn-success" form="form" type="submit">Atualizar</button>
                                <a href="<?php echo site_url ('coordenador') ?>" class="btn btn-primary">Cancelar</a>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
        