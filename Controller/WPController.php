<?php
namespace TLB\WPBundle\Controller;


use Symfony\Component\HttpFoundation\RedirectResponse;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use TLB\WPBundle\Entity\TLBComment;
use TLB\WPBundle\Form\Type\TLBCommentType;
use Symfony\Component\HttpFoundation\Request;

class WPController extends Controller{
	
	protected $webDir;
	protected $wpServicio;
	protected $wpServicioPosts;
	protected $wpServicioComments;
	

	/**
	 * Login pa wordpress
	 */
	public function blogLoginAction()
	{
		$creds = array();
		$creds['user_login'] = 'pepita';
		$creds['user_password'] = 'password';
		$creds['remember'] = true;
		$url = "http://swp/web/wordpress/wp-admin";
		
		$this->wpServicio = $this->get('tlb_wp');
		$resultado_login = $this->wpServicio->tlbEntrarBlog($creds);
		
		if( $this->wpServicio->tlbEsWpError($resultado_login)){
			echo "Ha habido un error";
		}
		else{
			return new RedirectResponse($url);
		}
		return $this->render('TLBWPBundle:WP:barralateral.html.twig',array('listaCategorias' => $listaCategorias));
	}
	
	/**
	 * Rellena la barra lateral.
	 */
	public function barraLateralAction()
	{
		$this->wpServicioPosts = $this->get('tlb_wp_posts');
		$em = $this->getDoctrine()->getManager();
		$repositorio = $em->getRepository('TLBWPBundle:TLBPost');
		$repositorio->setWpService($this->wpServicioPosts);
		$listaCategorias = $repositorio->obtenerCategorias();
		return $this->render('TLBWPBundle:WP:barralateral.html.twig',array('listaCategorias' => $listaCategorias));
	}
	
	/**
	 * Muestra una lista de posts de una categoría determinada.
	 * Recibe como parámetro el slug de la categoría.
	 * @param string $slug
	 */
	public function postsPorCategoriaAction($categoriaSlug)
	{
		//comentarios para git
		//Cargamos el servicio y el repositorio de los posts.
		$this->wpServicioPosts = $this->get('tlb_wp_posts');
		$em = $this->getDoctrine()->getManager();
		$repositorio = $em->getRepository('TLBWPBundle:TLBPost');
		$repositorio->setWpService($this->wpServicioPosts);
		
		$listaDePosts = $repositorio->postsPorCategoria($categoriaSlug);
		
		return $this->render('TLBWPBundle:WP:index.html.twig', array('tlbPosts' => $listaDePosts));
	}
	
	public function obtenerPostsAction()
	{
		$this->wpServicioPosts = $this->get('tlb_wp_posts');
		$em = $this->getDoctrine()->getManager();
		$repositorio = $em->getRepository('TLBWPBundle:TLBPost');
		$repositorio->setWpService($this->wpServicioPosts);
		$tlbPostsRecientes = $repositorio->listaPostsRecientes();
		
		$opciones = $this->wpServicioPosts->getOpcionesArticulos();
		

		return $this->render('TLBWPBundle:WP:index.html.twig', array('tlbPosts' => $tlbPostsRecientes));
	}
	
	/**
	 * Muestro el post solicitado.
	 * Desde la plantilla he enviado el id del post que quiero mostrar a través de la variable 'idPost'.
	 * Obtengo el $idPost a través del objeto request para obtener luego el post que quiero..
	 * 
	 * @param unknown $anho
	 * @param unknown $mes
	 * @param unknown $dia
	 * @param unknown $postSlug
	 */
	public function obtenerPostAction($anho, $mes, $dia, $postSlug, Request $request)
	{
		$request = $this->getRequest();
		$idPost = $request->query->get('tlbPostId');
		
		//Obtenemos el post.
		$this->wpServicioPosts = $this->get('tlb_wp_posts');
		$em = $this->getDoctrine()->getManager();
		$repositorioPosts = $em->getRepository('TLBWPBundle:TLBPost');
		$repositorioPosts->setWpService($this->wpServicioPosts);
		//Obtener la id del post.
		$args = array(
				'name' => $postSlug,
		);
		$post = get_posts($args);
		
		if (count($post) == 1)
		{
			$idPost = $post[0]->ID;
		}
		//Tener en cuenta si devuelve más de un post.
		$tlbPost = $repositorioPosts->preparaPost($idPost);
		//Obtenemos los comentarios del post.
		$comentarios = $this->obtenerComentarios($tlbPost->getIdPost());
		
		//Creamos un nuevo objeto comentarios para el formulario.
		$nuevoComentario = new TLBComment();
		$formulario = $this->createForm(new TLBCommentType(), $nuevoComentario);
		
		//Ahora validamos.
		if ($request->isMethod('POST')){
			$formulario->bindRequest($request);
			if ($formulario->isValid()) {
				$datosComentario = $this->preparaDatosComentario($formulario->GetData(), $idPost);
				$servicio = $this->get('tlb_wp_comments');
				$servicio->insertaComentario($datosComentario);
				return $this->redirect($this->generateUrl('TLBWP_obtener_post', array('anho' => $anho,
																					  'mes' => $mes,
																					  'dia' => $dia,
																					  'postSlug' => $postSlug,
																					)));
			}//Fin if
		}//Fin if
		
		//Muestro la plantilla con los datos asociados.
		return $this->render('TLBWPBundle:WP:unpost.html.twig',
				array(	'tlbPost' => $tlbPost,
						'comentarios' => $comentarios,
						'formulario' => $formulario->createView(),
						));
	}
	
	
	//Obtener los comentarios de un post determinado por su id.
	public function obtenerComentarios($postId)
	{
		$servicio = $this->get('tlb_wp_comments');
		$comentarios = $servicio->obtenerComentarios($postId);
		return $comentarios;
	}
	
	protected function preparaDatosComentario($datosFormulario, $idPost)
	{
		$datosComentario = array();
		$datosComentario['comment_post_ID'] =  $idPost;
		$datosComentario['comment_author'] =  $datosFormulario->getCommentAuthor();
		$datosComentario['comment_author_email'] = $datosFormulario->getCommentAuthorEmail();
		$datosComentario['comment_author_url'] = $datosFormulario->getCommentAuthorUrl();
		$datosComentario['comment_date'] = date('Y-m-d H:i:s');
		$datosComentario['comment_content'] = $datosFormulario->getCommentContent();
		$datosComentario['comment_approved'] = 0;
		return $datosComentario;
	}
	
}//Fin Controller.