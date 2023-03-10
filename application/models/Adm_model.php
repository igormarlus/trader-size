<?php
class Adm_model extends CI_Model{

    function _construct()
    {
        parent::_construct();
		#$this->load->model('anunciantes_model');
    }


	// Verificar se estแ logado
	function verifica(){
		$login = $_POST['login'];
		$senha = $_POST['senha'];
		$this->db->where(array('login' => $login, 'senha' => $senha));
		$qr = $this->db->get('admin');
		if($qr->num_rows() > 0){
				foreach($qr->result() as $dd){}
				$usuario = array( 'log' => $dd->id ); // fecha array
				$this->session->set_userdata($usuario);		
				
			}
			
			redirect('adm');
		
		}
	
	// VALIDA A NAVEGAวรO
	function session(){
		$ss = $this->session->userdata('id_user');
			
				if($ss){
					
					}else{
					redirect('login');
					
			}
		}
	
	
	########### FUNวรO PARA DATAS #######################
	// converter para data dd/mm/aaaa
	function converte_data($data){
	
	if (strstr($data, "/")){//verifica se tem a barra /
	  $d = explode ("/", $data);//tira a barra
	  $invert_data = "$d[2]-$d[1]-$d[0]";//separa as datas $d[2] = ano $d[1] = mes etc...
	  return $invert_data;
	}
	elseif(strstr($data, "-")){
	  $d = explode ("-", $data);
	  $invert_data = "$d[2]/$d[1]/$d[0]";
	  return $invert_data;
	}
	else{
	  return "Data invalida";
	  }
	}
	// function encerramento de conta
	function vencimento($data,$dias){
	$data = str_replace("-","",$data);
	$ano = substr($data,0,4);
	$mes = substr($data,4,2);
	$dia = substr($data,6,2);
	$newdt = mktime(0,0,0,$mes,$dia + $dias,$ano);
	return strftime("%Y-%m-%d",$newdt);
	}
	########### xXXXXXXx FUNวรO PARA DATAS #######################
	} // fecha class

?>