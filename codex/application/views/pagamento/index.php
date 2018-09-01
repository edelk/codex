<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-xs-12 col-lg-12 col-sm-12">
                
                <h3>Pagamentos</h3>
                <hr />
                <ol class="breadcrumb">
                  <li><a href="<?php echo site_url ('/pagamento/index') ?>">Principal</a></li>
                  <li class="active">Pagamentos</li>
                </ol>

            </div>
        </div>
        <!-- /.row -->

        <!-- Botão novo pagamento -->
        <div class="row margin-bottom10">
            <div class="col-xs-12 col-lg-12 col-sm-12 text-right">
                <a href="<?php echo site_url ('pagamento/create') ?>" title="Novo Pagamento" class="btn btn-success">
                    <!-- <i class="fa fa-plus-square" aria-hidden="true"></i> -->
                    Novo Pagamento
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
                            <th>Aluno(a)</th>
                            <th>CPF</th>
                            <th>RGA</th>
                            <th>Campus</th>
                            <th>Data</th>
                            <th>Valor R$</th>
                            <th class="text-right">Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php 

                        foreach ($pagamentos as $pgto) {
                            echo '<tr>
                                    <td>'.$pgto->aluno.'</td>
                                    <td>'.$pgto->rga.'</td>
                                    <td>'.$pgto->cpf.'</td>
                                    <td>'.$pgto->campus.'</td>
                                    <td>'.formataDataView($pgto->data).'</td>
                                    <td>'.formatoMoedaView($pgto->valor).'</td>
                                    <td class="text-right">
                                        <a href="'.site_url('/pagamento/excluir/'.$pgto->idpagamento.'').'" title="Excluir pagamento" class="btn btn-danger">
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