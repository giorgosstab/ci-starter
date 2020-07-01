<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Dompdf\Dompdf;

class DOM_Pdf extends Dompdf
{
    public function __construct()
	{
        parent::__construct();
    }
    
	public function create($html,$filename)
    {
	    $dompdf = new Dompdf();
	    $dompdf->loadHtml($html);
	    $dompdf->render();
	    $dompdf->stream($filename.'.pdf');
    }

    public function open($html,$filename)
    {
		$dompdf = new Dompdf();
		$dompdf->setBasePath(realpath(FCPATH . 'public/css/documents/'));
		$html = preg_replace('/>\s+</', "><", $html);
	    $dompdf->loadHtml($html);
		$dompdf->render();
	    $dompdf->stream($filename.'.pdf',array('Attachment' => false));
    }
}