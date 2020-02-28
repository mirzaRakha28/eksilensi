<?php
    class ProductModel extends CI_Model{
        public function __construct()
        {
            parent::__construct();

        }

        public function getProduct($kategori=1,$subKategori=1)
        {
            return $this->db->get_where("produk",['kategori_id'=>$kategori,'subkategori_id'=>$subKategori])->result();
        }

        public function getAllProduct()
        {   
            return  $this->db->get("produk")->result();
            // return $this->db->query("SELECT * FROM produk")->row();
        }

        public function getProductByProductID($product_Id)
        {
            return $this->db->get_where("produk",["id"=>$product_Id])->row();
        }

        public function getAsc($kategori=1,$subKategori=1)
		{
			$this->db->order_by('harga', 'asc');
			return $this->db->get_where("produk",['kategori_id'=>$kategori,'subkategori_id'=>$subKategori])->result();
		}
		public function getDesc($kategori=1,$subKategori=1)
		{
			$this->db->order_by('harga', 'desc');
			return $this->db->get_where("produk",['kategori_id'=>$kategori,'subkategori_id'=>$subKategori])->result();
        }
        
        public function addProduct($nama,$harga,$deskripsi, $satuan,$minimum_quantity,$kategori,$subKategori,$gambar,$keterangan)
        {
            $data = array(
                'nama_produk' => $nama,
                'deskripsi' => $deskripsi,
                'harga' => $harga,
                'minimum_quantity'=> $minimum_quantity,
                'satuan' => $satuan,
                'kategori_id'=> $kategori,
                'subkategori_id'=> $subKategori,
                'ket'=>$keterangan,
                'gambar'=>$gambar
             );
        
            $this->db->insert('produk', $data);
        }

        public function deleteProductById($id)
        {
            $this->db->where('id',$id);
            $this->db->delete('produk');
        }
    }
?>