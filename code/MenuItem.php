<?php

class MenuItem extends DataObject
{
    
    public static $db = array(
        'MenuTitleOverride' => 'Varchar(50)',
        'SortOrder'        => 'Int'
    );
    
    public static $has_one = array(
        'Menu' => 'Menu',
        'Page' => 'Page'
    );
    
    public static $default_sort = 'SortOrder';
    
    public function getMenuTitle()
    {
        return $this->MenuTitleOverride ? $this->MenuTitleOverride : $this->Page()->MenuTitle;
    }
    
    public function getLink()
    {
        return $this->Page() ? $this->Page()->Link() : null;
    }
    
    public function getCMSFields()
    {
        $fields = new FieldList(
            new TextField('MenuTitleOverride', 'Title override'),
            new TreeDropdownField('PageID', 'Page', 'Page')
        );
        
        $this->extend('updateCMSFields', $fields);
        
        return $fields;
    }
}
