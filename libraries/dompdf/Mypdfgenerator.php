<?php defined('BASEPATH') or exit('No direct script access allowed');
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

class Mypdfgenerator
{
    protected $ci;
    public function __construct()
    {
        $this->ci =& get_instance();
    }
    public function generate(
        $view,
        $data = array(),
        $filename =
        'laporan',
        $paper = 'A4',
        $orientation = 'portrait'
    ) {
        $dompdf = new Dompdf();
        $html = $this->ci->load->view($view, $data, TRUE);
        // $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->set_option('isRemoteEnabled', TRUE);
        $dompdf->setPaper($paper, $orientation);
        $dompdf->render();
        $dompdf->stream($filename . ".pdf", array(
            "Attachment"
            => FALSE
        ));
    }
}