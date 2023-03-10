<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:400,300,500,700&amp;subset=latin,latin-ext">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Montserrat:400,700">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/libraries/Font-Awesome/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/libraries/bootstrap-select/dist/css/bootstrap-select.min.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/libraries/bootstrap-fileinput/css/fileinput.min.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/libraries/nvd3/nv.d3.min.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/libraries/OwlCarousel/owl-carousel/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/realsite-admin.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/realsite.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/edit-dash.css">
<title>Rede Binária - Xbitcompany</title>
</head>

<body id="dash-rede-bi" class="open hide-secondary-sidebar">
<div class="admin-wrapper">
    <?php include("includes/dash/menu.php");?>
    <!-- /.admin-navigation -->
    
    <div class="admin-content">
        <div class="admin-content-inner">
            <?php include("includes/dash/header.php"); ?>
            <!-- /.admin-content-header -->
            
            <div class="admin-content-main">
                <div class="admin-content-main-inner">
                    <div class="container-fluid">
                        <div class="box">
                            <h1 class="page-header mb60">Rede Binária</h1>
                            <div class="row info-cols">
                                <div class="info-cols-left col-sm-6">
                                    <div class="man">
                                        <div class="man-content">
                                            <div class="man-title">
                                                <ul>
                                                    <li class="item-1">
                                                    <span>Total</span><br/>
                                                        <?=$bonus_e_total?>
                                                    </li>
                                                    <li class="item-2">
                                                    <span>Acumulados</span><br/>
                                                        <?=$bonus_e2?>
                                                    </li>
                                                    <li class="item-3">
                                                    <span>Pontos</span><br/>
                                                        <?=$bonus_e-$bonus_e2?>
                                                    </li>
                                                </ul>
                                                
                                            </div>
                                        </div>
                                    </div><!-- /.man --> 
                                </div>
                                <div class="info-cols-right col-sm-6">
                                    <div class="man">
                                        <div class="man-content">
                                            <div class="man-title">
                                                <ul>
                                                    <li class="item-1">
                                                    <span>Total</span><br/>
                                                        <?=$bonus_d_total?>
                                                    </li>
                                                    <li class="item-2">
                                                    <span>Acumulados</span><br/>
                                                        <?=$bonus_d2?>
                                                    </li>
                                                    <li class="item-3">
                                                    <span>Pontos</span><br/>
                                                        <?=$bonus_d-$bonus_d2?>
                                                    </li>
                                                </ul>
                                               
                                            </div>
                                        </div>
                                    </div><!-- /.man --> 
                                </div>
                            </div>
                            
                            <!-- Primeiro -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="user man" title="Login: <?=$dd_user->login?> &#10;&#10;Nível: <?=$dd_user->nivel?> &#10;&#10;Plano: <?=$dd_user->plano?> &#10;&#10;Id: <?=$dd_user->id?>">                                        
                                        <div class="man-content">
                                           <div class="man-image"> <img class="ouro" src="<?=base_url()?>img/user_padrao.jpg" alt=""> </div>
                                            <div class="man-title">
                                                <ul>
                                                    <li class="login">
													    <a href="#" title="Ver login"> <?=$dd_user->login?> </a>
                                                    </li>
                                                    <li class="nivel">
                                                        <span class="lab">Nível:</span> <?=$dd_user->nivel?>
                                                    </li>
                                                    <li class="plano">
                                                        <span class="lab">Plano:</span>
                                                        <?=$dd_user->plano?>													
                                                    </li>
                                                    <li>
                                                        <span class="lab">Id:</span> <?=$dd_user->id?> - A -
                                                    </li>
                                                </ul>

													<?=$dd_user->login?>

                                            </div><!-- /.man-title -->
                                        </div>
                                    </div><!-- /.user -->
                                    <div class="line-vert">&nbsp;</div>
                                </div>
                                <!-- /.col-sm-12 --> 
                            </div>
                            <!-- /.row -->
                            
                            <div class="row">
                                <div class="line-horiz line-horiz-n2">&nbsp;</div>
                                <div class="box-left">
                                <div class="item-col-left col-sm-6 box-left-n2">
                                    <!--  ESQUERDA nível 1  -->
                                    <?php if($rede_e->num_rows() > 0){ 
												$dd_rede_1_e = $this->padrao_model->get_by_id($rede_e->row()->id_user,'user')->row();
												
												$imagem = base_url()."img/user_padrao.jpg";
												$id_user_indicado = $rede_e->row()->id_user;
												$plano_user = $dd_rede_1_e->plano;
												$login_user = $dd_rede_1_e->login;
												$lado = $dd_rede_1_e->lado;
											}else{
												$imagem = base_url()."img/user_padrao.jpg";
												$id_user_indicado = "";
												$plano_user = "";
												$login_user = "";
											}
											?>
                                    <div class="user man" title="Login: <?=$login_user?> &#10;&#10;Nível: <?=$nivel_user->nivel?> &#10;&#10;Plano: <?=$plano_user?> &#10;&#10;Id: <?=$id_user_indicado?>">                                       
                                        <div class="man-content">
                                            <div class="man-image"> <img class="bronze" src="<?=$imagem?>" alt="<?=$plano_user?>"> </div>
                                            <div class="man-title">
                                                <ul>
                                                    <li class="login">
                                                        <a href="<?=base_url()?>dash/rede_binaria/<?=$id_user_indicado?>">
                                                            <?=$login_user?>
                                                        </a>
                                                    </li>
                                                    <li class="nivel">
                                                        <span class="lab">Nível:</span>
                                                    </li>
                                                    <li class="plano">
                                                        <span class="lab">Plano:</span>
                                                        <?=$plano_user?>
                                                    </li>
                                                    <li>
                                                        <span class="lab">Id:</span> <?=$id_user_indicado?> - B -
                                                    </li>
                                                </ul>
                                                <a href="<?=base_url()?>dash/rede_binaria/<?=$id_user_indicado?>">
													<?=$login_user?>
                                                </a>
                                            </div><!-- /.man-title -->
                                        </div>
                                    </div>
                                    <!-- /.user --> 
                                    <div class="line-vert">&nbsp;</div>
                                </div>
                                <!-- /.item-col-left --> 
                                </div><!-- /.box-left -->
                                
                                <!-- X ESQUERDA  --> 
                                <!-- DIREITA  nível 1 -->
                                <?php 
											if($rede_d->num_rows() > 0){ 
											$dd_rede_1_d_d = $this->padrao_model->get_by_id($rede_d->row()->id_user,'user')->row();
											
											$imagem = base_url()."img/user_padrao.jpg";
												$id_user_indicado = $rede_d->row()->id_user;
												$plano_user = $dd_rede_1_d_d->plano;
												$login_user = $dd_rede_1_d_d->login;
												$lado = $dd_rede_1_d->lado;
											}else{
												$imagem = base_url()."img/user_padrao.jpg";
												$id_user_indicado = "";
												$plano_user = "";
												$login_user = "";
											}
											?>
                              <div class="box-right">
                                <div class="item-col-right col-sm-6 box-right-n2">
                                    <div class="user man" title="Login: <?=$login_user?> &#10;&#10;Nível: <?=$nivel_user->nivel?> &#10;&#10;Plano: <?=$plano_user?> &#10;&#10;Id: <?=$id_user_indicado?>">                                       
                                        <div class="man-content">
                                           <div class="man-image"> <img class="prata" src="<?=$imagem?>" alt="<?=$plano_user?>"> </div>
                                            <div class="man-title">
                                                <ul>
                                                    <li class="login">
                                                        <a href="<?=base_url()?>dash/rede_binaria/<?=$id_user_indicado?>">
                                                            <?=$login_user?>
                                                        </a>
                                                    </li>
                                                    <li class="nivel">
                                                        <span class="lab">Nível:</span>
                                                    </li>
                                                    <li class="plano">
                                                        <span class="lab">Plano:</span>
                                                        <?=$plano_user?>
                                                    </li>
                                                    <li>
                                                        <span class="lab">Id:</span> <?=$id_user_indicado?> - C -
                                                    </li>
                                                </ul>
                                                <a href="<?=base_url()?>dash/rede_binaria/<?=$id_user_indicado?>">
													<?=$login_user?>
                                                </a>
                                            </div><!-- /.man-title -->
                                        </div>
                                    </div>
                                    <!-- /.user -->
                                    <div class="line-vert">&nbsp;</div>
                                </div><!-- /.item-col-right  --> 
                             </div><!-- /.box-right -->
                                
                            </div>

                        
                        <!-- 2º nível da esquerda (Lado esquerdo) -->
                        <div class="row">
                            <?php if($this->usuarios_model->get_rede($dd_rede_1_e->id,"e")->num_rows() > 0){ ?>
                            <?php 
									$dd_rede_2_e = $this->padrao_model->get_by_id($this->usuarios_model->get_rede($dd_rede_1_e->id,"e")->row()->id_user,'user')->row(); 
									$imagem = base_url()."img/user_padrao.jpg";
									$id_user_indicado = $this->usuarios_model->get_rede($dd_rede_1_e->id,"e")->row()->id_user;
									$plano_user = $dd_rede_2_e->plano;
									$login_user = $dd_rede_2_e->login;
									$lado = $dd_rede_2_e->lado;
									}else{
										$imagem = base_url()."img/user_padrao.jpg";
										$id_user_indicado = "";
										$plano_user = "";
										$login_user = "";
									}
								
								
								?>
                            <div class="box-n3 box-left">
                              <div class="line-horiz">&nbsp;</div>
                              <div class="item-col-left col-sm-6">
                                <div class="user man" title="Login: <?=$login_user?> &#10;&#10;Nível: <?=$nivel_user->nivel?> &#10;&#10;Plano: <?=$plano_user?> &#10;&#10;Id: <?=$id_user_indicado?>">                                  
                                    <div class="man-content">
                                      <div class="man-image">
                                        <img src="<?=$imagem?>" alt="<?=$plano_user?>">
                                        </div>
                                        <div class="man-title">
                                                <ul>
                                                    <li class="login">
                                                        <a href="<?=base_url()?>dash/rede_binaria/<?=$id_user_indicado?>">
                                                            <?=$login_user?>
                                                        </a>
                                                    </li>
                                                    <li class="nivel">
                                                        <span class="lab">Nível:</span>
                                                    </li>
                                                    <li class="plano">
                                                        <span class="lab">Plano:</span>
                                                        <?=$plano_user?>
                                                    </li>
                                                    <li>
                                                        <span class="lab">Id:</span> <?=$id_user_indicado?> - D -
                                                    </li>
                                                </ul>
                                                <a href="<?=base_url()?>dash/rede_binaria/<?=$id_user_indicado?>">
													<?=$login_user?>
                                                </a>
                                            
                                            </div><!-- /.man-title -->
                                            
                                    </div>
                                </div>
                                
                                <!-- /.user --> 
                                <div class="line-vert">&nbsp;</div>
                            </div>
                            <!-- /.item-col-left --> 
                            
                            <!-- 2º nível da direita (Lado esquerdo) -->
                            <?php if($this->usuarios_model->get_rede($dd_rede_1_e->id,"d")->num_rows() > 0){ ?>
                            <?php 
									$dd_rede_2_d = $this->padrao_model->get_by_id($this->usuarios_model->get_rede($dd_rede_1_e->id,"d")->row()->id_user,'user')->row(); 
									
									$imagem = base_url()."img/user_padrao.jpg";
									$id_user_indicado = $this->usuarios_model->get_rede($dd_rede_1_e->id,"d")->row()->id_user;
									$plano_user = $dd_rede_2_d->plano;
									$login_user = $dd_rede_2_d->login;
									$lado = $dd_rede_2_d->lado;
									}else{
										$imagem = base_url()."img/user_padrao.jpg";
										$id_user_indicado = "";
										$plano_user = "";
										$login_user = "";
									}
									?>
                            <div class="item-col-left col-sm-6">
                                <div class="user man" title="Login: <?=$login_user?> &#10;&#10;Nível: <?=$nivel_user->nivel?> &#10;&#10;Plano: <?=$plano_user?> &#10;&#10;Id: <?=$id_user_indicado?>">                                    
                                    <div class="man-content">
                                       <div class="man-image">
                                       <img src="<?=$imagem?>" alt="<?=$plano_user?>">
                                       </div>
                                        <div class="man-title">
                                                <ul>
                                                    <li class="login">
                                                        <a href="<?=base_url()?>dash/rede_binaria/<?=$id_user_indicado?>">
                                                            <?=$login_user?>
                                                        </a>
                                                    </li>
                                                    <li class="nivel">
                                                        <span class="lab">Nível:</span>
                                                    </li>
                                                    <li class="plano">
                                                        <span class="lab">Plano:</span>
                                                        <?=$plano_user?>
                                                    </li>
                                                    <li>
                                                        <span class="lab">Id:</span> <?=$id_user_indicado?> - E -
                                                    </li>
                                                </ul>
                                                <a href="<?=base_url()?>dash/rede_binaria/<?=$id_user_indicado?>">
													<?=$login_user?>
                                                </a>
                                            </div><!-- /.man-title -->
                                    </div>
                                </div>
                                <!-- /.user --> 
                                <div class="line-vert">&nbsp;</div>
                            </div>
                            <!-- /.item-col-left --> 
                            </div><!-- /.box-n3 .box-left -->
                            <!------------ CONTINUA COM A PERNA DIREIRA DO PRIMEIRO NIVEL $dd_rede_1_d -------------> 
                            <!-- 3º nível da esquerda (Lado direito) -->
                            <?php if($this->usuarios_model->get_rede($dd_rede_1_d_d->id,"e")->num_rows() > 0){ ?>
                            <?php 
									$dd_rede_2_e_d = $this->padrao_model->get_by_id($this->usuarios_model->get_rede($dd_rede_1_d_d->id,"e")->row()->id_user,'user')->row(); 
									$imagem = base_url()."img/user_padrao.jpg";
									$id_user_indicado = $this->usuarios_model->get_rede($dd_rede_1_d_d->id,"e")->row()->id_user;
									$plano_user = $dd_rede_2_e_d->plano;
									$login_user = $dd_rede_2_e_d->login;
									#$lado = $dd_rede_1_e->lado;
									}else{
										$imagem = base_url()."img/user_padrao.jpg";
										$id_user_indicado = "";
										$plano_user = "";
										$login_user = "";
									}
								?>
                        <div class="box-n3 box-right">
                          <div class="line-horiz">&nbsp;</div>
                            <div class="item-col-right col-sm-6">
                                <div class="user man" title="Login: <?=$login_user?> &#10;&#10;Nível: <?=$nivel_user->nivel?> &#10;&#10;Plano: <?=$plano_user?> &#10;&#10;Id: <?=$id_user_indicado?>">                                   
                                    <div class="man-content">
                                      <div class="man-image"> <img src="<?=$imagem?>" alt="<?=$plano_user?>"> </div>
                                        <div class="man-title">
                                                <ul>
                                                    <li class="login">
                                                        <a href="<?=base_url()?>dash/rede_binaria/<?=$id_user_indicado?>">
                                                            <?=$login_user?>
                                                        </a>
                                                    </li>
                                                    <li class="nivel">
                                                        <span class="lab">Nível:</span>
                                                    </li>
                                                    <li class="plano">
                                                        <span class="lab">Plano:</span>
                                                        <?=$plano_user?>
                                                    </li>
                                                    <li>
                                                        <span class="lab">Id:</span> <?=$id_user_indicado?> - F -
                                                    </li>
                                                </ul>
                                                <a href="<?=base_url()?>dash/rede_binaria/<?=$id_user_indicado?>">
													<?=$login_user?>
                                                </a>
                                            </div><!-- /.man-title -->
                                    </div>
                                </div>
                                <!-- /.user --> 
                                <div class="line-vert">&nbsp;</div>
                            </div>
                            <!-- /.item-col-right --> 
                            
                            <!-- 3º nível da direito (Lado direito) -->
                            <?php if($this->usuarios_model->get_rede($dd_rede_1_d_d->id,"d")->num_rows() > 0){ ?>
                            <?php 
									$dd_rede_2_d_d = $this->padrao_model->get_by_id($this->usuarios_model->get_rede($dd_rede_1_d_d->id,"d")->row()->id_user,'user')->row(); 
									
									$imagem = base_url()."img/user_padrao.jpg";
									$id_user_indicado = $this->usuarios_model->get_rede($dd_rede_1_d_d->id,"d")->row()->id_user;
									$plano_user = $dd_rede_2_d_d->plano;
									$login_user = $dd_rede_2_d_d->login;
									$lado = $dd_rede_1_d->lado;
									}else{
										$imagem = base_url()."img/user_padrao.jpg";
										$id_user_indicado = "";
										$plano_user = "";
										$login_user = "";
									}
									?>
                            <div class="item-col-right col-sm-6">
                                <div class="user man" title="Login: <?=$login_user?> &#10;&#10;Nível: <?=$nivel_user->nivel?> &#10;&#10;Plano: <?=$plano_user?> &#10;&#10;Id: <?=$id_user_indicado?>">                                   
                                    <div class="man-content">
                                      <div class="man-image"> <img src="<?=$imagem?>" alt="<?=$plano_user?>"> </div>
                                        <div class="man-title">
                                                <ul>
                                                    <li class="login">
                                                        <a href="<?=base_url()?>dash/rede_binaria/<?=$id_user_indicado?>">
                                                            <?=$login_user?>
                                                        </a>
                                                    </li>
                                                    <li class="nivel">
                                                        <span class="lab">Nível:</span>
                                                    </li>
                                                    <li class="plano">
                                                        <span class="lab">Plano:</span>
                                                        <?=$plano_user?>
                                                    </li>
                                                    <li>
                                                        <span class="lab">Id:</span> <?=$id_user_indicado?> - G -
                                                    </li>
                                                </ul>
                                                <a href="<?=base_url()?>dash/rede_binaria/<?=$id_user_indicado?>">
													<?=$login_user?>
                                                </a>
                                            </div><!-- /.man-title -->
                                    </div>
                                </div>
                                <!-- /.user --> 
                                <div class="line-vert">&nbsp;</div>
                            </div>
                            <!-- /.item-col-right -->
                            </div><!-- /.box-n3 .box-right -->
                            
                        </div>
                        <!-- /.box --> 
                        
                        <!---------- NIVEL 3 ----------->
                        <div class="row">
                            <?php if($this->usuarios_model->get_rede($dd_rede_2_e->id,"e")->num_rows() > 0){ ?>
                            <?php 
									$dd_rede_3_e = $this->padrao_model->get_by_id($this->usuarios_model->get_rede($dd_rede_2_e->id,"e")->row()->id_user,'user')->row(); 
									$imagem = base_url()."img/user_padrao.jpg";
									$id_user_indicado = $this->usuarios_model->get_rede($dd_rede_2_e->id,"e")->row()->id_user;
									$plano_user = $dd_rede_3_e->plano;
									$login_user = $dd_rede_3_e->login;
									$lado = $dd_rede_3_e->lado;
									}else{
										$imagem = base_url()."img/user_padrao.jpg";
										$id_user_indicado = "";
										$plano_user = "";
										$login_user = "";
									}
									?>
                       <div class="box-n4 box-left">
                          <div class="line-horiz">&nbsp;</div>
                            <div class="item-col-left col-sm-6">
                                <div class="user man" title="Login: <?=$login_user?> &#10;&#10;Nível: <?=$nivel_user->nivel?> &#10;&#10;Plano: <?=$plano_user?> &#10;&#10;Id: <?=$id_user_indicado?>">
                                    <div class="man-content">
                                        <div class="man-image"> <img src="<?=$imagem?>" alt="<?=$plano_user?>"> </div>
                                        <div class="man-title">
                                                <ul>
                                                    <li class="login">
                                                        <a href="<?=base_url()?>dash/rede_binaria/<?=$id_user_indicado?>">
                                                            <?=$login_user?>
                                                        </a>
                                                    </li>
                                                    <li class="nivel">
                                                        <span class="lab">Nível:</span>
                                                    </li>
                                                    <li class="plano">
                                                        <span class="lab">Plano:</span>
                                                        <?=$plano_user?>
                                                    </li>
                                                    <li>
                                                        <span class="lab">Id:</span> <?=$id_user_indicado?> - H -
                                                    </li>
                                                </ul>
                                                <a href="<?=base_url()?>dash/rede_binaria/<?=$id_user_indicado?>">
													<?=$login_user?>
                                                </a>
                                            </div><!-- /.man-title -->
                                    </div>
                                </div>
                                <!-- /.user --> 
                            </div>
                            <!-- /.item-col-left -->
                            
                            <?php if($this->usuarios_model->get_rede($dd_rede_2_e->id,"d")->num_rows() > 0){ ?>
                            <?php 
									$dd_rede_3_d = $this->padrao_model->get_by_id($this->usuarios_model->get_rede($dd_rede_2_e->id,"d")->row()->id_user,'user')->row(); 
									$imagem = base_url()."img/user_padrao.jpg";
									$id_user_indicado = $this->usuarios_model->get_rede($dd_rede_2_e->id,"d")->row()->id_user;
									$plano_user = $dd_rede_3_d->plano;
									$login_user = $dd_rede_3_d->login;
									$lado = $dd_rede_3_d->lado;
									}else{
										$imagem = base_url()."img/user_padrao.jpg";
										$id_user_indicado = "";
										$plano_user = "";
										$login_user = "";
									}
									?>
                            <div class="item-col-left col-sm-6">
                                <div class="user man" title="Login: <?=$login_user?> &#10;&#10;Nível: <?=$nivel_user->nivel?> &#10;&#10;Plano: <?=$plano_user?> &#10;&#10;Id: <?=$id_user_indicado?>">
                                    <div class="man-content">
                                        <div class="man-image"> <img src="<?=$imagem?>" alt="<?=$plano_user?>"> </div>
                                        <div class="man-title">
                                                <ul>
                                                    <li class="login">
                                                        <a href="<?=base_url()?>dash/rede_binaria/<?=$id_user_indicado?>">
                                                            <?=$login_user?>
                                                        </a>
                                                    </li>
                                                    <li class="nivel">
                                                        <span class="lab">Nível:</span>
                                                    </li>
                                                    <li class="plano">
                                                        <span class="lab">Plano:</span>
                                                        <?=$plano_user?>
                                                    </li>
                                                    <li>
                                                        <span class="lab">Id:</span> <?=$id_user_indicado?> - I -
                                                    </li>
                                                </ul>
                                                <a href="<?=base_url()?>dash/rede_binaria/<?=$id_user_indicado?>">
													<?=$login_user?>
                                                </a>
                                            </div><!-- /.man-title -->
                                    </div>
                                </div>
                                <!-- /.user --> 
                            </div>
                            <!-- /.item-col-left -->
                            </div><!-- /.box-n4 -->
                            
                            <?php if($this->usuarios_model->get_rede($dd_rede_2_d->id,"e")->num_rows() > 0){ ?>
                            <?php 
								$dd_rede_3_e = $this->padrao_model->get_by_id($this->usuarios_model->get_rede($dd_rede_2_d->id,"e")->row()->id_user,'user')->row(); 
								$imagem = base_url()."img/user_padrao.jpg";
								$id_user_indicado = $this->usuarios_model->get_rede($dd_rede_2_d->id,"e")->row()->id_user;
								$plano_user = $dd_rede_3_e->plano;
								$login_user = $dd_rede_3_e->login;
								$lado = $dd_rede_3_e->lado;
								}else{
									$imagem = base_url()."img/user_padrao.jpg";
									$id_user_indicado = "";
									$plano_user = "";
									$login_user = "";
								}
								?>
                       <div class="box-n4 box-left">
                          <div class="line-horiz">&nbsp;</div>
                            <div class="item-col-left col-sm-6">
                                <div class="user man" title="Login: <?=$login_user?> &#10;&#10;Nível: <?=$nivel_user->nivel?> &#10;&#10;Plano: <?=$plano_user?> &#10;&#10;Id: <?=$id_user_indicado?>">
                                    <div class="man-content">
                                        <div class="man-image"> <img src="<?=$imagem?>" alt="<?=$plano_user?>"> </div>
                                        <div class="man-title">
                                                <ul>
                                                    <li class="login">
                                                        <a href="<?=base_url()?>dash/rede_binaria/<?=$id_user_indicado?>">
                                                            <?=$login_user?>
                                                        </a>
                                                    </li>
                                                    <li class="nivel">
                                                        <span class="lab">Nível:</span>
                                                    </li>
                                                    <li class="plano">
                                                        <span class="lab">Plano:</span>
                                                        <?=$plano_user?>
                                                    </li>
                                                    <li>
                                                        <span class="lab">Id:</span> <?=$id_user_indicado?> - J -
                                                    </li>
                                                </ul>
                                                <a href="<?=base_url()?>dash/rede_binaria/<?=$id_user_indicado?>">
													<?=$login_user?>
                                                </a>
                                            </div><!-- /.man-title -->
                                    </div>
                                </div>
                                <!-- /.user --> 
                            </div>
                            <!-- /.item-col-left -->
                            <?php if($this->usuarios_model->get_rede($dd_rede_2_d->id,"d")->num_rows() > 0){ ?>
                            <?php 
									$dd_rede_3_d = $this->padrao_model->get_by_id($this->usuarios_model->get_rede($dd_rede_2_d->id,"d")->row()->id_user,'user')->row(); 
									$imagem = base_url()."img/user_padrao.jpg";
									$id_user_indicado = $this->usuarios_model->get_rede($dd_rede_2_d->id,"d")->row()->id_user;
									$plano_user = $dd_rede_3_d->plano;
									$login_user = $dd_rede_3_d->login;
									$lado = $dd_rede_3_d->lado;
									}else{
										$imagem = base_url()."img/user_padrao.jpg";
										$id_user_indicado = "";
										$plano_user = "";
										$login_user = "";
									}
									?>
                            <div class="item-col-left col-sm-6">
                                <div class="user man" title="Login: <?=$login_user?> &#10;&#10;Nível: <?=$nivel_user->nivel?> &#10;&#10;Plano: <?=$plano_user?> &#10;&#10;Id: <?=$id_user_indicado?>">
                                    <div class="man-content">
                                        <div class="man-image"> <img src="<?=$imagem?>" alt="<?=$plano_user?>"> </div>
                                        <div class="man-title">
                                                <ul>
                                                    <li class="login">
                                                        <a href="<?=base_url()?>dash/rede_binaria/<?=$id_user_indicado?>">
                                                            <?=$login_user?>
                                                        </a>
                                                    </li>
                                                    <li class="nivel">
                                                        <span class="lab">Nível:</span>
                                                    </li>
                                                    <li class="plano">
                                                        <span class="lab">Plano:</span>
                                                        <?=$plano_user?>
                                                    </li>
                                                    <li>
                                                        <span class="lab">Id:</span> <?=$id_user_indicado?> - L -
                                                    </li>
                                                </ul>
                                                <a href="<?=base_url()?>dash/rede_binaria/<?=$id_user_indicado?>">
													<?=$login_user?>
                                                </a>
                                            </div><!-- /.man-title -->
                                    </div>
                                </div>
                                <!-- /.user --> 
                            </div>
                            <!-- /.item-col-left --> 
                            </div><!-- /.box-n4 -->
                            
                            
                            <!--- CONTINUAR -->
                           
                            <?php if($this->usuarios_model->get_rede($dd_rede_2_e_d->id,"e")->num_rows() > 0){ ?>
                            <?php 
                                            $dd_rede_3_e_d = $this->padrao_model->get_by_id($this->usuarios_model->get_rede($dd_rede_2_e_d->id,"e")->row()->id_user,'user')->row(); 
                                            $imagem = base_url()."img/user_padrao.jpg";
                                            $id_user_indicado = $this->usuarios_model->get_rede($dd_rede_2_e_d->id,"e")->row()->id_user;
                                            $plano_user = $dd_rede_3_e_d->plano;
                                            $login_user = $dd_rede_3_e_d->login;
											#$lado = $dd_rede_3_e->lado;
                                            }else{
                                                $imagem = base_url()."img/user_padrao.jpg";
                                                $id_user_indicado = "";
                                                $plano_user = "";
                                                $login_user = "";
                                            }
                                        ?>
                       <div class="box-n4 box-right">
                          <div class="line-horiz">&nbsp;</div>
                            <div class="item-col-right col-sm-6">
                                <div class="user man" title="Login: <?=$login_user?> &#10;&#10;Nível: <?=$nivel_user->nivel?> &#10;&#10;Plano: <?=$plano_user?> &#10;&#10;Id: <?=$id_user_indicado?>">
                                    <div class="man-content">
                                        <div class="man-image"> <img src="<?=$imagem?>" alt="<?=$plano_user?>"></div>
                                        <div class="man-title">
                                                <ul>
                                                    <li class="login">
                                                        <a href="<?=base_url()?>dash/rede_binaria/<?=$id_user_indicado?>">
                                                            <?=$login_user?>
                                                        </a>
                                                    </li>
                                                    <li class="nivel">
                                                        <span class="lab">Nível:</span>
                                                    </li>
                                                    <li class="plano">
                                                        <span class="lab">Plano:</span>
                                                        <?=$plano_user?>
                                                    </li>
                                                    <li>
                                                        <span class="lab">Id:</span> <?=$id_user_indicado?> - M -
                                                    </li>
                                                </ul>
                                                <a href="<?=base_url()?>dash/rede_binaria/<?=$id_user_indicado?>">
													<?=$login_user?>
                                                </a>
                                            </div><!-- /.man-title -->
                                    </div>
                                </div>
                                <!-- /.user --> 
                            </div>
                            <!-- /.item-col-right -->
                            
                            <?php if($this->usuarios_model->get_rede($dd_rede_2_e_d->id,"d")->num_rows() > 0){ ?>
                            <?php 
                                            $dd_rede_3_d = $this->padrao_model->get_by_id($this->usuarios_model->get_rede($dd_rede_2_e_d->id,"d")->row()->id_user,'user')->row(); 
                                            $imagem = base_url()."img/user_padrao.jpg";
                                            $id_user_indicado = $this->usuarios_model->get_rede($dd_rede_2_e_d->id,"d")->row()->id_user;
                                            $plano_user = $dd_rede_3_d->plano;
                                            $login_user = $dd_rede_3_d->login;
											$lado = $dd_rede_3_d->lado;
                                            }else{
                                                $imagem = base_url()."img/user_padrao.jpg";
                                                $id_user_indicado = "";
                                                $plano_user = "";
                                                $login_user = "";
                                            }
                                        ?>
                            <div class="item-col-right col-sm-6">
                                <div class="user man" title="Login: <?=$login_user?> &#10;&#10;Nível: <?=$nivel_user->nivel?> &#10;&#10;Plano: <?=$plano_user?> &#10;&#10;Id: <?=$id_user_indicado?>">
                                    <div class="man-content">
                                        <div class="man-image"> <img src="<?=$imagem?>" alt="<?=$plano_user?>"></div>
                                        <div class="man-title">
                                                <ul>
                                                    <li class="login">
                                                        <a href="<?=base_url()?>dash/rede_binaria/<?=$id_user_indicado?>">
                                                            <?=$login_user?>
                                                        </a>
                                                    </li>
                                                    <li class="nivel">
                                                        <span class="lab">Nível:</span>
                                                    </li>
                                                    <li class="plano">
                                                        <span class="lab">Plano:</span>
                                                        <?=$plano_user?>
                                                    </li>
                                                    <li>
                                                        <span class="lab">Id:</span> <?=$id_user_indicado?> - N -
                                                    </li>
                                                </ul>
                                                <a href="<?=base_url()?>dash/rede_binaria/<?=$id_user_indicado?>">
													<?=$login_user?>
                                                </a>
                                            </div><!-- /.man-title -->
                                    </div>
                                </div>
                                <!-- /.user --> 
                            </div>
                            <!-- /.item-col-right -->
                            </div> <!-- /.box-n4 -->
                            
                            <?php if($this->usuarios_model->get_rede($dd_rede_2_d_d->id,"e")->num_rows() > 0){ ?>
                            <?php 
								$dd_rede_3_e_d = $this->padrao_model->get_by_id($this->usuarios_model->get_rede($dd_rede_2_d_d->id,"e")->row()->id_user,'user')->row(); 
								$imagem = base_url()."img/user_padrao.jpg";
								$id_user_indicado = $this->usuarios_model->get_rede($dd_rede_2_d_d->id,"e")->row()->id_user;
								$plano_user = $dd_rede_3_e_d->plano;
								$login_user = $dd_rede_3_e_d->login;
								#$lado = $dd_rede_3_d->lado;
								}else{
									$imagem = base_url()."img/user_padrao.jpg";
									$id_user_indicado = "";
									$plano_user = "";
									$login_user = "";
								}
							?>
                       <div class="box-n4 box-right">
                          <div class="line-horiz">&nbsp;</div>
                            <div class="item-col-right col-sm-6">
                                <div class="user man" title="Login: <?=$login_user?> &#10;&#10;Nível: <?=$nivel_user->nivel?> &#10;&#10;Plano: <?=$plano_user?> &#10;&#10;Id: <?=$id_user_indicado?>">
                                    <div class="man-content">
                                        <div class="man-image"> <img src="<?=$imagem?>" alt="<?=$plano_user?>"></div>
                                        <div class="man-title">
                                                <ul>
                                                    <li class="login">
                                                        <a href="<?=base_url()?>dash/rede_binaria/<?=$id_user_indicado?>">
                                                            <?=$login_user?>
                                                        </a>
                                                    </li>
                                                    <li class="nivel">
                                                        <span class="lab">Nível:</span>
                                                    </li>
                                                    <li class="plano">
                                                        <span class="lab">Plano:</span>
                                                        <?=$plano_user?>
                                                    </li>
                                                    <li>
                                                        <span class="lab">Id:</span> <?=$id_user_indicado?> - O -
                                                    </li>
                                                </ul>
                                                <a href="<?=base_url()?>dash/rede_binaria/<?=$id_user_indicado?>">
													<?=$login_user?>
                                                </a>
                                            </div><!-- /.man-title -->
                                    </div>
                                </div>
                                <!-- /.user --> 
                            </div>
                            <!-- /.item-col-right -->
                            <?php if($this->usuarios_model->get_rede($dd_rede_2_d_d->id,"d")->num_rows() > 0){ ?>
                            <?php 
								$dd_rede_3_d_d = $this->padrao_model->get_by_id($this->usuarios_model->get_rede($dd_rede_2_d_d->id,"d")->row()->id_user,'user')->row(); 
								$imagem = base_url()."img/user_padrao.jpg";
								$id_user_indicado = $this->usuarios_model->get_rede($dd_rede_2_d_d->id,"d")->row()->id_user;
								$plano_user = $dd_rede_3_d_d->plano;
								$login_user = $dd_rede_3_d_d->login;
								#$lado = $dd_rede_3_d->lado;
								}else{
									$imagem = base_url()."img/user_padrao.jpg";
									$id_user_indicado = "";
									$plano_user = "";
									$login_user = "";
								}
							?>
                            <div class="item-col-right col-sm-6">
                                <div class="user man" title="Login: <?=$login_user?> &#10;&#10;Nível: <?=$nivel_user->nivel?> &#10;&#10;Plano: <?=$plano_user?> &#10;&#10;Id: <?=$id_user_indicado?>">
                                    <div class="man-content">
                                        <div class="man-image"> <img src="<?=$imagem?>" alt="<?=$plano_user?>"></div>
                                        <div class="man-title">
                                                <ul>
                                                    <li class="login">
                                                        <a href="<?=base_url()?>dash/rede_binaria/<?=$id_user_indicado?>">
                                                            <?=$login_user?>
                                                        </a>
                                                    </li>
                                                    <li class="nivel">
                                                        <span class="lab">Nível:</span>
                                                    </li>
                                                    <li class="plano">
                                                        <span class="lab">Plano:</span>
                                                        <?=$plano_user?>
                                                    </li>
                                                    <li>
                                                        <span class="lab">Id:</span> <?=$id_user_indicado?> - P -
                                                    </li>
                                                </ul>
                                                <a href="<?=base_url()?>dash/rede_binaria/<?=$id_user_indicado?>">
													<?=$login_user?>
                                                </a>
                                            </div><!-- /.man-title -->
                                    </div>
                                </div>
                                <!-- /.user --> 
                            </div>
                            <!-- /.item-col-right --> 
                           </div><!-- /.box-n4 -->
                            
                        </div>
                        <!-- /.box --> 
                        
                        <!-- /.center --> 
                    </div>
                    <!-- /.container-fluid --> 
                    
                </div>
                <!-- /.admin-content-main-inner --> 
            </div>
            
            <!-- /.container-fluid -->
            <?php include("includes/dash/footer.php");?>
            <!-- /.admin-content-footer --> 
            
        </div>
        <!-- /.admin-content-main-inner --> 
        
    </div>
    <!-- /.admin-content --> 
    
</div>
<!-- /.admin-landing-wrapper -->

</div>
<!-- /.admin-wrapper --> 

<script type="text/javascript" src="<?=base_url()?>assets/js/jquery.js"></script>

<script type="text/javascript">
$(document).ready(function(){	
	var tela = $(window).width();
    if(tela < 1061){
		// Fixa botões de visualizar Esquerda e Direita
		$("#dash-rede-bi .info-cols-right div:first").addClass("bt-info-right");
		var stickyOffset = $('.info-cols').offset().top;
		$(window).scroll(function(){
			var sticky = $('.info-cols'), scroll = $(window).scrollTop();
			if (scroll >= stickyOffset) sticky.addClass('fixed');
			if (scroll >= stickyOffset) {
				}
			else sticky.removeClass('fixed');			
		});
		
		// Exibe e Oculta
		$("#dash-rede-bi .info-cols-left").click(function(){
			$("#dash-rede-bi .info-cols-left div:first").removeClass("bt-info-left");
			$("#dash-rede-bi .info-cols-right div:first").addClass("bt-info-right");
			$("#dash-rede-bi .box-left").show();
		    $("#dash-rede-bi .box-right").hide();				
	        });
		
		$("#dash-rede-bi .info-cols-right").click(function(){
			$("#dash-rede-bi .info-cols-right div:first").removeClass("bt-info-right");	
			$("#dash-rede-bi .info-cols-left div:first").addClass("bt-info-left");				
			$("#dash-rede-bi .box-right").show();
		    $("#dash-rede-bi .box-left").hide();			
	        });
		
	}// if	
});
</script>

<script type="text/javascript" src="<?=base_url()?>assets/libraries/jquery-transit/jquery.transit.js"></script> 
<script type="text/javascript" src="<?=base_url()?>assets/libraries/bootstrap/assets/javascripts/bootstrap/transition.js"></script> 
<script type="text/javascript" src="<?=base_url()?>assets/libraries/bootstrap/assets/javascripts/bootstrap/dropdown.js"></script> 
<script type="text/javascript" src="<?=base_url()?>assets/libraries/bootstrap/assets/javascripts/bootstrap/collapse.js"></script> 
<script type="text/javascript" src="<?=base_url()?>assets/libraries/bootstrap-select/dist/js/bootstrap-select.min.js"></script> 
<script type="text/javascript" src="<?=base_url()?>assets/libraries/bootstrap-fileinput/js/fileinput.min.js"></script> 
<script type="text/javascript" src="<?=base_url()?>assets/libraries/autosize/jquery.autosize.js"></script> 
<script type="text/javascript" src="<?=base_url()?>assets/libraries/isotope/dist/isotope.pkgd.min.js"></script> 
<script type="text/javascript" src="<?=base_url()?>assets/libraries/OwlCarousel/owl-carousel/owl.carousel.min.js"></script> 
<script type="text/javascript" src="<?=base_url()?>assets/libraries/jquery.scrollTo/jquery.scrollTo.min.js"></script> 
<script src="http://maps.googleapis.com/maps/api/js?libraries=weather,geometry,visualization,places,drawing&amp;sensor=false" type="text/javascript"></script> 
<script type="text/javascript" src="<?=base_url()?>assets/libraries/jquery-google-map/infobox.js"></script> 
<script type="text/javascript" src="<?=base_url()?>assets/libraries/jquery-google-map/markerclusterer.js"></script> 
<script type="text/javascript" src="<?=base_url()?>assets/libraries/jquery-google-map/jquery-google-map.js"></script> 
<script type="text/javascript" src="<?=base_url()?>assets/libraries/nvd3/lib/d3.v3.js"></script> 
<script type="text/javascript" src="<?=base_url()?>assets/libraries/nvd3/nv.d3.min.js"></script> 
<script type="text/javascript" src="<?=base_url()?>assets/libraries/nvd3/examples/stream_layers.js"></script> 
<script type="text/javascript" src="<?=base_url()?>assets/js/realsite-admin.js"></script> 
<script type="text/javascript" src="<?=base_url()?>assets/js/map.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-39841036-7', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>
