<?php
require_once(APPPATH.'third_party/tcpdf/tcpdf.php');

class Pdf extends TCPDF {
    protected $ci;
    
    public function __construct($orientation='P', $unit='mm', $format='A4', $unicode=true, $encoding='UTF-8', $diskcache=false, $pdfa=false) {
        parent::__construct($orientation, $unit, $format, $unicode, $encoding, $diskcache, $pdfa);
        $this->ci =& get_instance();
    }
    
    public function load_view($view, $data = array()) {
        $html = $this->ci->load->view($view, $data, TRUE);
        $this->AddPage();
        $this->writeHTML($html, true, false, true, false, '');
    }
}