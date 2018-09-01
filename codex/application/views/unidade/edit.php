<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-xs-12 col-lg-8 col-sm-6">         
                <h3>Editar Unidade</h3>
                <hr />
                <ol class="breadcrumb">
                  <li><a href="<?php echo site_url ('/principal/index') ?>">Principal</a></li>
                  <li><a href="<?php echo site_url ('/unidade/index') ?>">Unidades</a></li>
                  <li class="active">Editar Unidade</li>
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
                                <label>Nome unidade</label>
                                <input type="text" class="form-control" name="nome" placeholder="Nome da Unidade" value="<?php echo set_value('nome', $dados->nome)?>">
                            </div>
                        </div>


                        <div class="col-xs-12 col-lg-8 col-sm-6">
                            <div class="form-group">
                                <label>Campus</label>
                                <select class="form-control" name="campus">
                                    <option value="1" <?php echo ($dados->campus == 'ARAGUAIA' ? 'selected=""' : '') ?>>ARAGUAIA</option>
                                    <option value="2" <?php echo ($dados->campus == 'CUIABÁ' ? 'selected=""' : '') ?>>CUIABÁ</option>
                                    <option value="3" <?php echo ($dados->campus == 'RONDONÓPOLIS' ? 'selected=""' : '') ?>>RONDONÓPOLIS</option>
                                    <option value="4" <?php echo ($dados->campus == 'SINOP' ? 'selected=""' : '') ?>>SINOP</option>
                                    <option value="5" <?php echo ($dados->campus == 'VÁRZEA GRANDE' ? 'selected=""' : '') ?>>VÁRZEA GRANDE</option>
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

                        <input type="hidden" name="idunidade" value="<?php echo $dados->idunidade ?>">

                        <div class="col-xs-12 col-lg-12 col-sm-12">
                            <div class="form-group">
                                <button class="btn btn-success" form="form" type="submit">Atualizar</button>
                                <a href="<?php echo site_url ('unidade') ?>" class="btn btn-primary">Cancelar</a>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
        