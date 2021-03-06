<?php
namespace TLB\WPBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 */
class TLBPostPreparado{
	/**
	 *  @ORM\Id
	 *  @ORM\Column(type="integer")
	 */
	protected $idPost;

	/**
	 * @ORM\Column(type="string")
	 */
	protected $titulo;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $contenido;
	
	
	protected $categoria;
	
	/**
	 * @ORM\Column(type="datetime")
	 */
	protected $fecha;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $dia;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $mes;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $anho;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $hora;
	
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $idAutor;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $nombreAutor;
	
	/**
	 * @ORM\Column(type="integer")
	 */
	protected $numeroComentarios;
	
	/**
	 * @ORM\Column(type="string")
	 */
	
	protected $extracto;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $slug;
	
	/**
	 * @ORM\Column(type="array")
	 */
	protected $nombresCategorias;
	
	/**
	 * @ORM\OneToMany(targetEntity="TLBComment", mappedBy="commentPostId")
	 */
	protected $comentarios;
	
	
	
	
    /**
     * Set idPost
     *
     * @param integer $idPost
     * @return TLBPostPreparado
     */
    public function setIdPost($idPost)
    {
        $this->idPost = $idPost;
    
        return $this;
    }

    /**
     * Get idPost
     *
     * @return integer 
     */
    public function getIdPost()
    {
        return $this->idPost;
    }

    /**
     * Set contenido
     *
     * @param string $contenido
     * @return TLBPostPreparado
     */
    public function setContenido($contenido)
    {
        $this->contenido = $contenido;
    
        return $this;
    }

    /**
     * Get contenido
     *
     * @return string 
     */
    public function getContenido()
    {
        return $this->contenido;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return TLBPostPreparado
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    
        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    

    /**
     * Set numeroComentarios
     *
     * @param integer $numeroComentarios
     * @return TLBPostPreparado
     */
    public function setNumeroComentarios($numeroComentarios)
    {
        $this->numeroComentarios = $numeroComentarios;
    
        return $this;
    }

    /**
     * Get numeroComentarios
     *
     * @return integer 
     */
    public function getNumeroComentarios()
    {
        return $this->numeroComentarios;
    }

    /**
     * Set extracto
     *
     * @param string $extracto
     * @return TLBPostPreparado
     */
    public function setExtracto($extracto)
    {
        $this->extracto = $extracto;
    
        return $this;
    }

    /**
     * Get extracto
     *
     * @return string 
     */
    public function getExtracto()
    {
        return $this->extracto;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return TLBPostPreparado
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    
        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set titulo
     *
     * @param string $titulo
     * @return TLBPostPreparado
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    
        return $this;
    }

    /**
     * Get titulo
     *
     * @return string 
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set idAutor
     *
     * @param string $idAutor
     * @return TLBPostPreparado
     */
    public function setIdAutor($idAutor)
    {
        $this->idAutor = $idAutor;
    
        return $this;
    }

    /**
     * Get idAutor
     *
     * @return string 
     */
    public function getIdAutor()
    {
        return $this->idAutor;
    }

    /**
     * Set nombreAutor
     *
     * @param string $nombreAutor
     * @return TLBPostPreparado
     */
    public function setNombreAutor($nombreAutor)
    {
        $this->nombreAutor = $nombreAutor;
    
        return $this;
    }

    /**
     * Get nombreAutor
     *
     * @return string 
     */
    public function getNombreAutor()
    {
        return $this->nombreAutor;
    }

    /**
     * Set nombresCategorias
     *
     * @param array $nombresCategorias
     * @return TLBPostPreparado
     */
    public function setNombresCategorias($nombresCategorias)
    {
        $this->nombresCategorias = $nombresCategorias;
    
        return $this;
    }

    /**
     * Get nombresCategorias
     *
     * @return array 
     */
    public function getNombresCategorias()
    {
        return $this->nombresCategorias;
    }

    /**
     * Set dia
     *
     * @param string $dia
     * @return TLBPostPreparado
     */
    public function setDia($dia)
    {
        $this->dia = $dia;
    
        return $this;
    }

    /**
     * Get dia
     *
     * @return string 
     */
    public function getDia()
    {
        return $this->dia;
    }

    /**
     * Set mes
     *
     * @param string $mes
     * @return TLBPostPreparado
     */
    public function setMes($mes)
    {
        $this->mes = $mes;
    
        return $this;
    }

    /**
     * Get mes
     *
     * @return string 
     */
    public function getMes()
    {
        return $this->mes;
    }

    /**
     * Set anho
     *
     * @param string $anho
     * @return TLBPostPreparado
     */
    public function setAnho($anho)
    {
        $this->anho = $anho;
    
        return $this;
    }

    /**
     * Get anho
     *
     * @return \anho 
     */
    public function getAnho()
    {
        return $this->anho;
    }

    /**
     * Set hora
     *
     * @param string $hora
     * @return TLBPostPreparado
     */
    public function setHora($hora)
    {
        $this->hora = $hora;
    
        return $this;
    }

    /**
     * Get hora
     *
     * @return string 
     */
    public function getHora()
    {
        return $this->hora;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
      $this->comentarios = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add comentarios
     *
     * @param \TLB\WPBundle\Entity\TLBComment $comentarios
     * @return TLBPostPreparado
     */
    public function addComentario(\TLB\WPBundle\Entity\TLBComment $comentarios)
    {
        $this->comentarios[] = $comentarios;
    
        return $this;
    }

    /**
     * Remove comentarios
     *
     * @param \TLB\WPBundle\Entity\TLBComment $comentarios
     */
    public function removeComentario(\TLB\WPBundle\Entity\TLBComment $comentarios)
    {
        $this->comentarios->removeElement($comentarios);
    }

    /**
     * Get comentarios
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComentarios()
    {
        return $this->comentarios;
    }
}