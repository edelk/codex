<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-xs-12 col-lg-12 col-sm-12">
                
                <h3>Usuários Cadastrados</h3>
                <hr />
                <ol class="breadcrumb">
                  <li><a href="<?php echo site_url ('/principal/index') ?>">Principal</a></li>
                  <li class="active">Usuários</li>
                </ol>

            </div>
        </div>
        <!-- /.row -->

        <!-- Botão novo usuário -->
        <div class="row margin-bottom10">
            <div class="col-xs-12 col-lg-12 col-sm-12 text-right">
                <a href="<?php echo site_url ('usuarios/create') ?>" title="Novo usuário" class="btn btn-success">
                    <!-- <i class="fa fa-plus-square" aria-hidden="true"></i> -->
                    Novo Usuário
                </a>
            </div>
        </div> <!-- Fim Botão novo usuário -->

        <div class="row margin-bottom10">
            <div class="col-xs-12 col-lg-12 col-sm-12">
                <?php 
                    get_msg('msgerro');
                    get_msg('msgsuccess'); 
                ?>
            </div>
        </div>

        <!-- Lista de registro -->
        <div class="row">
            <div class="col-xs-12 col-lg-12 col-sm-12">
                  <table class="table table-bordered table-striped" id="datatable">
                    
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Campus</th>
                            <th class="text-center">Situação</th>
                            <th class="text-right">Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php 
                        foreach ($users as $user) {
                            if ($user->id != 1) {
                                echo '<tr>
                                        <td>'.$user->id.'</td>
                                        <td>'.$user->username.'</td>
                                        <td>'.$user->email.'</td>
                                        <td>'.$user->campus.'</td>
                                        <td class="text-center">'.($user->active == 1 ? '<a href="'.site_url('/usuarios/situacao/'.$user->id.'').'" title="Inativar" class="btn btn-success btn-xs">Ativo</a>' : '<a href="'.site_url('/usuarios/situacao/'.$user->id.'').'" title="Ativar" class="btn btn-danger btn-xs">Inativo</a>').'</td>
                                        <td class="text-right">
                                            <a href="'.site_url('/usuarios/edit/'.$user->id.'').'" title="Editar Usuário" class="btn btn-primary">
                                                Editar
                                            </a>
                                            <a href="'.site_url('/usuarios/excluir/'.$user->id.'').'" title="Excluir Usuário" class="btn btn-danger">
                                                Excluir
                                            </a>
                                        </td>
                                    </tr>';
                            } else {
                                if ($this->session->user_id == 1) {
                                    echo '<tr>
                                        <td>'.$user->id.'</td>
                                        <td>'.$user->username.'</td>
                                        <td>'.$user->email.'</td>
                                        <td>'.$user->campus.'</td>
                                        <td class="text-center">Principal</td>
                                        <td class="text-right">
                                            <a href="'.site_url('/usuarios/edit/'.$user->id.'').'" title="Editar Usuário" class="btn btn-primary">
                                                Editar
                                            </a>
                                            <a href="'.site_url('/usuarios/excluir/'.$user->id.'').'" title="Excluir Usuário" class="btn btn-danger">
                                                Excluir
                                            </a>
                                        </td>
                                    </tr>';
                                }
                            }
                            
                        }
                        // <i class="fa fa-pencil-square" aria-hidden="true"></i> -> Ícone para Editar
                        // <i class="fa fa-trash" aria-hidden="true"></i> -> Ícone para Excluir
                    ?>
                    </tbody>

                  </table>
            </div>

        </div> <!-- Lista de registro -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->