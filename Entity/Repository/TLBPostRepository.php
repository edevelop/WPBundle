<?php

namespace TLB\WPBundle\Entity\Repository;

use Doctrine\Common\Collections\ArrayCollection;

use Doctrine\ORM\EntityRepository;
use TLB\WPBundle\Entity\TLBPost;
use TLB\WPBundle\Entity\TLBPostPreparado;

/**
 * TLBPostRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TLBPostRepository extends EntityRepository
{
	protected $wpPostsService;
	
	public function setWpService( $wpPostsService)
	{
		$this->wpPostsService = $wpPostsService;
	}
	
	/**
	 * obtenerCategorias
	 * Devuelve un Array con las categorías del blog.
	 */
	public function obtenerCategorias()
	{
		$args = array(
				'type'                     => 'post',
				'child_of'                 => 0,
				'parent'                   => '',
				'orderby'                  => 'name',
				'order'                    => 'ASC',
				'hide_empty'               => 1,
				'hierarchical'             => 1,
				'exclude'                  => '',
				'include'                  => '',
				'number'                   => '',
				'taxonomy'                 => 'category',
				'pad_counts'               => false );
		$listaCategorias = $this->wpPostsService->getCategorias($args);
		return $listaCategorias;
	}

	/**
	 * Devuelve una colección de posts de una categoría determinada
	 * por $categoriaSlug.
	 * @param string $categoriaSlug
	 */
	public function postsPorCategoria($categoriaSlug)
	{
		/*
		//Primero debo obtener el id de la categoria para obtener la lista de posts.
		$categoria = $this->wpPostsService->getCategoriaBySlug($categoriaSlug);
		$idCategoria = $categoria->cat_ID;
		//introduzco los parámetros para obtener la lista de posts de la categoría
		//indicada.
		$argumentos = array(
					'category' => $idCategoria,
				);
		
		
		
		$listaPosts = $this->wpPostsService->getPosts($argumentos);
		
		$listaTlbPosts = new ArrayCollection();
		foreach($listaPosts as $tlbPost)
		{
			$objetoPost= $this->preparaPost($tlbPost->ID);
			$listaTlbPosts->add($objetoPost);	
		}
		return $listaTlbPosts;
		*/
		
		
		
		
		
		//Obtengo el id de la categoria.
		
		//echo "<pre>";
		//print_r($args);
		//echo "</pre>";
		
		//Obtengo el id de la categoria a partir del slug.
		//$categoria = $this->wpPostsService->getCategoriaBySlug($args['slug']);
		$categoria = $this->wpPostsService->getCategoriaBySlug($categoriaSlug);
		$idCategoria = $categoria->cat_ID;
		$args['category'] = $idCategoria;
		echo "<pre>";
		print_r($args);
		echo "</pre>";
		$listaPosts = $this->wpPostsService->getPosts($args);
		
		
		
		
		
		$listaTlbPosts = new ArrayCollection();
		foreach ($listaPosts as $tlbPost)
		{
			$objetoPost = $this->preparaPost($tlbPost->ID);
			$listaTlbPosts->add($objetoPost);
		}
		
		return $listaTlbPosts;
		
	}
	
	/**
	 * prepararPostRecientes
	 * Obtiene una lista de posts con los campos que me interesan.
	 */
	public function listaPostsRecientes($limite = null)
	{
		//echo "<pre>";
		//print_r($this->wpPostsService->getOpcionesArticulos());
		//echo "</pre>";
		$opciones = $this->wpPostsService->getOpcionesArticulos();
		//$limitearticulos = $opci
		$limiteArticulos = $opciones['postsporpagina'];
		//echo "<pre>";
		//print_r($opciones['postsporpagina']);
		//echo "</pre>";


		$listaPosts = $this->wpPostsService->getPosts($limiteArticulos);
		$listaPostsRecientes = new ArrayCollection();
		foreach ($listaPosts as $tlbPost)
		{
			$objetoPost = $this->preparaPost($tlbPost->ID);
			$listaPostsRecientes->add($objetoPost);
		}
		return $listaPostsRecientes;
	}
	
	/*
	public function listaPostsRecientes($limite = 5)
	{
		$listaPosts = $this->wpPostsService->getPosts($limite);
		$listaPostsRecientes = new ArrayCollection();
		foreach ($listaPosts as $tlbPost)
		{
			$objetoPost = $this->preparaPost($tlbPost->ID);
			$listaPostsRecientes->add($objetoPost);
		}
		return $listaPostsRecientes;
	}
	*/
	
	/**
	 * preparaPost.
	 * Obtiene sólo los datos necesarios de un post para presentarlos.
	 */
	public function preparaPost($idPost)
	{
		$postPreparado = new TLBPostPreparado();
		$postPreparado->setIdPost($idPost);
		$postPreparado->setTitulo(get_post_field('post_title', $idPost));
		$postPreparado->setContenido(get_post_field('post_content', $idPost));
		$postPreparado->setFecha(get_post_field('post_date',$idPost));
		$postPreparado->setIdAutor(get_post_field('post_author', $idPost));
		$postPreparado->setNumeroComentarios(get_post_field('comment_count', $idPost));
		$postPreparado->setExtracto(get_post_field('post_excerpt', $idPost));
		$postPreparado->setSlug(basename(get_permalink($idPost)));
		$idAutor = $postPreparado->getIdAutor();
		$postPreparado->setNombreAutor(get_the_author_meta('display_name', $idAutor));
		//obtener las categorías.
		$listaIdCategorias = wp_get_post_categories($idPost);
		$listaNombresCategorias = array();
		foreach ($listaIdCategorias as $idCategoria)
		{
			$categoria = get_category($idCategoria);
			$listaNombresCategorias[] = $categoria->name;
		}
		$postPreparado->setNombresCategorias($listaNombresCategorias);
		$objetoFecha = new \DateTime($postPreparado->getFecha());
		$postPreparado->setAnho($objetoFecha->format('Y'));
		$postPreparado->setMes($objetoFecha->format('m'));
		$postPreparado->setDia($objetoFecha->format('d'));
		$postPreparado->setHora($objetoFecha->format('H:i:s'));
		return $postPreparado;
	}
	
}//Fin repository.
