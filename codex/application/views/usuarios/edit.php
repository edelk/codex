<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-xs-12 col-lg-12 col-sm-12">
                
                <h3>Editar usuário</h3>
                <hr />
                <ol class="breadcrumb">
                  <li><a href="<?php echo site_url ('localhost/curso-ci/principal') ?>">Principal</a></li>
                  <li><a href="<?php echo site_url ('usuarios') ?>">Usuários</a></li>
                  <li class="active">Editar usuário</li>
                </ol>

            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-xs-12 col-lg-12 col-sm-12">
                <?php 
                    erros_validacao();
                    get_msg('msgerro');
                ?>
            </div>
        </div>

        <!-- formulário de novo usuário -->
        <div class="row">
            <div class="col-xs-12 col-lg-8 col-sm-12">
                <form id="form_create" name="form_create" action="" class="" method="post">
                    <div class="row">
                        <?php 
                            if ($this->session->user_id == 1) {  # Verifica se é o usuário principal
                        ?>
                        <div class="col-xs-12 col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label>Tipo de usuário</label>
                                <select name="tipo_usuario" class="form-control">
                                    <?php 
                                        echo '<option value="1" '.($group == 1 ? 'selected="" ': '').'>Administrador</option>';
                                        echo '<option value="2" '.($group == 2 ? 'selected="" ' : '').'>Coordenador</option>';
                                    ?>
                                </select>
                            </div>
                        </div>
                        <?php 
                            } # fim da verificação de usuário principal
                        ?>

                        <div class="col-xs-12 col-lg-6 col-sm-6">
                            <div class="form-group">
                                <label>Campus</label>
                                <select class="form-control" name="campus">
                                    <option value="1" <?php echo ($user->campus == 'ARAGUAIA' ? 'selected=""' : '') ?>>ARAGUAIA</option>
                                    <option value="2" <?php echo ($user->campus == 'CUIABÁ' ? 'selected=""' : '') ?>>CUIABÁ</option>
                                    <option value="3" <?php echo ($user->campus == 'RONDONÓPOLIS' ? 'selected=""' : '') ?>>RONDONÓPOLIS</option>
                                    <option value="4" <?php echo ($user->campus == 'SINOP' ? 'selected=""' : '') ?>>SINOP</option>
                                    <option value="5" <?php echo ($user->campus == 'VÁRZEA GRANDE' ? 'selected=""' : '') ?>>VÁRZEA GRANDE</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-12 col-lg-12 col-sm-12">
                            <div class="form-group">
                                <label>Nome do usuário</label>
                                <input type="text" class="form-control" name="nome_usuario" value="<?php echo set_value('nome_usuario', $user->username)?>">
                            </div>
                        </div>
                        
                        <div class="col-xs-12 col-lg-12 col-sm-12">
                            <div class="form-group">
                                <label>E-mail</label>
                                <input type="email" class="form-control" name="email_usuario" value="<?php echo set_value('email_usuario', $user->email)?>">
                            </div>
                        </div>
                        
                        <div class="col-xs-12 col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label>Senha</label>
                                <input type="password" class="form-control" name="senha_usuario" placeholder="Senha">
                            </div>
                        </div>
                        
                        <div class="col-xs-12 col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label>Confirmar Senha</label>
                                <input type="password" class="form-control" name="senha_usuario2" placeholder="Confirmar Senha">
                            </div>
                        </div>
                        

                        <input type="hidden" name="id_usuario" value="<?php echo $user->id ?>">

                        <div class="col-xs-12 col-lg-12 col-sm-12">
                            <button form="form_create" type="submit" class="btn btn-success">Atualizar</button>
                            <a href="<?php echo site_url ('usuarios') ?>" class="btn btn-primary">Cancelar</a>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div><!-- FIM formulário de novo usuário -->
    </div>
</div>
