<!-- Accounts -->
        <li class="treeview ">
          <a><i class="fa fa-money"></i><span>Accounts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu ">
            <li class="treeview 
              <?php 
                if($this->uri->segment(1)=='Voucherhead')
                  {echo "active";}
                else if($this->uri->segment(1)=='Receipthead')
                  {echo "active";}
              ?>">
              <a href="#"><i class="glyphicon glyphicon-pencil"></i> Create account heads
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php if($this->uri->segment(1)=='Voucherhead'){echo "active";}?>" ><a href="<?php echo base_url();?>Voucherhead"><i class="glyphicon glyphicon-share-alt"></i>Voucher</a></li>
                <li class="<?php if($this->uri->segment(1)=='Receipthead'){echo "active";}?>" ><a href="<?php echo base_url();?>Receipthead"><i class="glyphicon glyphicon-share-alt"></i>Receipt</a></li>
              </ul>
            </li> 
            <li class="<?php if($this->uri->segment(1)=='Voucher' && $this->uri->segment(2)=='create'){echo "active";}?>" ><a href="<?php echo base_url();?>Voucher"><i class="glyphicon glyphicon-share-alt"></i>Voucher Entry</a></li>
            <li class="<?php if($this->uri->segment(1)=='Receipt' && $this->uri->segment(2)=='create'){echo "active";}?>" ><a href="<?php echo base_url();?>Receipt"><i class="glyphicon glyphicon-share-alt"></i>Receipt Entry</a></li>  
            <li class="<?php if($this->uri->segment(1)=="Daybook"){echo "active";}?>" ><a  href="<?php echo base_url();?>Daybook"><i class="glyphicon glyphicon-share-alt"></i> <span>Daybook</span></a></li>
            <li class="<?php if($this->uri->segment(1)=="Ledger"){echo "active";}?>" ><a  href="<?php echo base_url();?>Ledger"><i class="glyphicon glyphicon-share-alt"></i> <span>Ledger</span></a></li>
            <li class="<?php if($this->uri->segment(1)=="Ledger"){echo "active";}?>" ><a  href="<?php echo base_url();?>Ledger"><i class="glyphicon glyphicon-share-alt"></i> <span>Journal Entry</span></a>
            <li class="<?php if($this->uri->segment(1)=="Ledger"){echo "active";}?>" ><a  href="<?php echo base_url();?>Ledger"><i class="glyphicon glyphicon-share-alt"></i> <span>Profit and loss account</span></a></li></li>
            <li class="<?php if($this->uri->segment(1)=="Ledger"){echo "active";}?>" ><a  href="<?php echo base_url();?>Ledger"><i class="glyphicon glyphicon-share-alt"></i> <span>Balancesheet</span></a></li></li>
          </ul>
        </li>