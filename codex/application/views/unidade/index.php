<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-xs-12 col-lg-12 col-sm-12">
                
                <h3>Unidades</h3>
                <hr />
                <ol class="breadcrumb">
                  <li><a href="<?php echo site_url ('/principal/index') ?>">Principal</a></li>
                  <li class="active">Unidades</li>
                </ol>

            </div>
        </div>
        <!-- /.row -->

        <!-- Botão novo usuário -->
        <div class="row margin-bottom10">
            <div class="col-xs-12 col-lg-12 col-sm-12 text-right">
                <a href="<?php echo site_url ('unidade/create') ?>" title="Novo usuário" class="btn btn-success">
                    <!-- <i class="fa fa-plus-square" aria-hidden="true"></i> -->
                    Nova Unidade
                </a>
            </div>
        </div> <!-- Fim Botão novo usuário -->

        <div class="row margin-bottom10">
            <div class="col-xs-12 col-lg-12 col-sm-12">
                <?php 
                    get_msg('msgerro');
                    get_msg('msgsucess'); 
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
                            <th>Unidade</th>
                            <th>Campus</th>
                            <th class="text-center">Situação</th>
                            <th class="text-right">Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php 
                        $user = $this->ion_auth->user()->row();
                        foreach ($unidade as $unid) {
                            echo '<tr>
                                <td>'.$unid->idunidade.'</td>
                                <td>'.$unid->nome.'</td>
                                <td>'.$unid->campus.'</td>
                                <td class="text-center">'.($unid->status == 1 ? '<span class="label label-success"><a href="'.site_url('/unidade/situacao/'.$unid->idunidade.'').'" title="Inativar">Ativo</a></span>' : '<span class="label label-danger"><a href="'.site_url('/unidade/situacao/'.$unid->idunidade.'').'" title="Ativar">Inativo</a></span>').'</td>
                                <td class="text-right">
                                    <a href="'.site_url('/unidade/edit/'.$unid->idunidade.'').'" title="Editar Unidade" class="btn btn-primary">
                                        Editar
                                    </a>
                                    <a href="'.site_url('/unidade/excluir/'.$unid->idunidade.'').'" title="Excluir Unidade" class="btn btn-danger">
                                        Excluir
                                    </a>
                                </td>
                            </tr>';
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