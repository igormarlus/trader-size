<?
class Data_model extends CI_Model{
	
	
	function _construct()
	{
		// Call the Model constructor
		parent::_construct();
	}


	
	
	########### FUNÇÃO PARA DATAS #######################

	/*inserir no model

	data_publicacao

	data_habilitaca

	data_impugnacao

	data_obstrucao

	prazo_final

	*/

	

	//funcao de feridados retorna array

	

	function retornarFeriados($ano, $uf=""){

		$dia = 86400;

		$datas = array();

		$datas['pascoa'] = easter_date($ano);

		$datas['sexta_santa'] = $datas['pascoa'] - (2 * $dia);

		$datas['carnaval'] = $datas['pascoa'] - (47 * $dia);

		$datas['corpus_cristi'] = $datas['pascoa'] + (60 * $dia);

	 

		$feriados = array (

			'Ano Novo'						=> '01/01/'.date('Y'),

			'Carnaval'						=> date('d/m/Y',$datas['carnaval']),

			'Sexta-Feira Santa'				=> date('d/m/Y',$datas['sexta_santa']),

			'Páscoa'						=> date('d/m/Y',$datas['pascoa']),

			'Tiradentes'					=> '21/04/'.date('Y'),

			'Dia do Trabalhador'			=> '01/05/'.date('Y'),

			'Corpus Cristi'					=> date('d/m/Y',$datas['corpus_cristi']),

			'Dia da Independência'			=> '07/09/'.date('Y'),

			'Nossa Senhora de Aparecida'	=> '12/10/'.date('Y'),

			'Dia de Finados'				=> '02/11/'.date('Y'),

			'Proclamação da República'		=> '15/11/'.date('Y'),

			'Natal'							=> '25/12/'.date('Y')

		);

		

		//

		if ($uf != '') { 

			$qry = $this->db->query("SELECT * FROM feriados_estados WHERE uf = ".$uf);

			foreach ($qry->result() as $feri) :

				

				$dat = $feri['data'].'/'.date('Y');

				$feriados[$feri['nome']] = $dat;

				

			endforeach;

		}

		//

		return $feriados;}

	

	function proximaDataValida($data) {

	

		$ar = explode("/",$data);	

		$dia = $ar[0];

		$mes = $ar[1];

		$ano = $ar[2];

		//$data_eng = $mes.'-'.$dia.'-'.$ano;	

		//$dia_semana = date('w', $data_eng);

		

		

		$add_dia = 1;//adiciona sempre no minimo um dia, ou seja o proximo dia tem que ser valido

		

		while (1 < 10) :

			$stamp = mktime(0, 0, 0, $mes, $dia + $add_dia, $ano);

			$proxima_data = date('d/m/Y', $stamp); //o resultado esperado do while é esta data

			$dia_semana = date("w", $stamp);



			if (($dia_semana == 6) || ($dia_semana == 0) || (in_array($proxima_data, $this->retornarFeriados($ano))) ){ //se dia da semana sabado ou domingo ou feriado

				$add_dia++;

			} else {

				break;	

			}



		endwhile;

		

		return $proxima_data;

		

	}

	

	function calcData($data_publicacao,$dias,$tipo='c') {

		# $tipo: nc = nao corrido, c = corrido

		# $dias: qtd de dias a ser acrescentados

		

		

		if($tipo == 'nc'){

			$dataInicio = $this->proximaDataValida($data_publicacao);	

			$dias = $dias-2;

		}else{

			$dataInicio = $data_publicacao;	

		}

		

			$ar = explode("/",$dataInicio);	

			$dia_pub = $ar[0];

			$mes_pub = $ar[1];

			$ano_pub = $ar[2];

		$data_soma = date('d/m/Y', mktime(0, 0, 0, $mes_pub, $dia_pub + $dias, $ano_pub));

		

		

		if($tipo == 'nc'){

			#$dataInicio = $this->proximaDataValida($data_publicacao);	

			$data_habilitacao = $this->proximaDataValida($data_soma);

		}else{

			$data_habilitacao = $data_soma;	

		}

			

		return $data_habilitacao;

	}

	

	function calcDataHabilitacao($data_publicacao) {

		

		$dataInicio = $this->proximaDataValida($data_publicacao);

		//echo $dataInicio; debug

		

			$ar = explode("/",$dataInicio);	

			$dia_pub = $ar[0];

			$mes_pub = $ar[1];

			$ano_pub = $ar[2];		

		$data_quinze = date('d/m/Y', mktime(0, 0, 0, $mes_pub, $dia_pub + 13, $ano_pub)); //sao 15 dias, mas a funcao proximo acresxenta sempre um

		

		$data_habilitacao = $this->proximaDataValida($data_quinze);

			

		return $data_habilitacao;

		

	}

	

	

	// converter para data dd/mm/aaaa e vice-versa

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

	
} // fecha class
?>
