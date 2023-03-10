<?php
class Usuarios_model extends CI_Model{	
	
	function _construct()
	{
		// Call the Model constructor
		parent::_construct();
	}

	
	function logar(){
	
		$login = $_POST['login'];
		//$senha = $_POST['senha'];
		$senha = md5($_POST['senha']);
		$this->db->where(array('login' => $login, 'senha' => $senha));
		$qr_login = $this->db->get('usuarios');
	
		if($qr_login->num_rows() > 0){
			$dd_user = $qr_login->row();
			$dd_session = array(
								'usr' => true,
								'id' => $dd_user->id,
								'nome' => $dd_user->nome,
								'nivel' => $dd_user->nivel,
								'login' => $login
								);
								$this->session->set_userdata($dd_session);
			redirect('adm/home');
			//echo "oi";
		}else{
			redirect('admin');
		}
	
	}

	// VALIDA A NAVEGAÇÃO
	function verSession(){
		//echo "oipa";
		//return false;
		$ss = $this->session->userdata('usr');
		if($ss){
			//if($ss == true){
			
			}else{
				redirect('admin');
			//}
		}
	}
	
	function cadastrar() {
		
		$dd = array('nome' => $_POST['nome'],
					'login' => $_POST['login'],
					'senha' => md5($_POST['senha']),
					'nivel' => $_POST['nivel']);
		
		if ($this->db->insert('usuarios', $dd)) {
			return true;
		} else {
			return false;	
		}	 
	
	}

########### FUNÇÃO PARA DATAS #######################
	// converter para data dd/mm/aaaa
	function converte_data($data){
		
		if (strstr($data, "/")) {//verifica se tem a barra /
		
		  $d = explode ("/", $data);//tira a barra
		  $invert_data = "$d[2]-$d[1]-$d[0]";//separa as datas $d[2] = ano $d[1] = mes etc...
		  return $invert_data;
		
		} elseif(strstr($data, "-")) {
		
		  $d = explode ("-", $data);
		  $invert_data = "$d[2]/$d[1]/$d[0]";
		  return $invert_data;
		
		} else {
		
		  return "Data invalida";
		
		}
	
	}
	
}
?>