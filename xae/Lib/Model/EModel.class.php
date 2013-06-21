<?php
class EModel extends Model { 
    // 自动验证设置 
    protected $_validate = array
    ( 
        array('E_title','require','标题必须！'), 
        array('E_content','require','内容必须'), 
    ); 
    // 自动填充设置 
    protected $_auto = array
    ( 
       // array('E_time','time',self::MODEL_INSERT,'function'), 
    ); 
} 
?>