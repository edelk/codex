<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-xs-12 col-lg-8 col-sm-6">         
                <h3>Novo Pagamento</h3>
                <hr />
                <ol class="breadcrumb">
                  <li><a href="<?php echo site_url ('/principal/index') ?>">Principal</a></li>
                  <li><a href="<?php echo site_url ('/pagamento/index') ?>">Pagamentos</a></li>
                  <li class="active">Novo Pagamento</li>
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
                                <label>Tipo</label><br />
                                <label class="radio-inline">
                                  <input type="radio" name="tipo" id="tipo" value="1" checked> Não-Suplementar
                                </label>

                                <label class="radio-inline">
                                  <input type="radio" name="tipo" id="tipo" value="2"> Suplementar
                                </label>
                            </div>
                        </div>


                        <div class="col-xs-12 col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label>Valor</label>
                                <input type="text" class="form-control" name="valor" id="valor" placeholder="" value="<?php echo set_value('valor')?>">
                            </div>
                        </div>

                        <div class="col-xs-12 col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label>Data</label>
                                <input type="date" class="form-control" name="data" id="data" placeholder="" value="<?php echo set_value('data')?>">
                            </div>
                        </div>


                        <div class="col-xs-12 col-lg-12 col-sm-12">
                            <div class="form-group">
                                <h4>Adicionar Aluno(a)</h4>
                                <hr/>
                            </div>
                        </div>

                        
                        <div class="col-xs-12 col-lg-12 col-sm-12">
                            <div class="form-group">
                                <div class="form-inline">
                                    <select class="form-control" name="idaluno" id="idaluno">
                                        <?php 
                                            $alunos = $this->base_model->GetALL('aluno');
                                            foreach ($alunos as $a) {
                                                echo '<option value="'. $a->idaluno .'">'. $a->nome .' - '.$a->rga.'</option>';
                                            }
                                        ?>
                                    </select>
                                    <button type="button" id="btnAdicionarPagamento" name="btnAdicionarPagamento" class="btn btn-primary">Adicionar</button>
                                </div>
                            </div>  
                        </div>


                        <div class="col-xs-12 col-lg-12 col-sm-12">
                            <div class="form-group">
                                <table class="table table-bordered table-striped" id="alunos">
                                    <thead>
                                        <tr>
                                            <th class="col-xs-12 col-lg-8 col-sm-4">Aluno(a)</th>
                                            <th class="col-xs-12 col-lg-2 col-sm-2">Data</th>
                                            <th class="col-xs-12 col-lg-2 col-sm-2">Valor</th>
                                            <th>Opções</th>
                                            <th class="hidden">total</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <th class="hidden"></th>
                                        <th class="hidden"></th>
                                        <th class="hidden"></th>
                                        <th class="hidden"></th>
                                        <th class="hidden"></th>
                                        <th class="hidden"></th>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
  
                        
                        <div class="col-xs-12 col-lg-12 col-sm-12">
                            <div class="form-group">
                                <button class="btn btn-success" form="form" type="submit">Cadastrar</button>
                                <a href="<?php echo site_url ('pagamento') ?>" class="btn btn-primary">Cancelar</a>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
        