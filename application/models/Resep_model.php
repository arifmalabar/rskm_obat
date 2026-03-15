<?php

class Resep_model extends CI_Model {
    public function get_filtered($keyword = '', $poli = '', $tanggal = '') {
        /*$this->db->select('
            pasien.id as pasien_id,
            no_rm,
            no_sep,
            nama_pasien,
            asal_poli,
            MIN(resep.tanggal_input) as tanggal_input,
            SUM(resep.jumlah * obat.harga) AS total_harga, 
            COUNT(resep.pasien_id) AS jml_penggunaan_obat
            ');
        $this->db->from('resep');
        $this->db->join('pasien', 'pasien.id = resep.pasien_id');
        $this->db->join('obat', 'obat.id = resep.obat_id');

        if ($keyword) $this->db->like('pasien.nama_pasien', $keyword);
        if ($poli) $this->db->where('pasien.asal_poli', $poli);
        if ($tanggal) $this->db->where('resep.tanggal_input', $tanggal);

        $this->db->group_by('resep.pasien_id');
        $this->db->order_by("jml_penggunaan_obat", "DESC");
        return $this->db->get()->result();*/
        return $this->db->query("SELECT 
                        *,
                        (
                            SELECT 
                                SUM(resep.jumlah * (SELECT obat.harga FROM obat WHERE obat.id = resep.obat_id)) as total 
                            FROM resep WHERE resep.pasien_id = pasien.id
                        ) total_harga,
                        (
                            SELECT 
                                COUNT(resep.pasien_id) 
                            FROM resep
                            WHERE resep.pasien_id = pasien.id
                        ) jml_penggunaan_obat,
                        (
                            SELECT 
                                resep.tanggal_input tanggal_input
                            FROM resep
                            WHERE resep.pasien_id = pasien.id
                            GROUP by resep.pasien_id
                        ) tanggal_input,
                        pasien.id pasien_id
                    FROM `pasien`  
                    ORDER BY `pasien`.`id`  ASC")
            ->result();
    }

    public function get_by_pasien($id_pasien) {
        $this->db->select('resep.*, obat.nama_obat, obat.harga');
        $this->db->from('resep');
        $this->db->join('obat', 'obat.id = resep.obat_id');
        $this->db->where('resep.pasien_id', $id_pasien);
        return $this->db->get()->result();
    }

    public function get_rekap_bulanan() {
        $query = $this->db->query("SELECT MONTH(tanggal_input) AS bulan, COUNT(*) AS jumlah_obat, SUM(jumlah * obat.harga) AS total_tagihan
            FROM resep
            JOIN obat ON resep.obat_id = obat.id
            GROUP BY MONTH(tanggal_input)");
        return $query->result();
    }
}
