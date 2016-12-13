<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class fpdf {

    function fpdf()
    {
        $CI = & get_instance();
        log_message('Debug', 'mPDF class is loaded.');
    }

    function load()
    {
        include_once APPPATH.'/third_party/fpdf/fpdf.php';
        $p='P';
        $m='mm';
        $s='A4';

        return new FPDF($p,$m,$s);
    }
}