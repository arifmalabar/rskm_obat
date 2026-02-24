<?php 

class Pasien_model extends CI_Model {
    public function get_all() {
        return $this->db->get('pasien')->result();
    }

    public function search($keyword) {
        $this->db->like('nama_pasien', $keyword);
        return $this->db->get('pasien')->result();
    }

    public function get_by_id($id) {
        return $this->db->get_where('pasien', ['id' => $id])->row();
    }
}