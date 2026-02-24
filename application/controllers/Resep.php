<?php 
class Resep extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model(['Pasien_model', 'Obat_model', 'Resep_model']);
    }

    public function index() {
        $keyword = $this->input->get('keyword');
        $poli = $this->input->get('poli');
        $tanggal = $this->input->get('tanggal');

        $data['resep'] = $this->Resep_model->get_filtered($keyword, $poli, $tanggal);
        $data['title'] = 'Data Resep Pasien';

        $this->load->view('templates/header', $data);
        $this->load->view('resep/index', $data);
        $this->load->view('templates/footer');
    }

    public function cetak($id) {
        $data['pasien'] = $this->Pasien_model->get_by_id($id);
        $data['resep'] = $this->Resep_model->get_by_pasien($id);
        $this->load->view('resep/cetak', $data);
    }

    public function rekap() {
        $data['rekap'] = $this->Resep_model->get_rekap_bulanan();
        $data['title'] = 'Rekap Bulanan';
        $this->load->view('templates/header', $data);
        $this->load->view('resep/rekap', $data);
        $this->load->view('templates/footer');
    }

    public function tagihan($id) {
        $data['pasien'] = $this->Pasien_model->get_by_id($id);
        $data['resep'] = $this->Resep_model->get_by_pasien($id);
        $this->load->view('templates/header', ['title' => 'Detail Tagihan Pasien']);
        $this->load->view('resep/tagihan', $data);
        $this->load->view('templates/footer');
    }


}
