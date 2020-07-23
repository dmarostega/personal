<?php
namespace DMarostega;

class ViewAdmin extends BaseView{

    public function __construct($args = array(), $template  = "/Views/admin/"){
        parent::__construct('admin', $args, $template);
    }
}
