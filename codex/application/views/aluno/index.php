<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-xs-12 col-lg-12 col-sm-12">
                
                <h3>Alunos</h3>
                <hr />
                <ol class="breadcrumb">
                  <li><a href="<?php echo site_url ('/principal/index') ?>">Principal</a></li>
                  <li class="active">Alunos</li>
                </ol>

            </div>
        </div>
        <!-- /.row -->

        <!-- Botão novo usuário -->
        <div class="row margin-bottom10">
            <div class="col-xs-12 col-lg-12 col-sm-12 text-right">
                <a href="<?php echo site_url ('aluno/create') ?>" title="Novo aluno" class="btn btn-success">
                    <!-- <i class="fa fa-plus-square" aria-hidden="true"></i> -->
                    Novo Aluno
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
                            <th>E-mail</th>
                            <th>RGA</th>
                            <th>CPF</th>
                            <th>E-mail</th>
                            <th>Telefone</th>
                            <th>Campus</th>
                            <th>Curso</th>
                            <th class="text-center">Situação</th>
                            <th class="text-right">Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php 
                        foreach ($alunos as $aluno) {
                            echo '<tr>
                                    <td>'.$aluno->idaluno.'</td>
                                    <td>'.$aluno->nome.'</td>
                                    <td>'.$aluno->email.'</td>
                                    <td>'.$aluno->rga.'</td>
                                    <td>'.$aluno->cpf.'</td>
                                    <td>'.$aluno->email.'</td>
                                    <td>'.$aluno->telefone.'</td>
                                    <td>'.$aluno->campus.'</td>
                                    <td>'.$aluno->curso.'</td>
                                    <td class="text-center">'.($aluno->status == 1 ? '<span class="label label-success"><a href="'.site_url('/aluno/situacao/'.$aluno->idaluno.'').'" title="Inativar">Ativo</a></span>' : '<span class="label label-danger"><a href="'.site_url('/aluno/situacao/'.$aluno->idaluno.'').'" title="Ativar">Inativo</a></span>').'</td>
                                    <td class="text-right">
                                        <a href="'.site_url('/aluno/edit/'.$aluno->idaluno.'').'" title="Editar aluno" class="btn btn-primary">
                                            Editar
                                        </a>
                                        <a href="'.site_url('/aluno/excluir/'.$aluno->idaluno.'').'" title="Excluir aluno" class="btn btn-danger">
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