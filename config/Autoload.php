<?php

class Autoload{

	private static $m_instance = null;
	
	public static function load(){
		

		if(self::$m_instance){
			throw new Exception("Erreur l'autoload ne peut être chargée qu'une fois : ".__CLASS__);
		}
		
		
		self::$m_instance = new self();
		
		if(!spl_autoload_register(array(self::$m_instance, 'autoloadCallback'),false)){
			throw new Exception("Impossible de lancer l'autoload :".__CLASS__);
		}
		
	}

	public static function shutDown(){
		if(null!==self::$m_instance ){
			if(slp_autoload_unregister(array(self::$m_instance, '_autoload')))
			{
				throw new Exception("Impossible d'arrêter l'autoload : ".__CLASS__);
			}
			self::$m_instance = null;
		}
	}

	private static function autoloadCallback($class){
		global $rootDirectory;
		
		$sourceFileName = $class.'.php';
		
		$directoryList= array('','config/','modeles/','controleur/','metier/','persistance/','vue/classes/');
		
		foreach($directoryList as $subDir){
			
			$filePath=$rootDirectory.$subDir.$sourceFileName;
			if(file_exists($filePath)){
				
				include($filePath);
			}
		}

	}
}

?>

