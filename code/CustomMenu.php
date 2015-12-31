<?php

class CustomMenu extends Extension
{
    
    public function CustomMenu($slug = null)
    {
        if ($slug != null) {
            if ($Menu = Menu::get()->filter('Slug', $slug)->First()) {
                return $Menu->MenuItems();
            } else {
                return null;
            }
        }
    }
}
