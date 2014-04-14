<?php
namespace Craft;

class AssetBreadcrumbPlugin extends BasePlugin
{
    public function getName()
    {
        return Craft::t('Asset Breadcrumb in template');
    }
    
    public function getVersion()
    {
        return '0.1';
    }
    
    public function getDeveloper()
    {
        return 'Bram Mittendorff';
    }
    
    public function getDeveloperUrl()
    {
        return 'http://www.itmundi.nl';
    }
    
    public function addTwigExtension()
    {
        Craft::import('plugins.assetbreadcrumb.twigextensions.AssetBreadcrumbTwigExtension');
        return new AssetBreadcrumbTwigExtension();
    }
}