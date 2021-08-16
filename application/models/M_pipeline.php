<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pipeline extends CI_Model
{
    public function tampil()
    {
        $query = "SELECT A.*, produk_group, produk, (SELECT COUNT(id_produk_group) 
        FROM tb_pipeline 
        WHERE id_produk_group=A.id_produk_group) AS jumlah 
        FROM tb_pipeline A 
        INNER JOIN tb_produk ON A.id_produk = tb_produk.id 
        INNER JOIN tb_produk_group ON A.id_produk_group = tb_produk_group.id";
        return $this->db->query($query)->result_array();
    }

    public function datasama($id)
    {
        $query = "SELECT * FROM tb_pipeline WHERE id_produk_group='$id'";
        return $this->db->query($query);
    }

    public function result()
    {
        $query = $this->db->query(
            "SELECT
            jumlah,
            unit,
            produk_group,
            id_produk,
            produk,
            id_produk_group,
            SUM(offering) AS offering,
            SUM(negotiation) AS negotiation,
            SUM(submission) AS submission,
            SUM(nda) AS nda,
            SUM(business_deal) AS business_deal,
            SUM(pks) AS pks,
            SUM(card_production) AS card_production,
            SUM(success) AS success,
            SUM(failed) AS failed
            FROM
            (
                SELECT
                        jumlah,
                        unit,
                        produk_group,
                        id_produk_group,
                        produk,
                        id_produk,
                        CASE id_progress_status
                                WHEN 1 THEN n
                                ELSE 0
                        END AS offering,
                        CASE id_progress_status
                                WHEN 2 THEN n
                                ELSE 0
                        END AS negotiation,
                        CASE id_progress_status
                                WHEN 3 THEN n
                                ELSE 0
                        END AS card_production,
                        CASE id_progress_status
                                WHEN 4 THEN n
                                ELSE 0
                        END AS submission,
                        CASE id_progress_status
                                WHEN 5 THEN n
                                ELSE 0
                        END AS nda,
                        CASE id_progress_status
                                WHEN 6 THEN n
                                ELSE 0
                        END AS business_deal,
                        CASE id_progress_status
                                WHEN 7 THEN n
                                ELSE 0
                        END AS pks,
                        CASE id_progress_status
                                WHEN 8 THEN n
                                ELSE 0
                        END AS success,
                        CASE id_progress_status
                                WHEN 9 THEN n
                                ELSE 0
                        END AS failed
                FROM (
                        SELECT
                        A.*,
                        produk,
                        tb_produk_group.produk_group,
                        (SELECT COUNT(unit) FROM tb_pipeline  WHERE unit=A.unit) AS jumlah, 
                        COUNT(id_progress_status) AS n
                        FROM
                        tb_pipeline A
                        INNER JOIN tb_produk_group ON tb_produk_group.id = A.id_produk_group
                        INNER JOIN tb_produk ON tb_produk.id = A.id_produk
                        GROUP BY 1,2
                        ) AS p
            ) AS y
            GROUP BY unit, produk;"
        );

        return $query->result_array();
    }
}
