<!--<nav class="navbar navbar-expand-md navbar-dark bg-dark"> -->

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">  
    <a href="<?=base_url()?>futebol" class="navbar-brand"><img id="logo_ts" src="<?=base_url()?>logo/logo.png" width="72px" style="width:72px"></a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>


<? if($this->session->userdata('id')){ ?>

    <? if($this->session->userdata('token')){ ?>
    

     <!--<button id="" type="button" class="btn btn-warning navbar-btn"  data-toggle="collapse" data-target="#navbarBets" data-toggle="modal" data-target="#modal_bets">Bets</button> -->
    <? if(isset($this->bet_model->get_fundos()->availableToBetBalance)){ ?>
     <button id="bets_refresh" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal_bets" title="<?=$this->bet_model->get_fundos()->wallet?>">
      <i class="glyph-icon icon-linecons-money"></i>
      <span class="badge badge-success"><?=number_format($this->bet_model->get_fundos()->availableToBetBalance, 2, ',', '.')?></span>
    </button>
    <? } ?>
   <!-- 
    <button class="btn btn-alt btn-hover btn-success" id="bets_refresh" title="Refresh">
        <span>Refresh</span>
        <i class="glyph-icon icon-refresh"></i>
    <div class="ripple-wrapper"></div></button>
  -->

     

    





    <? } ?>


    <? }else{ ?>
            <ul class="navbar-nav ml-auto">
              <li class="nav-item ">
                <a href="<?=base_url()?>home/login" class="nav-link btn btn-warning" style="color:#000;padding: 0.5em" >
                Login
              </a>
              </li>
            </ul>
    <? } ?>

     

    <? if($this->session->userdata('id')){ ?>    

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav">
            
              <? if(!$this->session->userdata('id')){ ?>
              <li class="nav-item">
                <a class="nav-link" href="<?=base_url()?>">HOME</a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url()?>home/login" class="btn btn-success navbar-btn">Login</a>
              </li>
              <? }else{ ?>

              
              <li class="nav-item">
                <a class="nav-link" href="#" style="color: #ffb900">Olá, <?=$this->session->userdata('nome')?></a>
              </li>

              <div class="dropdown">
                <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Minhas Conta
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="<?=base_url()?>futebol/">PRÓXIMOS JOGOS</a>
                  <a class="dropdown-item" href="<?=base_url()?>futebol/hots/"><strong>BOT SIZE HOTS</strong></a>
                  <a class="dropdown-item" href="<?=base_url()?>futebol/filtro_odds">FILTRO DE ODDS</a>
                  <a class="dropdown-item btn btn-danger" href="<?=base_url()?>bet/sair" style="">Sair</a>
                  <hr />
                  <? if($this->session->userdata('token')){ ?>
                    <a class="dropdown-item" href="<?=base_url()?>bet/revoke" style="">Revogar Conta na Betfair</a>
                  <? } ?>
                </div>
              </div>

              <li role="separator" class="divider"></li>
              

              <? } ?>


              
              <!--
              <li class="nav-item">
                <a class="nav-link" href="<?=base_url()?>betfair/2018/05/22/como-usar-a-betfair-tradersize/">COMO USAR</a>
              </li>

              <li class="nav-item">
                <a class="nav-link btn btn-success" href="https://api.whatsapp.com/send?phone=5581995274189" >Whatsapp</a>
              </li>
            -->

        </div>
        <form class="form-inline ml-auto" action="<?=base_url()?>futebol/q/"  method="post">
            <input type="text" class="form-control mr-sm-2" placeholder="Search" name="q">
            <button type="submit" class="btn btn-outline-light">Search</button>
        </form>
    </div>

    <? } ?>



    
</nav>