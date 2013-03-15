<?php
namespace TLB\WPBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class TLBCommentType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $opciones)
	{
		$builder->add('commentAuthor');
		$builder->add('commentAuthorEmail');//, null, array('widget' => 'single_text'));
		$builder->add('commentAuthorUrl');
		$builder->add('commentContent');
	}
	
	public function getName()
	{
		return 'TLBComment';
	}
}