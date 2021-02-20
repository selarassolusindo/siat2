<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * buat Kode baru otomatis
 */
function getNewKode($prefix, $fieldName, $tableName)
{
    $sNextKode = "";
    $sLastKode = "";
    $CI =& get_instance();
    $CI->db->order_by($fieldName, 'desc');
    $CI->db->limit(1);
    $row = $CI->db->get($tableName)->row();
    if ($row) {
        $value = $row->$fieldName;
        $sLastKode = intval(substr($value, 2, 3));
        $sLastKode = intval($sLastKode) + 1;
        $sNextKode = $prefix . sprintf('%03s', $sLastKode);
        if (strlen($sNextKode) > 5) {
            $sNextKode = $prefix . "999";
        }
    } else {
        $sNextKode = $prefix . "001";
    }
    return $sNextKode;
}
