<?php
namespace Craft;

class AssetBreadcrumbTwigExtension extends \Twig_Extension
{
    protected $env;
    public $folderids = array();
    
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
        if(!empty(craft()->assets->getFolderById((int)$number)->parentId)) {
            $this->folderids[] = (int)$number;
            return $this->breadcrumb(craft()->assets->getFolderById((int)$number)->parentId);
        }
        else {
            return $this->folderids;
        }
    }
}