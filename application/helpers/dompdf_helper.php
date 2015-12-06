<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function pdf_create($html, $filename='', $stream=TRUE) 
{
    require_once("dompdf/dompdf_config.inc.php");

    $dompdf = new DOMPDF();
    $dompdf->load_html_file($html);
    $dompdf->render();

    if ($stream) {
        $dompdf->stream($filename.".pdf");
    } else {
        return $dompdf->output();
    }
}

function pdf_show($html, $filename='', $stream=TRUE) {
	require_once("dompdf/dompdf_config.inc.php");

    $dompdf = new DOMPDF();
    $dompdf->set_paper("A4");
    $dompdf->load_html($html);
    $dompdf->render();
    $canvas = $dompdf->get_canvas();
	#$font = Font_Metrics::get_font("helvetica", "bold");
	$canvas->page_text(16, 800, "Page: {PAGE_NUM} of {PAGE_COUNT}", '', 8, array(0,0,0));

    if($stream){
        return $dompdf->stream($filename.".pdf", array("Attachment" => 0));
    }
    else{
         return $dompdf->output();
    }
}
?>