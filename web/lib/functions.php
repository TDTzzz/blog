<?php

/**
 * 读取系统配置
 * @global type $db
 * @param type $k
 * @return boolean
 */
function C( $k ){
    global $db;
    $row = $db->get("select * from settings where k='{$k}'");
    if( $row ){
        return $row['v'];
    }
    return false;
}
