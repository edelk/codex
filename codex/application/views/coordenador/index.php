<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-xs-12 col-lg-12 col-sm-12">
                
                <h3>Coordenadores</h3>
                <hr />
                <ol class="breadcrumb">
                  <li><a href="<?php echo site_url ('/principal/index') ?>">Principal</a></li>
                  <li class="active">Coordenadores</li>
                </ol>

            </div>
        </div>
        <!-- /.row -->

        <!-- Botão novo coordenador -->
        <div class="row margin-bottom10">
            <div class="col-xs-12 col-lg-12 col-sm-12 text-right">
                <a href="<?php echo site_url ('coordenador/create') ?>" title="Novo coordenador" class="btn btn-success">
                    <!-- <i class="fa fa-plus-square" aria-hidden="true"></i> -->
                    Novo Coordenador
                </a>
            </div>
        </div> <!-- Fim Botão novo coordenador -->

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
                            <th>Coordenador(a)</th>
                            <th>E-mail</th>
                            <th>Telefone</th>
                            <th>Campus</th>
                            <th>Unidade</th>
                            <th class="text-center">Situação</th>
                            <th class="text-right">Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php 

                        foreach ($coordenador as $coord) {
                            echo '<tr>
                                    <td>'.$coord->idcoordenador.'</td>
                                    <td>'.$coord->nome.'</td>
                                    <td>'.$coord->email.'</td>
                                    <td>'.$coord->telefone.'</td>
                                    <td>'.$coord->campus.'</td>
                                    <td>'.$coord->unidade.'</td>
                                    <td class="text-center">'.($coord->status == 1 ? '<span class="label label-success"><a href="'.site_url('/coordenador/situacao/'.$coord->idcoordenador.'').'" title="Inativar">Ativo</a></span>' : '<span class="label label-danger"><a href="'.site_url('/coordenador/situacao/'.$coord->idcoordenador.'').'" title="Ativar">Inativo</a></span>').'</td>
                                    <td class="text-right">
                                        <a href="'.site_url('/coordenador/edit/'.$coord->idcoordenador.'').'" title="Editar Coordenador" class="btn btn-primary">
                                            Editar
                                        </a>
                                        <a href="'.site_url('/coordenador/excluir/'.$coord->idcoordenador.'').'" title="Excluir Coordenador" class="btn btn-danger">
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