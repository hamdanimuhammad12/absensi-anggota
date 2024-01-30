<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function get($table, $data = null, $where = null)
    {
        if ($data != null) {
            return $this->db->get_where($table, $data)->row_array();
        } else {
            return $this->db->get_where($table, $where)->result_array();
        }
    }

    public function update($table, $pk, $id, $data)
    {
        $this->db->where($pk, $id);
        return $this->db->update($table, $data);
    }

    public function insert($table, $data, $batch = false)
    {
        return $batch ? $this->db->insert_batch($table, $data) : $this->db->insert($table, $data);
    }

    public function delete($table, $pk, $id)
    {
        return $this->db->delete($table, [$pk => $id]);
    }

    public function getUsers($id)
    {
        /**
         * ID disini adalah untuk data yang tidak ingin ditampilkan. 
         * Maksud saya disini adalah 
         * tidak ingin menampilkan data user yang digunakan, 
         * pada managemen data user
         */
        $this->db->where('id_user !=', $id);
        return $this->db->get('user')->result_array();
    }

   
    public function getAnggota()
    {
		$query = $this->db->query("SELECT a.id, a.nama, a.jabatan, s.status, a.group
        FROM anggota a JOIN STATUS s ON s.group = a.group 
        ORDER BY a.group ASC");
		$result = $query->result_array();
		$query->free_result();
		return $result;
	}

    public function getJadwal()
    {
		$query = $this->db->query("SELECT j.tanggal, j.group FROM jadwal j WHERE DATE_FORMAT(j.tanggal, '%Y%m%d') = DATE_FORMAT(NOW(), '%Y%m%d')");
		$result = $query->row_array();
		$query->free_result();
		
		return $result;
	}

    public function simpan_data($data) {
        // Menyimpan data ke dalam database
        $this->db->insert('absen', $data);
    }

   

   

	
	
	
}
