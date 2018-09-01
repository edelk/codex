<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-xs-12 col-lg-12 col-sm-12">
                
                <h3>Projetos</h3>
                <hr />
                <ol class="breadcrumb">
                  <li><a href="<?php echo site_url ('/projeto/index') ?>">Principal</a></li>
                  <li class="active">Projetos</li>
                </ol>

            </div>
        </div>
        <!-- /.row -->

        <!-- Botão novo projeto -->
        <div class="row margin-bottom10">
            <div class="col-xs-12 col-lg-12 col-sm-12 text-right">
                <a href="<?php echo site_url ('projeto/create') ?>" title="Novo Projeto" class="btn btn-success">
                    <!-- <i class="fa fa-plus-square" aria-hidden="true"></i> -->
                    Novo Projeto
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
                            <th>Nome</th>
                            <th>Edital</th>
                            <th>Área Temática</th>
                            <th>Data Início</th>
                            <th>Data Término</th>
                            <th>Coordenador(a)</th>
                            <th>Campus</th>
                            <th>Unidade</th>
                            <th class="text-center">Situação</th>
                            <th class="text-right">Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php
                        /*Array
                            (
                                [0] => stdClass Object
                                    (
                                        [idprojeto] => 1
                                        [nome] => Futxcaiada
                                        [edital] => PBEXT AÇÕES
                                        [area] => TECNOLOGIA E PRODUÇÃO
                                        [data_inicio] => 2018-06-28
                                        [data_fim] => 2021-06-28
                                        [status] => 1
                                        [idcoordenador] => 2
                                        [idunidade] => 2
                                        [coordenador] => Sandra Jung de Mattos
                                        [unidade] => Instituto de Computação
                                        [campus] => Cuiabá
                                    )
                            )*/


                        foreach ($projetos as $proj) {
                            echo '<tr>
                                    <td>'.$proj->idprojeto.'</td>
                                    <td>'.$proj->nome.'</td>
                                    <td>'.$proj->edital.'</td>
                                    <td>'.$proj->area.'</td>
                                    <td>'.formataDataView($proj->data_inicio).'</td>
                                    <td>'.formataDataView($proj->data_fim).'</td>
                                    <td>'.$proj->coordenador.'</td>
                                    <td>'.$proj->campus.'</td>
                                    <td>'.$proj->unidade.'</td>
                                    <td class="text-center">'.($proj->status == 1 ? '<span class="label label-success"><a href="'.site_url('/projeto/situacao/'.$proj->idprojeto.'').'" title="Inativar">Ativo</a></span>' : '<span class="label label-danger"><a href="'.site_url('/projeto/situacao/'.$proj->idprojeto.'').'" title="Ativar">Inativo</a></span>').'</td>
                                    <td class="text-right">
                                        <a href="'.site_url('/projeto/edit/'.$proj->idprojeto.'').'" title="Editar aluno" class="btn btn-primary">
                                            Editar
                                        </a>
                                        <a href="'.site_url('/projeto/excluir/'.$proj->idprojeto.'').'" title="Excluir aluno" class="btn btn-danger">
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