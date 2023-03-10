<!-- Fixed navbar -->
  <!-- NAVBAR -->
    <? /* if($this->agent->is_mobile()){ ?>
        <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?=base_url()?>"><img src="<?=base_url()?>logo/aguia-ts.png" alt="Logo Trader Size"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url()?>">HOME</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?=base_url()?>home/login">LOGIN</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?=base_url()?>futebol">PRÓXIMOS JOGOS</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?=base_url()?>futebol/filtro_odds">FILTRO DE ODDS</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?=base_url()?>betfair/sobre-o-trader-size/">SOBRE</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?=base_url()?>betfair/2018/05/22/como-usar-a-betfair-tradersize/">COMO USAR</a>
            </li>
           
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <? }else{ */ ?>
  
      <nav class="navbar navbar-expand-xl navbar-light bg-gradient-light navbar-fixed-top">
      <div class="container">
        

          <a class="navbar-brand h1 text-primary mb-0" href="#">

            <img src="<?=base_url()?>logo/logo.png" width="40" height="auto" class="d-inline-block align-top mr-2" alt="TRADER SIZE LOGO" style="max-height: 120px">
            

          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
            <span class="navbar-toggler-icon"><i class="icon-menu icons"> </span>
          </button>
          
          <div class="collapse navbar-collapse" id="navbarSite" style="background-color: #">

            <ul class="navbar-nav ml-auto">

              <li class="nav-item">
                <a class="nav-link" href="<?=base_url()?>">HOME</a>
              </li>
              <? if(!$this->session->userdata('id')){ ?>
              <li class="nav-item">
                <a class="nav-link" href="<?=base_url()?>home/login">LOGIN</a>
              </li>
              <? }else{ ?>
              <li class="nav-item">
                <a class="nav-link" href="<?=base_url()?>bet/sair" style="color: #ffb900">Sair</a>
              </li>

              <? } ?>

              <li class="nav-item">
                <a class="nav-link" href="<?=base_url()?>futebol/">PRÓXIMOS JOGOS</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="<?=base_url()?>futebol/hots/"><strong>BOT SIZE HOTS</strong></a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="<?=base_url()?>futebol/filtro_odds">FILTRO DE ODDS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?=base_url()?>betfair/2018/05/22/como-usar-a-betfair-tradersize/">COMO USAR</a>
              </li>

              <li class="nav-item">
                <a class="nav-link btn btn-success" href="https://api.whatsapp.com/send?phone=5581995274189" >Whatsapp</a>
              </li>





            </ul>

            <form class="form-inline" method="post" action="<?=base_url()?>futebol/q/">

              <input class="form-control ml-4 mr-2" type="search" placeholder="Buscar" name="q">
              <button class="btn btn-success" type="submit">Ok</button>

            </form>

          </div>

         </div>

      </nav>
      <? # } // x else mobile ?>