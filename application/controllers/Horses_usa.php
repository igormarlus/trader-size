<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class horses_usa extends CI_Controller {



	function csv_usa(){
		$meuArray = Array();
	
		// MANUPUILANDO DIRETORIOS		
		$path = 'csv_usa/';
		
		$directory = new RecursiveDirectoryIterator( $path );
		$cont = 0;
		foreach ($directory as $file) { $cont++;
		 
		    echo $file->getFileName();
		    echo "<br>";

			// x man dir
			$row = 1;
			$cont_cel = 0;
			$reg = 0;
			if (($handle = fopen($path."".$file->getFileName(), "r")) !== FALSE)
			{
			  //Passagem pelas linhas
			  while (($data = fgetcsv($handle, null, ",")) !== FALSE)
			  {
			      $dd_insert = [];
			      $num = count($data);
			      $row++;
			      // Passagem pelas colunas
			      for ($col = 0; $col < $num; $col++)
			      {
			      	  $cont_cel++;
			          //  DEFININDO CAMPOS DA TABELA DO  DB
			          if($reg > 0){

				          if($cont_cel == 1){
				          	$dd_insert['event_id'] = $data[$col];
				          	$dd_where['event_id'] = $data[$col];

				          }
				          if($cont_cel == 2){
				          	$dd_insert['menu_hint'] = $data[$col];
				          }
				          if($cont_cel == 3){
				          	$dd_insert['event_name'] = $data[$col];
				          }
				          if($cont_cel == 4){
				          	$dd_insert['event_dt'] = $data[$col];
				          }
				          if($cont_cel == 5){
				          	$dd_insert['selection_id'] = $data[$col];
				          }
				          if($cont_cel == 6){
				          	#$dd_insert['selection_name'] = $data[$col];
				          	#$dd_where['selection_name'] = $data[$col];
				          	$nm_horse = str_replace("'", "", $data[$col]);
				          	$dd_insert['selection_name'] = $nm_horse;
				          	$dd_where['selection_name'] = $nm_horse;

				          }

				          // ---------------------------
				          if($cont_cel == 7){
				          	$dd_insert['win_lose'] = $data[$col];
				          }
				          if($cont_cel == 8){
				          	$dd_insert['bsp'] = $data[$col];
				          }
				          if($cont_cel == 9){
				          	$dd_insert['ppwap'] = $data[$col];
				          }
				          if($cont_cel == 10){
				          	$dd_insert['morningwap'] = $data[$col];
				          }
				          if($cont_cel == 11){
				          	$dd_insert['ppmax'] = $data[$col];
				          }
				          if($cont_cel == 12){
				          	$dd_insert['ppmin'] = $data[$col];
				          }
				          if($cont_cel == 13){
				          	$dd_insert['ipmax'] = $data[$col];
				          }
				          if($cont_cel == 14){
				          	$dd_insert['ipmin'] = $data[$col];
				          }
				          if($cont_cel == 15){
				          	$dd_insert['morningtraderdvol'] = $data[$col];
				          }
				          if($cont_cel == 16){
				          	$dd_insert['pptradedvol'] = $data[$col];
				          }
				          if($cont_cel == 17){
				          	$dd_insert['iptradedvol'] = $data[$col];
				          }
				          // nomeia o arqvuivo font
				          $dd_insert['arq'] = $file->getFileName();
				          
				      }
			         
			          echo 'Linhainha: '.$row.' e na Coluna: '.$data[$col] . " ($col - <b>$cont_cel</b>) <br />\n";
			         
			          if($cont_cel == 17){

			          	if($reg > 0 && $dd_insert['selection_name'] != '------------------------------') {
			          		$this->db->where($dd_where);
			          		// corridas_cavalos_gb
			          		$qr_row = $this->db->get("corridas_cavalos_usa_2022");
			          		if($qr_row->num_rows() == 0){
					          	$this->db->insert('corridas_cavalos_usa_2022' , $dd_insert);					          	
					        }
				        }


			          	$cont_cel = 0;
			          	$reg++;
			          	echo "<br>REG: <b>$reg</b><hr>";
			          	print_r($dd_insert);

			          	echo "<br />";
			          	array_shift($dd_insert);
			          }    
			      } // x for
			  } // x while
			  unlink($path."".$file->getFileName());
			  fclose($handle);
			} // x if handle
		if($cont > 10){
		    	#return false;
		    }
		} // x laço q percorre os arquivos


	} // x fn


	function csv_usa_2019(){
		$meuArray = Array();
	
		// MANUPUILANDO DIRETORIOS		
		$path = 'csv_usa_2019/';
		
		$directory = new RecursiveDirectoryIterator( $path );
		$cont = 0;
		foreach ($directory as $file) { $cont++;
		 
		    echo $file->getFileName();
		    echo "<br>";

			// x man dir
			$row = 1;
			$cont_cel = 0;
			$reg = 0;
			if (($handle = fopen($path."".$file->getFileName(), "r")) !== FALSE)
			{
			  //Passagem pelas linhas
			  while (($data = fgetcsv($handle, null, ",")) !== FALSE)
			  {
			      $dd_insert = [];
			      $num = count($data);
			      $row++;
			      // Passagem pelas colunas
			      for ($col = 0; $col < $num; $col++)
			      {
			      	  $cont_cel++;
			          //  DEFININDO CAMPOS DA TABELA DO  DB
			          if($reg > 0){

				          if($cont_cel == 1){
				          	$dd_insert['event_id'] = $data[$col];
				          	$dd_where['event_id'] = $data[$col];

				          }
				          if($cont_cel == 2){
				          	$dd_insert['menu_hint'] = $data[$col];
				          }
				          if($cont_cel == 3){
				          	$dd_insert['event_name'] = $data[$col];
				          }
				          if($cont_cel == 4){
				          	$dd_insert['event_dt'] = $data[$col];
				          }
				          if($cont_cel == 5){
				          	$dd_insert['selection_id'] = $data[$col];
				          }
				          if($cont_cel == 6){
				          	#$dd_insert['selection_name'] = $data[$col];
				          	#$dd_where['selection_name'] = $data[$col];
				          	$nm_horse = str_replace("'", "", $data[$col]);
				          	$dd_insert['selection_name'] = $nm_horse;
				          	$dd_where['selection_name'] = $nm_horse;

				          }

				          // ---------------------------
				          if($cont_cel == 7){
				          	$dd_insert['win_lose'] = $data[$col];
				          }
				          if($cont_cel == 8){
				          	$dd_insert['bsp'] = $data[$col];
				          }
				          if($cont_cel == 9){
				          	$dd_insert['ppwap'] = $data[$col];
				          }
				          if($cont_cel == 10){
				          	$dd_insert['morningwap'] = $data[$col];
				          }
				          if($cont_cel == 11){
				          	$dd_insert['ppmax'] = $data[$col];
				          }
				          if($cont_cel == 12){
				          	$dd_insert['ppmin'] = $data[$col];
				          }
				          if($cont_cel == 13){
				          	$dd_insert['ipmax'] = $data[$col];
				          }
				          if($cont_cel == 14){
				          	$dd_insert['ipmin'] = $data[$col];
				          }
				          if($cont_cel == 15){
				          	$dd_insert['morningtraderdvol'] = $data[$col];
				          }
				          if($cont_cel == 16){
				          	$dd_insert['pptradedvol'] = $data[$col];
				          }
				          if($cont_cel == 17){
				          	$dd_insert['iptradedvol'] = $data[$col];
				          }
				          // nomeia o arqvuivo font
				          $dd_insert['arq'] = $file->getFileName();
				          
				      }
			         
			          echo 'Linhainha: '.$row.' e na Coluna: '.$data[$col] . " ($col - <b>$cont_cel</b>) <br />\n";
			         
			          if($cont_cel == 17){

			          	if($reg > 0 && $dd_insert['selection_name'] != '------------------------------') {
			          		$this->db->where($dd_where);
			          		// corridas_cavalos_gb
			          		$qr_row = $this->db->get("corridas_cavalos_usa_2019");
			          		if($qr_row->num_rows() == 0){
					          	$this->db->insert('corridas_cavalos_usa_2019' , $dd_insert);					          	
					        }
				        }


			          	$cont_cel = 0;
			          	$reg++;
			          	echo "<br>REG: <b>$reg</b><hr>";
			          	print_r($dd_insert);

			          	echo "<br />";
			          	array_shift($dd_insert);
			          }    
			      } // x for
			  } // x while
			  unlink($path."".$file->getFileName());
			  fclose($handle);
			} // x if handle
		if($cont > 10){
		    	#return false;
		    }
		} // x laço q percorre os arquivos


	} // x fn


	function csv_usa_2017(){
		$meuArray = Array();
	
		// MANUPUILANDO DIRETORIOS		
		$path = 'csv_usa_2017/';
		
		$directory = new RecursiveDirectoryIterator( $path );
		$cont = 0;
		foreach ($directory as $file) { $cont++;
		 
		    echo $file->getFileName();
		    echo "<br>";

			// x man dir
			$row = 1;
			$cont_cel = 0;
			$reg = 0;
			if (($handle = fopen($path."".$file->getFileName(), "r")) !== FALSE)
			{
			  //Passagem pelas linhas
			  while (($data = fgetcsv($handle, null, ",")) !== FALSE)
			  {
			      $dd_insert = [];
			      $num = count($data);
			      $row++;
			      // Passagem pelas colunas
			      for ($col = 0; $col < $num; $col++)
			      {
			      	  $cont_cel++;
			          //  DEFININDO CAMPOS DA TABELA DO  DB
			          if($reg > 0){

				          if($cont_cel == 1){
				          	$dd_insert['event_id'] = $data[$col];
				          	$dd_where['event_id'] = $data[$col];

				          }
				          if($cont_cel == 2){
				          	$dd_insert['menu_hint'] = $data[$col];
				          }
				          if($cont_cel == 3){
				          	$dd_insert['event_name'] = $data[$col];
				          }
				          if($cont_cel == 4){
				          	$dd_insert['event_dt'] = $data[$col];
				          }
				          if($cont_cel == 5){
				          	$dd_insert['selection_id'] = $data[$col];
				          }
				          if($cont_cel == 6){
				          	#$dd_insert['selection_name'] = $data[$col];
				          	#$dd_where['selection_name'] = $data[$col];
				          	$nm_horse = str_replace("'", "", $data[$col]);
				          	$dd_insert['selection_name'] = $nm_horse;
				          	$dd_where['selection_name'] = $nm_horse;

				          }

				          // ---------------------------
				          if($cont_cel == 7){
				          	$dd_insert['win_lose'] = $data[$col];
				          }
				          if($cont_cel == 8){
				          	$dd_insert['bsp'] = $data[$col];
				          }
				          if($cont_cel == 9){
				          	$dd_insert['ppwap'] = $data[$col];
				          }
				          if($cont_cel == 10){
				          	$dd_insert['morningwap'] = $data[$col];
				          }
				          if($cont_cel == 11){
				          	$dd_insert['ppmax'] = $data[$col];
				          }
				          if($cont_cel == 12){
				          	$dd_insert['ppmin'] = $data[$col];
				          }
				          if($cont_cel == 13){
				          	$dd_insert['ipmax'] = $data[$col];
				          }
				          if($cont_cel == 14){
				          	$dd_insert['ipmin'] = $data[$col];
				          }
				          if($cont_cel == 15){
				          	$dd_insert['morningtraderdvol'] = $data[$col];
				          }
				          if($cont_cel == 16){
				          	$dd_insert['pptradedvol'] = $data[$col];
				          }
				          if($cont_cel == 17){
				          	$dd_insert['iptradedvol'] = $data[$col];
				          }
				          // nomeia o arqvuivo font
				          $dd_insert['arq'] = $file->getFileName();
				          
				      }
			         
			          echo 'Linhainha: '.$row.' e na Coluna: '.$data[$col] . " ($col - <b>$cont_cel</b>) <br />\n";
			         
			          if($cont_cel == 17){

			          	if($reg > 0 && $dd_insert['selection_name'] != '------------------------------') {
			          		$this->db->where($dd_where);
			          		// corridas_cavalos_gb
			          		$qr_row = $this->db->get("corridas_cavalos_usa_2017");
			          		if($qr_row->num_rows() == 0){
					          	$this->db->insert('corridas_cavalos_usa_2017' , $dd_insert);					          	
					        }
				        }


			          	$cont_cel = 0;
			          	$reg++;
			          	echo "<br>REG: <b>$reg</b><hr>";
			          	print_r($dd_insert);

			          	echo "<br />";
			          	array_shift($dd_insert);
			          }    
			      } // x for
			  } // x while
			  unlink($path."".$file->getFileName());
			  fclose($handle);
			} // x if handle
		if($cont > 10){
		    	#return false;
		    }
		} // x laço q percorre os arquivos


	} // x fn



	function csv_usa_2016(){
		$meuArray = Array();
	
		// MANUPUILANDO DIRETORIOS		
		$path = 'csv_usa_2016/';
		
		$directory = new RecursiveDirectoryIterator( $path );
		$cont = 0;
		foreach ($directory as $file) { $cont++;
		 
		    echo $file->getFileName();
		    echo "<br>";

			// x man dir
			$row = 1;
			$cont_cel = 0;
			$reg = 0;
			if (($handle = fopen($path."".$file->getFileName(), "r")) !== FALSE)
			{
			  //Passagem pelas linhas
			  while (($data = fgetcsv($handle, null, ",")) !== FALSE)
			  {
			      $dd_insert = [];
			      $num = count($data);
			      $row++;
			      // Passagem pelas colunas
			      for ($col = 0; $col < $num; $col++)
			      {
			      	  $cont_cel++;
			          //  DEFININDO CAMPOS DA TABELA DO  DB
			          if($reg > 0){

				          if($cont_cel == 1){
				          	$dd_insert['event_id'] = $data[$col];
				          	$dd_where['event_id'] = $data[$col];

				          }
				          if($cont_cel == 2){
				          	$dd_insert['menu_hint'] = $data[$col];
				          }
				          if($cont_cel == 3){
				          	$dd_insert['event_name'] = $data[$col];
				          }
				          if($cont_cel == 4){
				          	$dd_insert['event_dt'] = $data[$col];
				          }
				          if($cont_cel == 5){
				          	$dd_insert['selection_id'] = $data[$col];
				          }
				          if($cont_cel == 6){
				          	#$dd_insert['selection_name'] = $data[$col];
				          	#$dd_where['selection_name'] = $data[$col];
				          	$nm_horse = str_replace("'", "", $data[$col]);
				          	$dd_insert['selection_name'] = $nm_horse;
				          	$dd_where['selection_name'] = $nm_horse;

				          }

				          // ---------------------------
				          if($cont_cel == 7){
				          	$dd_insert['win_lose'] = $data[$col];
				          }
				          if($cont_cel == 8){
				          	$dd_insert['bsp'] = $data[$col];
				          }
				          if($cont_cel == 9){
				          	$dd_insert['ppwap'] = $data[$col];
				          }
				          if($cont_cel == 10){
				          	$dd_insert['morningwap'] = $data[$col];
				          }
				          if($cont_cel == 11){
				          	$dd_insert['ppmax'] = $data[$col];
				          }
				          if($cont_cel == 12){
				          	$dd_insert['ppmin'] = $data[$col];
				          }
				          if($cont_cel == 13){
				          	$dd_insert['ipmax'] = $data[$col];
				          }
				          if($cont_cel == 14){
				          	$dd_insert['ipmin'] = $data[$col];
				          }
				          if($cont_cel == 15){
				          	$dd_insert['morningtraderdvol'] = $data[$col];
				          }
				          if($cont_cel == 16){
				          	$dd_insert['pptradedvol'] = $data[$col];
				          }
				          if($cont_cel == 17){
				          	$dd_insert['iptradedvol'] = $data[$col];
				          }
				          // nomeia o arqvuivo font
				          $dd_insert['arq'] = $file->getFileName();
				          
				      }
			         
			          echo 'Linhainha: '.$row.' e na Coluna: '.$data[$col] . " ($col - <b>$cont_cel</b>) <br />\n";
			         
			          if($cont_cel == 17){

			          	if($reg > 0 && $dd_insert['selection_name'] != '------------------------------') {
			          		$this->db->where($dd_where);
			          		// corridas_cavalos_gb
			          		$qr_row = $this->db->get("corridas_cavalos_usa_2016");
			          		if($qr_row->num_rows() == 0){
					          	$this->db->insert('corridas_cavalos_usa_2016' , $dd_insert);					          	
					        }
				        }


			          	$cont_cel = 0;
			          	$reg++;
			          	echo "<br>REG: <b>$reg</b><hr>";
			          	print_r($dd_insert);

			          	echo "<br />";
			          	array_shift($dd_insert);
			          }    
			      } // x for
			  } // x while
			  unlink($path."".$file->getFileName());
			  fclose($handle);
			} // x if handle
		if($cont > 10){
		    	#return false;
		    }
		} // x laço q percorre os arquivos


	} // x fn


function csv_usa_2022(){
		$meuArray = Array();
	
		// MANUPUILANDO DIRETORIOS		
		$path = 'csv_usa_2022/';
		
		$directory = new RecursiveDirectoryIterator( $path );
		$cont = 0;
		foreach ($directory as $file) { $cont++;
		 
		    echo $file->getFileName();
		    echo "<br>";

			// x man dir
			$row = 1;
			$cont_cel = 0;
			$reg = 0;
			if (($handle = fopen($path."".$file->getFileName(), "r")) !== FALSE)
			{
			  //Passagem pelas linhas
			  while (($data = fgetcsv($handle, null, ",")) !== FALSE)
			  {
			      $dd_insert = [];
			      $num = count($data);
			      $row++;
			      // Passagem pelas colunas
			      for ($col = 0; $col < $num; $col++)
			      {
			      	  $cont_cel++;
			          //  DEFININDO CAMPOS DA TABELA DO  DB
			          if($reg > 0){

				          if($cont_cel == 1){
				          	$dd_insert['event_id'] = $data[$col];
				          	$dd_where['event_id'] = $data[$col];

				          }
				          if($cont_cel == 2){
				          	$dd_insert['menu_hint'] = $data[$col];
				          }
				          if($cont_cel == 3){
				          	$dd_insert['event_name'] = $data[$col];
				          }
				          if($cont_cel == 4){
				          	$dd_insert['event_dt'] = $data[$col];
				          }
				          if($cont_cel == 5){
				          	$dd_insert['selection_id'] = $data[$col];
				          }
				          if($cont_cel == 6){
				          	#$dd_insert['selection_name'] = $data[$col];
				          	#$dd_where['selection_name'] = $data[$col];
				          	$nm_horse = str_replace("'", "", $data[$col]);
				          	$dd_insert['selection_name'] = $nm_horse;
				          	$dd_where['selection_name'] = $nm_horse;

				          }

				          // ---------------------------
				          if($cont_cel == 7){
				          	$dd_insert['win_lose'] = $data[$col];
				          }
				          if($cont_cel == 8){
				          	$dd_insert['bsp'] = $data[$col];
				          }
				          if($cont_cel == 9){
				          	$dd_insert['ppwap'] = $data[$col];
				          }
				          if($cont_cel == 10){
				          	$dd_insert['morningwap'] = $data[$col];
				          }
				          if($cont_cel == 11){
				          	$dd_insert['ppmax'] = $data[$col];
				          }
				          if($cont_cel == 12){
				          	$dd_insert['ppmin'] = $data[$col];
				          }
				          if($cont_cel == 13){
				          	$dd_insert['ipmax'] = $data[$col];
				          }
				          if($cont_cel == 14){
				          	$dd_insert['ipmin'] = $data[$col];
				          }
				          if($cont_cel == 15){
				          	$dd_insert['morningtraderdvol'] = $data[$col];
				          }
				          if($cont_cel == 16){
				          	$dd_insert['pptradedvol'] = $data[$col];
				          }
				          if($cont_cel == 17){
				          	$dd_insert['iptradedvol'] = $data[$col];
				          }
				          // nomeia o arqvuivo font
				          $dd_insert['arq'] = $file->getFileName();
				          
				      }
			         
			          echo 'Linhainha: '.$row.' e na Coluna: '.$data[$col] . " ($col - <b>$cont_cel</b>) <br />\n";
			         
			          if($cont_cel == 17){

			          	if($reg > 0 && $dd_insert['selection_name'] != '------------------------------') {
			          		$this->db->where($dd_where);
			          		// corridas_cavalos_gb
			          		$qr_row = $this->db->get("corridas_cavalos_usa_2022");
			          		if($qr_row->num_rows() == 0){
					          	$this->db->insert('corridas_cavalos_usa_2022' , $dd_insert);					          	
					        }
				        }


			          	$cont_cel = 0;
			          	$reg++;
			          	echo "<br>REG: <b>$reg</b><hr>";
			          	print_r($dd_insert);

			          	echo "<br />";
			          	array_shift($dd_insert);
			          }    
			      } // x for
			  } // x while
			  unlink($path."".$file->getFileName());
			  fclose($handle);
			} // x if handle
		if($cont > 10){
		    	#return false;
		    }
		} // x laço q percorre os arquivos


	} // x fn




function csv_usa_2020(){
		$meuArray = Array();
	
		// MANUPUILANDO DIRETORIOS		
		$path = 'csv_usa_2020/';
		
		$directory = new RecursiveDirectoryIterator( $path );
		$cont = 0;
		foreach ($directory as $file) { $cont++;
		 
		    echo $file->getFileName();
		    echo "<br>";

			// x man dir
			$row = 1;
			$cont_cel = 0;
			$reg = 0;
			if (($handle = fopen($path."".$file->getFileName(), "r")) !== FALSE)
			{
			  //Passagem pelas linhas
			  while (($data = fgetcsv($handle, null, ",")) !== FALSE)
			  {
			      $dd_insert = [];
			      $num = count($data);
			      $row++;
			      // Passagem pelas colunas
			      for ($col = 0; $col < $num; $col++)
			      {
			      	  $cont_cel++;
			          //  DEFININDO CAMPOS DA TABELA DO  DB
			          if($reg > 0){

				          if($cont_cel == 1){
				          	$dd_insert['event_id'] = $data[$col];
				          	$dd_where['event_id'] = $data[$col];

				          }
				          if($cont_cel == 2){
				          	$dd_insert['menu_hint'] = $data[$col];
				          }
				          if($cont_cel == 3){
				          	$dd_insert['event_name'] = $data[$col];
				          }
				          if($cont_cel == 4){
				          	$dd_insert['event_dt'] = $data[$col];
				          }
				          if($cont_cel == 5){
				          	$dd_insert['selection_id'] = $data[$col];
				          }
				          if($cont_cel == 6){
				          	#$dd_insert['selection_name'] = $data[$col];
				          	#$dd_where['selection_name'] = $data[$col];
				          	$nm_horse = str_replace("'", "", $data[$col]);
				          	$dd_insert['selection_name'] = $nm_horse;
				          	$dd_where['selection_name'] = $nm_horse;

				          }

				          // ---------------------------
				          if($cont_cel == 7){
				          	$dd_insert['win_lose'] = $data[$col];
				          }
				          if($cont_cel == 8){
				          	$dd_insert['bsp'] = $data[$col];
				          }
				          if($cont_cel == 9){
				          	$dd_insert['ppwap'] = $data[$col];
				          }
				          if($cont_cel == 10){
				          	$dd_insert['morningwap'] = $data[$col];
				          }
				          if($cont_cel == 11){
				          	$dd_insert['ppmax'] = $data[$col];
				          }
				          if($cont_cel == 12){
				          	$dd_insert['ppmin'] = $data[$col];
				          }
				          if($cont_cel == 13){
				          	$dd_insert['ipmax'] = $data[$col];
				          }
				          if($cont_cel == 14){
				          	$dd_insert['ipmin'] = $data[$col];
				          }
				          if($cont_cel == 15){
				          	$dd_insert['morningtraderdvol'] = $data[$col];
				          }
				          if($cont_cel == 16){
				          	$dd_insert['pptradedvol'] = $data[$col];
				          }
				          if($cont_cel == 17){
				          	$dd_insert['iptradedvol'] = $data[$col];
				          }
				          // nomeia o arqvuivo font
				          $dd_insert['arq'] = $file->getFileName();
				          
				      }
			         
			          echo 'Linhainha: '.$row.' e na Coluna: '.$data[$col] . " ($col - <b>$cont_cel</b>) <br />\n";
			         
			          if($cont_cel == 17){

			          	if($reg > 0 && $dd_insert['selection_name'] != '------------------------------') {
			          		$this->db->where($dd_where);
			          		// corridas_cavalos_gb
			          		$qr_row = $this->db->get("corridas_cavalos_usa_2020");
			          		if($qr_row->num_rows() == 0){
					          	$this->db->insert('corridas_cavalos_usa_2020' , $dd_insert);					          	
					        }
				        }


			          	$cont_cel = 0;
			          	$reg++;
			          	echo "<br>REG: <b>$reg</b><hr>";
			          	print_r($dd_insert);

			          	echo "<br />";
			          	array_shift($dd_insert);
			          }    
			      } // x for
			  } // x while
			  unlink($path."".$file->getFileName());
			  fclose($handle);
			} // x if handle
		if($cont > 10){
		    	#return false;
		    }
		} // x laço q percorre os arquivos


	} // x fn

	function csv_usa_2015(){
		$meuArray = Array();
	
		// MANUPUILANDO DIRETORIOS		
		$path = 'csv_usa_2015/';
		
		$directory = new RecursiveDirectoryIterator( $path );
		$cont = 0;
		foreach ($directory as $file) { $cont++;
		 
		    echo $file->getFileName();
		    echo "<br>";

			// x man dir
			$row = 1;
			$cont_cel = 0;
			$reg = 0;
			if (($handle = fopen($path."".$file->getFileName(), "r")) !== FALSE)
			{
			  //Passagem pelas linhas
			  while (($data = fgetcsv($handle, null, ",")) !== FALSE)
			  {
			      $dd_insert = [];
			      $num = count($data);
			      $row++;
			      // Passagem pelas colunas
			      for ($col = 0; $col < $num; $col++)
			      {
			      	  $cont_cel++;
			          //  DEFININDO CAMPOS DA TABELA DO  DB
			          if($reg > 0){

				          if($cont_cel == 1){
				          	$dd_insert['event_id'] = $data[$col];
				          	$dd_where['event_id'] = $data[$col];

				          }
				          if($cont_cel == 2){
				          	$dd_insert['menu_hint'] = $data[$col];
				          }
				          if($cont_cel == 3){
				          	$dd_insert['event_name'] = $data[$col];
				          }
				          if($cont_cel == 4){
				          	$dd_insert['event_dt'] = $data[$col];
				          }
				          if($cont_cel == 5){
				          	$dd_insert['selection_id'] = $data[$col];
				          }
				          if($cont_cel == 6){
				          	#$dd_insert['selection_name'] = $data[$col];
				          	#$dd_where['selection_name'] = $data[$col];
				          	$nm_horse = str_replace("'", "", $data[$col]);
				          	$dd_insert['selection_name'] = $nm_horse;
				          	$dd_where['selection_name'] = $nm_horse;

				          }

				          // ---------------------------
				          if($cont_cel == 7){
				          	$dd_insert['win_lose'] = $data[$col];
				          }
				          if($cont_cel == 8){
				          	$dd_insert['bsp'] = $data[$col];
				          }
				          if($cont_cel == 9){
				          	$dd_insert['ppwap'] = $data[$col];
				          }
				          if($cont_cel == 10){
				          	$dd_insert['morningwap'] = $data[$col];
				          }
				          if($cont_cel == 11){
				          	$dd_insert['ppmax'] = $data[$col];
				          }
				          if($cont_cel == 12){
				          	$dd_insert['ppmin'] = $data[$col];
				          }
				          if($cont_cel == 13){
				          	$dd_insert['ipmax'] = $data[$col];
				          }
				          if($cont_cel == 14){
				          	$dd_insert['ipmin'] = $data[$col];
				          }
				          if($cont_cel == 15){
				          	$dd_insert['morningtraderdvol'] = $data[$col];
				          }
				          if($cont_cel == 16){
				          	$dd_insert['pptradedvol'] = $data[$col];
				          }
				          if($cont_cel == 17){
				          	$dd_insert['iptradedvol'] = $data[$col];
				          }
				          // nomeia o arqvuivo font
				          $dd_insert['arq'] = $file->getFileName();
				          
				      }
			         
			          echo 'Linhainha: '.$row.' e na Coluna: '.$data[$col] . " ($col - <b>$cont_cel</b>) <br />\n";
			         
			          if($cont_cel == 17){

			          	if($reg > 0 && $dd_insert['selection_name'] != '------------------------------') {
			          		$this->db->where($dd_where);
			          		// corridas_cavalos_gb
			          		$qr_row = $this->db->get("corridas_cavalos_usa_2015");
			          		if($qr_row->num_rows() == 0){
					          	$this->db->insert('corridas_cavalos_usa_2015' , $dd_insert);					          	
					        }
				        }


			          	$cont_cel = 0;
			          	$reg++;
			          	echo "<br>REG: <b>$reg</b><hr>";
			          	print_r($dd_insert);

			          	echo "<br />";
			          	array_shift($dd_insert);
			          }    
			      } // x for
			  } // x while
			  unlink($path."".$file->getFileName());
			  fclose($handle);
			} // x if handle
		if($cont > 10){
		    	#return false;
		    }
		} // x laço q percorre os arquivos


	} // x fn



	function csv_usa_2021(){
		$meuArray = Array();
	
		// MANUPUILANDO DIRETORIOS		
		$path = 'csv_usa_2021/';
		
		$directory = new RecursiveDirectoryIterator( $path );
		$cont = 0;
		foreach ($directory as $file) { $cont++;
		 
		    echo $file->getFileName();
		    echo "<br>";

			// x man dir
			$row = 1;
			$cont_cel = 0;
			$reg = 0;
			if (($handle = fopen($path."".$file->getFileName(), "r")) !== FALSE)
			{
			  //Passagem pelas linhas
			  while (($data = fgetcsv($handle, null, ",")) !== FALSE)
			  {
			      $dd_insert = [];
			      $num = count($data);
			      $row++;
			      // Passagem pelas colunas
			      for ($col = 0; $col < $num; $col++)
			      {
			      	  $cont_cel++;
			          //  DEFININDO CAMPOS DA TABELA DO  DB
			          if($reg > 0){

				          if($cont_cel == 1){
				          	$dd_insert['event_id'] = $data[$col];
				          	$dd_where['event_id'] = $data[$col];

				          }
				          if($cont_cel == 2){
				          	$dd_insert['menu_hint'] = $data[$col];
				          }
				          if($cont_cel == 3){
				          	$dd_insert['event_name'] = $data[$col];
				          }
				          if($cont_cel == 4){
				          	$dd_insert['event_dt'] = $data[$col];
				          }
				          if($cont_cel == 5){
				          	$dd_insert['selection_id'] = $data[$col];
				          }
				          if($cont_cel == 6){
				          	#$dd_insert['selection_name'] = $data[$col];
				          	#$dd_where['selection_name'] = $data[$col];
				          	$nm_horse = str_replace("'", "", $data[$col]);
				          	$dd_insert['selection_name'] = $nm_horse;
				          	$dd_where['selection_name'] = $nm_horse;

				          }

				          // ---------------------------
				          if($cont_cel == 7){
				          	$dd_insert['win_lose'] = $data[$col];
				          }
				          if($cont_cel == 8){
				          	$dd_insert['bsp'] = $data[$col];
				          }
				          if($cont_cel == 9){
				          	$dd_insert['ppwap'] = $data[$col];
				          }
				          if($cont_cel == 10){
				          	$dd_insert['morningwap'] = $data[$col];
				          }
				          if($cont_cel == 11){
				          	$dd_insert['ppmax'] = $data[$col];
				          }
				          if($cont_cel == 12){
				          	$dd_insert['ppmin'] = $data[$col];
				          }
				          if($cont_cel == 13){
				          	$dd_insert['ipmax'] = $data[$col];
				          }
				          if($cont_cel == 14){
				          	$dd_insert['ipmin'] = $data[$col];
				          }
				          if($cont_cel == 15){
				          	$dd_insert['morningtraderdvol'] = $data[$col];
				          }
				          if($cont_cel == 16){
				          	$dd_insert['pptradedvol'] = $data[$col];
				          }
				          if($cont_cel == 17){
				          	$dd_insert['iptradedvol'] = $data[$col];
				          }
				          // nomeia o arqvuivo font
				          $dd_insert['arq'] = $file->getFileName();
				          
				      }
			         
			          echo 'Linhainha: '.$row.' e na Coluna: '.$data[$col] . " ($col - <b>$cont_cel</b>) <br />\n";
			         
			          if($cont_cel == 17){

			          	if($reg > 0 && $dd_insert['selection_name'] != '------------------------------') {
			          		$this->db->where($dd_where);
			          		// corridas_cavalos_gb
			          		$qr_row = $this->db->get("corridas_cavalos_usa_2021");
			          		if($qr_row->num_rows() == 0){
					          	$this->db->insert('corridas_cavalos_usa_2021' , $dd_insert);					          	
					        }
				        }


			          	$cont_cel = 0;
			          	$reg++;
			          	echo "<br>REG: <b>$reg</b><hr>";
			          	print_r($dd_insert);

			          	echo "<br />";
			          	array_shift($dd_insert);
			          }    
			      } // x for
			  } // x while
			  unlink($path."".$file->getFileName());
			  fclose($handle);
			} // x if handle
		if($cont > 10){
		    	#return false;
		    }
		} // x laço q percorre os arquivos


	} // x fn


	function csv_usa_2018(){
		$meuArray = Array();
	
		// MANUPUILANDO DIRETORIOS		
		$path = 'csv_usa_2018/';
		
		$directory = new RecursiveDirectoryIterator( $path );
		$cont = 0;
		foreach ($directory as $file) { $cont++;
		 
		    echo $file->getFileName();
		    echo "<br>";

			// x man dir
			$row = 1;
			$cont_cel = 0;
			$reg = 0;
			if (($handle = fopen($path."".$file->getFileName(), "r")) !== FALSE)
			{
			  //Passagem pelas linhas
			  while (($data = fgetcsv($handle, null, ",")) !== FALSE)
			  {
			      $dd_insert = [];
			      $num = count($data);
			      $row++;
			      // Passagem pelas colunas
			      for ($col = 0; $col < $num; $col++)
			      {
			      	  $cont_cel++;
			          //  DEFININDO CAMPOS DA TABELA DO  DB
			          if($reg > 0){

				          if($cont_cel == 1){
				          	$dd_insert['event_id'] = $data[$col];
				          	$dd_where['event_id'] = $data[$col];

				          }
				          if($cont_cel == 2){
				          	$dd_insert['menu_hint'] = $data[$col];
				          }
				          if($cont_cel == 3){
				          	$dd_insert['event_name'] = $data[$col];
				          }
				          if($cont_cel == 4){
				          	$dd_insert['event_dt'] = $data[$col];
				          }
				          if($cont_cel == 5){
				          	$dd_insert['selection_id'] = $data[$col];
				          }
				          if($cont_cel == 6){
				          	#$dd_insert['selection_name'] = $data[$col];
				          	#$dd_where['selection_name'] = $data[$col];
				          	$nm_horse = str_replace("'", "", $data[$col]);
				          	$dd_insert['selection_name'] = $nm_horse;
				          	$dd_where['selection_name'] = $nm_horse;

				          }

				          // ---------------------------
				          if($cont_cel == 7){
				          	$dd_insert['win_lose'] = $data[$col];
				          }
				          if($cont_cel == 8){
				          	$dd_insert['bsp'] = $data[$col];
				          }
				          if($cont_cel == 9){
				          	$dd_insert['ppwap'] = $data[$col];
				          }
				          if($cont_cel == 10){
				          	$dd_insert['morningwap'] = $data[$col];
				          }
				          if($cont_cel == 11){
				          	$dd_insert['ppmax'] = $data[$col];
				          }
				          if($cont_cel == 12){
				          	$dd_insert['ppmin'] = $data[$col];
				          }
				          if($cont_cel == 13){
				          	$dd_insert['ipmax'] = $data[$col];
				          }
				          if($cont_cel == 14){
				          	$dd_insert['ipmin'] = $data[$col];
				          }
				          if($cont_cel == 15){
				          	$dd_insert['morningtraderdvol'] = $data[$col];
				          }
				          if($cont_cel == 16){
				          	$dd_insert['pptradedvol'] = $data[$col];
				          }
				          if($cont_cel == 17){
				          	$dd_insert['iptradedvol'] = $data[$col];
				          }
				          // nomeia o arqvuivo font
				          $dd_insert['arq'] = $file->getFileName();
				          
				      }
			         
			          echo 'Linhainha: '.$row.' e na Coluna: '.$data[$col] . " ($col - <b>$cont_cel</b>) <br />\n";
			         
			          if($cont_cel == 17){

			          	if($reg > 0 && $dd_insert['selection_name'] != '------------------------------') {
			          		$this->db->where($dd_where);
			          		// corridas_cavalos_gb
			          		$qr_row = $this->db->get("corridas_cavalos_usa_2018");
			          		if($qr_row->num_rows() == 0){
					          	$this->db->insert('corridas_cavalos_usa_2018' , $dd_insert);					          	
					        }
				        }


			          	$cont_cel = 0;
			          	$reg++;
			          	echo "<br>REG: <b>$reg</b><hr>";
			          	print_r($dd_insert);

			          	echo "<br />";
			          	array_shift($dd_insert);
			          }    
			      } // x for
			  } // x while
			  unlink($path."".$file->getFileName());
			  fclose($handle);
			} // x if handle
		if($cont > 10){
		    	#return false;
		    }
		} // x laço q percorre os arquivos


	} // x fn



	function set_ordem_horses(){
		#$qr_distinct = $this->db->query("SELECT DISTINCT event_id FROM corridas_cavalos_usa_2015 WHERE ordem = 0 LIMIT 500");
		$qr_distinct = $this->db->query("SELECT DISTINCT event_id FROM corridas_cavalos_usa_2022 WHERE ordem = 0 LIMIT 20000");
		echo "<h1>".$qr_distinct->num_rows()."</h1>";
		if($qr_distinct->num_rows() > 0){
			foreach($qr_distinct->result() as $corrida){
				$this->db->where('event_id',$corrida->event_id);
				$this->db->order_by('bsp','asc');
				$qr_horses = $this->db->get('corridas_cavalos_usa_2022');
				if($qr_horses->num_rows() > 0){
					$numero = 0;
					echo "<ul>";
					foreach($qr_horses->result() as $horse){ $numero++;
						$dd_numero = array(
							'ordem' => $numero
						);
						$this->db->where('id',$horse->id);
						#$this->db->update('corridas_cavalos_gb',$dd_numero);
						$this->db->update('corridas_cavalos_usa_2022',$dd_numero);

						echo "<li> (<b>$numero</b>) ".$horse->selection_id." - ".$horse->selection_name." <strong> @".$horse->bsp." </strong> </li>";
					}
					echo "</ul>";
				}
			}
		}
		echo "<br />";
		echo "OK";
	}

	function set_ordem_horses_2016(){
		#$qr_distinct = $this->db->query("SELECT DISTINCT event_id FROM corridas_cavalos_usa_2015 WHERE ordem = 0 LIMIT 500");
		$qr_distinct = $this->db->query("SELECT DISTINCT event_id FROM corridas_cavalos_usa_2016 WHERE ordem = 0 LIMIT 20000");
		echo "<h1>".$qr_distinct->num_rows()."</h1>";
		if($qr_distinct->num_rows() > 0){
			foreach($qr_distinct->result() as $corrida){
				$this->db->where('event_id',$corrida->event_id);
				$this->db->order_by('bsp','asc');
				$qr_horses = $this->db->get('corridas_cavalos_usa_2016');
				if($qr_horses->num_rows() > 0){
					$numero = 0;
					echo "<ul>";
					foreach($qr_horses->result() as $horse){ $numero++;
						$dd_numero = array(
							'ordem' => $numero
						);
						$this->db->where('id',$horse->id);
						#$this->db->update('corridas_cavalos_gb',$dd_numero);
						$this->db->update('corridas_cavalos_usa_2016',$dd_numero);

						echo "<li> (<b>$numero</b>) ".$horse->selection_id." - ".$horse->selection_name." <strong> @".$horse->bsp." </strong> </li>";
					}
					echo "</ul>";
				}
			}
		}
		echo "<br />";
		echo "OK";
	}



	function set_ordem_horses_2015(){
		#$qr_distinct = $this->db->query("SELECT DISTINCT event_id FROM corridas_cavalos_usa_2015 WHERE ordem = 0 LIMIT 500");
		$qr_distinct = $this->db->query("SELECT DISTINCT event_id FROM corridas_cavalos_usa_2015 WHERE ordem = 0 LIMIT 20000");
		echo "<h1>".$qr_distinct->num_rows()."</h1>";
		if($qr_distinct->num_rows() > 0){
			foreach($qr_distinct->result() as $corrida){
				$this->db->where('event_id',$corrida->event_id);
				$this->db->order_by('bsp','asc');
				$qr_horses = $this->db->get('corridas_cavalos_usa_2015');
				if($qr_horses->num_rows() > 0){
					$numero = 0;
					echo "<ul>";
					foreach($qr_horses->result() as $horse){ $numero++;
						$dd_numero = array(
							'ordem' => $numero
						);
						$this->db->where('id',$horse->id);
						#$this->db->update('corridas_cavalos_gb',$dd_numero);
						$this->db->update('corridas_cavalos_usa_2015',$dd_numero);

						echo "<li> (<b>$numero</b>) ".$horse->selection_id." - ".$horse->selection_name." <strong> @".$horse->bsp." </strong> </li>";
					}
					echo "</ul>";
				}
			}
		}
		echo "<br />";
		echo "OK";
	}


	function set_ordem_horses_2017(){
		#$qr_distinct = $this->db->query("SELECT DISTINCT event_id FROM corridas_cavalos_usa_2015 WHERE ordem = 0 LIMIT 500");
		$qr_distinct = $this->db->query("SELECT DISTINCT event_id FROM corridas_cavalos_usa_2017 WHERE ordem = 0 LIMIT 20000");
		echo "<h1>".$qr_distinct->num_rows()."</h1>";
		if($qr_distinct->num_rows() > 0){
			foreach($qr_distinct->result() as $corrida){
				$this->db->where('event_id',$corrida->event_id);
				$this->db->order_by('bsp','asc');
				$qr_horses = $this->db->get('corridas_cavalos_usa_2017');
				if($qr_horses->num_rows() > 0){
					$numero = 0;
					echo "<ul>";
					foreach($qr_horses->result() as $horse){ $numero++;
						$dd_numero = array(
							'ordem' => $numero
						);
						$this->db->where('id',$horse->id);
						#$this->db->update('corridas_cavalos_gb',$dd_numero);
						$this->db->update('corridas_cavalos_usa_2017',$dd_numero);

						echo "<li> (<b>$numero</b>) ".$horse->selection_id." - ".$horse->selection_name." <strong> @".$horse->bsp." </strong> </li>";
					}
					echo "</ul>";
				}
			}
		}
		echo "<br />";
		echo "OK";
	}

	function set_ordem_horses_2018(){
		#$qr_distinct = $this->db->query("SELECT DISTINCT event_id FROM corridas_cavalos_usa_2015 WHERE ordem = 0 LIMIT 500");
		$qr_distinct = $this->db->query("SELECT DISTINCT event_id FROM corridas_cavalos_usa_2018 WHERE ordem = 0 LIMIT 20000");
		echo "<h1>".$qr_distinct->num_rows()."</h1>";
		if($qr_distinct->num_rows() > 0){
			foreach($qr_distinct->result() as $corrida){
				$this->db->where('event_id',$corrida->event_id);
				$this->db->order_by('bsp','asc');
				$qr_horses = $this->db->get('corridas_cavalos_usa_2018');
				if($qr_horses->num_rows() > 0){
					$numero = 0;
					echo "<ul>";
					foreach($qr_horses->result() as $horse){ $numero++;
						$dd_numero = array(
							'ordem' => $numero
						);
						$this->db->where('id',$horse->id);
						#$this->db->update('corridas_cavalos_gb',$dd_numero);
						$this->db->update('corridas_cavalos_usa_2018',$dd_numero);

						echo "<li> (<b>$numero</b>) ".$horse->selection_id." - ".$horse->selection_name." <strong> @".$horse->bsp." </strong> </li>";
					}
					echo "</ul>";
				}
			}
		}
		echo "<br />";
		echo "OK";
	}


	function set_ordem_horses_2019(){
		#$qr_distinct = $this->db->query("SELECT DISTINCT event_id FROM corridas_cavalos_usa_2015 WHERE ordem = 0 LIMIT 500");
		$qr_distinct = $this->db->query("SELECT DISTINCT event_id FROM corridas_cavalos_usa_2019 WHERE ordem = 0 LIMIT 20000");
		echo "<h1>".$qr_distinct->num_rows()."</h1>";
		if($qr_distinct->num_rows() > 0){
			foreach($qr_distinct->result() as $corrida){
				$this->db->where('event_id',$corrida->event_id);
				$this->db->order_by('bsp','asc');
				$qr_horses = $this->db->get('corridas_cavalos_usa_2019');
				if($qr_horses->num_rows() > 0){
					$numero = 0;
					echo "<ul>";
					foreach($qr_horses->result() as $horse){ $numero++;
						$dd_numero = array(
							'ordem' => $numero
						);
						$this->db->where('id',$horse->id);
						#$this->db->update('corridas_cavalos_gb',$dd_numero);
						$this->db->update('corridas_cavalos_usa_2019',$dd_numero);

						echo "<li> (<b>$numero</b>) ".$horse->selection_id." - ".$horse->selection_name." <strong> @".$horse->bsp." </strong> </li>";
					}
					echo "</ul>";
				}
			}
		}
		echo "<br />";
		echo "OK";
	}


	function set_ordem_horses_2020(){
		#$qr_distinct = $this->db->query("SELECT DISTINCT event_id FROM corridas_cavalos_usa_2015 WHERE ordem = 0 LIMIT 500");
		$qr_distinct = $this->db->query("SELECT DISTINCT event_id FROM corridas_cavalos_usa_2020 WHERE ordem = 0 LIMIT 20000");
		echo "<h1>".$qr_distinct->num_rows()."</h1>";
		if($qr_distinct->num_rows() > 0){
			foreach($qr_distinct->result() as $corrida){
				$this->db->where('event_id',$corrida->event_id);
				$this->db->order_by('bsp','asc');
				$qr_horses = $this->db->get('corridas_cavalos_usa_2020');
				if($qr_horses->num_rows() > 0){
					$numero = 0;
					echo "<ul>";
					foreach($qr_horses->result() as $horse){ $numero++;
						$dd_numero = array(
							'ordem' => $numero
						);
						$this->db->where('id',$horse->id);
						#$this->db->update('corridas_cavalos_gb',$dd_numero);
						$this->db->update('corridas_cavalos_usa_2020',$dd_numero);

						echo "<li> (<b>$numero</b>) ".$horse->selection_id." - ".$horse->selection_name." <strong> @".$horse->bsp." </strong> </li>";
					}
					echo "</ul>";
				}
			}
		}
		echo "<br />";
		echo "OK";
	}

	function set_ordem_horses_2021(){
		#$qr_distinct = $this->db->query("SELECT DISTINCT event_id FROM corridas_cavalos_usa_2015 WHERE ordem = 0 LIMIT 500");
		$qr_distinct = $this->db->query("SELECT DISTINCT event_id FROM corridas_cavalos_usa_2021 WHERE ordem = 0 LIMIT 20000");
		echo "<h1>".$qr_distinct->num_rows()."</h1>";
		if($qr_distinct->num_rows() > 0){
			foreach($qr_distinct->result() as $corrida){
				$this->db->where('event_id',$corrida->event_id);
				$this->db->order_by('bsp','asc');
				$qr_horses = $this->db->get('corridas_cavalos_usa_2021');
				if($qr_horses->num_rows() > 0){
					$numero = 0;
					echo "<ul>";
					foreach($qr_horses->result() as $horse){ $numero++;
						$dd_numero = array(
							'ordem' => $numero
						);
						$this->db->where('id',$horse->id);
						#$this->db->update('corridas_cavalos_gb',$dd_numero);
						$this->db->update('corridas_cavalos_usa_2021',$dd_numero);

						echo "<li> (<b>$numero</b>) ".$horse->selection_id." - ".$horse->selection_name." <strong> @".$horse->bsp." </strong> </li>";
					}
					echo "</ul>";
				}
			}
		}
		echo "<br />";
		echo "OK";
	}



	function set_ordem_horses_2022(){
		#$qr_distinct = $this->db->query("SELECT DISTINCT event_id FROM corridas_cavalos_usa_2015 WHERE ordem = 0 LIMIT 500");
		$qr_distinct = $this->db->query("SELECT DISTINCT event_id FROM corridas_cavalos_usa_2022 WHERE ordem = 0 LIMIT 20000");
		echo "<h1>".$qr_distinct->num_rows()."</h1>";
		if($qr_distinct->num_rows() > 0){
			foreach($qr_distinct->result() as $corrida){
				$this->db->where('event_id',$corrida->event_id);
				$this->db->order_by('bsp','asc');
				$qr_horses = $this->db->get('corridas_cavalos_usa_2022');
				if($qr_horses->num_rows() > 0){
					$numero = 0;
					echo "<ul>";
					foreach($qr_horses->result() as $horse){ $numero++;
						$dd_numero = array(
							'ordem' => $numero
						);
						$this->db->where('id',$horse->id);
						#$this->db->update('corridas_cavalos_gb',$dd_numero);
						$this->db->update('corridas_cavalos_usa_2022',$dd_numero);

						echo "<li> (<b>$numero</b>) ".$horse->selection_id." - ".$horse->selection_name." <strong> @".$horse->bsp." </strong> </li>";
					}
					echo "</ul>";
				}
			}
		}
		echo "<br />";
		echo "OK";
	}



function set_data_2015(){
		#echo "OK!";
		#return false;
		$qr = $this->db->query("SELECT * FROM corridas_cavalos_usa_2015 WHERE data_evento IS NULL ORDER BY id asc LIMIT 50000 ");
		#$qr = $this->db->query("SELECT * FROM corridas_cavalos WHERE datahora_evento IS NULL AND (data_evento BETWEEN '2019-01-01' AND '2019-12-31')   ORDER BY data_evento desc LIMIT 50000 ");
		#$qr = $this->db->query("SELECT * FROM corridas_cavalos_usa_2015 WHERE data_evento = '0000-00-00' LIMIT 50 ");
		foreach($qr->result() as $dd){
			$data = substr($dd->event_dt,0,10);

			$dia = substr($dd->event_dt,0,2);
			$mes = substr($dd->event_dt,3,2);
			$ano = substr($dd->event_dt,6,4);

			$hora = substr($dd->event_dt,10,6).":00";



			$data_trat = $ano."-".$mes."-".$dia;
			echo "<h1>".$dd->id."</h1>";
			echo "<strong>".$ano."-".$mes."-".$dia." $hora</strong>";
			echo "<br />";



			$dd_data = array('data_evento' => $data_trat);
			$dd_data['datahora_evento'] =  $data_trat." ".$hora;
			#$dd_data = array('datahora_evento' => $data_trat." ".$hora);
			print_r($dd_data);
			echo "<br>";
			$this->db->where('id',$dd->id);
			if($this->db->update('corridas_cavalos_usa_2015',$dd_data)){
				echo "foooooi";
			}else{
				echo "naaaaaaaao";
			}
		}
		echo $qr->num_rows();
	}



function set_data_2016(){
		#echo "OK!";
		#return false;
		$qr = $this->db->query("SELECT * FROM corridas_cavalos_usa_2016 WHERE data_evento IS NULL ORDER BY id asc LIMIT 50000 ");
		#$qr = $this->db->query("SELECT * FROM corridas_cavalos WHERE datahora_evento IS NULL AND (data_evento BETWEEN '2019-01-01' AND '2019-12-31')   ORDER BY data_evento desc LIMIT 50000 ");
		#$qr = $this->db->query("SELECT * FROM corridas_cavalos_usa_2015 WHERE data_evento = '0000-00-00' LIMIT 50 ");
		foreach($qr->result() as $dd){
			$data = substr($dd->event_dt,0,10);

			$dia = substr($dd->event_dt,0,2);
			$mes = substr($dd->event_dt,3,2);
			$ano = substr($dd->event_dt,6,4);

			$hora = substr($dd->event_dt,10,6).":00";



			$data_trat = $ano."-".$mes."-".$dia;
			echo "<h1>".$dd->id."</h1>";
			echo "<strong>".$ano."-".$mes."-".$dia." $hora</strong>";
			echo "<br />";



			$dd_data = array('data_evento' => $data_trat);
			$dd_data['datahora_evento'] =  $data_trat." ".$hora;
			#$dd_data = array('datahora_evento' => $data_trat." ".$hora);
			print_r($dd_data);
			echo "<br>";
			$this->db->where('id',$dd->id);
			if($this->db->update('corridas_cavalos_usa_2016',$dd_data)){
				echo "foooooi";
			}else{
				echo "naaaaaaaao";
			}
		}
		echo $qr->num_rows();
	}



function set_data_2017(){
		#echo "OK!";
		#return false;
		$qr = $this->db->query("SELECT * FROM corridas_cavalos_usa_2017 WHERE data_evento IS NULL ORDER BY id asc LIMIT 50000 ");
		#$qr = $this->db->query("SELECT * FROM corridas_cavalos WHERE datahora_evento IS NULL AND (data_evento BETWEEN '2019-01-01' AND '2019-12-31')   ORDER BY data_evento desc LIMIT 50000 ");
		#$qr = $this->db->query("SELECT * FROM corridas_cavalos_usa_2015 WHERE data_evento = '0000-00-00' LIMIT 50 ");
		foreach($qr->result() as $dd){
			$data = substr($dd->event_dt,0,10);

			$dia = substr($dd->event_dt,0,2);
			$mes = substr($dd->event_dt,3,2);
			$ano = substr($dd->event_dt,6,4);

			$hora = substr($dd->event_dt,10,6).":00";



			$data_trat = $ano."-".$mes."-".$dia;
			echo "<h1>".$dd->id."</h1>";
			echo "<strong>".$ano."-".$mes."-".$dia." $hora</strong>";
			echo "<br />";



			$dd_data = array('data_evento' => $data_trat);
			$dd_data['datahora_evento'] =  $data_trat." ".$hora;
			#$dd_data = array('datahora_evento' => $data_trat." ".$hora);
			print_r($dd_data);
			echo "<br>";
			$this->db->where('id',$dd->id);
			if($this->db->update('corridas_cavalos_usa_2017',$dd_data)){
				echo "foooooi";
			}else{
				echo "naaaaaaaao";
			}
		}
		echo $qr->num_rows();
	}


function set_data_2018(){
		#echo "OK!";
		#return false;
		$qr = $this->db->query("SELECT * FROM corridas_cavalos_usa_2018 WHERE data_evento IS NULL ORDER BY id asc LIMIT 50000 ");
		#$qr = $this->db->query("SELECT * FROM corridas_cavalos WHERE datahora_evento IS NULL AND (data_evento BETWEEN '2019-01-01' AND '2019-12-31')   ORDER BY data_evento desc LIMIT 50000 ");
		#$qr = $this->db->query("SELECT * FROM corridas_cavalos_usa_2015 WHERE data_evento = '0000-00-00' LIMIT 50 ");
		foreach($qr->result() as $dd){
			$data = substr($dd->event_dt,0,10);

			$dia = substr($dd->event_dt,0,2);
			$mes = substr($dd->event_dt,3,2);
			$ano = substr($dd->event_dt,6,4);

			$hora = substr($dd->event_dt,10,6).":00";



			$data_trat = $ano."-".$mes."-".$dia;
			echo "<h1>".$dd->id."</h1>";
			echo "<strong>".$ano."-".$mes."-".$dia." $hora</strong>";
			echo "<br />";



			$dd_data = array('data_evento' => $data_trat);
			$dd_data['datahora_evento'] =  $data_trat." ".$hora;
			#$dd_data = array('datahora_evento' => $data_trat." ".$hora);
			print_r($dd_data);
			echo "<br>";
			$this->db->where('id',$dd->id);
			if($this->db->update('corridas_cavalos_usa_2018',$dd_data)){
				echo "foooooi";
			}else{
				echo "naaaaaaaao";
			}
		}
		echo $qr->num_rows();
	}



function set_data_2019(){
		#echo "OK!";
		#return false;
		$qr = $this->db->query("SELECT * FROM corridas_cavalos_usa_2019 WHERE data_evento IS NULL ORDER BY id asc LIMIT 50000 ");
		#$qr = $this->db->query("SELECT * FROM corridas_cavalos WHERE datahora_evento IS NULL AND (data_evento BETWEEN '2019-01-01' AND '2019-12-31')   ORDER BY data_evento desc LIMIT 50000 ");
		#$qr = $this->db->query("SELECT * FROM corridas_cavalos_usa_2015 WHERE data_evento = '0000-00-00' LIMIT 50 ");
		foreach($qr->result() as $dd){
			$data = substr($dd->event_dt,0,10);

			$dia = substr($dd->event_dt,0,2);
			$mes = substr($dd->event_dt,3,2);
			$ano = substr($dd->event_dt,6,4);

			$hora = substr($dd->event_dt,10,6).":00";



			$data_trat = $ano."-".$mes."-".$dia;
			echo "<h1>".$dd->id."</h1>";
			echo "<strong>".$ano."-".$mes."-".$dia." $hora</strong>";
			echo "<br />";



			$dd_data = array('data_evento' => $data_trat);
			$dd_data['datahora_evento'] =  $data_trat." ".$hora;
			#$dd_data = array('datahora_evento' => $data_trat." ".$hora);
			print_r($dd_data);
			echo "<br>";
			$this->db->where('id',$dd->id);
			if($this->db->update('corridas_cavalos_usa_2019',$dd_data)){
				echo "foooooi";
			}else{
				echo "naaaaaaaao";
			}
		}
		echo $qr->num_rows();
	}


function set_data_2020(){
		#echo "OK!";
		#return false;
		$qr = $this->db->query("SELECT * FROM corridas_cavalos_usa_2020 WHERE data_evento IS NULL ORDER BY id asc LIMIT 50000 ");
		#$qr = $this->db->query("SELECT * FROM corridas_cavalos WHERE datahora_evento IS NULL AND (data_evento BETWEEN '2019-01-01' AND '2019-12-31')   ORDER BY data_evento desc LIMIT 50000 ");
		#$qr = $this->db->query("SELECT * FROM corridas_cavalos_usa_2015 WHERE data_evento = '0000-00-00' LIMIT 50 ");
		foreach($qr->result() as $dd){
			$data = substr($dd->event_dt,0,10);

			$dia = substr($dd->event_dt,0,2);
			$mes = substr($dd->event_dt,3,2);
			$ano = substr($dd->event_dt,6,4);

			$hora = substr($dd->event_dt,10,6).":00";



			$data_trat = $ano."-".$mes."-".$dia;
			echo "<h1>".$dd->id."</h1>";
			echo "<strong>".$ano."-".$mes."-".$dia." $hora</strong>";
			echo "<br />";



			$dd_data = array('data_evento' => $data_trat);
			$dd_data['datahora_evento'] =  $data_trat." ".$hora;
			#$dd_data = array('datahora_evento' => $data_trat." ".$hora);
			print_r($dd_data);
			echo "<br>";
			$this->db->where('id',$dd->id);
			if($this->db->update('corridas_cavalos_usa_2020',$dd_data)){
				echo "foooooi";
			}else{
				echo "naaaaaaaao";
			}
		}
		echo $qr->num_rows();
	}



function set_data_2021(){
		#echo "OK!";
		#return false;
		$qr = $this->db->query("SELECT * FROM corridas_cavalos_usa_2021 WHERE data_evento IS NULL ORDER BY id asc LIMIT 50000 ");
		#$qr = $this->db->query("SELECT * FROM corridas_cavalos WHERE datahora_evento IS NULL AND (data_evento BETWEEN '2019-01-01' AND '2019-12-31')   ORDER BY data_evento desc LIMIT 50000 ");
		#$qr = $this->db->query("SELECT * FROM corridas_cavalos_usa_2015 WHERE data_evento = '0000-00-00' LIMIT 50 ");
		foreach($qr->result() as $dd){
			$data = substr($dd->event_dt,0,10);

			$dia = substr($dd->event_dt,0,2);
			$mes = substr($dd->event_dt,3,2);
			$ano = substr($dd->event_dt,6,4);

			$hora = substr($dd->event_dt,10,6).":00";



			$data_trat = $ano."-".$mes."-".$dia;
			echo "<h1>".$dd->id."</h1>";
			echo "<strong>".$ano."-".$mes."-".$dia." $hora</strong>";
			echo "<br />";



			$dd_data = array('data_evento' => $data_trat);
			$dd_data['datahora_evento'] =  $data_trat." ".$hora;
			#$dd_data = array('datahora_evento' => $data_trat." ".$hora);
			print_r($dd_data);
			echo "<br>";
			$this->db->where('id',$dd->id);
			if($this->db->update('corridas_cavalos_usa_2021',$dd_data)){
				echo "foooooi";
			}else{
				echo "naaaaaaaao";
			}
		}
		echo $qr->num_rows();
	}


function set_data(){
		#echo "OK!";
		#return false;
		$qr = $this->db->query("SELECT * FROM corridas_cavalos_usa_2022 WHERE data_evento IS NULL ORDER BY id asc LIMIT 50000 ");
		#$qr = $this->db->query("SELECT * FROM corridas_cavalos WHERE datahora_evento IS NULL AND (data_evento BETWEEN '2019-01-01' AND '2019-12-31')   ORDER BY data_evento desc LIMIT 50000 ");
		#$qr = $this->db->query("SELECT * FROM corridas_cavalos_usa_2015 WHERE data_evento = '0000-00-00' LIMIT 50 ");
		foreach($qr->result() as $dd){
			$data = substr($dd->event_dt,0,10);

			$dia = substr($dd->event_dt,0,2);
			$mes = substr($dd->event_dt,3,2);
			$ano = substr($dd->event_dt,6,4);

			$hora = substr($dd->event_dt,10,6).":00";



			$data_trat = $ano."-".$mes."-".$dia;
			echo "<h1>".$dd->id."</h1>";
			echo "<strong>".$ano."-".$mes."-".$dia." $hora</strong>";
			echo "<br />";



			$dd_data = array('data_evento' => $data_trat);
			$dd_data['datahora_evento'] =  $data_trat." ".$hora;
			#$dd_data = array('datahora_evento' => $data_trat." ".$hora);
			print_r($dd_data);
			echo "<br>";
			$this->db->where('id',$dd->id);
			if($this->db->update('corridas_cavalos_usa_2022',$dd_data)){
				echo "foooooi";
			}else{
				echo "naaaaaaaao";
			}
		}
		echo $qr->num_rows();
	}





	function set_corredores_pais($tb="corridas_cavalos_usa"){
		/*
		if($pais == "gb"){
			$tb = 'corridas_cavalos_gb';
		}
		if($pais == "ire"){
			$tb = 'corridas_cavalos_ire';
		}
		*/
		$qr_hist = $this->db->query("SELECT DISTINCT event_id  FROM $tb WHERE foi_corredores = 0  order by id desc LIMIT 20000");
		/*
		$qr_hist = $this->db->query("SELECT DISTINCT c.event_dt  FROM $tb as c 
									INNER JOIN cavalos_hist_usa as h ON c.event_id = h.event_id
									WHERE c.foi_corredores = 0 AND h.event_id <> 303 and h.event_id <> 0  order by c.id desc 
									");
		*/
		foreach($qr_hist->result() as $dd){

			#$dd_foi = array('foi_corredores' => 1);
			#$this->db->where('event_dt' , $dd->event_dt);
			#$this->db->update('corridas_cavalos_gb' , $dd_foi);

			$this->db->where('event_id' , $dd->event_id);
			$qr_tem = $this->db->get($tb);

			$dd_foi = array('foi_corredores' => 1 , 'corredores' => $qr_tem->num_rows());
			$this->db->where('event_id' , $dd->event_id);
			$this->db->update($tb, $dd_foi);
			
			
			echo $dd->event_id." [".$qr_tem->num_rows()."] ";
			echo "<br>";
		}
	}


function set_mae_2015(){
		$qr = $this->db->query("SELECT * FROM corridas_cavalos_usa_2015 WHERE foi = 0 LIMIT 200000");
		echo $qr->num_rows();
		echo "<br>";
		foreach($qr->result() as $dd){
			unset($dd->id);
			unset($dd->foi);
			#$where = array('event_id' => $dd->event_id, 'selection_name' => $dd->selection_name, 'menu_hint' => $dd->menu_hint);
			$where = array('arq' => $dd->arq, 'selection_name' => $dd->selection_name);
			$this->db->where($where);
			$qr_mae = $this->db->get("corridas_cavalos_usa");
			if($qr_mae->num_rows() > 0){
				echo "Ja tem";
			}
			echo "<h2>".$qr_mae->num_rows()."</h2>";
			if($qr_mae->num_rows() == 0){
				$this->db->insert('corridas_cavalos_usa',$dd);
			}

			$foi = array('foi' => 1);
			$this->db->where($where);
			$this->db->update('corridas_cavalos_usa_2015' , $foi);


			print_r($dd);


			echo "<br /><hr />";
		}
	}

	function set_mae_2016(){
		#$qr = $this->db->query("SELECT * FROM corridas_cavalos_usa_2016 WHERE foi = 0 LIMIT 200000");
		$qr = $this->db->query("SELECT * FROM corridas_cavalos_usa_2016 WHERE foi = 0 LIMIT 20000");
		echo $qr->num_rows();
		echo "<br>";
		foreach($qr->result() as $dd){
			unset($dd->id);
			unset($dd->foi);
			#$where = array('event_id' => $dd->event_id, 'selection_name' => $dd->selection_name, 'menu_hint' => $dd->menu_hint);
			$where = array('arq' => $dd->arq, 'selection_name' => $dd->selection_name);
			$this->db->where($where);
			$qr_mae = $this->db->get("corridas_cavalos_usa");
			if($qr_mae->num_rows() > 0){
				echo "Ja tem";
			}
			echo "<h2>".$qr_mae->num_rows()."</h2>";
			if($qr_mae->num_rows() == 0){
				$this->db->insert('corridas_cavalos_usa',$dd);
			}

			$foi = array('foi' => 1);
			$this->db->where($where);
			$this->db->update('corridas_cavalos_usa_2016' , $foi);


			print_r($dd);


			echo "<br /><hr />";
		}
	}


function set_mae_2017(){
		$qr = $this->db->query("SELECT * FROM corridas_cavalos_usa_2017 WHERE foi = 0 LIMIT 200000");
		echo $qr->num_rows();
		echo "<br>";
		foreach($qr->result() as $dd){
			unset($dd->id);
			unset($dd->foi);
			#$where = array('event_id' => $dd->event_id, 'selection_name' => $dd->selection_name, 'menu_hint' => $dd->menu_hint);
			$where = array('arq' => $dd->arq, 'selection_name' => $dd->selection_name);
			$this->db->where($where);
			$qr_mae = $this->db->get("corridas_cavalos_usa");
			if($qr_mae->num_rows() > 0){
				echo "Ja tem";
			}
			echo "<h2>".$qr_mae->num_rows()."</h2>";
			if($qr_mae->num_rows() == 0){
				$this->db->insert('corridas_cavalos_usa',$dd);
			}

			$foi = array('foi' => 1);
			$this->db->where($where);
			$this->db->update('corridas_cavalos_usa_2017' , $foi);


			print_r($dd);


			echo "<br /><hr />";
		}
	}

function set_mae_2018(){
		$qr = $this->db->query("SELECT * FROM corridas_cavalos_usa_2018 WHERE foi = 0 LIMIT 200000");
		echo $qr->num_rows();
		echo "<br>";
		foreach($qr->result() as $dd){
			unset($dd->id);
			unset($dd->foi);
			#$where = array('event_id' => $dd->event_id, 'selection_name' => $dd->selection_name, 'menu_hint' => $dd->menu_hint);
			$where = array('arq' => $dd->arq, 'selection_name' => $dd->selection_name);
			$this->db->where($where);
			$qr_mae = $this->db->get("corridas_cavalos_usa");
			if($qr_mae->num_rows() > 0){
				echo "Ja tem";
			}
			echo "<h2>".$qr_mae->num_rows()."</h2>";
			if($qr_mae->num_rows() == 0){
				$this->db->insert('corridas_cavalos_usa',$dd);
			}

			$foi = array('foi' => 1);
			$this->db->where($where);
			$this->db->update('corridas_cavalos_usa_2018' , $foi);


			print_r($dd);


			echo "<br /><hr />";
		}
	}


function set_mae_2019(){
		$qr = $this->db->query("SELECT * FROM corridas_cavalos_usa_2019 WHERE foi = 0 LIMIT 200000");
		echo $qr->num_rows();
		echo "<br>";
		foreach($qr->result() as $dd){
			unset($dd->id);
			unset($dd->foi);
			#$where = array('event_id' => $dd->event_id, 'selection_name' => $dd->selection_name, 'menu_hint' => $dd->menu_hint);
			$where = array('arq' => $dd->arq, 'selection_name' => $dd->selection_name);
			$this->db->where($where);
			$qr_mae = $this->db->get("corridas_cavalos_usa");
			if($qr_mae->num_rows() > 0){
				echo "Ja tem";
			}
			echo "<h2>".$qr_mae->num_rows()."</h2>";
			if($qr_mae->num_rows() == 0){
				$this->db->insert('corridas_cavalos_usa',$dd);
			}

			$foi = array('foi' => 1);
			$this->db->where($where);
			$this->db->update('corridas_cavalos_usa_2019' , $foi);


			print_r($dd);


			echo "<br /><hr />";
		}
	}


function set_mae(){
		$qr = $this->db->query("SELECT * FROM corridas_cavalos_usa_2022 WHERE foi = 0 LIMIT 200000");
		echo $qr->num_rows();
		echo "<br>";
		foreach($qr->result() as $dd){
			unset($dd->id);
			unset($dd->foi);
			#$where = array('event_id' => $dd->event_id, 'selection_name' => $dd->selection_name, 'menu_hint' => $dd->menu_hint);
			$where = array('arq' => $dd->arq, 'selection_name' => $dd->selection_name);
			$this->db->where($where);
			$qr_mae = $this->db->get("corridas_cavalos_usa");
			if($qr_mae->num_rows() > 0){
				echo "Ja tem";
			}
			echo "<h2>".$qr_mae->num_rows()."</h2>";
			if($qr_mae->num_rows() == 0){
				$this->db->insert('corridas_cavalos_usa',$dd);
			}

			$foi = array('foi' => 1);
			$this->db->where($where);
			$this->db->update('corridas_cavalos_usa_2022' , $foi);


			print_r($dd);


			echo "<br /><hr />";
		}
	}



function set_mae_2021(){
		$qr = $this->db->query("SELECT * FROM corridas_cavalos_usa_2021 WHERE foi = 0 LIMIT 200000");
		echo $qr->num_rows();
		echo "<br>";
		foreach($qr->result() as $dd){
			unset($dd->id);
			unset($dd->foi);
			#$where = array('event_id' => $dd->event_id, 'selection_name' => $dd->selection_name, 'menu_hint' => $dd->menu_hint);
			$where = array('arq' => $dd->arq, 'selection_name' => $dd->selection_name);
			$this->db->where($where);
			$qr_mae = $this->db->get("corridas_cavalos_usa");
			if($qr_mae->num_rows() > 0){
				echo "Ja tem";
			}
			echo "<h2>".$qr_mae->num_rows()."</h2>";
			if($qr_mae->num_rows() == 0){
				$this->db->insert('corridas_cavalos_usa',$dd);
			}

			$foi = array('foi' => 1);
			$this->db->where($where);
			$this->db->update('corridas_cavalos_usa_2021' , $foi);


			print_r($dd);


			echo "<br /><hr />";
		}
	}




function set_mae_2020(){
		$qr = $this->db->query("SELECT * FROM corridas_cavalos_usa_2020 WHERE foi = 0 LIMIT 200000");
		echo $qr->num_rows();
		echo "<br>";
		foreach($qr->result() as $dd){
			unset($dd->id);
			unset($dd->foi);
			#$where = array('event_id' => $dd->event_id, 'selection_name' => $dd->selection_name, 'menu_hint' => $dd->menu_hint);
			$where = array('arq' => $dd->arq, 'selection_name' => $dd->selection_name);
			$this->db->where($where);
			$qr_mae = $this->db->get("corridas_cavalos_usa");
			if($qr_mae->num_rows() > 0){
				echo "Ja tem";
			}
			echo "<h2>".$qr_mae->num_rows()."</h2>";
			if($qr_mae->num_rows() == 0){
				$this->db->insert('corridas_cavalos_usa',$dd);
			}

			$foi = array('foi' => 1);
			$this->db->where($where);
			$this->db->update('corridas_cavalos_usa_2020' , $foi);


			print_r($dd);


			echo "<br /><hr />";
		}
	}


	function replace_name_tb_mae_usa($tb="corridas_cavalos_usa"){
		$this->db->query("delete from corridas_cavalos_usa where selection_name like '%lengths%'");
		$this->db->query("delete from corridas_cavalos_usa where event_name = 'Reverse FC'");
		$this->db->query("delete from corridas_cavalos_usa where event_name = 'Forecast'");
		$this->db->query("delete from corridas_cavalos_usa where event_name = 'Reverse Forecast'");
		$this->db->query("delete from corridas_cavalos_usa where event_name = 'Rrverse FC'");
		$this->db->query("delete from corridas_cavalos_usa where selection_name like '%£%'");
		$this->db->query("delete from corridas_cavalos_usa where event_name like '%Forecsat%'");
		$this->db->query("delete from corridas_cavalos_usa where selection_name = 'yes'");
		$this->db->query("delete from corridas_cavalos_usa where selection_name = 'no'");

		
		$qr = $this->db->query("SELECT * FROM $tb ORDER BY selection_name asc LIMIT 1000");

		foreach($qr->result() as $dd){
			$arr_replace = array( 
				"1. ", 
				"2. ",
				"3. ", 
				"4. ", 
				"5. ", 
				"6. ", 
				"7. ", 
				"8. ", 
				"9. ", 
				"10. ", 
				"11. ", 
				"12. ", 
				"13. ", 
				"14. ", 
				"15. ", 
				"16. ", 
				"17. ", 
				"18. "
			);
			$new_name = str_replace($arr_replace, "", $dd->selection_name);
			echo $dd->selection_name." = ".$new_name." <br>";

			$new_dd = array( 'selection_name' => $new_name );
			$this->db->where('id',$dd->id);
			$this->db->update($tb,$new_dd);
		}
	} // x fn


	function replace_name_tb($tb="corridas_cavalos_usa_2021"){
		$this->db->query("delete from corridas_cavalos_usa_2021 where selection_name like '%lengths%'");
		$this->db->query("delete from corridas_cavalos_usa_2021 where event_name = 'Reverse FC'");
		$this->db->query("delete from corridas_cavalos_usa_2021 where event_name = 'Forecast'");
		$this->db->query("delete from corridas_cavalos_usa_2021 where event_name = 'Reverse Forecast'");
		$this->db->query("delete from corridas_cavalos_usa_2021 where event_name = 'Rrverse FC'");
		$this->db->query("delete from corridas_cavalos_usa_2021 where selection_name like '%£%'");
		$this->db->query("delete from corridas_cavalos_usa_2021 where event_name like '%Forecsat%'");
		$this->db->query("delete from corridas_cavalos_usa_2021 where selection_name = 'yes'");
		$this->db->query("delete from corridas_cavalos_usa_2021 where selection_name = 'no'");

		
		$qr = $this->db->query("SELECT * FROM $tb ORDER BY selection_name asc LIMIT 100000");

		foreach($qr->result() as $dd){
			$arr_replace = array( 
				"1. ", 
				"2. ",
				"3. ", 
				"4. ", 
				"5. ", 
				"6. ", 
				"7. ", 
				"8. ", 
				"9. ", 
				"10. ", 
				"11. ", 
				"12. ", 
				"13. ", 
				"14. ", 
				"15. ", 
				"16. ", 
				"17. ", 
				"18. "
			);
			$new_name = str_replace($arr_replace, "", $dd->selection_name);
			echo $dd->selection_name." = ".$new_name." <br>";

			$new_dd = array( 'selection_name' => $new_name );
			$this->db->where('id',$dd->id);
			$this->db->update($tb,$new_dd);
		}
	} // x fn


	function set_ordem_horses_mae_usa(){
		#$qr_distinct = $this->db->query("SELECT DISTINCT event_id FROM corridas_cavalos_usa_2015 WHERE ordem = 0 LIMIT 500");
		$qr_distinct = $this->db->query("SELECT DISTINCT event_id FROM corridas_cavalos_usa WHERE ordem = 0 LIMIT 20000");
		echo "<h1>".$qr_distinct->num_rows()."</h1>";
		if($qr_distinct->num_rows() > 0){
			foreach($qr_distinct->result() as $corrida){
				$this->db->where('event_id',$corrida->event_id);
				$this->db->order_by('bsp','asc');
				$qr_horses = $this->db->get('corridas_cavalos_usa');
				if($qr_horses->num_rows() > 0){
					$numero = 0;
					echo "<ul>";
					foreach($qr_horses->result() as $horse){ $numero++;
						$dd_numero = array(
							'ordem' => $numero
						);
						$this->db->where('id',$horse->id);
						#$this->db->update('corridas_cavalos_gb',$dd_numero);
						$this->db->update('corridas_cavalos_usa',$dd_numero);

						echo "<li> (<b>$numero</b>) ".$horse->selection_id." - ".$horse->selection_name." <strong> @".$horse->bsp." </strong> </li>";
					}
					echo "</ul>";
				}
			}
		}
		echo "<br />";
		echo "OK";
	}


	function set_data_mae_usa(){
		#echo "OK!";
		#return false;
		$qr = $this->db->query("SELECT * FROM corridas_cavalos_usa WHERE data_evento IS NULL ORDER BY id asc LIMIT 50000 ");
		#$qr = $this->db->query("SELECT * FROM corridas_cavalos WHERE datahora_evento IS NULL AND (data_evento BETWEEN '2019-01-01' AND '2019-12-31')   ORDER BY data_evento desc LIMIT 50000 ");
		#$qr = $this->db->query("SELECT * FROM corridas_cavalos_usa_2015 WHERE data_evento = '0000-00-00' LIMIT 50 ");
		foreach($qr->result() as $dd){
			$data = substr($dd->event_dt,0,10);

			$dia = substr($dd->event_dt,0,2);
			$mes = substr($dd->event_dt,3,2);
			$ano = substr($dd->event_dt,6,4);

			$hora = substr($dd->event_dt,10,6).":00";



			$data_trat = $ano."-".$mes."-".$dia;
			echo "<h1>".$dd->id."</h1>";
			echo "<strong>".$ano."-".$mes."-".$dia." $hora</strong>";
			echo "<br />";



			$dd_data = array('data_evento' => $data_trat);
			$dd_data['datahora_evento'] =  $data_trat." ".$hora;
			#$dd_data = array('datahora_evento' => $data_trat." ".$hora);
			print_r($dd_data);
			echo "<br>";
			$this->db->where('id',$dd->id);
			if($this->db->update('corridas_cavalos_usa',$dd_data)){
				echo "foooooi";
			}else{
				echo "naaaaaaaao";
			}
		}
		echo $qr->num_rows();
	}


function csv_attherace(){
		$meuArray = Array();
	
		// MANUPUILANDO DIRETORIOS		
		$path = 'csv_atr/';
		
		$directory = new RecursiveDirectoryIterator( $path );
		$cont = 0;
		foreach ($directory as $file) { $cont++;
		 
		    echo $file->getFileName();
		    echo "<br>";

			// x man dir
			$row = 1;
			$cont_cel = 0;
			$reg = 0;
			if (($handle = fopen($path."".$file->getFileName(), "r")) !== FALSE)
			{
			  //Passagem pelas linhas
			  while (($data = fgetcsv($handle, null, ",")) !== FALSE)
			  {
			      $dd_insert = [];
			      $num = count($data);
			      $row++;
			      // Passagem pelas colunas
			      for ($col = 0; $col < $num; $col++)
			      {
			      	   $cont_cel++;
			          //  DEFININDO CAMPOS DA TABELA DO  DB
			          if($reg > 0){

				          if($cont_cel == 1){
				          	$nm_horse = str_replace("'", "", $data[$col]);
				          	$dd_insert['cavalo'] = $nm_horse;
				          	$dd_where['cavalo'] = $nm_horse;
				          	
				          }
				          if($cont_cel == 2){
				          	$dd_insert['data'] = $data[$col];
				          	#$mes = $data[$col];
				          	#$mes = str_replace("", "set", $mes);
				          	
				          	$dd_where['data'] = str_replace(".", "", $data[$col]);
				          	#$dd_where['data'] = str_replace("Aug", "ago", $dd_where['data']);
				          	#$dd_where['data'] = str_replace("Sep", "set", $dd_where['data']);
				          	#$dd_where['data'] = $data[$col];

				          }
				          
				          if($cont_cel == 3){
				          	$dd_insert['pista'] = $data[$col];
				          	
				          }
				          if($cont_cel == 4){
				          	$dd_insert['distancia'] = $data[$col];
				          }
				          
				          if($cont_cel == 5){
				          	$dd_insert['going'] = $data[$col];
				          }
				          if($cont_cel == 6){
				          	$dd_insert['tipologia'] = $data[$col];
				          }				         
				          if($cont_cel == 7){
				          	$dd_insert['premio'] = $data[$col];
				          }
				          if($cont_cel == 8){
				          	$dd_insert['peso_carregado'] = $data[$col];
				          }
				          if($cont_cel == 9){
				          	$dd_insert['info_adicional'] = $data[$col];
				          }

				          if($cont_cel == 10){
				          	$dd_insert['classificacao'] = $data[$col];
				          }

				          if($cont_cel == 11){
				          	#$dd_insert['bsp'] = $data[$col];
				          	$dd_insert['posicionamento'] = $data[$col];
				          }
				  
				          

				          if($cont_cel == 12){
				          	#$dd_insert['jockey'] = $data[$col];
				          	$dd_insert['odd'] = $data[$col];
				          }
				          
				          
				          if($cont_cel == 13){
				          	#$dd_insert['or'] = $data[$col];
				          	#$dd_insert['ts'] = $data[$col];
				          	#$nm_jockey = str_replace("'", "", $data[$col]);
				          	$dd_insert['jockey'] = $data[$col];
				          }
				          if($cont_cel == 14){
				          	#$dd_insert['ts'] = $data[$col];
				          	$dd_insert['or'] = $data[$col];
				          }

				          if($cont_cel == 15){
				          	$dd_insert['ts'] = $data[$col];
				          }

				          if($cont_cel == 16){
				          	$dd_insert['rpr'] = $data[$col];
				          }

				          if($cont_cel == 17){
				          	$dd_insert['corredores'] = $data[$col];
				          }

				          if($cont_cel == 18){
				          	$dd_insert['tipo'] = $data[$col];
				          }
				          
				          
				        $dd_insert['foi_corredores'] = 0;
				        $dd_insert['foi_classe'] = 0;
				        $dd_insert['foi_bsp'] = 0;
				        $dd_insert['foi_event_id_place'] = 0;
				        #$dd_insert['foi_corredores'] = 0;
	
				          // nomeia o arqvuivo font
				          $dd_insert['arq'] = $file->getFileName();
				          
				      }
			          echo 'Linhainha: '.$row.' e na Coluna: '.$data[$col] . " ($col - <b>$cont_cel</b>) <br />\n";
			         
			          if($cont_cel == 18){

			          	if($reg > 0 && $dd_insert['cavalo'] != '------------------------------') {
			          		$this->db->where($dd_where);
			          		// corridas_cavalos_gb
			          		$qr_row = $this->db->get("cavalos_hist_dia");
			          		if($qr_row->num_rows() == 0){
					          	$this->db->insert('cavalos_hist_dia' , $dd_insert);		
					          	echo "<h1 style='color:blue'>DEU INSERT</h1>";			          	
					        }else{
					        	$this->db->where($dd_where);
				          		$qr_row = $this->db->update("cavalos_hist_dia",$dd_insert);
					        	echo "<h1 style='color:red'>DEU UPDATE</h1>";			          	
					        }
				        }


			          	$cont_cel = 0;
			          	$reg++;
			          	echo "<br>REG: <b>$reg</b><hr>";
			          	print_r($dd_insert);

			          	echo "<br />";
			          	array_shift($dd_insert);
			          }    
			      } // x for
			  } // x while
			  unlink($path."".$file->getFileName());
			  fclose($handle);
			} // x if handle
		if($cont > 10){
		    	#return false;
		    }
		} // x laço q percorre os arquivos


	} // x fn





	function set_hist_dia_em_hist_usa(){
		#echo "OK 1";
		#$qr = $this->db->query("select * from cavalos_hist_dia where (data_trat BETWEEN '".date("Y-m-d")."00:00:01' AND '".date("Y-m-d")."23:59:59') ");
		#$qr = $this->db->query("select * from cavalos_hist_dia where data_trat = '".date("Y-m-d")."'");
		
		echo date("Y-m-d");
		echo "<br />";
		echo "<br />";

		$qr = $this->db->query("select * from cavalos_hist_dia where data_trat >= '".date("Y-m-d")."'");

		#$qr = $this->db->query("select * from cavalos_hist_dia where cavalo = 'Hardly Useless'");

		
		#$qr = $this->db->query("select * from cavalos_hist_dia where data_trat = '2021-07-20'");

		echo $qr->num_rows();
		echo "<br />";
		if($qr->num_rows() > 0){
			foreach($qr->result() as $dd){
				$where_hist = array(
					'data_trat' => $dd->data_trat,
					'cavalo' => $dd->cavalo
				);
				$this->db->where($where_hist);
				$qr_hist = $this->db->get('cavalos_hist_dia');

				echo "<p style='color:red'>";
				 print_r($dd);
				echo "	</p>";


				$dd_sincr = array(
					
					'id_mkt' => $dd->id_mkt,
					'tipologia' => $dd->tipologia,
					'idade' => $dd->idade,
					'classificacao' => $dd->classificacao,
					'premio' => $dd->premio,
					'classe' => $dd->classe,
					'going' => $dd->going,
					'jockey' => $dd->jockey,
					'treinador'  => $dd->treinador,
					'thr' => $dd->thr,
					'fav'  => $dd->fav
				);
				// if going != ""{ n faz nada }
				$this->db->where($where_hist);
				$qr_ver_g = $this->db->get('cavalos_hist_usa' , $dd_sincr);
				echo "<h1>Tem: ".$qr_ver_g->num_rows()." </h1>";
				if($qr_ver_g->num_rows() == 0){
					unset($dd->id);
					$this->db->insert('cavalos_hist_usa' , $dd);
				}else{
					$going = $qr_ver_g->row()->going;
					#if($going == ""){
						$this->db->where($where_hist);
						$this->db->update('cavalos_hist_usa' , $dd_sincr);
					#}
				}
				
				
				echo "<h1>".$dd->cavalo."</h1>";

				echo "<h2 style='color:red'>".$qr_hist->num_rows()."</h2>";
				echo "<p>";
				#print_r($dd);
				print_r($dd_sincr);
				echo "</p>";
				echo "<br />";
				echo "<p>";
				echo "<strong>Classe:".$dd->classe."</strong><br>";
				echo "<strong>going:".$dd->going."</going><br>";
				echo "<strong>info_adicional:".$dd->info_adicional."</strong><br>";
				echo "<strong>comentario:".$dd->comentario."</strong><br>";
				
				
				
				echo "</p>";
				echo "<br />";

			}
		}
		echo "OK 2";

		$n = 9;
		$status_checkin = array('status' => 1);
		$this->db->where('id',$n);
		$this->db->update('cron_checkin' , $status_checkin);

	}



function separa_y_horse(){

	$qr = $this->db->query("select DISTINCT classe from cavalos_hist_usa");
	#comentado por augusto
	#$qr = $this->db->query("select DISTINCT classe from cavalos_hist_usa WHERE idade IS NULL and (classe IS NOT NULL and classe <> '')");
	foreach($qr->result() as $dd){
		#$idade = explode("y", $dd->tipo);
		$count = strlen($dd->classe);
		$idade = explode("y", $dd->classe);
		#echo $idade[0];
		echo $dd->classe."  (<strong>".$count.")</strong>";
		echo ' ----------- ';
		if (mb_strpos($dd->classe, 'y') !== false) {
			$pos      = strripos($dd->classe, "y");
			$de = $pos - 1;
			$y = substr($dd->classe,$de,2);
			$idade_sem_y = str_replace("y", "", $y);
			echo "Y ==== ".$pos." ===== ".$y;
			$new_y = array('idade' => $idade_sem_y);
			$this->db->where('classe',$dd->classe);
			$this->db->update("cavalos_hist_usa" , $new_y);
		}
		
		echo "<br />";
		
	}

}



function resolve_classe(){
	$qr = $this->db->query("SELECT DISTINCT sigla,id_classe FROM classe WHERE sigla <> 'L' AND  sigla <> 'FFF' ");
	#$qr = $this->db->query("SELECT DISTINCT sigla FROM classe WHERE sigla = 'C5' ");
	$where_rem = "";
	foreach($qr->result() as $dd){
		$where_rem .= "AND classe NOT LIKE '%".$dd->sigla."%'";

		#augusto adicionou classe IS NOT NULL
		$qr_hist = $this->db->query("SELECT *  FROM cavalos_hist_usa WHERE classe LIKE '%".$dd->sigla."%' AND foi_classe = 0 and classe IS NOT NULL");
		#$qr_hist = $this->db->query("SELECT *  FROM cavalos_hist_usa WHERE id = 11099 ");
		#$qr_hist = $this->db->query("SELECT *  FROM cavalos_hist_usa WHERE id = 18054 ");
		if($qr_hist->num_rows() > 0){

			foreach($qr_hist->result() as $dd2){
				#$this->db->query("UPDATE cavalos_hist_usa SET  classe = '".$dd->sigla."' , classe_ = '".$dd2->classe."' , foi_classe = 1 WHERE classe LIKE '%".$dd->sigla."%' ");
				$this->db->query("UPDATE cavalos_hist_usa SET  classe = '".$dd->id_classe."' , classe_ = '".$dd2->classe."' , foi_classe = 1 WHERE classe LIKE '%".$dd->sigla."%' ");
				

				#$this->db->query("UPDATE cavalos_hist_usa SET classe_ = '".$dd->sigla."' , classe_ = '".$dd->sigla."' WHERE id LIKE '".$dd->id."' ");
				#$this->db->query("UPDATE cavalos_hist_usa SET classe_ = '".$dd->sigla."' , classe_ = '".$dd->sigla."' WHERE id = '".$dd2->id."' ");
				#$this->db->query("UPDATE cavalos_hist_usa SET classe_ =  classe_ = '".$dd->sigla."' WHERE id = '".$dd2->id."' ");
				echo "Sigla: ".$dd->sigla." rows: ".$qr_hist->num_rows()." ".$dd2->classe." ID: ".$dd2->id;
				echo "<br>";
			}	
		}

		#return false;

		#$qr_hist_rem = $this->db->query("SELECT *  FROM cavalos_hist_usa WHERE classe <> 'L' AND foi_classe = 0 ");

		

		//UPDATE `wwtrad_ts`.`cavalos_hist_usa` SET `classe`='C4' WHERE `id`=16;
		#$this->db->query("UPDATE cavalos_hist_usa SET classe_ = '".$dd->sigla."' , classe_ = '".$dd->sigla."' WHERE classe LIKE '".$dd->sigla."' ");
		#$this->db->query("UPDATE cavalos_hist_usa SET classe_ = '".$dd->sigla."' , classe_ = '".$dd->sigla."' WHERE id LIKE '".$dd->id."' ");

		
	}
	$qr_hist_rem = $this->db->query("SELECT *  FROM cavalos_hist_usa WHERE classe <> 'L' ".$where_rem." AND foi_classe = 0  AND classe IS NOT NULL");
	echo "<br><hr>";
	echo "<h1>".$qr_hist_rem->num_rows()."</h1>";		
	echo "<br><hr>";
	foreach($qr_hist_rem->result() as $dd_rem){
		echo $id_rem = $dd_rem->id;
		echo $dd_rem = $dd_rem->classe;
		echo "<br>";
		print_r($id_rem); 
		echo "<br>";
		$dd_new_class = array('classe' => "" , 'classe_' => $dd_rem);
		print_r($dd_new_class); 
		$this->db->where('id',$id_rem);
		$this->db->update('cavalos_hist_usa' , $dd_new_class);

		echo "<br>";
	}

}


	function resolve_classe_vazia(){

		$this->db->query("UPDATE cavalos_hist_usa SET foi_classe = REPLACE(foi_classe, 0, 1) WHERE classe = '' or classe = 'L'");


			echo "<br>";




	}


function converte_data_str(){
	#$qr = $this->db->query("SELECT id,data FROM cavalos_hist_usa WHERE hora IS NULL");
	$qr = $this->db->query("SELECT id,data FROM cavalos_hist_dia WHERE data_trat IS NULL OR data_trat = '0000-00-00' ");
	echo $qr->num_rows();
	foreach($qr->result() as $dd){
		$data = str_replace(".","", $dd->data);
		$data = str_replace("-","", $data);
		echo $data." = ";

		if(strlen($data) == 6){
			$data = "0".$data;
		}

		$dia = substr($data, 0,2);
		$mes = substr($data, 2,3);
		$ano = substr($data, 5,2);
		if($mes == "jan" || $mes == "Jan"){
			$mes = "01";
		}
		if($mes == "Feb" || $mes == "Feb"){
			$mes = "02";
		}
		if($mes == "mar" || $mes == "Mar"){
			$mes = "03";
		}
		if($mes == "Apr" || $mes == "apr"){
			$mes = "04";
		}
		if($mes == "May" || $mes == "may"){
			$mes = "05";
		}
		if($mes == "jun" || $mes == "Jun"){
			$mes = "06";
		}
		if($mes == "jul" || $mes == "Jul"){
			$mes = "07";
		}
		if($mes == "Aug" || $mes == "aug"){
			$mes = "08";
		}
		if($mes == "Sep" || $mes == "sep"){
			$mes = "09";
		}
		if($mes == "Oct" || $mes == "oct"){
			$mes = "10";
		}
		if($mes == "nov" || $mes == "Nov"){
			$mes = "11";
		}
		if($mes == "Dec" || $mes == "dec"){
			$mes = "12";
		}
		if($ano > 50){
			$data_trat = "19".$ano."-".$mes."-".$dia;
		}else{
			$data_trat = "20".$ano."-".$mes."-".$dia;
		}
		echo $data_trat;
		echo "<br>";
		$dd_data = array("data_trat" => $data_trat);
		$this->db->where('id',$dd->id);
		$this->db->update("cavalos_hist_dia" , $dd_data);
	}
}


	function replace_win_place_corredores(){


		$this->db->query("UPDATE cavalos_hist_dia SET  foi_event_id_place= REPLACE(foi_event_id_place, 1, 0) where classificacao < '5' and win_place = '0' and corredores is null;");
		

	}



	function get_distancias_horse(){

		$qr = $this->db->query("SELECT DISTINCT(distancia) FROM cavalos_hist_dia ORDER BY distancia asc");

		echo $qr->num_rows();

		echo "<br />";

		foreach($qr->result() as $dd){

			print_r($dd);

			echo "<br /><hr />";

			$dist_trat = str_replace(["½"], "", $dd->distancia);
			$dist_trat = str_replace(["f"], "", $dist_trat);
			#$dist_trat = str_replace(["f" , "½"], "", $dd->distancia); comentado por augusto

			$this->db->where("distancia",$dd->distancia);

			$qr_runs_dist = $this->db->get('cavalos_hist_dia');

			echo $dd->distancia." = ".$dist_trat." ".$qr_runs_dist->num_rows();

			echo "<br />";

			$dd_distancia_trat = array('distancia_trat' => $dist_trat);

			$this->db->where('distancia',$dd->distancia);

			$this->db->update("cavalos_hist_dia" , $dd_distancia_trat);

		}

	}



	function replace_peso_carregado(){


		$this->db->query("UPDATE cavalos_hist_dia SET  peso_carregado = REPLACE(peso_carregado, '-', '.')");
		

	}


 function peso_carregado(){
  	$this->db->where('foi_peso',"0");
  	$qr = $this->db->get('cavalos_hist_dia');
  	#print_r($qr->result());
  	foreach($qr->result() as $dd){
  		$peso_carregado = $dd->peso_carregado;
  		$peso_carregado = $peso_carregado / 2.2046;				
  		echo $peso_carregado." ==== ".$peso_carregado;
  		$dd_peso_carregado = array('peso_carregado' => $peso_carregado , 'foi_peso' => 1);
  		$this->db->where('id',$dd->id);
  		$this->db->update('cavalos_hist_dia' , $dd_peso_carregado);
  		echo "<br>";
 
  		
  	}
  	 
 
  }


	function get_id_evento_horses(){



		#$qr_event_id = $this->db->query("SELECT * FROM cavalos_hist_usa WHERE event_id = 0");

		#$dd_foi = array('foi_event_id' => 0);

		#$this->db->where("event_id",0);

		#$this->db->update("cavalos_hist_usa" , $dd_foi);

		#echo "<h1>".$qr_event_id->num_rows()."</h1>";

		#return false;

		#$qr_horses = $this->db->query("SELECT * FROM cavalos_hist_usa WHERE cavalo <> '' AND foi_event_id = 0 LIMIT 300");

		

		$qr_horses = $this->db->query("SELECT * FROM cavalos_hist_usa WHERE  foi_event_id = 0 AND data_trat > '2008-12-31' ORDER BY id desc  LIMIT 50000");



		#$qr_horses = $this->db->query("SELECT * FROM cavalos_hist_usa WHERE  event_id = 303 ");





		echo $qr_horses->num_rows();

		echo "<br><br>";

		#print_r($qr_horses->result());

		echo "<br><br>";

		foreach($qr_horses->result() as $hor){



			echo "<p style='color:red'>";

			echo "<strong>".$hor->pista."</strong><br>";

			$pista = str_replace("'", "\'", $hor->pista);

			$qr_pistas = $this->db->query("SELECT * FROM pistas WHERE  nome_thr_post = '".$pista."' OR nome = '".$pista."' OR  sigla_racingpost1 = '".$pista."' OR  sigla_racingpost2 = '".$pista."' OR  sigla_racingpost3 = '".$pista."'");



			echo "(".$qr_pistas->num_rows().")";

			if($qr_pistas->num_rows() == 0){

				$dd_event_id_n_existe = array('event_id' => 303, 'foi_event_id' => 1);

				$this->db->where('id',$hor->id);

				$this->db->update("cavalos_hist_usa" , $dd_event_id_n_existe);

			}



			echo "</p>";



			$nm_cavalo = str_replace("'", "", $hor->cavalo);


			$qr_csv = $this->db->query("SELECT * FROM corridas_cavalos_usa WHERE selection_name = '".$nm_cavalo."' AND data_evento = '".$hor->data_trat."' ");



			$qr_csv_ire = $this->db->query("SELECT * FROM corridas_cavalos_usa WHERE selection_name = '".$nm_cavalo."' AND data_evento = '".$hor->data_trat."' ");



			echo $hor->cavalo." - ".$hor->data_trat." "."<br>";



			echo $qr_csv->num_rows();

			echo "<br><br>";



			echo $qr_csv_ire->num_rows();



			echo "<br><br>";

			

			if($qr_csv->num_rows() > 0){

				echo "<h1> GB ".$hor->id." - ".$hor->cavalo." (".$qr_csv->num_rows().") </h1> ";

				if($qr_csv->num_rows() > 0){

					foreach($qr_csv->result() as $dd_csv){

						echo  "<h3>event_id: ".$dd_csv->event_id." </h3>";

						$dd_id = array("event_id" => $dd_csv->event_id);

						$this->db->where('id',$hor->id);

						$this->db->update("cavalos_hist_usa" , $dd_id);



					}

				}

				#$dd_foi = array('foi_event_id' => 1);

				#$this->db->where('id',$hor->id);

				#$this->db->update("cavalos_hist_usa" , $dd_foi);

				

				echo "<br />";

				print_r($hor);

				echo "<br /><hr />";

			}

			

			

			if($qr_csv_ire->num_rows() > 0){

				echo "<h1> IRE ".$hor->id." - ".$hor->cavalo." (".$qr_csv_ire->num_rows().") </h1> ";

				if($qr_csv_ire->num_rows() > 0){

					foreach($qr_csv_ire->result() as $dd_csv){

						echo  "<h3>event_id: ".$dd_csv->event_id." </h3>";

						$dd_id = array("event_id" => $dd_csv->event_id);

						$this->db->where('id',$hor->id);

						$this->db->update("cavalos_hist_usa" , $dd_id);



					}

				}

				

				

				echo "<br />";

				print_r($hor);

				echo "<br /><hr />";

			}



			$dd_foi = array('foi_event_id' => 1);

			$this->db->where('id',$hor->id);

			$this->db->update("cavalos_hist_usa" , $dd_foi);

			

		} // x foreach

	}



	function get_id_evento_horses1(){



		#$qr_event_id = $this->db->query("SELECT * FROM cavalos_hist_usa WHERE event_id = 0");

		#$dd_foi = array('foi_event_id' => 0);

		#$this->db->where("event_id",0);

		#$this->db->update("cavalos_hist_usa" , $dd_foi);

		#echo "<h1>".$qr_event_id->num_rows()."</h1>";

		#return false;

		#$qr_horses = $this->db->query("SELECT * FROM cavalos_hist_usa WHERE cavalo <> '' AND foi_event_id = 0 LIMIT 300");

		

		$qr_horses = $this->db->query("SELECT * FROM cavalos_hist_usa WHERE  foi_event_id = 0 AND data_trat > '2008-12-31' ORDER BY id asc  LIMIT 50000");



		#$qr_horses = $this->db->query("SELECT * FROM cavalos_hist_usa WHERE  event_id = 303 ");





		echo $qr_horses->num_rows();

		echo "<br><br>";

		#print_r($qr_horses->result());

		echo "<br><br>";

		foreach($qr_horses->result() as $hor){



			echo "<p style='color:red'>";

			echo "<strong>".$hor->pista."</strong><br>";

			$pista = str_replace("'", "\'", $hor->pista);

			$qr_pistas = $this->db->query("SELECT * FROM pistas WHERE  nome_thr_post = '".$pista."' OR nome = '".$pista."' OR  sigla_racingpost1 = '".$pista."' OR  sigla_racingpost2 = '".$pista."' OR  sigla_racingpost3 = '".$pista."'");



			echo "(".$qr_pistas->num_rows().")";

			if($qr_pistas->num_rows() == 0){

				$dd_event_id_n_existe = array('event_id' => 303, 'foi_event_id' => 1);

				$this->db->where('id',$hor->id);

				$this->db->update("cavalos_hist_usa" , $dd_event_id_n_existe);

			}



			echo "</p>";



			$nm_cavalo = str_replace("'", "", $hor->cavalo);


			$qr_csv = $this->db->query("SELECT * FROM corridas_cavalos_usa WHERE selection_name = '".$nm_cavalo."' AND data_evento = '".$hor->data_trat."' ");



			$qr_csv_ire = $this->db->query("SELECT * FROM corridas_cavalos_usa WHERE selection_name = '".$nm_cavalo."' AND data_evento = '".$hor->data_trat."' ");



			echo $hor->cavalo." - ".$hor->data_trat." "."<br>";



			echo $qr_csv->num_rows();

			echo "<br><br>";



			echo $qr_csv_ire->num_rows();



			echo "<br><br>";

			

			if($qr_csv->num_rows() > 0){

				echo "<h1> GB ".$hor->id." - ".$hor->cavalo." (".$qr_csv->num_rows().") </h1> ";

				if($qr_csv->num_rows() > 0){

					foreach($qr_csv->result() as $dd_csv){

						echo  "<h3>event_id: ".$dd_csv->event_id." </h3>";

						$dd_id = array("event_id" => $dd_csv->event_id);

						$this->db->where('id',$hor->id);

						$this->db->update("cavalos_hist_usa" , $dd_id);



					}

				}

				#$dd_foi = array('foi_event_id' => 1);

				#$this->db->where('id',$hor->id);

				#$this->db->update("cavalos_hist_usa" , $dd_foi);

				

				echo "<br />";

				print_r($hor);

				echo "<br /><hr />";

			}

			

			

			if($qr_csv_ire->num_rows() > 0){

				echo "<h1> IRE ".$hor->id." - ".$hor->cavalo." (".$qr_csv_ire->num_rows().") </h1> ";

				if($qr_csv_ire->num_rows() > 0){

					foreach($qr_csv_ire->result() as $dd_csv){

						echo  "<h3>event_id: ".$dd_csv->event_id." </h3>";

						$dd_id = array("event_id" => $dd_csv->event_id);

						$this->db->where('id',$hor->id);

						$this->db->update("cavalos_hist_usa" , $dd_id);



					}

				}

				

				

				echo "<br />";

				print_r($hor);

				echo "<br /><hr />";

			}



			$dd_foi = array('foi_event_id' => 1);

			$this->db->where('id',$hor->id);

			$this->db->update("cavalos_hist_usa" , $dd_foi);

			

		} // x foreach

	}





	function get_selection_id_horses($pais="gb",$ord="asc"){



		#$qr_event_id = $this->db->query("SELECT * FROM cavalos_hist WHERE event_id = 0");

		#$dd_foi = array('foi_event_id' => 0);

		#$this->db->where("event_id",0);

		#$this->db->update("cavalos_hist" , $dd_foi);

		#echo "<h1>".$qr_event_id->num_rows()."</h1>";

		#return false;

		#$qr_horses = $this->db->query("SELECT * FROM cavalos_hist WHERE cavalo <> '' AND foi_event_id = 0 LIMIT 300");

		
		if($pais == "gb"){
			$tb = 'cavalos_hist';
		}

		if($pais == "usa"){
			$tb = 'cavalos_hist_usa';
		}

		$qr_horses = $this->db->query("SELECT * FROM $tb WHERE  foi_selectionid = 0 ORDER BY id $ord LIMIT 50000");



		#$qr_horses = $this->db->query("SELECT * FROM cavalos_hist WHERE  cavalo = 'War Thunder'");



		echo $qr_horses->num_rows();

		echo "<br><br>";

		foreach($qr_horses->result() as $hor){

			// COLLATE latin1_swedish_ci
			$cavalo_str_trat = str_replace("'", "", $hor->cavalo);
			

			#$qr_csv = $this->db->query('SELECT * FROM corridas_cavalos_gb WHERE selection_name = "'.$cavalo_str_trat.'" AND data_evento = "'.$cavalo_str_trat.'"  ');
			#$qr_csv_ire = $this->db->query('SELECT * FROM corridas_cavalos_ire WHERE selection_name = "'.$cavalo_str_trat.'" AND data_evento = "'.$cavalo_str_trat.'"  ');

			if($pais == "usa"){

					$qr_csv = $this->db->query("SELECT * FROM corridas_cavalos_usa WHERE selection_name = '".$hor->cavalo."' AND data_evento = '".$hor->data_trat."' ");

				if($qr_csv->num_rows() > 0){

					foreach($qr_csv->result() as $dd_csv){
						echo  "<h3>event_id: ".$dd_csv->event_id." </h3>";
						$dd_bsp = array("selection_id" => $dd_csv->selection_id);
						$this->db->where('id',$hor->id);
						$this->db->update($tb , $dd_bsp);
						print_r($dd_csv);
						echo "<br />";
						echo "<br /><hr />";
					} // x foreach

				} // x if num_rows

			} // xc if usa


			if($pais == "gb"){


				$qr_csv_ire = $this->db->query("SELECT * FROM corridas_cavalos_gb WHERE selection_name = '".$hor->cavalo."'");

				$qr_csv = $this->db->query("SELECT * FROM corridas_cavalos_ire WHERE selection_name = '".$hor->cavalo."'");


				echo "<h1>".$hor->id." - ".$hor->cavalo." (".$qr_csv->num_rows()." GB) </h1> ";
				echo "<h1 style='color:orange'>".$hor->id." - ".$hor->cavalo." (".$qr_csv_ire->num_rows()." IRE) </h1> ";

				if($qr_csv->num_rows() > 0){

					foreach($qr_csv->result() as $dd_csv){

						echo  "<h3>event_id: ".$dd_csv->event_id." </h3>";

						$dd_bsp = array("selection_id" => $dd_csv->selection_id);

						$this->db->where('id',$hor->id);

						$this->db->update($tb , $dd_bsp);

						print_r($dd_csv);

						echo "<br />";

						echo "<br /><hr />";



					}

				}



				if($qr_csv_ire->num_rows() > 0){

					foreach($qr_csv_ire->result() as $dd_csv_ire){

						echo  "<h3>event_id: ".$dd_csv_ire->event_id." </h3>";

						$dd_bsp_ire = array("selection_id" => $dd_csv_ire->selection_id);

						$this->db->where('id',$hor->id);

						$this->db->update($tb , $dd_bsp_ire);

						print_r($dd_csv_ire);

						echo "<br />";

						echo "<br /><hr />";



					}

				}
			}







			$dd_foi = array('foi_selectionid' => 1);

			$this->db->where('id',$hor->id);

			$this->db->update("cavalos_hist" , $dd_foi);

			

		}

	}


 function get_hora_cavalos_hist(){



		$qr_horses = $this->db->query("SELECT * FROM cavalos_hist_usa WHERE  foi_datahora_evento = 0 LIMIT 50000");



		echo $qr_horses->num_rows();

		echo "<br><br>";

		foreach($qr_horses->result() as $hor){

			// COLLATE latin1_swedish_ci
			$cavalo_str_trat = str_replace("'", "", $hor->cavalo);
			

			#$qr_csv = $this->db->query('SELECT * FROM corridas_cavalos_gb WHERE selection_name = "'.$cavalo_str_trat.'" AND data_evento = "'.$cavalo_str_trat.'"  ');
			#$qr_csv_ire = $this->db->query('SELECT * FROM corridas_cavalos_ire WHERE selection_name = "'.$cavalo_str_trat.'" AND data_evento = "'.$cavalo_str_trat.'"  ');



			$qr_csv_ire = $this->db->query("SELECT * FROM corridas_cavalos_gb WHERE selection_name = '".$hor->cavalo."' AND data_evento = '".$hor->data_trat."'  ");

			$qr_csv = $this->db->query("SELECT * FROM corridas_cavalos_ire WHERE selection_name = '".$hor->cavalo."' AND data_evento = '".$hor->data_trat."' ");



			echo "<h1>".$hor->id." - ".$hor->cavalo." (".$qr_csv->num_rows()." GB) </h1> ";

			echo "<h1 style='color:orange'>".$hor->id." - ".$hor->cavalo." (".$qr_csv_ire->num_rows()." IRE) </h1> ";





			if($qr_csv->num_rows() > 0){

				foreach($qr_csv->result() as $dd_csv){

					echo  "<h3>event_id: ".$dd_csv->event_id." </h3>";

					$dd_datahora_evento = array("hora" => $dd_csv->datahora_evento);

					$this->db->where('id',$hor->id);

					$this->db->update("cavalos_hist_usa" , $dd_datahora_evento);

					print_r($dd_csv);

					echo "<br />";

					echo "<br /><hr />";



				}

			}



			if($qr_csv_ire->num_rows() > 0){

				foreach($qr_csv_ire->result() as $dd_csv_ire){

					echo  "<h3>event_id: ".$dd_csv_ire->event_id." </h3>";

					$dd_datahora_evento_ire = array("hora" => $dd_csv_ire->datahora_evento);

					$this->db->where('id',$hor->id);

					$this->db->update("cavalos_hist_usa" , $dd_datahora_evento_ire);

					print_r($dd_csv_ire);

					echo "<br />";

					echo "<br /><hr />";



				}

			}



			$dd_foi = array('foi_datahora_evento' => 1);

			$this->db->where('id',$hor->id);

			$this->db->update("cavalos_hist_usa" , $dd_foi);

			

		}

	}


	function replace_corredores_nulos(){


		$this->db->query("UPDATE cavalos_hist_usa SET  foi_corredores= REPLACE(foi_corredores, 1, 0) where event_id = '0' and corredores is null;");
		$this->db->query("UPDATE cavalos_hist_usa SET  foi_corredores= REPLACE(foi_corredores, 1, 0) where event_id > '303' and corredores is null;");
		

	}

function get_corredores_em_hist(){



		$qr_horses = $this->db->query("SELECT * FROM cavalos_hist_usa WHERE  foi_corredores = 0 LIMIT 50000");



		echo $qr_horses->num_rows();

		echo "<br><br>";

		foreach($qr_horses->result() as $hor){

			// COLLATE latin1_swedish_ci
			$event_id_str_trat = str_replace("'", "", $hor->event_id);
			


			$qr_csv_ire = $this->db->query("SELECT * FROM corridas_cavalos_gb WHERE event_id = '".$hor->event_id."' ");

			$qr_csv = $this->db->query("SELECT * FROM corridas_cavalos_ire WHERE event_id = '".$hor->event_id."' ");



			echo "<h1>".$hor->id." - ".$hor->event_id." (".$qr_csv->num_rows()." GB) </h1> ";

			echo "<h1 style='color:orange'>".$hor->id." - ".$hor->event_id." (".$qr_csv_ire->num_rows()." IRE) </h1> ";





			if($qr_csv->num_rows() > 0){

				foreach($qr_csv->result() as $dd_csv){

					echo  "<h3>event_id: ".$dd_csv->event_id." </h3>";

					$dd_corredores= array("corredores" => $dd_csv->corredores);

					$this->db->where('id',$hor->id);

					$this->db->update("cavalos_hist_usa" , $dd_corredores);

					print_r($dd_csv);

					echo "<br />";

					echo "<br /><hr />";



				}

			}



			if($qr_csv_ire->num_rows() > 0){

				foreach($qr_csv_ire->result() as $dd_csv_ire){

					echo  "<h3>event_id: ".$dd_csv_ire->event_id." </h3>";

					$dd_corredores_ire = array("corredores" => $dd_csv_ire->corredores);

					$this->db->where('id',$hor->id);

					$this->db->update("cavalos_hist_usa" , $dd_corredores_ire);

					print_r($dd_csv_ire);

					echo "<br />";

					echo "<br /><hr />";



				}

			}



			$dd_foi = array('foi_corredores' => 1);

			$this->db->where('id',$hor->id);

			$this->db->update("cavalos_hist_usa" , $dd_foi);

			

		}

	}




	function replace_bsp(){


		$this->db->query("UPDATE cavalos_hist_usa SET  foi_bsp= REPLACE(foi_bsp, 1, 0) where event_id > '303' and bsp = '0.00';");
		

	}

	function get_bsp_horses(){



		#$qr_event_id = $this->db->query("SELECT * FROM cavalos_hist_usa WHERE event_id = 0");

		#$dd_foi = array('foi_event_id' => 0);

		#$this->db->where("event_id",0);

		#$this->db->update("cavalos_hist_usa" , $dd_foi);

		#echo "<h1>".$qr_event_id->num_rows()."</h1>";

		#return false;

		#$qr_horses = $this->db->query("SELECT * FROM cavalos_hist_usa WHERE cavalo <> '' AND foi_event_id = 0 LIMIT 300");

		



		$qr_horses = $this->db->query("SELECT * FROM cavalos_hist_usa WHERE  foi_bsp = 0 LIMIT 50000");



		#$qr_horses = $this->db->query("SELECT * FROM cavalos_hist_usa WHERE  cavalo = 'War Thunder'");



		echo $qr_horses->num_rows();

		echo "<br><br>";

		foreach($qr_horses->result() as $hor){

			// COLLATE latin1_swedish_ci
			$cavalo_str_trat = str_replace("'", "", $hor->cavalo);
			

			#$qr_csv = $this->db->query('SELECT * FROM corridas_cavalos_gb WHERE selection_name = "'.$cavalo_str_trat.'" AND data_evento = "'.$cavalo_str_trat.'"  ');
			#$qr_csv_ire = $this->db->query('SELECT * FROM corridas_cavalos_ire WHERE selection_name = "'.$cavalo_str_trat.'" AND data_evento = "'.$cavalo_str_trat.'"  ');



			$qr_csv_ire = $this->db->query("SELECT * FROM corridas_cavalos_gb WHERE selection_name = '".$hor->cavalo."' AND data_evento = '".$hor->data_trat."'  ");

			$qr_csv = $this->db->query("SELECT * FROM corridas_cavalos_ire WHERE selection_name = '".$hor->cavalo."' AND data_evento = '".$hor->data_trat."' ");



			echo "<h1>".$hor->id." - ".$hor->cavalo." (".$qr_csv->num_rows()." GB) </h1> ";

			echo "<h1 style='color:orange'>".$hor->id." - ".$hor->cavalo." (".$qr_csv_ire->num_rows()." IRE) </h1> ";





			if($qr_csv->num_rows() > 0){

				foreach($qr_csv->result() as $dd_csv){

					echo  "<h3>event_id: ".$dd_csv->event_id." </h3>";

					$dd_bsp = array("bsp" => $dd_csv->bsp);

					$this->db->where('id',$hor->id);

					$this->db->update("cavalos_hist_usa" , $dd_bsp);

					print_r($dd_csv);

					echo "<br />";

					echo "<br /><hr />";



				}

			}



			if($qr_csv_ire->num_rows() > 0){

				foreach($qr_csv_ire->result() as $dd_csv_ire){

					echo  "<h3>event_id: ".$dd_csv_ire->event_id." </h3>";

					$dd_bsp_ire = array("bsp" => $dd_csv_ire->bsp);

					$this->db->where('id',$hor->id);

					$this->db->update("cavalos_hist_usa" , $dd_bsp_ire);

					print_r($dd_csv_ire);

					echo "<br />";

					echo "<br /><hr />";



				}

			}







			$dd_foi = array('foi_bsp' => 1);

			$this->db->where('id',$hor->id);

			$this->db->update("cavalos_hist_usa" , $dd_foi);

			

		}

	}


function get_ordem_bsp_em_hist(){



		$qr_horses = $this->db->query("SELECT * FROM cavalos_hist_usa WHERE  foi_ordem_bsp = 0 LIMIT 50000");


		echo $qr_horses->num_rows();

		echo "<br><br>";

		foreach($qr_horses->result() as $hor){

			// COLLATE latin1_swedish_ci
			$cavalo_str_trat = str_replace("'", "", $hor->cavalo);
			

			$qr_csv_ire = $this->db->query("SELECT * FROM corridas_cavalos_gb WHERE selection_name = '".$hor->cavalo."' AND data_evento = '".$hor->data_trat."'  ");

			$qr_csv = $this->db->query("SELECT * FROM corridas_cavalos_ire WHERE selection_name = '".$hor->cavalo."' AND data_evento = '".$hor->data_trat."' ");



			echo "<h1>".$hor->id." - ".$hor->cavalo." (".$qr_csv->num_rows()." GB) </h1> ";

			echo "<h1 style='color:orange'>".$hor->id." - ".$hor->cavalo." (".$qr_csv_ire->num_rows()." IRE) </h1> ";



			if($qr_csv->num_rows() > 0){

				foreach($qr_csv->result() as $dd_csv){

					echo  "<h3>event_id: ".$dd_csv->event_id." </h3>";

					$dd_ordem_bsp = array("ordem_bsp" => $dd_csv->ordem);

					$this->db->where('id',$hor->id);

					$this->db->update("cavalos_hist_usa" , $dd_ordem_bsp);

					print_r($dd_csv);

					echo "<br />";

					echo "<br /><hr />";



				}

			}



			if($qr_csv_ire->num_rows() > 0){

				foreach($qr_csv_ire->result() as $dd_csv_ire){

					echo  "<h3>event_id: ".$dd_csv_ire->event_id." </h3>";

					$dd_ordem_bsp_ire = array("ordem_bsp" => $dd_csv_ire->ordem);

					$this->db->where('id',$hor->id);

					$this->db->update("cavalos_hist_usa" , $dd_ordem_bsp_ire);

					print_r($dd_csv_ire);

					echo "<br />";

					echo "<br /><hr />";



				}

			}



			$dd_foi = array('foi_ordem_bsp' => 1);

			$this->db->where('id',$hor->id);

			$this->db->update("cavalos_hist_usa" , $dd_foi);

			

		}

	}


function atualiza_bsp_zero_usa($tb="corridas_cavalos_usa"){



		#$qr_horses = $this->db->query("SELECT * FROM corridas_cavalos_2018 WHERE data_evento = '2018-09-03' and selection_name = 'Iconic Knight'");
		$qr_horses = $this->db->query("SELECT * FROM $tb WHERE  bsp = 0.00 LIMIT 50000");



		echo $qr_horses->num_rows();

		echo "<br><br>";

		foreach($qr_horses->result() as $hor){

			// COLLATE latin1_swedish_ci
			$selection_name_str_trat = str_replace("'", "", $hor->selection_name);


			

			#$qr_csv_ire = $this->db->query("SELECT * FROM corridas_cavalos_gb WHERE selection_name = '".$hor->cavalo."' AND data_evento = '".$hor->data_trat."'  ");

			$qr_csv_hist = $this->db->query("SELECT * FROM cavalos_hist_usa WHERE cavalo = '".$hor->selection_name."' AND event_id = '".$hor->event_id."'  ");



			#echo "<h1>".$hor->id." - ".$hor->selection_name." (".$qr_csv->num_rows()." HIST) </h1> ";

			#print_r($hor);
			#return false;




			if($qr_csv_hist->num_rows() > 0){

				foreach($qr_csv_hist->result() as $dd_csv){

					echo  "<h3>event_id: ".$dd_csv->event_id." </h3>";

					$dd_odd = array("bsp" => $dd_csv->odd);

					$this->db->where('id',$hor->id);

					$this->db->update($tb , $dd_odd);

					print_r($dd_csv);

					echo "<br />";

					echo "<br /><hr />";



				}

			}



			#$this->db->where('id',$hor->id);
			

		}

	}



	function limpa_data_vazio(){


		$this->db->query("UPDATE cavalos_hist_usa SET  foi_event_id= REPLACE(foi_event_id, 1, 0) where event_id = '0';");
		

	}

	function set_win_place_usa(){



		$qr_horses = $this->db->query("SELECT * FROM cavalos_hist_dia WHERE corredores IS NOT NULL and classificacao IS NOT NULL and foi_event_id_place = 0 LIMIT 10000");

		foreach($qr_horses->result() as $hor){

			$qtd_horses = $hor->corredores;

			$win_place = 0;



			echo $hor->cavalo." ".$hor->classificacao." - ".$hor->corredores;

			echo "<br><hr>";





			/*

			CORREDORE - PLACE

			4 e 5               2 ***

			6                   3 ***

			7                   4 ***

			8 a 14              4 ***

			15 a 19             5 ***

			20 a 23             6

			24 a 40             7

			*/



			if($qtd_horses < 6 && $hor->classificacao < 3){
				$win_place = 1;
			}

			if($qtd_horses == 6 && $hor->classificacao < 4){
				$win_place = 1;
			}
			if($qtd_horses > 6 && $qtd_horses <= 14 && ($hor->classificacao < 5)){
				$win_place = 1;
			}

			if($qtd_horses >= 15 && $qtd_horses <= 19 && ($hor->classificacao < 6)){
				$win_place = 1;
			}
			if($qtd_horses > 19 && $qtd_horses < 24  && ($hor->classificacao < 7)){
				$win_place = 1;
			}
			if($qtd_horses >= 24 && ($hor->classificacao < 8)){
				$win_place = 1;
			}



			if($hor->classificacao == "PU"){

				$win_place = 0;	

			}

			



			$dd_foi = array("foi_event_id_place" => 1 , "win_place" => $win_place);

			$this->db->where('id',$hor->id);

			$this->db->update('cavalos_hist_dia',$dd_foi);

		}







	}

		function replace_ordem_bsp(){


		$this->db->query("UPDATE cavalos_hist SET  foi__ordem_bsp= REPLACE(foi__ordem_bsp, 1, 0) where event_id > '303' and ordem_bsp = '0.00';");
		

	}

	function replace_data_usa_inicial(){


		$this->db->query("UPDATE `wwtrad_ts`.`cavalos_hist_dia` SET `data`=REPLACE(data, '.', '')");
		$this->db->query("UPDATE `wwtrad_ts`.`cavalos_hist_dia` SET `data`=REPLACE(data, ' ', '')");
		$this->db->query("UPDATE `wwtrad_ts`.`cavalos_hist_dia` SET `data`=REPLACE(data, '2022', '22')");
		$this->db->query("UPDATE `wwtrad_ts`.`cavalos_hist_dia` SET `data`=REPLACE(data, '2021', '21')");
		$this->db->query("UPDATE `wwtrad_ts`.`cavalos_hist_dia` SET `data`=REPLACE(data, '2020', '20')");
		$this->db->query("UPDATE `wwtrad_ts`.`cavalos_hist_dia` SET `data`=REPLACE(data, '2019', '19')");
		$this->db->query("UPDATE `wwtrad_ts`.`cavalos_hist_dia` SET `data`=REPLACE(data, '2018', '18')");
		$this->db->query("UPDATE `wwtrad_ts`.`cavalos_hist_dia` SET `data`=REPLACE(data, '2017', '17')");
		$this->db->query("UPDATE `wwtrad_ts`.`cavalos_hist_dia` SET `data`=REPLACE(data, '2016', '16')");
		$this->db->query("UPDATE `wwtrad_ts`.`cavalos_hist_dia` SET `data`=REPLACE(data, '2015', '15')");
		$this->db->query("UPDATE `wwtrad_ts`.`cavalos_hist_dia` SET `data`=REPLACE(data, '2014', '14')");
		$this->db->query("UPDATE `wwtrad_ts`.`cavalos_hist_dia` SET `data`=REPLACE(data, '2013', '13')");
		$this->db->query("UPDATE `wwtrad_ts`.`cavalos_hist_dia` SET `data`=REPLACE(data, '2012', '12')");
		$this->db->query("UPDATE `wwtrad_ts`.`cavalos_hist_dia` SET `data`=REPLACE(data, '2011', '11')");
		$this->db->query("UPDATE `wwtrad_ts`.`cavalos_hist_dia` SET `data`=REPLACE(data, '2010', '10')");
		$this->db->query("UPDATE `wwtrad_ts`.`cavalos_hist_dia` SET `data`=REPLACE(data, '2009', '09')");
		$this->db->query("UPDATE `wwtrad_ts`.`cavalos_hist_dia` SET `data`=REPLACE(data, '2008', '08')");
		$this->db->query("UPDATE `wwtrad_ts`.`cavalos_hist_dia` SET `data`=REPLACE(data, '2007', '07')");
		$this->db->query("UPDATE `wwtrad_ts`.`cavalos_hist_dia` SET `data`=REPLACE(data, '2006', '06')");
		$this->db->query("UPDATE `wwtrad_ts`.`cavalos_hist_dia` SET `data`=REPLACE(data, '2005', '05')");
		$this->db->query("UPDATE `wwtrad_ts`.`cavalos_hist_dia` SET `data`=REPLACE(data, '2004', '04')");
		$this->db->query("UPDATE `wwtrad_ts`.`cavalos_hist_dia` SET `data`=REPLACE(data, '2003', '03')");
		$this->db->query("UPDATE `wwtrad_ts`.`cavalos_hist_dia` SET `data`=REPLACE(data, '2002', '02')");
		$this->db->query("UPDATE `wwtrad_ts`.`cavalos_hist_dia` SET `data`=REPLACE(data, '2001', '01')");
		$this->db->query("UPDATE `wwtrad_ts`.`cavalos_hist_dia` SET `data`=REPLACE(data, '2000', '00')");
	}


	function set_horses_tb_place($dia=""){

		//////$qr_horses = $this->db->query("SELECT DISTINCT(cavalo) FROM runs_dd_horses WHERE cavalo <> '' AND foi = 0 LIMIT 100");

		if($dia == "dia"){
			$qr_horses = $this->db->query("SELECT * FROM runs_dd_horses_dia WHERE cavalo <> '' AND foi_place = 0 ORDER BY id desc");
			// Marions Star
			#$qr_horses = $this->db->query("SELECT * FROM runs_dd_horses_dia WHERE id_mkt = '1.186466440' ");

			#$qr_horses = $this->db->query("SELECT * FROM runs_dd_horses_dia WHERE cavalo = 'Major Jumbo' ORDER BY id desc ");
		}else{
			$qr_horses = $this->db->query("SELECT * FROM runs_dd_horses WHERE cavalo <> '' AND foi_place = 0 LIMIT 1000");			
		}

		#$qr_horses = $this->db->query("SELECT * FROM runs_dd_horses WHERE cavalo <> '' AND foi_place = 0 LIMIT 10");
		



		#$qr_horses = $this->db->query("SELECT * FROM runs_dd_horses WHERE cavalo = 'Dolly Mcqueen'");

		

		//////$qr_horses = $this->db->query("SELECT * FROM runs_dd_horses WHERE cavalo = 'Typhoon Ten'");

		

		#$qr_horses_limit = $this->db->query("SELECT * FROM runs_dd_horses WHERE cavalo <> '' AND foi = 0  order by cavalo  asc LIMIT 100 ");

		echo "<H1>".$qr_horses->num_rows()."</H1>";

		#return false;

		$cont = 0;

		foreach($qr_horses->result() as $hor){

			echo "( ".$hor->id_mkt." )".$hor->cavalo;

			$this->db->where("id_mkt",$hor->id_mkt);
			if($dia == "dia"){
				$qr_qtd_horses = $this->db->get("runs_dd_horses_dia");
			}else{
				$qr_qtd_horses = $this->db->get("runs_dd_horses_dia");
			}



			





			//$nm_cavalo = $hor->cavalo;
			$nm_cavalo = str_replace("'", "", $hor->cavalo);
			$selection_id = $hor->runnerId;

			$qtd_horses = $qr_qtd_horses->num_rows();

			echo "<br />Corredores: ".$qr_qtd_horses->num_rows()." <br />";

			#print_r($hor);

			echo "<br />";

			echo "<br />";

			

			if($qtd_horses < 6){
				$classificacao_win_max = 2;
				$classificacao_win_min = 0;
			}
			if($qtd_horses == 6){
				$classificacao_win_max = 3;
			}
			if($qtd_horses > 6 && $qtd_horses <= 14){
				$classificacao_win_max = 4;
			}
			if($qtd_horses >= 15 && $qtd_horses <= 19){
				$classificacao_win_max = 5;
			}
			if($qtd_horses > 19 && $qtd_horses < 24){
				$classificacao_win_max = 6;
			}
			if($qtd_horses >= 24){
				$classificacao_win_max = 7;				
			}

			



			/*

			CORREDORE - PLACE

			4 e 5               2 ***

			6                   3 ***

			7                   4 ***

			8 a 14              4 ***

			15 a 19             5 ***

			20 a 23             6

			24 a 40             7

			*/





			#return false;



			$this->db->where('cavalo',$nm_cavalo);
			$this->db->where("event_id <> 303");
			$qr_qtd = $this->db->get('cavalos_hist_dia');

/*

			$qr_wins = $this->db->query("SELECT * FROM cavalos_hist WHERE cavalo = '".$nm_cavalo."' AND classificacao  < ".$classificacao_win_max." ");

			$qr_wins_dist = $this->db->query("SELECT DISTINCT(distancia) FROM cavalos_hist WHERE cavalo = '".$nm_cavalo."'");

			$qr_wins_pista = $this->db->query("SELECT DISTINCT(pista) FROM cavalos_hist WHERE cavalo = '".$nm_cavalo."'  ");

			$qr_wins_piso = $this->db->query("SELECT DISTINCT(going) FROM cavalos_hist WHERE cavalo = '".$nm_cavalo."'  ");

			$qr_wins_classe = $this->db->query("SELECT DISTINCT(classe) FROM cavalos_hist WHERE cavalo = '".$nm_cavalo."'  ");

*/

			#$vitorias_place = 0;
			if($dia == "dia"){
				$qr_wins = $this->db->query("SELECT * FROM cavalos_hist_dia WHERE selection_id = '".$selection_id."' AND win_place  = 1 AND event_id <> 303");
				$tb_hist = "cavalos_hist_dia";
			}else{
				$qr_wins = $this->db->query("SELECT * FROM cavalos_hist WHERE selection_id = '".$selection_id."' AND win_place  = 1 AND event_id <> 303");
				$tb_hist = "cavalos_hist";
			}


			echo "<h1>".$selection_id." +.+++++++++++++++++++ WINS: ".$qr_wins->num_rows()."</h1>";



			$vitorias_place = $qr_wins->num_rows();



			$qr_wins_dist = $this->db->query("SELECT DISTINCT(distancia),distancia_trat FROM $tb_hist WHERE selection_id = '".$selection_id."' AND event_id <> 303 ");
			$qr_wins_pista = $this->db->query("SELECT DISTINCT(pista) FROM $tb_hist WHERE selection_id = '".$selection_id."' AND event_id <> 303  ");
			$qr_wins_piso = $this->db->query("SELECT DISTINCT(going) FROM $tb_hist WHERE selection_id = '".$selection_id."' AND event_id <> 303 ");
			$qr_wins_classe = $this->db->query("SELECT DISTINCT(classe) FROM $tb_hist WHERE selection_id = '".$selection_id."' AND event_id <> 303 ");



			$dd_horse = array(

				'nome' => $nm_cavalo,

				

				'pais' => $hor->BRED,

				'sexo' => $hor->SEX_TYPE,

				'idade' => $hor->AGE,

				'cor' => $hor->COLOUR_TYPE,

				'mae' => $hor->DAM_NAME,

				'pai' => $hor->SIRE_NAME,

				'qtd_corridas' => $qr_qtd->num_rows()

			);


			if($dia == "dia"){
				$qtd_corridas = $qr_qtd->num_rows() - 1;
				$qtd_corridas_geral = $qr_qtd->num_rows() - 1;
			}else{
				$qtd_corridas = $qr_qtd->num_rows();
				$qtd_corridas_geral = $qr_qtd->num_rows();
			}


			

			$qtd_win = $qr_wins->num_rows();

			if($qtd_win > 0 && $qtd_corridas > 0){

				$porcentagem_win_place = ($qtd_win * 100) / $qtd_corridas;
				echo "<h1 style='color:darkred'>";
				echo "(".$qtd_win." * 100) / ".$qtd_corridas." ----- O ERRO TA AQUI";
				echo "</h1>";

			}else{

				$porcentagem_win_place = 0;				

			}

			

			if($qtd_win == 0){
				$porcentagem_win = 0;
			}



			if($qtd_corridas == 0){
				$porcentagem_win = 0;
			}

			

			echo "<h3 style='color:red'>".$porcentagem_win." ((".$qr_wins->num_rows()." * 100) ||| ".$qtd_corridas." (".$qr_qtd->num_rows().")</h3>";



			#$this->db->where('nome',$nm_cavalo);
			$this->db->where('selection_id',$selection_id);
			if($dia == "dia"){
				$qr_tem = $this->db->get('cavalos_dia');
				$id_horse = $qr_tem->row()->id_cavalo;
			}else{
				$qr_tem = $this->db->get('cavalos');
				$id_horse = $qr_tem->row()->id;
			}


			/*
			if($qr_tem->num_rows() == 0){

				$this->db->insert("cavalos", $dd_horse);
				$id_horse = $this->db->insert_id();

			}else{
				$id_horse = $qr_tem->row()->id;
			}
			*/


			############# DISTANCIAS WINS

			echo "<h3 style='color:green'>".$qr_wins_dist->num_rows()."</h3>";

			if($qr_wins_dist->num_rows() > 0){

				foreach($qr_wins_dist->result() as $dd_dist){

					#$this->db->where("distancia",$dd_dist->distancia);

					#$qr_id_dist = $this->db->get("estrategias_distancias");

					$qr_id_dist = $this->db->query("SELECT * FROM estrategias_distancias WHERE distancia = '".$dd_dist->distancia_trat."' OR distancia_thr = '".$dd_dist->distancia_trat."' ");

					if($qr_id_dist->num_rows() > 0){

						$id_dist = $qr_id_dist->row()->id;

						$dist = $qr_id_dist->row()->distancia_thr;

					}else{

						echo "<h1 style='color:red'>nAO TEM DISTANCIA (".$dd_dist->distancia_trat." ***)</h1>";

					}



					$qr_wins_distancia = $this->db->query("SELECT COUNT(id) as wins FROM $tb_hist WHERE selection_id = '".$selection_id."' AND win_place  = 1 AND distancia_trat = '".$dist."' AND event_id <> 303 ");



					$qr_wins_distancia_list = $this->db->query("SELECT * FROM $tb_hist WHERE selection_id = '".$selection_id."' AND win_place  = 1 AND distancia_trat = '".$dist."' AND event_id <> 303 ");



					$qr_runs_distancia = $this->db->query("SELECT COUNT(id) as runs FROM $tb_hist WHERE selection_id = '".$selection_id."' AND  distancia_trat = '".$dist."' AND event_id <> 303 ");



					$qr_runs_distancia_list = $this->db->query("SELECT * FROM $tb_hist WHERE selection_id = '".$selection_id."' AND  distancia_trat = '".$dist."' AND event_id <> 303 ORDER BY data_trat asc ");



					$dist_where = array(

						'id_distancia' => $id_dist,
						'id_cavalo' => $id_horse,

					);
					echo "<h1 style='color:green'>-.-.-.-.-. ";
						print_r($dist_where);
					echo "</h1>";
					$this->db->where($dist_where);

					$qr_dist_ver = $this->db->get('horses_distancias_win_place');





					$qtd_corridas = $qr_runs_distancia->row()->runs;

					$qtd_wins = $qr_wins_distancia->row()->wins;



					echo "<h1>".$qtd_wins ." **** (".$qtd_corridas.") </h1>";

					

					if($qtd_corridas > 0){

						

						foreach($qr_wins_distancia_list->result() as $corr){

							echo "<p style='color:orange'>";

							#print_r($corr);

							echo $corr->data." --- QTD Cavalos: ".$qtd_horses;

							echo "</p>";



						}

						

						

						$porcentagem = ($qtd_wins * 100) / $qtd_corridas;

						

						$dd_win_dist = array(

								'id_distancia' => $id_dist,

								'id_cavalo' => $id_horse,

								'qtd_corridas' =>  $qtd_corridas,

								'qtd_vitorias' =>  $qtd_wins,

								'percentual_vitoria' => $porcentagem

							);

						
						echo "<h1 class='color:purple'>".$qr_dist_ver->num_rows()." +++ ++ + +</h1>";
						if($qr_dist_ver->num_rows() == 0){

							

							$this->db->insert("horses_distancias_win_place" , $dd_win_dist);

						}else{

							$dd_win_dist = array(
								'qtd_corridas' =>  $qtd_corridas,
								'qtd_vitorias' =>  $qtd_wins,
								'percentual_vitoria' => $porcentagem
							);

							$this->db->where('id',$qr_dist_ver->row()->id);
							$this->db->update("horses_distancias_win_place" , $dd_win_dist);

						}

						



						echo "<h3>".$id_dist."</h3>";

						print_r($dd_dist);

						echo "<br />";

					}

				}

			}



			########## X WINS DISTANCIAS



			############# PISTAS WINS

			echo "<h2 style='color:blue'>Pistas ".$qr_wins_pista->num_rows()."</h2>";

			if($qr_wins_pista->num_rows() > 0){

				foreach($qr_wins_pista->result() as $dd_pista){

					#$this->db->where("distancia",$dd_dist->distancia);

					#$qr_id_dist = $this->db->get("estrategias_distancias");
					$pista_trat = str_replace("'", "", $dd_pista->pista);

					echo $pista_trat." ";

					$qr_id_pista = $this->db->query("SELECT * FROM pistas WHERE sigla_racingpost1 = '".$pista_trat."' OR sigla_racingpost2 = '".$pista_trat."'  OR sigla_racingpost3 = '".$pista_trat."' ");

					

					$id_pista = $qr_id_pista->row()->id;

					$pista = $qr_id_pista->row()->sigla_racingpost1;



					$qr_wins_pista = $this->db->query("SELECT COUNT(id) as wins FROM $tb_hist WHERE selection_id = '".$selection_id."' AND win_place  = 1 AND (pista = '".$qr_id_pista->row()->sigla_racingpost1."' oR pista = '".$qr_id_pista->row()->sigla_racingpost2."'  oR pista = '".$qr_id_pista->row()->sigla_racingpost3."') AND (event_id <> 303) ");



					$qr_runs_pista = $this->db->query("SELECT COUNT(id) as runs FROM $tb_hist WHERE selection_id = '".$selection_id."' AND  (pista = '".$qr_id_pista->row()->sigla_racingpost1."' oR pista = '".$qr_id_pista->row()->sigla_racingpost2."'  oR pista = '".$qr_id_pista->row()->sigla_racingpost3."') AND (event_id <> 303) ");



					$pista_where = array(

						'id_pista' => $id_pista,

						'id_cavalo' => $id_horse,

					);

					$this->db->where($pista_where);

					$qr_pista_ver = $this->db->get('horses_pista_win_place');



					$qtd_corridas_pista = $qr_runs_pista->row()->runs;

					$qtd_wins_pista = $qr_wins_pista->row()->wins;

					

					if($qtd_corridas_pista > 0){

						$porcentagem = ($qtd_wins_pista * 100) / $qtd_corridas_pista;



						if($qtd_corridas_pista > 0){

							$dd_win_pista = array(
									'id_pista' => $id_pista,
									'id_cavalo' => $id_horse,
									'qtd_corridas' =>  $qtd_corridas_pista,
									'qtd_vitorias' =>  $qtd_wins_pista,
									'percentual_vitoria' => $porcentagem
								);

							if($qr_pista_ver->num_rows() == 0){

								

								$this->db->insert("horses_pista_win_place" , $dd_win_pista);

							}else{

								$dd_win_pista = array(

									'qtd_corridas' =>  $qtd_corridas_pista,
									'qtd_vitorias' =>  $qtd_wins_pista,
									'percentual_vitoria' => $porcentagem

								);

								$this->db->where('id',$qr_pista_ver->row()->id);

								$this->db->update("horses_pista_win_place" , $dd_win_pista);

							}

						}



						echo "<h3>".$id_dist."</h3>";

						print_r($dd_pista);

						echo "<br />";

					} 

				}

			}

			

			###### X WIN PISTAS





			############# PISOS WINS

			echo "<h2 style='color:orange'>Pisos ".$qr_wins_piso->num_rows()."</h2>";

			if($qr_wins_piso->num_rows() > 0){

				foreach($qr_wins_piso->result() as $dd_piso){

					#$this->db->where("distancia",$dd_dist->distancia);

					#$qr_id_dist = $this->db->get("estrategias_distancias");

					echo "<h2 style='color:orange'>ID PISO ".$dd_piso->going." </h2> ";

					#echo "<h2 style='color:purple'>ID PISO ".$dd_piso." </h2> ";

					$qr_id_piso = $this->db->query("SELECT * FROM piso WHERE sigla_racingpost = '".$dd_piso->going."' ");

					echo "<h2 style='color:purple'>DD PISO ".$qr_id_piso->num_rows()." </h2> ";

					$id_piso = $qr_id_piso->row()->id_piso;

					$piso = $qr_id_piso->row()->sigla_racingpost;



					$qr_wins_piso = $this->db->query("SELECT COUNT(id) as wins FROM $tb_hist WHERE selection_id = '".$selection_id."' AND win_place  = 1 AND (going = '".$qr_id_piso->row()->sigla_racingpost."' ) AND event_id <> 303 ");



					$qr_runs_piso = $this->db->query("SELECT COUNT(id) as runs FROM $tb_hist WHERE selection_id = '".$selection_id."' AND  (going = '".$qr_id_piso->row()->sigla_racingpost."') AND event_id <> 303 ");



					$piso_where = array(

						'id_piso' => $id_piso,

						'id_cavalo' => $id_horse,

					);

					$this->db->where($piso_where);

					$qr_piso_ver = $this->db->get('horses_piso_win_place');



					$qtd_corridas_piso = $qr_runs_piso->row()->runs;

					$qtd_wins_piso = $qr_wins_piso->row()->wins;

					

					if($qtd_corridas_piso > 0){

						$porcentagem = ($qtd_wins_piso * 100) / $qtd_corridas_piso;



						if($qtd_corridas_piso > 0){

							$dd_win_piso = array(

									'id_piso' => $id_piso,

									'id_cavalo' => $id_horse,

									'qtd_corridas' =>  $qtd_corridas_piso,

									'qtd_vitorias' =>  $qtd_wins_piso,

									'percentual_vitoria' => $porcentagem

								);

							if($qr_piso_ver->num_rows() == 0){

								

								$this->db->insert("horses_piso_win_place" , $dd_win_piso);

							}else{

								$dd_win_piso = array(

									'qtd_corridas' =>  $qtd_corridas_piso,
									'qtd_vitorias' =>  $qtd_wins_piso,
									'percentual_vitoria' => $porcentagem

								);

								$this->db->where('id',$qr_piso_ver->row()->id);
								$this->db->update("horses_piso_win_place" , $dd_win_piso);

							}

						}



						echo "<h3>".$id_dist."</h3>";

						print_r($dd_piso);

						echo "<br />";

					} 

				}

			}

			

			###### X WIN PISOS





			############# CLASSES WINS

			echo "<h2 style='color:orange'>Pisos ".$qr_wins_classe->num_rows()."</h2>";

			if($qr_wins_classe->num_rows() > 0){

				foreach($qr_wins_classe->result() as $dd_classe){

					#$this->db->where("distancia",$dd_dist->distancia);

					#$qr_id_dist = $this->db->get("estrategias_distancias");

					echo "<h2 style='color:orange'>ID CLASSE ".$dd_classe->classe." </h2> ";

					#echo "<h2 style='color:purple'>ID PISO ".$dd_classe." </h2> ";

					$qr_id_classe = $this->db->query("SELECT * FROM classe WHERE id_classe = '".$dd_classe->classe."' ");



					echo "<h2 style='color:red'>DD CLASSEE ".$qr_id_classe->num_rows()." -- ".$dd_classe->classe." </h2> ";

					$id_classe = $qr_id_classe->row()->id_classe;

					$classe = $qr_id_classe->row()->sigla;



					echo "<h2 style='color:green'> ID Classe: ".$id_classe." **** ".$qr_id_classe->row()->sigla."</h2> ";



					$qr_wins_classe = $this->db->query("SELECT COUNT(id) as wins FROM $tb_hist WHERE selection_id = '".$selection_id."' AND win_place  = 1  AND (classe = '".$id_classe."' ) AND event_id <> 303 ");



					#echo "<h2 style='color:red'> ooopa 1 </h2> ";



					$qr_runs_classe = $this->db->query("SELECT COUNT(id) as runs FROM $tb_hist WHERE selection_id = '".$selection_id."' AND  (classe = '".$id_classe."') AND event_id <> 303 ");



					#echo "<h2 style='color:red'> ooopa 2 </h2> ";



					echo "<h2 style='color:purple'>-*-*-*-* NUM_ROWS CLASS: ".$qr_id_classe->row()->id_classe." -- ".$dd_classe->classe." </h2> ";



					$classe_where = array(

						'id_classe' => $id_classe,

						'id_cavalo' => $id_horse,

					);

					$this->db->where($classe_where);

					$qr_classe_ver = $this->db->get('horses_classe_win_place');



					$qtd_corridas_classe = $qr_runs_classe->row()->runs;

					$qtd_wins_classe = $qr_wins_classe->row()->wins;

					

					if($qtd_corridas_classe > 0){

						$porcentagem = ($qtd_wins_classe * 100) / $qtd_corridas_classe;



						if($qtd_corridas_classe > 0){

							$dd_win_classe = array(

									'id_classe' => $id_classe,

									'id_cavalo' => $id_horse,

									'qtd_corridas' =>  $qtd_corridas_classe,

									'qtd_vitorias' =>  $qtd_wins_classe,

									'percentual_vitoria' => $porcentagem

								);

							if($qr_classe_ver->num_rows() == 0){

								

								$this->db->insert("horses_classe_win_place" , $dd_win_classe);

							}else{

								$dd_win_classe = array(

									'qtd_corridas' =>  $qtd_corridas_classe,

									'qtd_vitorias' =>  $qtd_wins_classe,

									'percentual_vitoria' => $porcentagem

								);

								$this->db->where('id',$qr_classe_ver->row()->id);

								$this->db->update("horses_classe_win_place" , $dd_win_classe);

							}

						}



						echo "<h3>".$id_dist."</h3>";

						print_r($dd_classe);

						echo "<br />";

					} 

				}

			}

			

			###### X WIN CLASSES





			$qr_horses = $this->db->query("SELECT * FROM runs_dd_horses WHERE cavalo <> '' AND foi_place = 0 LIMIT 100");



			




			if($dia == "dia"){

				$dd_foi_place = array('foi_place' => 1);
				$this->db->where('id',$hor->id);
				$this->db->update('runs_dd_horses_dia' , $dd_foi_place);

				#$this->db->where('id_cavalo',$id_horse);
				$this->db->where('nome',$nm_cavalo);
				$qr_tem_win = $this->db->get('cavalos_dia');
			}else{	

				$dd_foi_place = array('foi_place' => 1);
				$this->db->where('id',$hor->id);
				$this->db->update('runs_dd_horses' , $dd_foi_place);

				#$this->db->where('id',$id_horse);
				$this->db->where('nome',$nm_cavalo);
				$qr_tem_win = $this->db->get('cavalos');
			}

			echo "<h1 style='color:red'>++++++++++".$qr_tem_win->num_rows()." [".$hor->id."]+++++(".$id_horse.")++++++++++++<h1>";

			if($qr_tem_win->num_rows() > 0){

				#$this->db->insert("cavalos", $dd_horse);

				#$id_horse = $this->db->insert_id();

				$dd_wins = array(
					#'id_cavalo' => $id_horse,
					#'qtd_corridas' => $qr_qtd->num_rows(),
					'qtd_corridas' => $qtd_corridas_geral, 
					'vitorias_place' =>  $qr_wins->num_rows(),
					#'qtd_vitorias' =>  $qr_wins->num_rows(),
					'porcentagem_win_place' =>  $porcentagem_win_place, 

				);
				echo "<h1 style='color:purple'>";
				echo $qtd_corridas_geral." ---- ";
				print_r($dd_wins);
				echo "</h1>";

				#$this->db->where('id',$id_horse);

				if($dia == "dia"){
					$this->db->where('id_cavalo',$id_horse);
					$this->db->update('cavalos_dia' , $dd_wins);
				}else{
					$this->db->where('id',$id_horse);
					$this->db->update('cavalos' , $dd_wins);
				}

				#$this->db->insert('cavalos_wins' , $dd_wins);

			}



		

			}

	} // x fn



	function set_horses_tb_wins($dia=""){

		#$qr_horses = $this->db->query("SELECT DISTINCT(cavalo) FROM runs_dd_horses WHERE cavalo <> '' AND foi = 0 LIMIT 100");

		if($dia == 'dia'){

			#$qr_horses = $this->db->query("SELECT * FROM cavalos WHERE  dia = 1 LIMIT 10");			
			$qr_horses = $this->db->query("SELECT * FROM cavalos_dia WHERE foi_win = 0 ORDER BY id asc");
			#$qr_horses = $this->db->query("SELECT * FROM cavalos_dia WHERE nome = 'Major Jumbo'");			

		}else{
			#$qr_horses = $this->db->query("SELECT * FROM cavalos WHERE  foi_win = 0 LIMIT 2000");
			$qr_horses = $this->db->query("SELECT * FROM cavalos_dia WHERE  foi_win = 0");
		}


		echo "<H1>".$qr_horses->num_rows()."</H1>";

		#return false;

		$cont = 0;

		foreach($qr_horses->result() as $hor){

			echo $hor->nome;
			$nm_cavalo = $hor->nome;
			$selection_id = $hor->selection_id;

			echo "<br /><strong style='color:red'>";

			print_r($hor);

			echo "</strong><br />";

			echo "<br />";


			if($dia == 'dia'){
				$this->db->where('selection_id',$selection_id);
				$this->db->where('event_id <> 303');
				$qr_qtd = $this->db->get('cavalos_hist_dia');
				$qr_qtd_geral = $qr_qtd->num_rows() - 1;
				$tb_hist  = 'cavalos_hist_dia';
			}else{
				$this->db->where('selection_id',$selection_id);
				$this->db->where('event_id <> 303');
				$qr_qtd = $this->db->get('cavalos_hist_dia');
				$qr_qtd_geral = $qr_qtd->num_rows();
				$tb_hist  = 'cavalos_hist_dia';
			}

			#qr_wins = $this->db->query("SELECT * FROM $tb_hist WHERE cavalo = '".$nm_cavalo."' AND classificacao = 1 AND event_id <> 303 ");
			#qr_wins_dist = $this->db->query("SELECT DISTINCT(distancia), distancia_trat FROM $tb_hist WHERE cavalo = '".$nm_cavalo."' AND event_id <> 303 ");
			#qr_wins_pista = $this->db->query("SELECT DISTINCT(pista) FROM $tb_hist WHERE cavalo = '".$nm_cavalo."' AND event_id <> 303 ");
			#$qr_wins_piso = $this->db->query("SELECT DISTINCT(going) FROM $tb_hist WHERE cavalo = '".$nm_cavalo."' AND event_id <> 303 ");
			#$qr_wins_classe = $this->db->query("SELECT DISTINCT(classe) FROM $tb_hist WHERE cavalo = '".$nm_cavalo."' AND event_id <> 303 ");

			// selection_id
			$qr_wins = $this->db->query("SELECT * FROM $tb_hist WHERE selection_id = '".$selection_id."' AND classificacao = 1 AND event_id <> 303 ");
			$qr_wins_dist = $this->db->query("SELECT DISTINCT(distancia), distancia_trat FROM $tb_hist WHERE selection_id = '".$selection_id."' AND event_id <> 303 ");
			$qr_wins_pista = $this->db->query("SELECT DISTINCT(pista) FROM $tb_hist WHERE selection_id = '".$selection_id."' AND event_id <> 303 ");
			$qr_wins_piso = $this->db->query("SELECT DISTINCT(going) FROM $tb_hist WHERE selection_id = '".$selection_id."' AND event_id <> 303 ");
			$qr_wins_classe = $this->db->query("SELECT DISTINCT(classe) FROM $tb_hist WHERE selection_id = '".$selection_id."' AND event_id <> 303 ");

			$qtd_corridas = $qr_qtd->num_rows();

			$qtd_win = $qr_wins->num_rows();

			
			echo "<h3 style='color:orange'> $nm_cavalo ----- selection_id = $selection_id ";
				echo "qr_qtd_geral = $qr_qtd_geral |||||  qtd_corridas  = $qtd_corridas";
				echo "<h3>";

			if($qtd_win > 0 && $qr_qtd_geral > 0){

				#$porcentagem_win_place = ($qtd_win * 100) / $qr_qtd_geral;
				echo "<h1 style='color:darkred'>";
				echo "(".$qtd_win." * 100) / ".$qr_qtd_geral." ----- O ERRO TA AQUI";
				echo "</h1>";	

			#if($qtd_win > 0){

				$porcentagem_win = ($qtd_win * 100) / $qr_qtd_geral;
				$porcentagem_win_geral = ($qtd_win * 100) / $qr_qtd_geral;

				echo "<h3 style='color:blue'> $nm_cavalo ----- ";
				echo "porcentagem_win = ( $qtd_win * 100 ) / $qtd_corridas";
				echo "<h3>";

			}else{

				$porcentagem_win = 0;		
				$porcentagem_win_geral	= 0;

			}

			if($qr_qtd_geral == 0){

				$porcentagem_win_geral	= 0;

			}

			

			if($qtd_win == 0){

				$porcentagem_win = 0;
				

			}



			if($qtd_corridas == 0){

				$porcentagem_win = "-";

			}

			

			echo "<h3 style='color:red'>".$porcentagem_win." ((".$qr_wins->num_rows()." * 100) ".$qr_qtd->num_rows().")</h3>";


			######## DEFINI ID DO CAVALO
			$this->db->where('selection_id',$selection_id);
			if($dia == 'dia'){
				$qr_tem = $this->db->get('cavalos_dia');
				$id_horse = $qr_tem->row()->id_cavalo;
			}else{
				$qr_tem = $this->db->get('cavalos_dia');
				$id_horse = $qr_tem->row()->id;
			}





			############# DISTANCIAS WINS

			echo "<h3 style='color:green'>".$qr_wins_dist->num_rows()."</h3>";

			if($qr_wins_dist->num_rows() > 0){

				foreach($qr_wins_dist->result() as $dd_dist){

					#$this->db->where("distancia",$dd_dist->distancia);

					#$qr_id_dist = $this->db->get("estrategias_distancias");

					echo "<h1 style='color:red'>".$dd_dist->distancia." ********************** </h1>";

					$qr_id_dist = $this->db->query("SELECT * FROM estrategias_distancias WHERE distancia = '".$dd_dist->distancia_trat."' OR distancia_thr = '".$dd_dist->distancia_trat."' ");

					if($qr_id_dist->num_rows() > 0){

						$id_dist = $qr_id_dist->row()->id;

						$dist = $qr_id_dist->row()->distancia_thr;

					}else{

						echo "<h1 style='color:red'>nAO TEM DISTANCIA</h1>";

					}

					$id_dist = $qr_id_dist->row()->id;

					$dist = $qr_id_dist->row()->distancia_thr;



					$qr_wins_distancia = $this->db->query("SELECT COUNT(id) as wins FROM $tb_hist WHERE selection_id = '".$selection_id."' AND classificacao = 1 AND distancia_trat = '".$dist."' AND event_id <> 303 ");


					echo "<h1 style='color:purple'>".$dist." ++++++++++++++[".$qr_wins_distancia->row()->wins."]++++++++++++</h1>";



					$qr_runs_distancia = $this->db->query("SELECT COUNT(id) as runs FROM $tb_hist WHERE selection_id = '".$selection_id."' AND  distancia_trat = '".$dist."' AND event_id <> 303 ");



					$dist_where = array(

						'id_distancia' => $id_dist,

						'id_cavalo' => $id_horse,

					);

					$this->db->where($dist_where);

					$qr_dist_ver = $this->db->get('horses_distancias_win');


					$qtd_corridas = $qr_runs_distancia->row()->runs;

					$qtd_wins = $qr_wins_distancia->row()->wins;



					echo "<h1>".$qtd_wins ." **** </h1>";

					

					if($qtd_corridas > 0){

						

						$porcentagem = ($qtd_wins * 100) / $qtd_corridas;

						

						$dd_win_dist = array(

								'id_distancia' => $id_dist,
								'id_cavalo' => $id_horse,
								'qtd_corridas' =>  $qtd_corridas,
								'qtd_vitorias' =>  $qtd_wins,
								'percentual_vitoria' => $porcentagem

							);

						

						if($qr_dist_ver->num_rows() == 0){

							$this->db->insert("horses_distancias_win" , $dd_win_dist);

						}else{

							$dd_win_dist = array(

								'qtd_corridas' =>  $qtd_corridas,
								'qtd_vitorias' =>  $qtd_wins,
								'percentual_vitoria' => $porcentagem

							);

							$this->db->where('id',$qr_dist_ver->row()->id);

							$this->db->update("horses_distancias_win" , $dd_win_dist);

						}

						



						echo "<h3>".$id_dist."</h3>";

						print_r($dd_dist);

						echo "<br />";

					}

				}

			}
			########## X WINS DISTANCIAS

			############# PISTAS WINS

			echo "<h2 style='color:blue'>Pistas ".$qr_wins_pista->num_rows()."</h2>";

			if($qr_wins_pista->num_rows() > 0){

				foreach($qr_wins_pista->result() as $dd_pista){

					#$this->db->where("distancia",$dd_dist->distancia);

					#$qr_id_dist = $this->db->get("estrategias_distancias");

					echo $dd_pista->pista." ";

					$pista_trat = str_replace("'", "", $dd_pista->pista);

					$qr_id_pista = $this->db->query("SELECT * FROM pistas WHERE sigla_racingpost1 = '".$pista_trat."' OR sigla_racingpost2 = '".$pista_trat."'  OR sigla_racingpost3 = '".$pista_trat."' ");

					

					$id_pista = $qr_id_pista->row()->id;

					$pista = $qr_id_pista->row()->sigla_racingpost1;



					$qr_wins_pista = $this->db->query("SELECT COUNT(id) as wins FROM $tb_hist WHERE selection_id = '".$selection_id."' AND classificacao = 1 AND (pista = '".$qr_id_pista->row()->sigla_racingpost1."' oR pista = '".$qr_id_pista->row()->sigla_racingpost2."'  oR pista = '".$qr_id_pista->row()->sigla_racingpost3."') AND event_id <> 303 ");



					$qr_runs_pista = $this->db->query("SELECT COUNT(id) as runs FROM $tb_hist WHERE selection_id = '".$selection_id."' AND  (pista = '".$qr_id_pista->row()->sigla_racingpost1."' oR pista = '".$qr_id_pista->row()->sigla_racingpost2."'  oR pista = '".$qr_id_pista->row()->sigla_racingpost3."') AND event_id <> 303 ");



					$pista_where = array(

						'id_pista' => $id_pista,

						'id_cavalo' => $id_horse,

					);

					$this->db->where($pista_where);

					$qr_pista_ver = $this->db->get('horses_pista_win');



					$qtd_corridas_pista = $qr_runs_pista->row()->runs;

					$qtd_wins_pista = $qr_wins_pista->row()->wins;

					

					if($qtd_corridas_pista > 0){

						$porcentagem = ($qtd_wins_pista * 100) / $qtd_corridas_pista;



						if($qtd_corridas_pista > 0){

							$dd_win_pista = array(

									'id_pista' => $id_pista,
									'id_cavalo' => $id_horse,
									'qtd_corridas' =>  $qtd_corridas_pista,
									'qtd_vitorias' =>  $qtd_wins_pista,
									'percentual_vitoria' => $porcentagem

								);

							if($qr_pista_ver->num_rows() == 0){

								

								$this->db->insert("horses_pista_win" , $dd_win_pista);

							}else{

								$dd_win_pista = array(

									'qtd_corridas' =>  $qtd_corridas_pista,
									'qtd_vitorias' =>  $qtd_wins_pista,
									'percentual_vitoria' => $porcentagem

								);

								$this->db->where('id',$qr_pista_ver->row()->id);

								$this->db->update("horses_pista_win" , $dd_win_pista);

							}

						}



						echo "<h3>".$id_dist."</h3>";

						print_r($dd_pista);

						echo "<br />";

					} 

				}

			}
			###### X WIN PISTAS

			############# PISOS WINS
			echo "<h2 style='color:orange'>Pisos ".$qr_wins_piso->num_rows()."</h2>";
			if($qr_wins_piso->num_rows() > 0){

				foreach($qr_wins_piso->result() as $dd_piso){

					#$this->db->where("distancia",$dd_dist->distancia);

					#$qr_id_dist = $this->db->get("estrategias_distancias");

					echo "<h2 style='color:orange'>ID PISO ".$dd_piso->going." </h2> ";

					#echo "<h2 style='color:purple'>ID PISO ".$dd_piso." </h2> ";

					$qr_id_piso = $this->db->query("SELECT * FROM piso WHERE sigla_racingpost = '".$dd_piso->going."' ");

					echo "<h2 style='color:purple'>DD PISO ".$qr_id_piso->num_rows()." </h2> ";

					$id_piso = $qr_id_piso->row()->id_piso;

					$piso = $qr_id_piso->row()->sigla_racingpost;



					$qr_wins_piso = $this->db->query("SELECT COUNT(id) as wins FROM $tb_hist WHERE selection_id = '".$selection_id."' AND classificacao = 1 AND (going = '".$qr_id_piso->row()->sigla_racingpost."' ) AND event_id <> 303 ");



					$qr_runs_piso = $this->db->query("SELECT COUNT(id) as runs FROM $tb_hist WHERE selection_id = '".$selection_id."' AND  (going = '".$qr_id_piso->row()->sigla_racingpost."') AND event_id <> 303 ");



					$piso_where = array(

						'id_piso' => $id_piso,

						'id_cavalo' => $id_horse,

					);

					$this->db->where($piso_where);

					$qr_piso_ver = $this->db->get('horses_piso_win');



					$qtd_corridas_piso = $qr_runs_piso->row()->runs;

					$qtd_wins_piso = $qr_wins_piso->row()->wins;

					

					if($qtd_corridas_piso > 0){

						$porcentagem = ($qtd_wins_piso * 100) / $qtd_corridas_piso;



						if($qtd_corridas_piso > 0){

							$dd_win_piso = array(

									'id_piso' => $id_piso,

									'id_cavalo' => $id_horse,

									'qtd_corridas' =>  $qtd_corridas_piso,

									'qtd_vitorias' =>  $qtd_wins_piso,

									'percentual_vitoria' => $porcentagem

								);

							if($qr_piso_ver->num_rows() == 0){

								$this->db->insert("horses_piso_win" , $dd_win_piso);

							}else{

								$dd_win_piso = array(
									'qtd_corridas' =>  $qtd_corridas_piso,
									'qtd_vitorias' =>  $qtd_wins_piso,
									'percentual_vitoria' => $porcentagem

								);

								$this->db->where('id',$qr_piso_ver->row()->id);

								$this->db->update("horses_piso_win" , $dd_win_piso);

							}

						}



						echo "<h3>".$id_dist."</h3>";

						print_r($dd_piso);

						echo "<br />";

					} 

				}

			}
			###### X WIN PISOS

			############# CLASSES WINS
			echo "<h2 style='color:orange'>Pisos ".$qr_wins_classe->num_rows()."</h2>";
			if($qr_wins_classe->num_rows() > 0){

				foreach($qr_wins_classe->result() as $dd_classe){

					#$this->db->where("distancia",$dd_dist->distancia);

					#$qr_id_dist = $this->db->get("estrategias_distancias");

					echo "<h2 style='color:orange'>ID CLASSE ".$dd_classe->classe." </h2> ";

					#echo "<h2 style='color:purple'>ID PISO ".$dd_classe." </h2> ";

					$qr_id_classe = $this->db->query("SELECT * FROM classe WHERE id_classe = '".$dd_classe->classe."' ");



					echo "<h2 style='color:red'>DD CLASSEE ".$qr_id_classe->num_rows()." -- ".$dd_classe->classe." </h2> ";

					$id_classe = $qr_id_classe->row()->id_classe;

					$classe = $qr_id_classe->row()->sigla;



					echo "<h2 style='color:green'> ID Classe: ".$id_classe." **** ".$qr_id_classe->row()->sigla."</h2> ";



					$qr_wins_classe = $this->db->query("SELECT COUNT(id) as wins FROM $tb_hist WHERE selection_id = '".$selection_id."' AND classificacao = 1 AND (classe = '".$id_classe."' ) AND event_id <> 303 ");



					#echo "<h2 style='color:red'> ooopa 1 </h2> ";



					$qr_runs_classe = $this->db->query("SELECT COUNT(id) as runs FROM $tb_hist WHERE selection_id = '".$selection_id."' AND  (classe = '".$id_classe."') AND event_id <> 303 " );



					#echo "<h2 style='color:red'> ooopa 2 </h2> ";



					echo "<h2 style='color:purple'>-*-*-*-* NUM_ROWS CLASS: ".$qr_id_classe->row()->id." -- ".$dd_classe->classe." </h2> ";



					$classe_where = array(

						'id_classe' => $id_classe,

						'id_cavalo' => $id_horse,

					);

					$this->db->where($classe_where);

					$qr_classe_ver = $this->db->get('horses_classe_win');



					$qtd_corridas_classe = $qr_runs_classe->row()->runs;

					$qtd_wins_classe = $qr_wins_classe->row()->wins;

					

					if($qtd_corridas_classe > 0){

						$porcentagem = ($qtd_wins_classe * 100) / $qtd_corridas_classe;



						if($qtd_corridas_classe > 0){

							$dd_win_classe = array(

									'id_classe' => $id_classe,
									'id_cavalo' => $id_horse,
									'qtd_corridas' =>  $qtd_corridas_classe,
									'qtd_vitorias' =>  $qtd_wins_classe,
									'percentual_vitoria' => $porcentagem

								);

							if($qr_classe_ver->num_rows() == 0){

								

								$this->db->insert("horses_classe_win" , $dd_win_classe);

							}else{

								$dd_win_classe = array(

									'qtd_corridas' =>  $qtd_corridas_classe,
									'qtd_vitorias' =>  $qtd_wins_classe,
									'percentual_vitoria' => $porcentagem

								);

								$this->db->where('id',$qr_classe_ver->row()->id);

								$this->db->update("horses_classe_win" , $dd_win_classe);

							}

						}



						echo "<h3>".$id_dist."</h3>";

						print_r($dd_classe);

						echo "<br />";

					} 

				} // x foreach

			} // x if
			###### X WIN CLASSES

			$this->db->where('id',$id_horse);
			if($dia == 'dia'){
				$qr_tem_win = $this->db->get('cavalos_dia');
			}else{
				$qr_tem_win = $this->db->get('cavalos_dia');
			}

			#if($qr_tem_win->num_rows() > 0){

				#$this->db->insert("cavalos", $dd_horse);

				#$id_horse = $this->db->insert_id();
				echo "<h1 style='color:silver'> ".$id_horse." ||".$qr_qtd->num_rows()." (".$qr_qtd_geral.")<h1>";
				$dd_wins = array(
					#'id_cavalo' => $id_horse,
					#'qtd_corridas' => $qr_qtd->num_rows(),
					'qtd_corridas' => $qr_qtd_geral,
					'vitorias' =>  $qr_wins->num_rows(),
					#'qtd_vitorias' =>  $qr_wins->num_rows(),
					'porcentagem_win' =>  $porcentagem_win_geral
				);
				#$this->db->where('id',$id_horse);
				if($dia == 'dia'){
					$this->db->where('id_cavalo',$id_horse);
					$this->db->update('cavalos_dia' , $dd_wins);
				}else{
					$this->db->where('id',$id_horse);
					$this->db->update('cavalos_dia' , $dd_wins);
				}







				if($dia == 'dia'){

					$dd_meta = array("foi_win" => 1 , 'dia' => 2);

					$this->db->where('id',$hor->id);

					$this->db->update("cavalos_dia" , $dd_meta);

					$n = 12;

					$status_checkin = array('status' => 1);

					$this->db->where('id',$n);

					$this->db->update('cron_checkin' , $status_checkin);

				}else{

					$dd_meta = array("foi_win" => 1);

					$this->db->where('id',$hor->id);

					$this->db->update("cavalos" , $dd_meta);

				}
				#print_r($qr_corridas->result());

			}

			

	}

	

		function replace_interrogacao_win_place(){


		$this->db->query("UPDATE cavalos_hist_dia SET win_place=REPLACE(win_place, 1, 0) where classificacao = '?'");
		
		echo "OK";

	}
	
	
	

		function replace_classe_shoppy(){


		$this->db->query("UPDATE `wwtrad_ts`.`cavalos_hist_dia` SET `going`=REPLACE(going, 'Shoppy', 'S')");
		
		echo "OK";

	}
	
	
	

		function replace_distancia_f(){


		$this->db->query("UPDATE `wwtrad_ts`.`cavalos_hist_dia` SET `distancia_trat`=REPLACE(distancia_trat, 'F', '')");
		
		echo "OK";

	}
	
	
	

		function replace_classe_20(){


		$this->db->query("UPDATE `wwtrad_ts`.`cavalos_hist_dia` SET `classe`=20 where classe is null");
		
		echo "OK";

	}

		function replace_race_runs_horses(){


		$this->db->query("UPDATE `wwtrad_ts`.`runs_horses` SET `marketName`=REPLACE(marketName, 'R1 ', '')");
		$this->db->query("UPDATE `wwtrad_ts`.`runs_horses` SET `marketName`=REPLACE(marketName, 'R2 ', '')");
		$this->db->query("UPDATE `wwtrad_ts`.`runs_horses` SET `marketName`=REPLACE(marketName, 'R3 ', '')");
		$this->db->query("UPDATE `wwtrad_ts`.`runs_horses` SET `marketName`=REPLACE(marketName, 'R4 ', '')");
		$this->db->query("UPDATE `wwtrad_ts`.`runs_horses` SET `marketName`=REPLACE(marketName, 'R5 ', '')");
		$this->db->query("UPDATE `wwtrad_ts`.`runs_horses` SET `marketName`=REPLACE(marketName, 'R6 ', '')");
		$this->db->query("UPDATE `wwtrad_ts`.`runs_horses` SET `marketName`=REPLACE(marketName, 'R7 ', '')");
		$this->db->query("UPDATE `wwtrad_ts`.`runs_horses` SET `marketName`=REPLACE(marketName, 'R8 ', '')");
		$this->db->query("UPDATE `wwtrad_ts`.`runs_horses` SET `marketName`=REPLACE(marketName, 'R9 ', '')");
		$this->db->query("UPDATE `wwtrad_ts`.`runs_horses` SET `marketName`=REPLACE(marketName, 'R10 ', '')");
		$this->db->query("UPDATE `wwtrad_ts`.`runs_horses` SET `marketName`=REPLACE(marketName, 'R11 ', '')");
		$this->db->query("UPDATE `wwtrad_ts`.`runs_horses` SET `marketName`=REPLACE(marketName, 'R12 ', '')");
		$this->db->query("UPDATE `wwtrad_ts`.`runs_horses` SET `marketName`=REPLACE(marketName, 'R13 ', '')");
		
		echo "OK";

	}

}

