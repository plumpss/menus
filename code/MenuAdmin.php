<?php

class MenuAdmin extends ModelAdmin
{
    
    private static $url_segment = 'menus';
    private static $menu_title = 'Menus';
    private static $managed_models = array('Menu');
    
    public $showImportForm = false;
}
