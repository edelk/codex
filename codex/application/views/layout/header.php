<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Codex</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo site_url ('css/bootstrap.css') ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo site_url ('css/sb-admin.css') ?>" rel="stylesheet">

    <!-- Estilo CSS Customizado -->
    <link href="<?php echo site_url ('css/estilo.css') ?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo site_url ('font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css">

    <!-- DataTables -->
    <link href="<?php echo site_url ('jquery/jquery.datatable/css/datatables.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo site_url ('jquery/jquery.datatable/css/datatables_bootstrap.css') ?>" rel="stylesheet" type="text/css">

    <!-- JQuery UI -->
    <link href="<?php echo site_url ('jquery/jquery.ui/jquery-ui.css') ?>" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

    <div id="wrapper">
        <?php 
            if ($this->ion_auth->logged_in()){ //Verifica se está logado
        ?>
        
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">            

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header text-center">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Codex - Sistema Financeiro</a>                
            </div>            
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="<?php echo site_url ('/principal/index') ?>"><i class="fa fa-home"></i> Dashboard</a>
                    </li>  

                    <li>
                        <a href="<?php echo site_url ('/pagamento/index') ?>"><i class="fa fa-money"></i> Pagamento</a>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#cadastro"><i class="fa fa-plus-square"></i> Cadastros <i class="fa fa-angle-down pull-right"></i></a>
                        <ul id="cadastro" class="collapse">
                            <li>
                                <a href="<?php echo site_url ('unidade') ?>">Unidade</a>
                                <a href="<?php echo site_url ('coordenador') ?>">Coordenador</a>
                                <a href="<?php echo site_url ('aluno') ?>">Aluno</a>
                                <a href="<?php echo site_url ('projeto') ?>">Projeto</a>
                            </li>                            
                        </ul>
                    </li>
                    <!-- <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#pagamento"><i class="fa fa-money"></i> Pagamento <i class="fa fa-angle-down pull-right"></i></a>
                        <ul id="pagamento" class="collapse">
                            <li>
                                <a href="#">Cadastrar</a>
                            </li>                            
                        </ul>
                    </li> -->

                    <li>
                        <a href="<?php echo site_url ('/relatorios/pagamentos') ?>"><i class="fa fa-file-text-o"></i> Relatórios</a>
                    </li>


                    <!-- <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#relatorio"><i class="fa fa-file-text-o"></i> Relatórios <i class="fa fa-angle-down pull-right"></i></a>
                        <ul id="relatorio" class="collapse">
                            <li>
                                <a href="#">Alunos</a>
                                <a href="#">Coordenadores</a>
                                <a href="#">Projetos</a>
                                <a href="#">Unidades</a>
                                <a href="#">Pagamentos</a>
                            </li>                            
                        </ul>
                    </li>  -->

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#config"><i class="fa fa-cog"></i> Configuração <i class="fa fa-angle-down pull-right"></i></a>
                        <ul id="config" class="collapse">
                            <li>
                                <a href="<?php echo site_url ('usuarios') ?>">Usuários</a>
                            </li>                            
                        </ul>
                    </li>                
                    <li>
                        <a href="<?php echo site_url ('login/logout') ?>"><i class="fa fa-fw fa-power-off"></i> Sair</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        <?php 
        } //Fim do if se está logado
        ?>