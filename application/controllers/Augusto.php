<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Augusto extends CI_Controller {

	
	

	function limpar_pastas(){
		echo "OK";
		$dir = "csv_teste";
		$meuArray = Array();
	
		// MANUPUILANDO DIRETORIOS		
		$path1 = 'csv/';
		$path2 = 'csv_ire/';
		$path3 = 'csv_atr/';
		$path4 = 'csv_thr/';
		$path5 = 'csv_usa/';
		
		$directory1 = new RecursiveDirectoryIterator( $path1 );
		foreach ($directory1 as $file) { 
		 	
		    echo $file->getFileName();
		    unlink($path.$file->getFileName());
		    echo "<br>";

		} // x foreach direc

		$directory2 = new RecursiveDirectoryIterator( $path );
		foreach ($directory2 as $file) { 
		 	
		    echo $file->getFileName();
		    unlink($path.$file->getFileName());
		    echo "<br>";

		} // x foreach direc

		$directory3 = new RecursiveDirectoryIterator( $path );
		foreach ($directory3 as $file) { 
		 	
		    echo $file->getFileName();
		    unlink($path.$file->getFileName());
		    echo "<br>";

		} // x foreach direc

		$directory4 = new RecursiveDirectoryIterator( $path );
		foreach ($directory4 as $file) { 
		 	
		    echo $file->getFileName();
		    unlink($path.$file->getFileName());
		    echo "<br>";

		} // x foreach direc

		$directory5 = new RecursiveDirectoryIterator( $path );
		foreach ($directory5 as $file) { 
		 	
		    echo $file->getFileName();
		    unlink($path.$file->getFileName());
		    echo "<br>";

		} // x foreach direc

	} // x fn
	


	
}

