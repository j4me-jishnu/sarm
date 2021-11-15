<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Companyreport_model extends CI_Model{

	

		public function getStockrepo($param){
			$arOrder = array('','searchValue','start_date','end_date','cust_name');
            $cmp_id = (isset($param['cmp_id']))?$param['cmp_id']:'';
			$searchValue =($param['searchValue'])?$param['searchValue']:'';
			$item_name =(isset($param['item_name']))?$param['item_name']:'';
			if($searchValue){
				$this->db->like('stock_id', $searchValue); 
			}
			if($item_name){
				$this->db->where('product_name >=', $item_name); 
			}
			$this->db->where("stock_status",1);
			$this->db->select('*');
			$this->db->from('tbl_stock');
			$this->db->join('tbl_companyinfo','tbl_companyinfo.cmp_id = tbl_stock.company_id');
			$this->db->join('tbl_product','tbl_product.product_id = tbl_stock.item_id');
			$this->db->join('tbl_finyear','tbl_finyear.finyear_id = tbl_stock.finyear');
            $this->db->where('tbl_stock.company_id',$cmp_id);
			$this->db->order_by('stock_id', 'DESC');
			$query = $this->db->get();
			
			$data['data'] = $query->result();
            $data['recordsTotal'] = $this->getStockrepoTableCount($param);
			$data['recordsFiltered'] = $this->getStockrepoTableCount($param);
			return $data;
	
		}

        public function getStockrepoTableCount($param)
        {
            $arOrder = array('','searchValue','start_date','end_date','cust_name');
            $cmp_id = (isset($param['cmp_id']))?$param['cmp_id']:'';
			$searchValue =($param['searchValue'])?$param['searchValue']:'';
			$item_name =(isset($param['item_name']))?$param['item_name']:'';
			if($searchValue){
				$this->db->like('stock_id', $searchValue); 
			}
			if($item_name){
				$this->db->where('product_name >=', $item_name); 
			}
			$this->db->where("stock_status",1);
			$this->db->select('*');
			$this->db->from('tbl_stock');
			$this->db->join('tbl_companyinfo','tbl_companyinfo.cmp_id = tbl_stock.company_id');
			$this->db->join('tbl_product','tbl_product.product_id = tbl_stock.item_id');
			$this->db->join('tbl_finyear','tbl_finyear.finyear_id = tbl_stock.finyear');
            $this->db->where('tbl_stock.company_id',$cmp_id);
			$this->db->order_by('stock_id', 'DESC');
			$query = $this->db->get();
            return $query->num_rows();
        }

		

		public function getSaleTables($param){
			$arOrder = array('','invoice_no','shop','product_num1');
            $cmp_id = (isset($param['cmp_id']))?$param['cmp_id']:'';
			$invoice_no =(isset($param['invoice_no']))?$param['invoice_no']:'';
			$product_num1 =(isset($param['product_num1']))?$param['product_num1']:'';
			$shop =(isset($param['shop']))?$param['shop']:'';
			$start_date =(isset($param['start_date']))?$param['start_date']:'';
			$end_date =(isset($param['end_date']))?$param['end_date']:'';
			
			if($invoice_no){
				$this->db->where('tbl_sale.invoice_number', $invoice_no); 
			}
			if($product_num1){
				$this->db->like('tbl_product.product_name', $product_num1); 
			}
			if($shop!=0){
				$this->db->where('tbl_companyinfo.cmp_name', $shop); 
			}
			if($start_date){
				$this->db->where('sale_date >=', $start_date);
			}
			if($end_date){
				$this->db->where('sale_date <=', $end_date); 
			}

			$this->db->where("sale_status >",0);
			$this->db->select('*');
			$this->db->from('tbl_sale');
			$this->db->join('tbl_product','tbl_product.product_id = tbl_sale.product_id_fk');
			$this->db->join('tbl_salepayments','tbl_salepayments.invoice_number = tbl_sale.invoice_number');
			$this->db->join('tbl_customer','tbl_customer.cust_id = tbl_sale.cust_id');
			$this->db->join('tbl_companyinfo','tbl_companyinfo.cmp_id = tbl_sale.cmp_id');
            $this->db->where('tbl_sale.cmp_id',$cmp_id);
			$this->db->order_by('tbl_sale.sale_id','DESC');
			$query = $this->db->get();
			$data['data'] = $query->result();
			$data['recordsTotal'] = $this->getSaleTablesTotalCount($param);
			$data['recordsFiltered'] = $this->getSaleTablesTotalCount($param);
			return $data;
	
		}

		public function getSaleTablesTotalCount($param){
			$invoice_no =(isset($param['invoice_no']))?$param['invoice_no']:'';
            $cmp_id = (isset($param['cmp_id']))?$param['cmp_id']:'';
			$product_num1 =(isset($param['product_num']))?$param['product_num']:'';
			$shop =(isset($param['shop']))?$param['shop']:'';
			$start_date =(isset($param['start_date']))?$param['start_date']:'';
			$end_date =(isset($param['end_date']))?$param['end_date']:'';
			
			if($invoice_no){
				$this->db->where('tbl_sale.invoice_number', $invoice_no); 
			}
			if($product_num1){
				$this->db->like('tbl_product.product_name', $product_num1); 
			}
			if($shop!=0){
				$this->db->where('tbl_companyinfo.cmp_name', $shop); 
			}
			if($start_date){
				$this->db->where('sale_date >=', $start_date);
			}
			if($end_date){
				$this->db->where('sale_date <=', $end_date); 
			}

			$this->db->where("sale_status >",0);
			$this->db->select('*');
			$this->db->from('tbl_sale');
			$this->db->join('tbl_product','tbl_product.product_id = tbl_sale.product_id_fk');
			$this->db->join('tbl_customer','tbl_customer.cust_id = tbl_sale.cust_id');
			$this->db->join('tbl_companyinfo','tbl_companyinfo.cmp_id = tbl_sale.cmp_id');
            $this->db->where('tbl_sale.cmp_id',$cmp_id);
			$this->db->order_by('tbl_sale.sale_id','DESC');
			$query = $this->db->get();
			return $query->num_rows();
		}


		public function getPurchaseTables($param){
			$arOrder = array('','invoice_no','shop','product_num1');
            $cmp_id = (isset($param['cmp_id']))?$param['cmp_id']:'';
			$invoice_no =(isset($param['invoice_no']))?$param['invoice_no']:'';
			$shop =(isset($param['shop']))?$param['shop']:'';
			$start_date =(isset($param['start_date']))?$param['start_date']:'';
			$end_date =(isset($param['end_date']))?$param['end_date']:'';
			
			if($invoice_no){
				$this->db->where('invoice_number', $invoice_no); 
			}
			if($start_date){
				$this->db->where('purchase_date >=', $start_date);
			}
			if($end_date){
				$this->db->where('purchase_date <=', $end_date); 
			}
			$this->db->where("purchase_status >",0);
			$this->db->select('*');
			$this->db->from('tbl_purchase');
			$this->db->join('tbl_product','tbl_product.product_id = tbl_purchase.product_id_fk');
			$this->db->join('tbl_supplier','tbl_supplier.supplier_id = tbl_purchase.supp_id');
			$this->db->join('tbl_companyinfo','tbl_companyinfo.cmp_id = tbl_purchase.cmp_id');
			$this->db->join('tbl_purchasepayments','tbl_purchasepayments.invoice_number = tbl_purchase.invoice_number');
            $this->db->where('tbl_purchase.cmp_id',$cmp_id);
			$this->db->order_by('purchase_id','desc');
			$query = $this->db->get();
			
			$data['data'] = $query->result();
			$data['recordsTotal'] = $this->getPurchaseTablesTotalCount($param);
			$data['recordsFiltered'] = $this->getPurchaseTablesTotalCount($param);
			return $data;
	
		}
		public function getPurchaseTablesTotalCount($param){
			$invoice_no =(isset($param['invoice_no']))?$param['invoice_no']:'';
            $cmp_id = (isset($param['cmp_id']))?$param['cmp_id']:'';
			$shop =(isset($param['shop']))?$param['shop']:'';
			$start_date =(isset($param['start_date']))?$param['start_date']:'';
			$end_date =(isset($param['end_date']))?$param['end_date']:'';
			
			if($invoice_no){
				$this->db->where('invoice_number', $invoice_no); 
			}
			if($shop!=0){
				$this->db->where('shop_id_fk', $shop); 
			}
			if($start_date){
				$this->db->where('purchase_date >=', $start_date);
			}
			if($end_date){
				$this->db->where('purchase_date <=', $end_date); 
			}
			$this->db->where("purchase_status >",0);
			$this->db->select('*');
			$this->db->from('tbl_purchase');
			$this->db->join('tbl_product','tbl_product.product_id = tbl_purchase.product_id_fk');
			$this->db->join('tbl_supplier','tbl_supplier.supplier_id = tbl_purchase.supp_id');
			$this->db->join('tbl_companyinfo','tbl_companyinfo.cmp_id = tbl_purchase.cmp_id');
			$this->db->join('tbl_purchasepayments','tbl_purchasepayments.invoice_number = tbl_purchase.invoice_number');
            $this->db->where('tbl_purchase.cmp_id',$cmp_id);
			$this->db->order_by('purchase_id','desc');
			$query = $this->db->get();
			return $query->num_rows();
		}
}

?>