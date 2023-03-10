<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
/*
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('form','url'));
		$this->load->model('adm/usuarios_model');

		//$this->usuarios_model->verSession();

   } // fecha fn USER
	*/

	function Index(){
		$this->load->view('adm/login');
	}
	
	function logar() {
		$this->load->model('adm/usuarios_model');
		$this->usuarios_model->logar();	
	}

	function esqueceuSenha(){
		$this->load->view('adm/esqueceu-senha');
	}

	function atualiza_sitemaps($nm_control="aaaaaaaaaaaaaaaaaaaaa"){


		// criar controller
		$arquivo_origem_ctr = "sitemaps/din/base.xml";
		$arquivo_destino_ctr = "sitemaps/din/prox_jogos_din.xml";
		//$copy_ctr = copy($arquivo_origem_ctr, $arquivo_destino_ctr);

		// Cria o recurso (abrir o arquivo)
		$handle = fopen( $arquivo_origem_ctr, 'r+' );
		$ler = fread( $handle, filesize($arquivo_origem_ctr) );
		#$new_code = str_replace("muda_nome_controller", $nm_control, $ler);
		$new_code = "";
		$new_code .= "<urlset xmlns='http://www.sitemaps.org/schemas/sitemap/0.9'>";
		$qr_partidas = $this->db->query("SELECT * FROM partidas ORDER BY id desc LIMIT 500");
		foreach($qr_partidas->result() as $partida){
			$new_code .= "
			<url>";
			$new_code .= "
			<loc>".base_url()."/futebol/jogo/".url_title($partida->evento)."/".$partida->id_evento."</loc>";
			$new_code .= "
			<lastmod>".date("Y-m-d")."</lastmod>";
			$new_code .= "
			<changefreq>daily</changefreq>";
			$new_code .= "
			<priority>0.8</priority>";
			$new_code .=  "
			</url>";
			$new_code .= "
			<url>";
			$new_code .= "
			<loc>".base_url()."/futebol/amp/".url_title($partida->evento)."/".$partida->id_evento."</loc>";
			$new_code .= "
			<lastmod>".date("Y-m-d")."</lastmod>";
			$new_code .= "
			<changefreq>daily</changefreq>";
			$new_code .= "
			<priority>0.8</priority>";
			$new_code .=  "
			</url>";
			
		}
		$new_code .= "</urlset>";
		
		#echo $new_code;

		$new_controller = $controler;
		#if ( file_exists( $arquivo_destino_ctr ) ) {
			if ( file_exists( $arquivo_origem_ctr ) ) {
				echo $arquivo_origem_ctr." existe";
				unlink( $arquivo_destino_ctr );
			}else{
				echo "N encontrado";
			}
			$handle2 = fopen( $arquivo_destino_ctr, 'a+' );
			#$escrever = fread( $handle2, filesize($arquivo_destino_ctr) );
			fwrite( $handle2, "" );
			$escreve = fwrite( $handle2, $new_code );
			fclose($handle2);
			#echo "existe";




		#}else{
		#	echo "n existe";
		#}
		#echo $ler;
		#echo $new_code;


		return false;

		if (!$copy_ctr) {
		    echo "falha ao copiar sitemaps....";
		}else{
			#echo "Controller criado...<br>";
			$arquivo = $arquivo_destino_ctr;
			#$base_ctr = file($arquivo_origem_ctr); 
			#$this->load->model('controller_model');
			#$txt_ctr = $this->controller_model->base($nm_control);
			$txt_ctr = "asd asdasd asd as d";
			$texto = $nm_control." ---------------  AQUI ---------------";
			$txt_ctr = $texto;

			#echo $txt_ctr;
			#$txt_nomeado = str_replace("muda_nome_controller", "asdasd----", $txt_ctr);


			if(is_writable($arquivo)) {			 
				 $manipular = fopen("$arquivo", 'w+');
				 $base_ctr = $manipular;
				 #$data = fread($file_handle, 4096);

				if(!$manipular) {
					echo "Erro<br /><br />Não foi possível abrir o arquivo.";
				}else{
					#echo $base_ctr;

					
					#fclose($base_ctr);

				}
				
				if(!fwrite($manipular, $txt_ctr)) {
					echo "Erro<br /><br />Não foi possível gravar as informações no arquivo.";
				}else{
					#echo "O texto foi gravado com sucesso!";
				}

				fclose($manipular);
			}
			else {
				echo "O $arquivo não tem permissões de leitura e/ou escrita.";
			}
		}

	}

#### DADOS INSTITUCIONAIS E DESCRICAO	

} // x class