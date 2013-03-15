<?php
namespace TLB\WPBundle\Utils;

use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;

class WpConfiguration implements ConfigurationInterface
{
  public function getConfigTreeBuilder()
  {
  	$treeBuilder = new TreeBuilder();
  	$rootNode = $treeBuilder->root('tlbwpconfiguration');
  	//Añadir las definiciones.
  	$rootNode
  	  ->children()
	  	  ->arrayNode('general')
	  	    ->children()
	  	    	->scalarNode('rutabootstrap')->end()
	  	    ->end()
	  	    ->children()
	  	    	->scalarNode('wpbootstrap')->end()
	  	    ->end()
	  	  ->end()
	  	  
	  	  ->arrayNode('articulos')
	  	    ->children()
	  	      ->scalarNode('postsporpagina')->end()
	  	    ->end()
	  	  ->end()
	  ->end()
  	->end();
  	return $treeBuilder;
  }
}