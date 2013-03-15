<?php
//src/TLB/WPBundle/Entity/TLBComment.php
namespace TLB\WPBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="TLB\WPBundle\Entity\Repository\TLBCommentRepository")
 * @author enrique
 *
 */
class TLBComment
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="bigint")
	 */
	protected $commentId;
	
	/**
	 * @ORM\Column(type="bigint")
	 * @ORM\ManyToOne(targetEntity="TLBPost", inversedBy="TLBComment")
	 * @ORM\JoinColumn(name="commentPostId", referencedColumnName="ID")
	 */
	protected $commentPostId;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $commentAuthor;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $commentAuthorEmail;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $commentAuthorUrl;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $commentDate;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $commentContent;
	

    /**
     * Set commentId
     *
     * @param integer $commentId
     * @return TLBComment
     */
    public function setCommentId($commentId)
    {
        $this->commentId = $commentId;
    
        return $this;
    }

    /**
     * Get commentId
     *
     * @return integer 
     */
    public function getCommentId()
    {
        return $this->commentId;
    }

    /**
     * Set commentPostId
     *
     * @param integer $commentPostId
     * @return TLBComment
     */
    public function setCommentPostId($commentPostId)
    {
        $this->commentPostId = $commentPostId;
    
        return $this;
    }

    /**
     * Get commentPostId
     *
     * @return integer 
     */
    public function getCommentPostId()
    {
        return $this->commentPostId;
    }

    /**
     * Set commentAuthor
     *
     * @param string $commentAuthor
     * @return TLBComment
     */
    public function setCommentAuthor($commentAuthor)
    {
        $this->commentAuthor = $commentAuthor;
    
        return $this;
    }

    /**
     * Get commentAuthor
     *
     * @return string 
     */
    public function getCommentAuthor()
    {
        return $this->commentAuthor;
    }

    /**
     * Set commentAuthorEmail
     *
     * @param string $commentAuthorEmail
     * @return TLBComment
     */
    public function setCommentAuthorEmail($commentAuthorEmail)
    {
        $this->commentAuthorEmail = $commentAuthorEmail;
    
        return $this;
    }

    /**
     * Get commentAuthorEmail
     *
     * @return string 
     */
    public function getCommentAuthorEmail()
    {
        return $this->commentAuthorEmail;
    }

    /**
     * Set commentAuthorUrl
     *
     * @param string $commentAuthorUrl
     * @return TLBComment
     */
    public function setCommentAuthorUrl($commentAuthorUrl)
    {
        $this->commentAuthorUrl = $commentAuthorUrl;
    
        return $this;
    }

    /**
     * Get commentAuthorUrl
     *
     * @return string 
     */
    public function getCommentAuthorUrl()
    {
        return $this->commentAuthorUrl;
    }

    /**
     * Set commentDate
     *
     * @param string $commentDate
     * @return TLBComment
     */
    public function setCommentDate($commentDate)
    {
        $this->commentDate = $commentDate;
    
        return $this;
    }

    /**
     * Get commentDate
     *
     * @return string 
     */
    public function getCommentDate()
    {
        return $this->commentDate;
    }

    /**
     * Set commentContent
     *
     * @param string $commentContent
     * @return TLBComment
     */
    public function setCommentContent($commentContent)
    {
        $this->commentContent = $commentContent;
    
        return $this;
    }

    /**
     * Get commentContent
     *
     * @return string 
     */
    public function getCommentContent()
    {
        return $this->commentContent;
    }
}