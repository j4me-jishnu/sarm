<!-- Left side column. contains the logo and sidebar -->
 <aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
   <!-- Sidebar Menu -->
   <ul class="sidebar-menu" id="navi">

    <?php if($this->session->userdata['user_type']=='A')
    { ?>
      <li class="<?php if($this->uri->segment(1)=="dashboard"){echo "active";}?>" ><a  href="<?php echo base_url();?>dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

        <!-- Settings -->
        <li class="treeview <?php 
        if($this->uri->segment(1)=="Company")
        {echo "active";}
        else if($this->uri->segment(1)=="FinYear")
        {echo "active";}
        else if($this->uri->segment(1)=="ChangePassword")
        {echo "active";}
        ?>">
        <a><i class="fa fa-gear"></i><span>Settings</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu ">
          <li class="<?php if($this->uri->segment(1)=="Company"){echo "active";}?>" >

            <a href="<?php echo base_url();?>Company"><i class="glyphicon glyphicon-share-alt"></i><span>Company</span></a>

          </li>
          <li class="<?php if($this->uri->segment(1)=="FinYear"){echo "active";}?>" ><a  href="<?php echo base_url();?>FinYear"><i class="glyphicon glyphicon-share-alt"></i> <span>Financial Year</span></a></li>
          <li class="<?php if($this->uri->segment(1)=="ChangePassword"){echo "active";}?>" ><a  href="<?php echo base_url();?>ChangePassword"><i class="glyphicon glyphicon-share-alt"></i> <span>Change Password</span></a></li>
        </ul>
        </li>

        <!-- Administration -->
        <li class="treeview 
        <?php 
          if($this->uri->segment(1)=="Customer")
            {echo "active";}
          else if($this->uri->segment(1)=="Supplier")
            {echo "active";}
          else if($this->uri->segment(1)=="Tax")
            {echo "active";}
          else if($this->uri->segment(1)=="Category")
            {echo "active";}
          else if($this->uri->segment(1)=="Product")
            {echo "active";}
          if($this->uri->segment(1)=="Productcategory")
            {echo "active";}
          else if($this->uri->segment(1)=="Productsubcategory")
            {echo "active";}
          else if($this->uri->segment(1)=="Pricecategory")
            {echo "active";}
          else if($this->uri->segment(1)=="Unit")
            {echo "active";}
          else if($this->uri->segment(1)=="Item")
            {echo "active";} 
          else if($this->uri->segment(1)=="Openingstock")
              {echo "active";}
          else if($this->uri->segment(1)=="Bank")
              {echo "active";}       
          else if($this->uri->segment(1)=="Area")
              {echo "active";}    
        ?>">
        <a><i class="glyphicon glyphicon-home"></i><span>Administration</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>

        <ul class="treeview-menu ">

          <li class="treeview 
            <?php 
            if($this->uri->segment(1)=="Productcategory")
              {echo "active";}
            else if($this->uri->segment(1)=="Productsubcategory")
              {echo "active";}
            else if($this->uri->segment(1)=="Pricecategory")
              {echo "active";}     
            ?>">
            <a><i class="glyphicon glyphicon-list-alt"></i><span>Category</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu ">
              <li class="<?php if($this->uri->segment(1)=="Productcategory"){echo "active";}?>" ><a href="<?php echo base_url();?>Productcategory"><i class="glyphicon glyphicon-share-alt"></i><span>Product Category</span></a></li>
              <li class="<?php if($this->uri->segment(1)=="Productsubcategory"){echo "active";}?>" ><a href="<?php echo base_url();?>Productsubcategory"><i class="glyphicon glyphicon-share-alt"></i><span>Product Sub-Category</span></a></li>
              <li class="<?php if($this->uri->segment(1)=="Pricecategory"){echo "active";}?>" ><a href="<?php echo base_url();?>Pricecategory"><i class="glyphicon glyphicon-share-alt"></i><span>Price Category</span></a></li>
            </ul>
          </li>

          <li class="<?php if($this->uri->segment(1)=="Customer"){echo "active";}?>" ><a href="<?php echo base_url();?>Customer"><i class="glyphicon glyphicon-share-alt"></i><span>Customer</span></a></li>
          <li class="<?php if($this->uri->segment(1)=="Supplier"){echo "active";}?>" ><a href="<?php echo base_url();?>Supplier"><i class="glyphicon glyphicon-share-alt"></i><span>Supplier</span></a></li>
          <li class="<?php if($this->uri->segment(1)=="Tax"){echo "active";}?>" ><a href="<?php echo base_url();?>Tax"><i class="glyphicon glyphicon-share-alt"></i><span>Tax Details</span></a></li>
          <li class="<?php if($this->uri->segment(1)=="Bank"){echo "active";}?>" ><a href="<?php echo base_url();?>Bank"><i class="glyphicon glyphicon-share-alt"></i><span>Bank Details</span></a></li>
          <li class="<?php if($this->uri->segment(1)=="Area"){echo "active";}?>" ><a href="<?php echo base_url();?>Area"><i class="glyphicon glyphicon-share-alt"></i><span>Area Details</span></a></li>

 

          <li class="treeview 
            <?php 
            if($this->uri->segment(1)=="Unit")
              {echo "active";}
            else if($this->uri->segment(1)=="Item")
              {echo "active";}
            else if($this->uri->segment(1)=="Openingstock")
              {echo "active";}     
            ?>">
            <a><i class="glyphicon glyphicon-shopping-cart"></i><span>Product</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu ">
              <li class="<?php if($this->uri->segment(1)=="Unit"){echo "active";}?>" ><a href="<?php echo base_url();?>Unit"><i class="glyphicon glyphicon-share-alt"></i><span>Unit</span></a></li>
              <li class="<?php if($this->uri->segment(1)=="Item"){echo "active";}?>" ><a href="<?php echo base_url();?>Item"><i class="glyphicon glyphicon-share-alt"></i><span>Item</span></a></li>
              <li class="<?php if($this->uri->segment(1)=="Openingstock"){echo "active";}?>" ><a href="<?php echo base_url();?>Openingstock"><i class="glyphicon glyphicon-share-alt"></i><span>Opening Stock</span></a></li>
            </ul>

        </ul>
        </li>

        <!-- Inventory -->
        <li class="treeview <?php 
          if($this->uri->segment(1)=="Purchase")
            {echo "active";}
          else if($this->uri->segment(1)=="Stock")
            {echo "active";}
          ?>">
          <a><i class="fa fa-laptop"></i><span>Inventory</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu ">
            <li class="<?php if($this->uri->segment(1)=="Purchase"){echo "active";}?>" ><a href="<?php echo base_url();?>Purchase"><i class="glyphicon glyphicon-share-alt"></i><span>Purchase</span></a></li>
            <li class="<?php if($this->uri->segment(1)=="Stock"){echo "active";}?>" ><a  href="<?php echo base_url();?>Stock"><i class="glyphicon glyphicon-share-alt"></i> <span>Stock</span></a></li>
          </ul>
        </li>

        <!-- Manufacturing -->
        <li class="treeview <?php 
          if($this->uri->segment(1)=="ManufacturingProducts")
            {echo "active";}
          else if($this->uri->segment(1)=="Production")
            {echo "active";}
          else if($this->uri->segment(1)=="Productionstatus")
            {echo "active";}
          ?>">
          <a><i class="glyphicon glyphicon-hourglass"></i><span>Manufacturing</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu ">
            <!-- <li class="<?php if($this->uri->segment(1)=="ManufacturingProducts"){echo "active";}?>" ><a href="<?php echo base_url();?>ManufacturingProducts"><i class="glyphicon glyphicon-share-alt"></i><span>Products</span></a></li> -->
            <li class="<?php if($this->uri->segment(1)=="Production"){echo "active";}?>" ><a  href="<?php echo base_url();?>Production"><i class="glyphicon glyphicon-share-alt"></i> <span>Production</span></a></li>
            <!-- <li class="<?php if($this->uri->segment(1)=="Productionstatus"){echo "active";}?>" ><a  href="<?php echo base_url();?>Productionstatus"><i class="glyphicon glyphicon-share-alt"></i> <span>Production Status</span></a></li> -->
            <!-- <li class="<?php if($this->uri->segment(1)=="Stock"){echo "active";}?>" ><a  href="<?php echo base_url();?>Stock"><i class="glyphicon glyphicon-share-alt"></i> <span>Stock</span></a></li> -->
          </ul>
        </li>
        <li class="<?php if($this->uri->segment(1)=="Sale"){echo "active";}?>" ><a  href="<?php echo base_url();?>Sale"><i class="glyphicon glyphicon-shopping-cart"></i> <span>Sale</span></a></li>
        <!-- HR -->
        <li class="treeview <?php 
          if($this->uri->segment(1)=="Employee")
            {echo "active";}
          else if($this->uri->segment(1)=="Attendance")
            {echo "active";}
          else if($this->uri->segment(1)=="PayAdvance")
            {echo "active";}
          else if($this->uri->segment(1)=="Payroll")
            {echo "active";}
          else if($this->uri->segment(1)=="Overtime")
            {echo "active";}    
          ?>">
          <a><i class="fa fa-building"></i><span>HR Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu ">
            <li class="<?php if($this->uri->segment(1)=="Employee"){echo "active";}?>" ><a href="<?php echo base_url();?>Employee"><i class="glyphicon glyphicon-share-alt"></i> <span>HR details</span></a></li>
            <li class="<?php if($this->uri->segment(1)=="Attendance"){echo "active";}?>" ><a href="<?php echo base_url();?>Attendance"><i class="glyphicon glyphicon-share-alt"></i> <span>Attendance</span></a></li>
            <li class="<?php if($this->uri->segment(1)=="PayAdvance"){echo "active";}?>" ><a href="<?php echo base_url();?>PayAdvance"><i class="glyphicon glyphicon-share-alt"></i> <span>Advance Payment</span></a></li>
            <li class="<?php if($this->uri->segment(1)=="Overtime"){echo "active";}?>" ><a href="<?php echo base_url();?>Overtime"><i class="glyphicon glyphicon-share-alt"></i> <span>Overtime</span></a></li>
            <li class="<?php if($this->uri->segment(1)=="Payroll"){echo "active";}?>" ><a href="<?php echo base_url();?>Payroll"><i class="glyphicon glyphicon-share-alt"></i> <span>Payroll</span></a></li>
          </ul>
        </li>

        <!-- Accounts -->
        <li class="treeview 
        <?php   
                if($this->uri->segment(1)=='Voucherhead')
                  {echo "active";}
                else if($this->uri->segment(1)=='Receipthead')
                  {echo "active";}
                else if($this->uri->segment(1)=='Voucher')
                          {echo "active";}
                else if($this->uri->segment(1)=='Receipt')
                          {echo "active";}
                else if($this->uri->segment(1)=="Daybook")
                          {echo "active";}
                else if($this->uri->segment(1)=="Ledger")
                  {echo "active";}
                else if($this->uri->segment(1)=="Ledgerhead")
                  {echo "active";}
                else if($this->uri->segment(1)=="Groups")
                  {echo "active";}
                else if($this->uri->segment(1)=="Journal")
                  {echo "active";}
                else if($this->uri->segment(1)=="Types")
                  {echo "active";}
                else if($this->uri->segment(1)=="Subgroups")
                  {echo "active";}
                else if($this->uri->segment(1)=="Profitloss")
                  {echo "active";}
                else if($this->uri->segment(1)=="Trialbalance")
                  {echo "active";}
                else if($this->uri->segment(1)=="Balancesheet")
                  {echo "active";}            
        ?>">
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
              <!-- <a href="#"><i class="glyphicon glyphicon-pencil"></i> Create account heads
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php if($this->uri->segment(1)=='Voucherhead'){echo "active";}?>" ><a href="<?php echo base_url();?>Voucherhead"><i class="glyphicon glyphicon-share-alt"></i>Voucher</a></li>
                <li class="<?php if($this->uri->segment(1)=='Receipthead'){echo "active";}?>" ><a href="<?php echo base_url();?>Receipthead"><i class="glyphicon glyphicon-share-alt"></i>Receipt</a></li>
              </ul>
            </li> 
            <li class="<?php if($this->uri->segment(1)=='Voucher'){echo "active";}?>" ><a href="<?php echo base_url();?>Voucher"><i class="glyphicon glyphicon-share-alt"></i>Voucher Entry</a></li>
            <li class="<?php if($this->uri->segment(1)=='Receipt'){echo "active";}?>" ><a href="<?php echo base_url();?>Receipt"><i class="glyphicon glyphicon-share-alt"></i>Receipt Entry</a></li> -->  

            <li class="<?php if($this->uri->segment(1)=="Types"){echo "active";}?>" ><a  href="<?php echo base_url();?>Types"><i class="glyphicon glyphicon-share-alt"></i> <span>Types</span></a></li>
            <li class="<?php if($this->uri->segment(1)=="Groups"){echo "active";}?>" ><a  href="<?php echo base_url();?>Groups"><i class="glyphicon glyphicon-share-alt"></i> <span>Groups</span></a></li>
            <li class="<?php if($this->uri->segment(1)=="Subgroups"){echo "active";}?>" ><a  href="<?php echo base_url();?>Subgroups"><i class="glyphicon glyphicon-share-alt"></i> <span>Sub Groups</span></a></li>
            <li class="<?php if($this->uri->segment(1)=="Ledgerhead"){echo "active";}?>" ><a  href="<?php echo base_url();?>Ledgerhead"><i class="glyphicon glyphicon-share-alt"></i> <span>Ledger Head</span></a></li>

            <li class="<?php if($this->uri->segment(1)=="Journal"){echo "active";}?>" ><a  href="<?php echo base_url();?>Journal"><i class="glyphicon glyphicon-share-alt"></i><span>Journal Entry</span></a></li>
            <li class="<?php if($this->uri->segment(1)=="Ledger"){echo "active";}?>" ><a  href="<?php echo base_url();?>Ledger"><i class="glyphicon glyphicon-share-alt"></i> <span>Ledger</span></a></li>
            <li class="<?php if($this->uri->segment(1)=="Daybook"){echo "active";}?>" ><a  href="<?php echo base_url();?>Daybook"><i class="glyphicon glyphicon-share-alt"></i> <span>Daybook</span></a></li>
            <li class="<?php if($this->uri->segment(1)=="Trialbalance"){echo "active";}?>" ><a  href="<?php echo base_url();?>Trialbalance"><i class="glyphicon glyphicon-share-alt"></i> <span>Trial Balance</span></a></li>
            <li class="<?php if($this->uri->segment(1)=="Profitloss"){echo "active";}?>" ><a  href="<?php echo base_url();?>Profitloss"><i class="glyphicon glyphicon-share-alt"></i> <span>Profit and loss account</span></a></li>
            <li class="<?php if($this->uri->segment(1)=="Balancesheet"){echo "active";}?>" ><a  href="<?php echo base_url();?>Balancesheet"><i class="glyphicon glyphicon-share-alt"></i> <span>Balancesheet</span></a></li></li>
          </ul>
        </li>

        <!-- Report -->
        <li class="treeview 
          <?php 
            if($this->uri->segment(1)=="Salereport")
              {echo "active";}
            if($this->uri->segment(1)=="Purchasereport")
              {echo "active";}
            if($this->uri->segment(1)=="Stockreport")
              {echo "active";}
            if($this->uri->segment(1)=="Productionreport")
              {echo "active";}
            if($this->uri->segment(1)=="Payrollreport")
              {echo "active";}
            if($this->uri->segment(1)=="Attendancereport")
              {echo "active";}
          ?>">
          <a><i class="fa fa-line-chart"></i><span>Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu ">
            <li class="<?php if($this->uri->segment(1)=="Salereport"){echo "active";}?>" ><a  href="<?php echo base_url();?>Salereport"><i class="fa fa-file-text-o"></i> <span>Sale Report</span></a></li>
            <li class="<?php if($this->uri->segment(1)=="Purchasereport"){echo "active";}?>" ><a  href="<?php echo base_url();?>Purchasereport"><i class="fa fa-file-text-o"></i> <span>Purchase Report</span></a></li>
            <li class="<?php if($this->uri->segment(1)=="Stockreport"){echo "active";}?>" ><a  href="<?php echo base_url();?>Stockreport"><i class="fa fa-file-text-o"></i> <span>Stock Report</span></a></li> 
            <li class="<?php if($this->uri->segment(1)=="Productionreport"){echo "active";}?>" ><a  href="<?php echo base_url();?>Productionreport"><i class="fa fa-file-text-o"></i> <span>Production Report</span></a></li>
            <li class="<?php if($this->uri->segment(1)=="Payrollreport"){echo "active";}?>" ><a  href="<?php echo base_url();?>Payrollreport"><i class="fa fa-file-text-o"></i> <span>Payroll Report</span></a></li>
            <li class="<?php if($this->uri->segment(1)=="Attendancereport"){echo "active";}?>" ><a  href="<?php echo base_url();?>Attendancereport"><i class="fa fa-file-text-o"></i> <span>Attendance Report</span></a></li>
          </ul>
        </li>  
    <?php } ?>


    <!-- COMPANY -->
    <?php if($this->session->userdata['user_type']=='C')
    { ?>
      <li class="<?php if($this->uri->segment(1)=="dashboard"){echo "active";}?>" ><a  href="<?php echo base_url();?>dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <!-- Settings -->
      <!-- <li class="treeview <?php 
      if($this->uri->segment(1)=="ChangePassword")
      {echo "active";}
      ?>">
      <a><i class="fa fa-gear"></i><span>Settings</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu ">
        <li class="<?php if($this->uri->segment(1)=="ChangePassword"){echo "active";}?>" ><a  href="<?php echo base_url();?>ChangePassword"><i class="glyphicon glyphicon-share-alt"></i> <span>Change Password</span></a></li>
      </ul>
      </li> -->
      <!-- Administration -->
        <li class="treeview 
        <?php 
          if($this->uri->segment(1)=="Customer")
            {echo "active";}
          else if($this->uri->segment(1)=="Supplier")
            {echo "active";}
          else if($this->uri->segment(1)=="Tax")
            {echo "active";}
          else if($this->uri->segment(1)=="Category")
            {echo "active";}
          else if($this->uri->segment(1)=="Product")
            {echo "active";}
          if($this->uri->segment(1)=="Productcategory")
            {echo "active";}
          else if($this->uri->segment(1)=="Productsubcategory")
            {echo "active";}
          else if($this->uri->segment(1)=="Pricecategory")
            {echo "active";}
          else if($this->uri->segment(1)=="Unit")
            {echo "active";}
          else if($this->uri->segment(1)=="Item")
            {echo "active";} 
          else if($this->uri->segment(1)=="Openingstock")
              {echo "active";} 
          else if($this->uri->segment(1)=="Bank")
              {echo "active";}       
          else if($this->uri->segment(1)=="Area")
              {echo "active";}      

        ?>">
        <a><i class="glyphicon glyphicon-home"></i><span>Administration</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>

        <ul class="treeview-menu ">

          <li class="treeview 
            <?php 
            if($this->uri->segment(1)=="Productcategory")
              {echo "active";}
            else if($this->uri->segment(1)=="Productsubcategory")
              {echo "active";}
            else if($this->uri->segment(1)=="Pricecategory")
              {echo "active";}     
            ?>">
            <a><i class="glyphicon glyphicon-list-alt"></i><span>Category</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu ">
              <li class="<?php if($this->uri->segment(1)=="Productcategory"){echo "active";}?>" ><a href="<?php echo base_url();?>Productcategory"><i class="glyphicon glyphicon-share-alt"></i><span>Product Category</span></a></li>
              <li class="<?php if($this->uri->segment(1)=="Productsubcategory"){echo "active";}?>" ><a href="<?php echo base_url();?>Productsubcategory"><i class="glyphicon glyphicon-share-alt"></i><span>Product Sub-Category</span></a></li>
              <li class="<?php if($this->uri->segment(1)=="Pricecategory"){echo "active";}?>" ><a href="<?php echo base_url();?>Pricecategory"><i class="glyphicon glyphicon-share-alt"></i><span>Price Category</span></a></li>
            </ul>
          </li>

          <li class="<?php if($this->uri->segment(1)=="Customer"){echo "active";}?>" ><a href="<?php echo base_url();?>Customer"><i class="glyphicon glyphicon-share-alt"></i><span>Customer</span></a></li>
          <li class="<?php if($this->uri->segment(1)=="Supplier"){echo "active";}?>" ><a href="<?php echo base_url();?>Supplier"><i class="glyphicon glyphicon-share-alt"></i><span>Supplier</span></a></li>
          <li class="<?php if($this->uri->segment(1)=="Tax"){echo "active";}?>" ><a href="<?php echo base_url();?>Tax"><i class="glyphicon glyphicon-share-alt"></i><span>Tax Details</span></a></li>
          <li class="<?php if($this->uri->segment(1)=="Bank"){echo "active";}?>" ><a href="<?php echo base_url();?>Bank"><i class="glyphicon glyphicon-share-alt"></i><span>Bank Details</span></a></li>
          <li class="<?php if($this->uri->segment(1)=="Area"){echo "active";}?>" ><a href="<?php echo base_url();?>Area"><i class="glyphicon glyphicon-share-alt"></i><span>Area Details</span></a></li>

          <li class="treeview 
            <?php 
            if($this->uri->segment(1)=="Unit")
              {echo "active";}
            else if($this->uri->segment(1)=="Item")
              {echo "active";}
            else if($this->uri->segment(1)=="Openingstock")
              {echo "active";}     
            ?>">
            <a><i class="glyphicon glyphicon-shopping-cart"></i><span>Product</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu ">
              <li class="<?php if($this->uri->segment(1)=="Unit"){echo "active";}?>" ><a href="<?php echo base_url();?>Unit"><i class="glyphicon glyphicon-share-alt"></i><span>Unit</span></a></li>
              <li class="<?php if($this->uri->segment(1)=="Item"){echo "active";}?>" ><a href="<?php echo base_url();?>Item"><i class="glyphicon glyphicon-share-alt"></i><span>Item</span></a></li>
              <li class="<?php if($this->uri->segment(1)=="Openingstock"){echo "active";}?>" ><a href="<?php echo base_url();?>Openingstock"><i class="glyphicon glyphicon-share-alt"></i><span>Opening Stock</span></a></li>
            </ul>

        </ul>
        </li>
        <!-- Inventory -->
        <li class="treeview <?php 
          if($this->uri->segment(1)=="Purchase")
            {echo "active";}
          else if($this->uri->segment(1)=="Stock")
            {echo "active";}
          ?>">
          <a><i class="fa fa-laptop"></i><span>Inventory</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu ">
            <li class="<?php if($this->uri->segment(1)=="Purchase"){echo "active";}?>" ><a href="<?php echo base_url();?>Purchase"><i class="glyphicon glyphicon-share-alt"></i><span>Purchase</span></a></li>
            <li class="<?php if($this->uri->segment(1)=="Stock"){echo "active";}?>" ><a  href="<?php echo base_url();?>Stock"><i class="glyphicon glyphicon-share-alt"></i> <span>Stock</span></a></li>
          </ul>
        </li>
    <?php } ?>

</ul>	
</section>
<!-- /.sidebar -->
</aside>