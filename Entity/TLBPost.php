<?php
// src/TLB/WPBundle/Entity/Post.php
namespace TLB\WPBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="TLB\WPBundle\Entity\Repository\TLBPostRepository")
 */
class TLBPost
{
	
	
	/**
	 *  @ORM\Id
	 *  @ORM\Column(type="integer")
	 */
	protected $ID;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $postAuthor;
	
	/**
	 * @ORM\Column(type="datetime")
	 */
	protected $postDate;
	
	/**
	 * @ORM\Column(type="datetime")
	 */
	protected $postDateGMT;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $postContent;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $postTitle;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $postExcerpt;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $postStatus;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $postCommentStatus;

	/**
	 * @ORM\Column(type="string")
	 */
	protected $postPingStatus;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $postPassword;
		
	/**
	 * @ORM\Column(type="string")
	 */
	protected $postName;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $postToPing;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $postPinged;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $postModified;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $postModifiedGMT;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $postContentFiltered;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $postParent;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $postGuid;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $postMenuOrder;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $postType;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $postMimeType;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $postCommentCount;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $postFilter;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $postPermalink;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $postSlug;
	
	
	
	
	//Aquí hay que añadir comentarios.
	/**
	 * @ORM\OneToMany(targetEntity="TLBComment", mappedBy="commentPostId")
	 */
	protected $postComments;
	

    /**
     * Set ID
     *
     * @param integer $iD
     * @return TLBPost
     */
    public function setID($iD)
    {
        $this->ID = $iD;
    
        return $this;
    }

    /**
     * Get ID
     *
     * @return integer 
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * Set postTitle
     *
     * @param string $postTitle
     * @return TLBPost
     */
    public function setPostTitle($postTitle)
    {
        $this->postTitle = $postTitle;
    
        return $this;
    }

    /**
     * Get postTitle
     *
     * @return string 
     */
    public function getPostTitle()
    {
        return $this->postTitle;
    }

    /**
     * Set postContent
     *
     * @param string $postContent
     * @return TLBPost
     */
    public function setPostContent($postContent)
    {
        $this->postContent = $postContent;
    
        return $this;
    }

    /**
     * Get postContent
     *
     * @return string 
     */
    public function getPostContent()
    {
        return $this->postContent;
    }

    /**
     * Set postPermalink
     *
     * @param string $postPermalink
     * @return TLBPost
     */
    public function setPostPermalink($postPermalink)
    {
        $this->postPermalink = $postPermalink;
    
        return $this;
    }

    /**
     * Get postPermalink
     *
     * @return string 
     */
    public function getPostPermalink()
    {
        return $this->postPermalink;
    }

    /**
     * Set postSlug
     *
     * @param string $postSlug
     * @return TLBPost
     */
    public function setPostSlug($postSlug)
    {
        $this->postSlug = $postSlug;
    
        return $this;
    }

    /**
     * Get postSlug
     *
     * @return string 
     */
    public function getPostSlug()
    {
        return $this->postSlug;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->postComments = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add postComments
     *
     * @param \TLB\WPBundle\Entity\TLBComment $postComments
     * @return TLBPost
     */
    public function addPostComment(\TLB\WPBundle\Entity\TLBComment $postComments)
    {
        $this->postComments[] = $postComments;
    
        return $this;
    }

    /**
     * Remove postComments
     *
     * @param \TLB\WPBundle\Entity\TLBComment $postComments
     */
    public function removePostComment(\TLB\WPBundle\Entity\TLBComment $postComments)
    {
        $this->postComments->removeElement($postComments);
    }

    /**
     * Get postComments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPostComments()
    {
        return $this->postComments;
    }

    /**
     * Set postAuthor
     *
     * @param string $postAuthor
     * @return TLBPost
     */
    public function setPostAuthor($postAuthor)
    {
        $this->postAuthor = $postAuthor;
    
        return $this;
    }

    /**
     * Get postAuthor
     *
     * @return string 
     */
    public function getPostAuthor()
    {
        return $this->postAuthor;
    }

    /**
     * Set postDate
     *
     * @param \DateTime $postDate
     * @return TLBPost
     */
    public function setPostDate($postDate)
    {
        $this->postDate = $postDate;
    
        return $this;
    }

    /**
     * Get postDate
     *
     * @return \DateTime 
     */
    public function getPostDate()
    {
        return $this->postDate;
    }

    /**
     * Set postDateGMT
     *
     * @param \DateTime $postDateGMT
     * @return TLBPost
     */
    public function setPostDateGMT($postDateGMT)
    {
        $this->postDateGMT = $postDateGMT;
    
        return $this;
    }

    /**
     * Get postDateGMT
     *
     * @return \DateTime 
     */
    public function getPostDateGMT()
    {
        return $this->postDateGMT;
    }

    /**
     * Set postExcerpt
     *
     * @param string $postExcerpt
     * @return TLBPost
     */
    public function setPostExcerpt($postExcerpt)
    {
        $this->postExcerpt = $postExcerpt;
    
        return $this;
    }

    /**
     * Get postExcerpt
     *
     * @return string 
     */
    public function getPostExcerpt()
    {
        return $this->postExcerpt;
    }

    /**
     * Set postStatus
     *
     * @param string $postStatus
     * @return TLBPost
     */
    public function setPostStatus($postStatus)
    {
        $this->postStatus = $postStatus;
    
        return $this;
    }

    /**
     * Get postStatus
     *
     * @return string 
     */
    public function getPostStatus()
    {
        return $this->postStatus;
    }

    /**
     * Set postCommentStatus
     *
     * @param string $postCommentStatus
     * @return TLBPost
     */
    public function setPostCommentStatus($postCommentStatus)
    {
        $this->postCommentStatus = $postCommentStatus;
    
        return $this;
    }

    /**
     * Get postCommentStatus
     *
     * @return string 
     */
    public function getPostCommentStatus()
    {
        return $this->postCommentStatus;
    }

    /**
     * Set postPingStatus
     *
     * @param string $postPingStatus
     * @return TLBPost
     */
    public function setPostPingStatus($postPingStatus)
    {
        $this->postPingStatus = $postPingStatus;
    
        return $this;
    }

    /**
     * Get postPingStatus
     *
     * @return string 
     */
    public function getPostPingStatus()
    {
        return $this->postPingStatus;
    }

    /**
     * Set postPassword
     *
     * @param string $postPassword
     * @return TLBPost
     */
    public function setPostPassword($postPassword)
    {
        $this->postPassword = $postPassword;
    
        return $this;
    }

    /**
     * Get postPassword
     *
     * @return string 
     */
    public function getPostPassword()
    {
        return $this->postPassword;
    }

    /**
     * Set postName
     *
     * @param string $postName
     * @return TLBPost
     */
    public function setPostName($postName)
    {
        $this->postName = $postName;
    
        return $this;
    }

    /**
     * Get postName
     *
     * @return string 
     */
    public function getPostName()
    {
        return $this->postName;
    }

    /**
     * Set postToPing
     *
     * @param string $postToPing
     * @return TLBPost
     */
    public function setPostToPing($postToPing)
    {
        $this->postToPing = $postToPing;
    
        return $this;
    }

    /**
     * Get postToPing
     *
     * @return string 
     */
    public function getPostToPing()
    {
        return $this->postToPing;
    }

    /**
     * Set postPinged
     *
     * @param string $postPinged
     * @return TLBPost
     */
    public function setPostPinged($postPinged)
    {
        $this->postPinged = $postPinged;
    
        return $this;
    }

    /**
     * Get postPinged
     *
     * @return string 
     */
    public function getPostPinged()
    {
        return $this->postPinged;
    }

    /**
     * Set postModified
     *
     * @param string $postModified
     * @return TLBPost
     */
    public function setPostModified($postModified)
    {
        $this->postModified = $postModified;
    
        return $this;
    }

    /**
     * Get postModified
     *
     * @return string 
     */
    public function getPostModified()
    {
        return $this->postModified;
    }

    /**
     * Set postModifiedGMT
     *
     * @param string $postModifiedGMT
     * @return TLBPost
     */
    public function setPostModifiedGMT($postModifiedGMT)
    {
        $this->postModifiedGMT = $postModifiedGMT;
    
        return $this;
    }

    /**
     * Get postModifiedGMT
     *
     * @return string 
     */
    public function getPostModifiedGMT()
    {
        return $this->postModifiedGMT;
    }

    /**
     * Set postContentFiltered
     *
     * @param string $postContentFiltered
     * @return TLBPost
     */
    public function setPostContentFiltered($postContentFiltered)
    {
        $this->postContentFiltered = $postContentFiltered;
    
        return $this;
    }

    /**
     * Get postContentFiltered
     *
     * @return string 
     */
    public function getPostContentFiltered()
    {
        return $this->postContentFiltered;
    }

    /**
     * Set postParent
     *
     * @param string $postParent
     * @return TLBPost
     */
    public function setPostParent($postParent)
    {
        $this->postParent = $postParent;
    
        return $this;
    }

    /**
     * Get postParent
     *
     * @return string 
     */
    public function getPostParent()
    {
        return $this->postParent;
    }

    /**
     * Set postGuid
     *
     * @param string $postGuid
     * @return TLBPost
     */
    public function setPostGuid($postGuid)
    {
        $this->postGuid = $postGuid;
    
        return $this;
    }

    /**
     * Get postGuid
     *
     * @return string 
     */
    public function getPostGuid()
    {
        return $this->postGuid;
    }

    /**
     * Set postMenuOrder
     *
     * @param string $postMenuOrder
     * @return TLBPost
     */
    public function setPostMenuOrder($postMenuOrder)
    {
        $this->postMenuOrder = $postMenuOrder;
    
        return $this;
    }

    /**
     * Get postMenuOrder
     *
     * @return string 
     */
    public function getPostMenuOrder()
    {
        return $this->postMenuOrder;
    }

    /**
     * Set postType
     *
     * @param string $postType
     * @return TLBPost
     */
    public function setPostType($postType)
    {
        $this->postType = $postType;
    
        return $this;
    }

    /**
     * Get postType
     *
     * @return string 
     */
    public function getPostType()
    {
        return $this->postType;
    }

    /**
     * Set postMimeType
     *
     * @param string $postMimeType
     * @return TLBPost
     */
    public function setPostMimeType($postMimeType)
    {
        $this->postMimeType = $postMimeType;
    
        return $this;
    }

    /**
     * Get postMimeType
     *
     * @return string 
     */
    public function getPostMimeType()
    {
        return $this->postMimeType;
    }

    /**
     * Set postCommentCount
     *
     * @param string $postCommentCount
     * @return TLBPost
     */
    public function setPostCommentCount($postCommentCount)
    {
        $this->postCommentCount = $postCommentCount;
    
        return $this;
    }

    /**
     * Get postCommentCount
     *
     * @return string 
     */
    public function getPostCommentCount()
    {
        return $this->postCommentCount;
    }

    /**
     * Set postFilter
     *
     * @param string $postFilter
     * @return TLBPost
     */
    public function setPostFilter($postFilter)
    {
        $this->postFilter = $postFilter;
    
        return $this;
    }

    /**
     * Get postFilter
     *
     * @return string 
     */
    public function getPostFilter()
    {
        return $this->postFilter;
    }
}