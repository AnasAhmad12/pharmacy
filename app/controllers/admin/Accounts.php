<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Accounts extends MY_Controller
{
    public function __construct() {
        parent::__construct(); 
    } 
    
    	public function index() {
		
		$this->load->library('AccountList');
		
		$accountlist = new AccountList();
		$accountlist->Group = &$this->Group;
		$accountlist->Ledger = &$this->Ledger;
		$accountlist->only_opening = false;
		$accountlist->start_date = null;
		$accountlist->end_date = null;
		$accountlist->affects_gross = -1;
		$accountlist->start(0);

		$this->data['accountlist'] = $accountlist;
		$opdiff = $this->ledger_model->getOpeningDiff();
		$this->data['opdiff'] = $opdiff;

		$bc  = [['link' => base_url(), 'page' => lang('home')], ['link' => admin_url('accounts'), 'page' => lang('accounts')], ['link' => '#', 'page' => lang('Accounts')]];
        $meta = ['page_title' => lang('Accounts'), 'bc' => $bc];
        $this->page_construct('accounts/index', $meta, $this->data);
	}
}