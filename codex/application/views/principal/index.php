<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-3">  
                <div class="panel panel-primary">
                  <div class="panel-heading">Total Bolsas Por Ano R$</div>
                  <div class="panel-body text-center">
                    <h2><?= formatoMoedaView($this->dashboard->getValorTotal()); ?></h2>
                  </div>
                </div>
            </div>

            <div class="col-lg-3">  
                <div class="panel panel-primary">
                  <div class="panel-heading">Total de Projetos</div>
                  <div class="panel-body text-center">
                    <h2><?= $this->dashboard->getTotalProjeto(); ?> Projetos</h2>
                  </div>
                </div>
            </div>

            <div class="col-lg-3">  
                <div class="panel panel-primary">
                  <div class="panel-heading">Total de Bolsistas</div>
                  <div class="panel-body text-center">
                    <h2><?= $this->dashboard->getTotalBolsista(); ?> Bolsistas</h2>
                  </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <canvas id="myChart" class="grafico"></canvas>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->