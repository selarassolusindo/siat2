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

/**
 * buat nomor cost sheet baru
 * CST0001
 */
function getNewCSheet($prefix, $fieldName, $tableName)
{
    $sNextKode = "";
    $sLastKode = "";
    $CI =& get_instance();
    $CI->db->order_by($fieldName, 'desc');
    $CI->db->limit(1);
    $row = $CI->db->get($tableName)->row();
    if ($row) {
        $value = $row->$fieldName;
        $sLastKode = intval(substr($value, 3, 4));
        $sLastKode = intval($sLastKode) + 1;
        $sNextKode = $prefix . sprintf('%04s', $sLastKode);
        if (strlen($sNextKode) > 7) {
            $sNextKode = $prefix . "9999";
        }
    } else {
        $sNextKode = $prefix . "0001";
    }
    return $sNextKode;
}

/**
 * buat nomor invoice baru
 * INV0001
 */
function getNewInvoice($prefix, $fieldName, $tableName)
{
    $sNextKode = "";
    $sLastKode = "";
    $CI =& get_instance();
    $CI->db->order_by($fieldName, 'desc');
    $CI->db->limit(1);
    $row = $CI->db->get($tableName)->row();
    if ($row) {
        $value = $row->$fieldName;
        $sLastKode = intval(substr($value, 3, 4));
        $sLastKode = intval($sLastKode) + 1;
        $sNextKode = $prefix . sprintf('%04s', $sLastKode);
        if (strlen($sNextKode) > 7) {
            $sNextKode = $prefix . "9999";
        }
    } else {
        $sNextKode = $prefix . "0001";
    }
    return $sNextKode;
}
