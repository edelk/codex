<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-xs-12 col-lg-8 col-sm-6">         
                <h3>Relatórios</h3>
                <hr />
                <ol class="breadcrumb">
                  <li><a href="<?php echo site_url ('/principal/index') ?>">Principal</a></li>
                  <li class="active">Relatórios</li>
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
                        <div class="col-xs-12 col-lg-4 col-sm-12">
                            <div class="form-group">
                                <label for="data_inicial">Data Inicial</label>
                                <input class="form-control" type="date" name="data_inicial" id="data_inicial">
                            </div>
                        </div>

                        <div class="col-xs-12 col-lg-4 col-sm-12">
                            <div class="form-group">
                                <label for="data_final">Data Final</label>
                                <input class="form-control" type="date" name="data_final" id="data_final">
                            </div>
                        </div>
<!-- 
                        <div class="col-xs-12 col-lg-4 col-sm-6">
                            <div class="form-group">
                                <label>Campus</label>
                                <select class="form-control" name="campus" id="campus">
                                    <option value="">Selecione...</option>
                                    <option value="ARAGUAIA">ARAGUAIA</option>
                                    <option value="CUIABÁ">CUIABÁ</option>
                                    <option value="RONDONÓPOLIS">RONDONÓPOLIS</option>
                                    <option value="SINOP">SINOP</option>
                                    <option value="VÁRZEA GRANDE">VÁRZEA GRANDE</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-12 col-lg-4 col-sm-6">
                            <div class="form-group">
                                <label>Edital</label>
                                <select class="form-control" name="edital" id="edital">
                                    <option value="">Selecione...</option>
                                    <option value="PBEXT AÇÕES">PBEXT AÇÕES</option>
                                    <option value="PBEXT AÇÕES AFIRMATIVAS">PBEXT AÇÕES AFIRMATIVAS</option>
                                    <option value="PBEXT AÇÕES APOIO EVENTOS">PBEXT AÇÕES APOIO EVENTOS</option>
                                    <option value="EXT AÇÕES FLUXO CONTÍNUO">EXT AÇÕES FLUXO CONTÍNUO</option>
                                    <option value="EXT PRESTAÇÃO DE SERVIÇO">EXT PRESTAÇÃO DE SERVIÇO</option>
                                </select>
                            </div>
                        </div> -->

                        <div class="col-xs-12 col-lg-4 col-sm-12">
                            <div class="form-group">
                                <label>Tipo</label><br />
                                <select class="form-control" name="tipo">
                                    <option value="">Selecione...</option>
                                    <option value="Não-Suplementar">Não-Suplementar</option>
                                    <option value="Suplementar">Suplementar</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-12 col-lg-12 col-sm-12">
                            <div class="form-group">
                                <button class="btn btn-success" form="form" type="submit">Buscar</button>
                                <a href="<?php echo site_url ('relatorios') ?>" class="btn btn-primary">Cancelar</a>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
        