<?php
class subjectClass extends cmsFormsClass {

    function afterItemRead(&$item) {
        isset($item['_created']) && !isset($item['created']) ? $item['created'] = $item['_created'] : null;
        isset($item['created']) && !isset($item['_created']) ? $item['_created'] = $item['created'] : null;
    }

    function beforeItemShow(&$item) {
        $item['created'] = date('d.m.Y H:i', strtotime($item['created']));
    }

}
?>
