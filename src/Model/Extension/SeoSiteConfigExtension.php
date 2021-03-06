<?php

namespace CyberDuck\SEO\Model\Extension;

use SilverStripe\Core\Config\Config;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\HeaderField;
use SilverStripe\Forms\LiteralField;
use SilverStripe\Forms\TextField;
use SilverStripe\ORM\DataExtension;

/**
 * SeoSiteConfigExtension
 *
 * Updates the CMS site config with custom fields for SEO and Social sharing
 *
 * @package silverstripe-seo
 * @license MIT License https://github.com/cyber-duck/silverstripe-seo/blob/master/LICENSE
 * @author  <andrewm@cyber-duck.co.uk>
 **/
class SeoSiteConfigExtension extends DataExtension
{
    /**
     * Array of extra CMS settings fields
     *
     * @since version 1.0.6
     *
     * @config array $db 
     **/
    private static $db = [
        'OGSiteName'           => 'Varchar(512)',
        'TwitterHandle'        => 'Varchar(512)',
        'CreatorTwitterHandle' => 'Varchar(512)',
        'FacebookAppID'        => 'Varchar(512)',
        'UseTitleAsMetaTitle'  => 'Boolean'
    ];
    
    /**
     * Adds extra fields for social config across networks
     *
     * @since version 1.0.6
     *
     * @param FieldList $fields The current FieldList object
     *
     * @return FieldList
     **/
    public function updateCMSFields(FieldList $fields)
    {
        $fields->addFieldToTab('Root.SEO', HeaderField::create(false, 'Social Settings'));
        $fields->addFieldToTab('Root.SEO', TextField::create('OGSiteName', 'Open Graph Site Name'));
        $fields->addFieldToTab('Root.SEO', TextField::create('TwitterHandle', 'Twitter handle (no @)'));
        $fields->addFieldToTab('Root.SEO', TextField::create('CreatorTwitterHandle', 'Twitter creator handle (no @)'));
        $fields->addFieldToTab('Root.SEO', TextField::create('FacebookAppID', 'Facebook APP ID'));

        $fields->addFieldToTab('Root.SEO', HeaderField::create(false, 'Meta'));
        $fields->addFieldToTab('Root.SEO', CheckboxField::create('UseTitleAsMetaTitle', 'Default Meta title to page Title'));
        
        return $fields;
    }
}