<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-xs-12 col-lg-12 col-sm-12">
                
                <h3>Novo usuário</h3>
                <hr />
                <ol class="breadcrumb">
                  <li><a href="<?php echo site_url ('/principal/index') ?>">Principal</a></li>
                  <li><a href="<?php echo site_url ('usuarios') ?>">Usuários</a></li>
                  <li class="active">Novo usuário</li>
                </ol>

            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-xs-12 col-lg-12 col-sm-12">
                <?php erros_validacao() ?>
            </div>
        </div>

        <!-- formulário de novo usuário -->
        <div class="row">
            <div class="col-xs-12 col-lg-8 col-sm-12">
                <form id="form_create" name="form_create" action="" class="" method="post">
                    <div class="row">
                        <div class="col-xs-12 col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label>Tipo de usuário</label>
                                <select name="tipo_usuario" class="form-control">
                                    <option value="1">Administrador</option>
                                    <option value="2">Coordenador</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6 col-sm-6">
                            <div class="form-group">
                                <label>Campus</label>
                                <select class="form-control" name="campus">
                                    <option value="1">Araguaia</option>
                                    <option value="2">Cuiabá</option>
                                    <option value="3">Rondonópolis</option>
                                    <option value="4">Sinop</option>
                                    <option value="5">Várzea Grande</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-12 col-lg-12 col-sm-12">
                            <div class="form-group">
                                <label>Nome do usuário</label>
                                <input type="text" class="form-control" name="nome_usuario" value="<?php echo set_value('nome_usuario')?>">
                            </div>
                        </div>
                        
                        <div class="col-xs-12 col-lg-12 col-sm-12">
                            <div class="form-group">
                                <label>E-mail</label>
                                <input type="email" class="form-control" name="email_usuario" value="<?php echo set_value('email_usuario')?>">
                            </div>
                        </div>
                        
                        <div class="col-xs-12 col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label>Senha</label>
                                <input type="password" class="form-control" name="senha_usuario">
                            </div>
                        </div>
                        
                        <div class="col-xs-12 col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label>Confirmar Senha</label>
                                <input type="password" class="form-control" name="senha_usuario2">
                            </div>
                        </div>
                        
                        <div class="col-xs-12 col-lg-12 col-sm-12">
                            <button form="form_create" type="submit" class="btn btn-success">
                                Salvar
                            </button>
                            <a href="<?php echo site_url ('usuarios') ?>" class="btn btn-primary">
                                Cancelar
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- FIM formulário de novo usuário -->
    </div>
</div>
