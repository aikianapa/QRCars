<?php
class dealersClass extends cmsFormsClass
{
    public function emptyItemRead(&$item)
    {
        $item = $this->app->itemRead('subject',$this->app->route->id);
        return $item;
    }
    public function beforeItemSave(&$item)
    {
        header("Content-type:application/json");
        $item = $this->app->itemSave('subject',$item);
        echo json_encode($item);
        die;
    }

}
