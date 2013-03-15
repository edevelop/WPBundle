<?php
//TLB/WPBundle/Services/WPService.php

namespace TLB\WPBundle\Services;

use TLB\WPBundle\Utils\WpConfiguration;
use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\Yaml\Yaml;

class WPService{
	protected $rootdir; //Esto es lo mismo que kernel.root_dir
	protected $opcionesGenerales;
	protected $opcionesArticulos;

	function __construct($rootdir){
		$this->rootdir = $rootdir; //Esto es lo mismo que kernel.root_dir
		$this->obtenerConfiguracion();
	}
	
	//Configuración del bundle.
	function obtenerConfiguracion()
	{
		$valoresDeConfiguracion = Yaml::parse(file_get_contents(__DIR__.'/../Resources/config/tlbwpconfig.yml'));
        
        $configuracion = new WpConfiguration();
        $procesador = new Processor();
        
        $processedConfiguration = $procesador->processConfiguration($configuracion, $valoresDeConfiguracion);
        
        $this->opcionesGenerales = $valoresDeConfiguracion['tlbwpconfiguration']['general'];
        $this->opcionesArticulos = $valoresDeConfiguracion['tlbwpconfiguration']['articulos'];
        $rutaWordpress =  $this->rootdir . $this->opcionesGenerales['rutabootstrap'] . $this->opcionesGenerales['wpbootstrap'];
        
        define('WP_USE_THEMES', false);
        require_once $rutaWordpress;
	}

	function tlbEntrarBlog($creds)
	{
		$user = wp_signon( $creds, false );
		echo "<pre>";
		print_r($user);
		echo "</pre>";
		return $user;
	}
	
	function tlbWpLogin($usuario, $password)
	{
		echo $usuario;
		echo $password;
		$resultado = wp_authenticate($usuario, $password);
		return $resultado;
	}
	
	function tlbEsWpError($cosa)
	{
		return is_wp_error($cosa);
	}

}//Fin class