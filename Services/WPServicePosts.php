<?php
//TLB/WPBundle/Services/WPServicePosts.php

namespace TLB\WPBundle\Services;
use TLB\WPBundle\Services;

class WPServicePosts extends WPService
{
	protected $tlbwp;

	function __construct($tlbwp)
	{
		$this->tlbwp = $tlbwp;
	}

	public function getOpcionesArticulos()
	{
		return $this->tlbwp->opcionesArticulos;
	}

	function getPosts($limite)
	{
		$args = array();
		$args['numberposts'] = $limite;
		$listaDePosts = get_posts( $args );
		return $listaDePosts;
	}
	
	function getCategoriaBySlug($slug)
	{
		$categoria = get_category_by_slug($slug);
		return $categoria;
	}
	
	
	function getCategorias($args)
	{
		$listaCategorias = get_categories($args);
		return $listaCategorias;
	}
}
