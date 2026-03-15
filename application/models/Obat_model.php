<?php 
class Obat_model extends CI_Model {
    public function get_all() {
        return $this->db->get('obat')->result();
    }

    public function get_by_id($id) {
        return $this->db->get_where('obat', ['id' => $id])->row();
    }
    public function insert($data)
    {
        return $this->db->insert("obat", $data);   
    }
    public function update($data, $id)
    {
        return $this->db->where("id", $id)->update("obat", $data);
    }
    public function delete($id)
    {
        return $this->db->where("id", $id)->delete("obat");
    }
}
