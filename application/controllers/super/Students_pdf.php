<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Students_pdf extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('Students_pdf_model', 'spdf');
    }

    // LOAD MPDF FUNCTION FOR STUDENTS //
    function create_pdf()
    {
        ini_set('memory_limit', '256M');
        // LOAD LIBRARY 
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        // RETRIEVE DATA FROM MODEL

        $stdid = $this->input->post('idForPdf');
        $studentsids = explode(",",$stdid);
        // print_r($studentsids);

        $data['pdf'] = $this->spdf->generate_students_pdf($studentsids);
        //print_r($data);
        $data['title'] = "items";

        // BOOST THE MEMORY LIMIT IF IT'S LOW
        $html = $this->load->view('super/includes/header');
        $html = $this->load->view('super/viewStudentsPdfReport', $data, true);
        $html = $this->load->view('super/includes/footer');
        // RENDER THE VIEW INTO HTML
        $pdf->WriteHTML($html);
        // WRITE THE HTML INTO THE PDF
        $output = 'itemreport' . date('Y_m_d_H_i_s') . '_.pdf';
        $pdf->Output("$output", 'I');
    }

}