<?php
class Obat extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model("Obat_model");
    }
    public function index()
    {
        $data['title'] = 'Data Resep Pasien';
        $data['obat'] = $this->Obat_model->get_all();

        $this->load->view('templates/header', $data);
        $this->load->view('obat/index', $data);
        $this->load->view('templates/footer');
    }
    public function insertData()
    {
        $data = $this->input->post();
        $this->Obat_model->insert($data);
        redirect("obat");
    }
    public function updateData($id)
    {
        $data = $this->input->post();
        $this->Obat_model->update($data, $id);
        redirect("obat");
    }
    public function deleteData($id)
    {
        $this->Obat_model->delete($id);
        redirect("obat");
    }
}
