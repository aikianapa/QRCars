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
        $item['subject'] = 'dealer';
        if ($item['id'] == '_new') $item['id'] = $this->app->newId('','de');
        if (!isset($item['managers'])) {
            // создание пользователя
            $email = $item['details']['login'];
            $pass = $item['details']['password'];
            if ($pass == '') $pass = $this->app->passwordGenerate(8);
            $error = false;
            if ($email == '' or !is_email($email)) {
                $error = true;
                $msg = "Введите корректный email $email";
            }
            if (!$error) $users = $this->app->itemList('users', ['filter'=>['email'=>$email],'limit'=>1]);
            if ($users['count'] == 0) {
                $user = [
                    '_id' => $item['id']
                    ,'active' => 'on'
                    ,'email'  => $email
                    ,'role' => 'dealer'
                    ,'password' => $this->app->passwordMake($pass)
                    ,'first_name' => $item['details']['chief_name']
                    ,'last_name' => $item['details']['chief_family']
                    ,'dealer' => $item['id']
                ];
            } else {
                $error = true;
                $msg = "Ошибка! Пользователь с эл.почтой {$email} уже существует в системе.";
            }

            if ($error) {
                echo $this->app->jsonEncode(['error'=>true,'msg'=>$msg]);
                die;
            } else {
                $user = $this->app->itemSave('users',$user, false);
                if (!$user) {
                    $msg = "Ошибка! Не удалось создать запись пользователя.";
                    echo $this->app->jsonEncode(['error'=>true,'msg'=>$msg]);
                    die;
                }
            }
            // ==================
        }

        $item = $this->app->itemSave('subject',$item,false);

        if (!isset($item['welcome'])) {
            $item['welcome'] == [];
            $knlgs = $this->app->treeRead('knowledge');
            $knlgs = $knlgs['tree']['data'];
            foreach($knlgs as $kni => $knv) {
                $knowledge = [
                    '_id' => $this->app->newId('','kn')
                    ,'active' => 'on'
                    ,'subjects' => []
                    ,'manages' => []
                    ,'subject' => 'knowledge'
                    ,'name' => $knv['name']
                    ,'dealer' => ['$oid'=>$item['id']]
                    ,'test' =>true
                ];
                $knowledge = $this->app->itemSave('subject',$knowledge,false);
                if ($knowledge) $item['welcome'][$knv['id']] = $knowledge['id'];
            }
            $this->app->itemSave('subject',$item,true);
        }
        $item=$this->app->jsonEncode($item);
        echo $item;
        die;
    }

    public function beforeItemRemove(&$item)
    {
        header("Content-type:application/json");
        if (isset($item['id']) and $item['id'] > '') {
            // удаляем все users
            $remove = $this->app->itemList('users', ['filter'=>['dealer'=>$item['id']]]);
            if ($remove['count'] > 0) {
                foreach($remove['list'] as $rm) $this->app->itemRemove('users',$rm['id'],false);
            }       
            // удаляем все subject
            $remove = $this->app->itemList('subject', ['filter'=>['dealer'=>$item['id']]]);
            if ($remove['count'] > 0) {
                foreach($remove['list'] as $rm) $this->app->itemRemove('subject',$rm['id'],false);
            }
            $res = $this->app->itemRemove('subject',$item['id']);
            $this->app->tableFlush('users');
            echo json_encode($res);
        }

        die;
    }

}
