<?php
class modelsClass extends cmsFormsClass
{
    public function emptyItemRead(&$item)
    {
        $item = $this->app->itemRead('subject',$this->app->route->id);
        return $item;
    }
    public function beforeItemSave(&$item)
    {
        header("Content-type:application/json");
        $item['subject'] = 'model';
        if ($item['id'] == '_new') $item['id'] = $this->app->newId('','md');
        $item = $this->app->itemSave('subject',$item,false);
        $item=$this->app->jsonEncode($item);
        echo $item;
        die;
    }

    public function beforeItemRemove(&$item)
    {
        header("Content-type:application/json");
        if (isset($item['id']) and $item['id'] > '') {
            // удаляем все subject
            $remove = $this->app->itemList('subject', ['filter'=>['model'=>$item['id']]]);
            if ($remove['count'] > 0) {
                foreach($remove['list'] as $rm) $this->app->itemRemove('subject',$rm['id'],false);
            }
            $res = $this->app->itemRemove('subject',$item['id']);

            echo json_encode($res);
        }

        die;
    }

}
