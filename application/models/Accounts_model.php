<?php
Class Accounts_model extends CI_Model
{
    public function getTypesTable($param)
    {
        $this->db->where("type_status",1);

        if ($param['start'] != 'false' and $param['length'] != 'false') {
            $this->db->limit($param['length'],$param['start']);
        }
        $this->db->select('*');
        $this->db->from('tbl_type');
        $query = $this->db->get();

        $data['data'] = $query->result();
        $data['recordsTotal'] = $query->num_rows();
        $data['recordsFiltered'] = $query->num_rows();
        return $data; 
    }
    public function getTypesList()
    {
        $this->db->select('*');
        $this->db->from('tbl_type');
        $this->db->where("type_status",1);
        $query = $this->db->get();
        return $query->result(); 
    }
	public function getVoucherheadTable($param)
    {
        $arOrder = array('','pcategory_name');
        $searchValue =($param['searchValue'])?$param['searchValue']:'';
        
        $this->db->where("vouch_status",1);

        if ($param['start'] != 'false' and $param['length'] != 'false') {
            $this->db->limit($param['length'],$param['start']);
        }
        $this->db->select('*');
        $this->db->from('tbl_vouchhead');
        $query = $this->db->get();

        $data['data'] = $query->result();
        $data['recordsTotal'] = $this->getCountVoucherheadTable($param);
        $data['recordsFiltered'] = $this->getCountVoucherheadTable($param);
        return $data;
    }
    public function getCountVoucherheadTable($param)
    {
        $arOrder = array('','pcategory_name');
        $searchValue =($param['searchValue'])?$param['searchValue']:'';
        
        $this->db->where("vouch_status",1);
        $this->db->select('*');
        $this->db->from('tbl_vouchhead');
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function getVoucherhead($vouch_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_vouchhead');
        $this->db->where("vouch_status",1);
        $this->db->where('vouch_id',$vouch_id);
        return $query = $this->db->get()->result();
    }

    public function getReceiptheadTable($param)
    {
        $arOrder = array('','pcategory_name');
        $searchValue =($param['searchValue'])?$param['searchValue']:'';
        
        $this->db->where("receipt_status",1);

        if ($param['start'] != 'false' and $param['length'] != 'false') {
            $this->db->limit($param['length'],$param['start']);
        }
        $this->db->select('*');
        $this->db->from('tbl_receipthead');
        $query = $this->db->get();

        $data['data'] = $query->result();
        $data['recordsTotal'] = $this->getCountReceiptTable($param);
        $data['recordsFiltered'] = $this->getCountReceiptTable($param);
        return $data;
    }
    public function getCountReceiptTable($param)
    {
        $arOrder = array('','pcategory_name');
        $searchValue =($param['searchValue'])?$param['searchValue']:'';
        
        $this->db->where("receipt_status",1);
        $this->db->select('*');
        $this->db->from('tbl_receipthead');
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function getReceipthead($receipt_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_receipthead');
        $this->db->where("receipt_status",1);
        $this->db->where('receipt_id',$receipt_id);
        return $query = $this->db->get()->result();
    }
    public function getReceiptnames()
    {
    	$this->db->select('*');
    	$this->db->from('tbl_receipthead');
        $this->db->where("receipt_status",1);
        return $query = $this->db->get()->result();
    }
    public function getBank()
    {
    	$this->db->select('*');
    	$this->db->from('tbl_bank');
        $this->db->where("bank_status",1);
        return $query = $this->db->get()->result();
    }
    public function getRecieptTable($param)
    {
    	$arOrder = array('','class');
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
         if($searchValue){
            $this->db->like('receipt_head', $searchValue); 
        }
        if ($param['start'] != 'false' and $param['length'] != 'false') {
        	$this->db->limit($param['length'],$param['start']);
        }
		$this->db->select('*,DATE_FORMAT(rept_date,\'%d/%m/%Y\')as rept_date,tbl_receipthead.receipt_id as receipthead_id,tbl_receipt.receipt_id as receipt_id');
		$this->db->from('tbl_receipt');
		$this->db->join('tbl_receipthead','tbl_receipthead.receipt_id = receip_id_fk');
		$this->db->where("tbl_receipt.receipt_status",1);
		$this->db->order_by('tbl_receipt.receipt_id', 'DESC');
        $query = $this->db->get();
        // echo $this->db->last_query();
		
        $data['data'] = $query->result();
        $data['recordsTotal'] = $this->getRecieptTableCount($param);
        $data['recordsFiltered'] = $this->getRecieptTableCount($param);
        return $data;
    }
    public function getRecieptTableCount($param)
    {
    	$searchValue =($param['searchValue'])?$param['searchValue']:'';
         if($searchValue){
            $this->db->like('receipt_head', $searchValue); 
        }
    	$this->db->select('*,DATE_FORMAT(rept_date,\'%d/%m/%Y\')as rept_date');
		$this->db->from('tbl_receipt');
		$this->db->join('tbl_receipthead','tbl_receipthead.receipt_id = receip_id_fk');
		$this->db->order_by('tbl_receipt.receipt_id', 'DESC');
		$this->db->where("tbl_receipt.receipt_status",1);
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function getRecieptTableby($receipt_id)
    {
    	$this->db->select('*,DATE_FORMAT(rept_date,\'%d/%m/%Y\')as rept_date,tbl_receipthead.receipt_id as receipthead_id,tbl_receipt.receipt_id as receipt_id');
		$this->db->from('tbl_receipt');
		$this->db->join('tbl_receipthead','tbl_receipthead.receipt_id = receip_id_fk');
		$this->db->where("tbl_receipt.receipt_status",1);
		$this->db->where("tbl_receipt.receipt_id",$receipt_id);
        $query = $this->db->get();
        return $query->row();
    }
    public function getVoucherTable($param)
    {
    	$arOrder = array('','class');
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
        	if($searchValue){
            $this->db->like('vouch_head', $searchValue); 
        }
        $this->db->where("vouch_status",1);
        
        if ($param['start'] != 'false' and $param['length'] != 'false') {
        	$this->db->limit($param['length'],$param['start']);
        }
		$this->db->select('*,DATE_FORMAT(voucher_date,\'%d/%m/%Y\')as voucher_date');
		$this->db->from('tbl_voucher');
		$this->db->join('tbl_vouchhead','vouch_id = vouch_id_fk');
		$this->db->where("voucher_status",1);
		$this->db->order_by('voucher_id', 'DESC');
        $query = $this->db->get();
		
        $data['data'] = $query->result();
        $data['recordsTotal'] = $this->getVoucherTotalCount($param);
        $data['recordsFiltered'] = $this->getVoucherTotalCount($param);
        return $data;
    }
    public function getVoucherTotalCount($param)
    {
    	$searchValue =($param['searchValue'])?$param['searchValue']:'';
        	if($searchValue){
            $this->db->like('vouch_head', $searchValue); 
        }
        $this->db->select('*,DATE_FORMAT(voucher_date,\'%d/%m/%Y\')as voucher_date');
		$this->db->from('tbl_voucher');
		$this->db->join('tbl_vouchhead','vouch_id = vouch_id_fk');
		$this->db->order_by('voucher_id', 'ASC');
		$this->db->where("voucher_status",1);
        $query = $this->db->get();
        return $query->num_rows();	
    }
    public function voucherheads()
    {
    	$this->db->select('*');
    	$this->db->from('tbl_vouchhead');
        $this->db->where("vouch_status",1);
        return $query = $this->db->get()->result();
    }
    public function getVoucherby($voucher_id)
    {
    	$this->db->select('*,DATE_FORMAT(voucher_date,\'%d/%m/%Y\')as voucher_date');
		$this->db->from('tbl_voucher');
		$this->db->join('tbl_vouchhead','vouch_id = vouch_id_fk');
		$this->db->where("voucher_status",1);
		$this->db->where('voucher_id',$voucher_id);
        return $query = $this->db->get()->row();
    }
    public function getGroupsTable($param)
    {
        $arOrder = array('','class');
        $searchValue =($param['searchValue'])?$param['searchValue']:'';
            if($searchValue){
            $this->db->like('group_name', $searchValue); 
        }
        $this->db->where("group_status",1);
        $this->db->where("group_parent_id",0);
        
        if ($param['start'] != 'false' and $param['length'] != 'false') {
            $this->db->limit($param['length'],$param['start']);
        }
        $this->db->select('*');
        $this->db->from('tbl_groups');
        $this->db->join('tbl_type','type_id = type_id_fk');
        $this->db->order_by('group_id', 'DESC');
        $query = $this->db->get();
        
        $data['data'] = $query->result();
        $data['recordsTotal'] = $this->getGroupsTotalCount($param);
        $data['recordsFiltered'] = $this->getGroupsTotalCount($param);
        return $data;
    }
    public function getGroupsTotalCount($param)
    {
        $arOrder = array('','class');
        $searchValue =($param['searchValue'])?$param['searchValue']:'';
            if($searchValue){
            $this->db->like('group_name', $searchValue); 
        }
        $this->db->where("group_status",1);
        $this->db->where("group_parent_id",0);
    
        $this->db->select('*');
        $this->db->from('tbl_groups');
        $this->db->order_by('group_id', 'DESC');
        $query = $this->db->get();
        return $query->num_rows();
        
    }
    public function getsubGroupsTable($param)
    {
        $arOrder = array('','class');
        $searchValue =($param['searchValue'])?$param['searchValue']:'';
            if($searchValue){
            $this->db->like('group_name', $searchValue); 
        }
        $this->db->where("group_status",1);
        $this->db->where("group_parent_id !=",0);
        
        if ($param['start'] != 'false' and $param['length'] != 'false') {
            $this->db->limit($param['length'],$param['start']);
        }
        $this->db->select('*');
        $this->db->from('tbl_groups');
        $this->db->join('tbl_type','type_id = type_id_fk');
        $this->db->order_by('group_id', 'DESC');
        $query = $this->db->get();
        
        $data['data'] = $query->result();
        $data['recordsTotal'] = $this->getsubGroupsTotalCount($param);
        $data['recordsFiltered'] = $this->getsubGroupsTotalCount($param);
        return $data;
    }
    public function getsubGroupsTotalCount($param)
    {
        $arOrder = array('','class');
        $searchValue =($param['searchValue'])?$param['searchValue']:'';
            if($searchValue){
            $this->db->like('group_name', $searchValue); 
        }
        $this->db->where("group_status",1);
        $this->db->where("group_parent_id !=",0);
        
        $this->db->select('*');
        $this->db->from('tbl_groups');
        $this->db->join('tbl_type','type_id = type_id_fk');
        $this->db->order_by('group_id', 'DESC');
        $query = $this->db->get();
        return $query->num_rows();
        
    }
    public function getGroups($group_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_groups');
        $this->db->where("group_id",$group_id);
        return $query = $this->db->get()->result();
    }
    public function getGroupslist()
    {
        $this->db->select('*');
        $this->db->from('tbl_groups');
        $this->db->where("group_status",1);
        return $query = $this->db->get()->result();
    }
        // public function getGroupslist()
        // {
        //     $this->db->select('*');
        //     $this->db->from('tbl_groups');
        //     $this->db->join('tbl_type','tbl_type.type_id = tbl_groups.type_id_fk');
        //     $this->db->where("group_status",1);
        //     return $query = $this->db->get()->result();
        // }
    public function getsubsGroupslist()
    {
        $this->db->select('*');
        $this->db->from('tbl_groups');
        $this->db->where("group_status",1);
        $this->db->where("group_parent_id !=",0);
        return $query = $this->db->get()->result();
    }
    public function getGroupslistbyType($type)
    {
        $this->db->select('*');
        $this->db->from('tbl_groups');
        $this->db->where('type_id_fk',$type);
        $this->db->where("group_status",1);
        $this->db->where('group_parent_id',0);
        return $query = $this->db->get()->result();
    }
    public function getLedgerheadTable($param)
    {
        $arOrder = array('','class');
        $searchValue =(isset($param['searchValue']))?$param['searchValue']:'';
        $cmp_id =(isset($param['company']))?$param['company']:'';
        if($cmp_id){
            $this->db->where('company_id_fk',$cmp_id);
        }
        if($searchValue){
            $this->db->like('ledger_head', $searchValue); 
        }
        $this->db->where("ledgerhead_status",1);
        
        if ($param['start'] != 'false' and $param['length'] != 'false') {
            $this->db->limit($param['length'],$param['start']);
        }
        $this->db->select('*');
        $this->db->from('tbl_ledgerhead');
        $this->db->join('tbl_groups','group_id = group_id_fk');
        $this->db->join('tbl_type','tbl_type.type_id = tbl_groups.type_id_fk');
        $this->db->order_by('ledgerhead_id', 'DESC');
        $query = $this->db->get();
        
        $data['data'] = $query->result();
        $data['recordsTotal'] = $this->getLedgerheadTotalCount($param);
        $data['recordsFiltered'] = $this->getLedgerheadTotalCount($param);
        return $data;
    }
    public function getLedgerheadTotalCount($param)
    {
        $arOrder = array('','class');
        $searchValue =($param['searchValue'])?$param['searchValue']:'';
        $cmp_id =(isset($param['company']))?$param['company']:'';
        if($cmp_id){
            $this->db->where('company_id_fk',$cmp_id);
        }
        if($searchValue){
            $this->db->like('ledger_head', $searchValue); 
        }
        $this->db->where("ledgerhead_status",1);
        
        $this->db->select('*');
        $this->db->from('tbl_ledgerhead');
        $this->db->join('tbl_groups','group_id = group_id_fk');
        $this->db->order_by('ledgerhead_id', 'DESC');
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function getLedgerhead($ledgerhead_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_ledgerhead');
        $this->db->join('tbl_groups','group_id = group_id_fk');
        $this->db->where("ledgerhead_id",$ledgerhead_id);
        return $query = $this->db->get()->result();
    }
    public function getLedgerheadlist()
    {
        $this->db->select('*');
        $this->db->from('tbl_ledgerhead');
        $this->db->where("ledgerhead_status",1);
        return $query = $this->db->get()->result(); 
    }
    public function getLedgerheadlistcompany($cmp)
    {
        $this->db->select('*');
        $this->db->from('tbl_ledgerhead');
        $this->db->where('company_id_fk',$cmp);
        $this->db->where("ledgerhead_status",1);
        return $query = $this->db->get()->result(); 
    }
    public function getJournalUnique()
    {
        $this->db->select_max('journal_inv');
        return $this->db->get('tbl_journal')->row()->journal_inv;
    }
    public function chekExistans($journal_inv)
    {
        $this->db->select('*');
        $this->db->where('journal_inv',$journal_inv);
        $result=$this->db->get('tbl_journal');
        return $result->num_rows();
    }
    public function getJournalTable($param)
    {
        $arOrder = array('','class');
        // $searchValue =($param['searchValue'])?$param['searchValue']:'';
        //     if($searchValue){
        //     $this->db->like('ledger_head', $searchValue); 
        // }
        if ($this->session->userdata['user_type'] =='C') 
        {
            $company =  $this->session->userdata['cmp_id'];
            $this->db->where('company_id_fk',$company);
        }
        
        if ($param['start'] != 'false' and $param['length'] != 'false') {
            $this->db->limit($param['length'],$param['start']);
        }
        $this->db->select('*,GROUP_CONCAT(tbl_ledgerhead.ledger_head) ledger_heads,SUM(debit_amt) as amount');
        $this->db->from('tbl_journal');
        $this->db->join('tbl_ledgerhead','ledgerhead_id = ledger_head_id');
        $this->db->where("journal_status",1);
        $this->db->group_by('journal_inv');
        $this->db->order_by('journal_inv', 'DESC');
        $query = $this->db->get();
        
        $data['data'] = $query->result();
        $data['recordsTotal'] = $this->getJournalTotalCount($param);
        $data['recordsFiltered'] = $this->getJournalTotalCount($param);
        return $data;
    }
    public function getJournalTotalCount($param)
    {
        $this->db->select('*,DATE_FORMAT(journal_date,\'%d/%m/%Y\')as journal_date');
        $this->db->from('tbl_journal');
        $this->db->join('tbl_ledgerhead','ledgerhead_id = ledger_head_id');
        $this->db->where("journal_status",1);
        if ($this->session->userdata['user_type'] =='C') 
        {
            $company =  $this->session->userdata['cmp_id'];
            $this->db->where('company_id_fk',$company);
        }
        $this->db->order_by('journal_id', 'DESC');
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function getJournals($unique_id)
    {
        $this->db->select('*,DATE_FORMAT(journal_date,\'%d/%m/%Y\')as journal_date');
        $this->db->from('tbl_journal');
        $this->db->join('tbl_ledgerhead','ledgerhead_id = ledger_head_id');
        $this->db->where("journal_status",1);
        $this->db->where("journal_inv",$unique_id);
        return $query = $this->db->get()->result();
    }
    public function UpdateJournal($journal_inv)
    {
        $this->db->where('journal_inv',$journal_inv);
        $this->db->delete('tbl_journal');
        return $this->db->affected_rows();
    }
    public function checkInledgerBalance($company,$ledgerhead,$journal_date)
    {
        $this->db->select('*');
        $this->db->where('date',$journal_date);
        $this->db->where('ledgerbalance_status',1);
        $this->db->where('ledgerhead_id_fk',$ledgerhead);
        $this->db->where('company_id_fk',$company);
        return $this->db->get('tbl_ledgerbalance')->num_rows();
    }
    public function getNumsofCount($journal_inv)
    {
        $this->db->select('*')->where('journal_inv',$journal_inv);
        return $this->db->get('tbl_journal')->num_rows();
    }
    public function getLastJournalid()
    {
        $this->db->select('*');
        $this->db->from('tbl_journal');
        $this->db->where('journal_status', 1);
        $this->db->order_by('journal_id',"DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row();
    }
    public function getJournalsInv($journal_id)
    {
        return $this->db->select('journal_inv')->where('journal_id',$journal_id)->get('tbl_journal')->row()->journal_inv;
    }
}