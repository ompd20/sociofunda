<?php

namespace App\Models;

use CodeIgniter\Model;

class CommonModel extends Model
{

    public function insertValue($table, $value)
    {
        $builder = $this->db->table($table);
        $builder->insert($value);
        return true;
    }

    public function updateValue($table, $where, $value)
    {
        $builder = $this->db->table($table);
        $builder->where($where);
        $builder->update($value);
        return true;
    }

    public function deleteValue($table, $where)
    {
        $builder = $this->db->table($table);
        $builder->where($where);
        $builder->delete();
        return true;
    }

    // for complete Records
    public function selectRecords($table, $where = array())
    {
        $builder = $this->db->table($table);
        $result = $builder->get();
        return $result->getResult();
    }

    // for specific record
    public function selectRow($table, $where = array())
    {
        $builder = $this->db->table($table);
        $builder->where($where);
        $result = $builder->get();
        return $result->getRow();
    }
}
