<?php
//TLB/WPBundle/Services/WPServiceComments.php
namespace TLB\WPBundle\Services;

class WPServiceComments
{
	protected $postsService;
	
	function __construct($postsService)
	{
		//echo "costructor comentarios";
		$this->postsService = $postsService;
	}
	
	//Obtener los comentarios de un post.
	function obtenerComentarios($postId)
	{
		$argumentos = array(
					'post_id' => $postId,
					);
		$listaComentarios = get_comments($argumentos);
		
		return $listaComentarios;
	}
	
	function insertaComentario($datosComentario)
	{
		$datos = array(
				'comment_post_ID' => $datosComentario->getCommentPostId,
				'comment_author' => $datosComentario->getCommentAuthor,
				'comment_author_email' => $datosComentario->getCommentAuthorEmail,
				'comment_author_url' => $datosComentario->getCommentAutorUrl,
				'comment_content' => $datosComentario->getCommentContent,
				//'comment_type' => '',
				//'comment_parent' => 0,
				//'user_id' => 0,
				//'comment_author_IP' => $comment_author_IP,
				//'comment_agent' => $comment_agent,
				//'comment_date' => $time,
				//'comment_approved' => 0
		);
		
		echo "<pre>";
		print_r($datosComentario);
		echo "</pre>";
		//Convertir los datos del comentario al array $datosComentario para guardarlo en wp
		return wp_insert_comment($datosComentario);
	}
}//Fin class.