<?php
namespace Craft;

class AssetBreadcrumbTwigExtension extends \Twig_Extension
{
    protected $env;
    public $folderobjects = array();
    
    public function getName()
    {
        return 'Asset breadcrumb plugin';
    }
    
    public function getFilters()
    {
        return array('breadcrumb' => new \Twig_Filter_Method($this, 'breadcrumb', array('is_safe' => array('html'))));
    }
    
    public function getFunctions()
    {
        return array('breadcrumb' => new \Twig_Function_Method($this, 'breadcrumb', array('is_safe' => array('html'))));
    }
    
    public function initRuntime(\Twig_Environment $env)
    {
        $this->env = $env;
    }
    
    public function breadcrumb($number)
    {   
        $folder = craft()->assets->getFolderById((int)$number);
        if(!empty($folder->parentId)) {
            $this->folderobjects[] = $folder;
            return $this->breadcrumb($folder->parentId);
        }
        else {
            return array_reverse($this->folderobjects);
        }
    }
}