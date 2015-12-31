<?php

class Menu extends DataObject
{
    
    public static $db = array(
        'Slug' => 'Varchar(20)',
        'Name' => 'Varchar(50)'
    );
    
    public static $has_many = array(
        'MenuItems' => 'MenuItem'
    );
    
    public static $summary_fields = array('Name', 'Slug');
    
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        
        $itemsGridField = $fields->fieldByName('Root.MenuItems.MenuItems');
        
        if ($itemsGridField != null) {
        
            //remove unused buttons
            $itemsGridFieldConfig = $itemsGridField->getConfig();
            $itemsGridFieldConfig
                ->removeComponentsByType('GridFieldExportButton')
                ->removeComponentsByType('GridFieldPrintButton')
                ->removeComponentsByType('GridFieldAddExistingAutocompleter');
                
            //set which columns display
            $itemsGridFieldConfig->getComponentByType('GridFieldDataColumns')->setDisplayFields(array(
                'MenuTitle' => 'Title',
                'Page.Title' => 'Page'
            ));
            
            $itemsGridFieldConfig->addComponent(new GridFieldSortableRows('SortOrder'));
            
            //switch unlink for delete
            $itemsGridFieldConfig->removeComponentsByType('GridFieldDeleteAction')->addComponent(new GridFieldDeleteAction(false));
        }
        
        return $fields;
    }
}
