<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-xs-12 col-lg-8 col-sm-6">         
                <h3>Editar Projeto</h3>
                <hr />
                <ol class="breadcrumb">
                  <li><a href="<?php echo site_url ('/principal/index') ?>">Principal</a></li>
                  <li><a href="<?php echo site_url ('/projeto/index') ?>">Projetos</a></li>
                  <li class="active">Editar Projeto</li>
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
            <div class="col-xs-12 col-md-6 col-lg-8 col-sm-6">
                <form class="" id="form" name="form" method="POST">
                    <div class="row">
                        <div class="col-xs-12 col-lg-12 col-sm-12">
                            <div class="form-group">
                                <label>Nome</label>
                                <input type="text" class="form-control" name="nome" id="idnome" value="<?php echo set_value('nome', $dados->nome)?>">
                            </div>
                        </div>

                        <div class="col-xs-12 col-lg-12 col-sm-12">
                            <div class="form-group">
                                <label>Coordenador(a)</label>
                                <select class="form-control" name="idcoordenador" id="idcoordenador">
                                    <?php 
                                        foreach ($coordenador as $coord) {
                                            echo '<option value="'.$coord->idcoordenador.'" '.($dados->idcoordenador == $coord->idcoordenador ? 'selected=""' : '').'>'.$coord->nome.'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-12 col-lg-6 col-sm-6">
                            <div class="form-group">
                                <label>Edital</label>
                                <select class="form-control" name="edital" id="idedital">
                                    <option value="1" <?php echo ($dados->edital == 1 ? 'selected=""' : '') ?>>PBEXT AÇÕES</option>
                                    <option value="2" <?php echo ($dados->edital == 2 ? 'selected=""' : '') ?>>PBEXT AÇÕES AFIRMATIVAS</option>
                                    <option value="3" <?php echo ($dados->edital == 3 ? 'selected=""' : '') ?>>PBEXT AÇÕES APOIO EVENTOS</option>
                                    <option value="4" <?php echo ($dados->edital == 4 ? 'selected=""' : '') ?>>EXT AÇÕES FLUXO CONTÍNUO</option>
                                    <option value="5" <?php echo ($dados->edital == 5 ? 'selected=""' : '') ?>>EXT PRESTAÇÃO DE SERVIÇO</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-12 col-lg-6 col-sm-6">
                            <div class="form-group">
                                <label>Área Temática</label>
                                <select class="form-control" name="area" id="idarea">
                                    <option value="1" <?php echo ($dados->area == 1 ? 'selected=""' : '') ?>>COMUNICAÇÃO</option>
                                    <option value="2" <?php echo ($dados->area == 2 ? 'selected=""' : '') ?>>CULTURA</option>
                                    <option value="3" <?php echo ($dados->area == 3 ? 'selected=""' : '') ?>>DIREITOS HUMANOS E JUSTIÇA</option>
                                    <option value="4" <?php echo ($dados->area == 4 ? 'selected=""' : '') ?>>EDUCAÇÃO</option>
                                    <option value="5" <?php echo ($dados->area == 5 ? 'selected=""' : '') ?>>MEIO AMBIENTE</option>
                                    <option value="6" <?php echo ($dados->area == 6 ? 'selected=""' : '') ?>>SAÚDE</option>
                                    <option value="7" <?php echo ($dados->area == 7 ? 'selected=""' : '') ?>>TECNOLOGIA E PRODUÇÃO</option>
                                    <option value="8" <?php echo ($dados->area == 8 ? 'selected=""' : '') ?>>TRABALHO</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-12 col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label>Data Início</label>
                                <input type="text" class="form-control" name="data_inicio" id="data_inicio" value="<?php echo set_value('data_inicio', $dados->data_inicio) ?>">
                            </div>
                        </div>

                        <div class="col-xs-12 col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label>Data Término</label>
                                <input type="text" class="form-control" name="data_fim" id="data_fim" value="<?php echo set_value('data_fim', $dados->data_fim) ?>">
                            </div>
                        </div>


                        <div class="col-xs-12 col-lg-12 col-sm-12">
                            <div class="form-group">
                                <label>Unidade</label>
                                <select class="form-control" name="idunidade" id="idunidade">
                                    <?php 
                                        foreach ($unidade as $unid) {
                                            echo '<option value="'.$unid->idunidade.'" '.($dados->idunidade == $unid->idunidade ? 'selected=""' : '').'>'.$unid->nome.' - '.$unid->campus.'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-12 col-lg-12 col-sm-12">
                            <div class="form-group">
                                <label>Aluno(a)</label>
                                <select class="form-control" name="idaluno" id="idaluno">
                                    <?php 
                                        foreach ($aluno as $a) {
                                            echo '<option value="'.$a->idaluno.'">'.$a->nome.'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="">Data Entrada</label>
                                <input type="date" id="data_entrada" name="data_entrada" class="form-control" value="<?php echo set_value('data_entrada', $dados->data_entrada) ?>">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="">Data Saída</label>
                                <input type="date" id="data_saida" name="data_saida" class="form-control" value="<?php echo set_value('data_saida', $dados->data_saida) ?>">
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <button type="button" id="btnAdicionar" name="btnAdicionar" class="btn btn-primary pull-right">Adicionar</button>
                            </div>
                        </div>

                        <div class="col-xs-12 col-lg-12 col-sm-12">
                            <div class="form-group">
                                <table class="table table-bordered table-striped" id="alunos">
                                    <thead>
                                        <tr>
                                            <th class="col-xs-12 col-lg-8 col-sm-4">Aluno(a)</th>
                                            <th class="col-xs-12 col-lg-2 col-sm-2">Data Entrada</th>
                                            <th class="col-xs-12 col-lg-2 col-sm-2">Data Saída</th>
                                            <th>Opções</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $cont = 0;
                                            foreach ($alunos as $a) {
                                        ?>
                                            <tr class="selected" id="linha">
                                                <td><input type="text" name="nome[]" value="<?php echo $a->aluno ?>"></td>
                                                <td><input type="text" name="data_entrada[]" value="<?php echo $a->data_entrada ?>"></td>
                                                <td><input type="text" name="data_saida[]" value="<?php echo $a->data_saida ?>"></td>
                                                <td><button type="button" class="btn btn-warning" onclick="apagar('<?php echo set_value($cont) ?>');">Remover</button></td>
                                            </tr>
                                        <?php
                                            $cont++; 
                                            } //FIM DO FOREACH
                                        ?>
                                    </tbody>
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
                        
                        <input type="hidden" name="idprojeto" value="<?php echo $dados->idprojeto ?>">

                        <div class="col-xs-12 col-lg-12 col-sm-12">
                            <div class="form-group">
                                <button class="btn btn-success" form="form" type="submit">Salvar</button>
                                <a href="<?php echo site_url ('projeto') ?>" class="btn btn-primary">Cancelar</a>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
        