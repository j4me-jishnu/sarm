<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['Company'] = 'Settings/Company';
$route['addCompany'] = 'Settings/addCompany';
$route['getCompany'] = 'Settings/getCompany';
$route['deleteCompany'] = 'Settings/deleteCompany';
$route['CompanyinfoEdit/(:num)'] = 'Settings/CompanyinfoEdit/$1';

$route['FinYear'] = 'Settings/FinYear';
$route['Finyearget']= 'Settings/Finyearget';
$route['addFinYear']= 'Settings/addFinYear';
$route['FinyearEdit/(:num)'] = 'Settings/FinyearEdit/$1';
$route['FinyearDelete'] = 'Settings/FinyearDelete';

$route['ChangePassword'] = 'Settings/ChangePassword';
$route['resetPassword'] = 'Settings/resetPassword';

$route['ChangeColor'] = 'Settings/ChangeColor';
$route['addColor'] = 'Settings/addColor';
$route['editColor'] = 'Settings/editColor';
$route['insertColor'] = 'Settings/insertColor';

//Administation
$route['Pricecategory'] = 'Category/Pricecategory';
$route['getPricecategory'] = 'Category/getPricecategory';
$route['priceCategoryedit/(:num)'] = 'Category/priceCategoryedit/$1';
$route['priceCategoryDelete'] = 'Category/priceCategoryDelete';
$route['AddpriceCategory'] = 'Category/AddpriceCategory';

$route['Customer'] = 'Administration/customers';
$route['Customerget'] = 'Administration/Customerget';
$route['addCustomer'] = 'Administration/addCustomer';
$route['Customeredit/(:num)'] = 'Administration/Customeredit/$1';
$route['Customerdelete'] = 'Administration/Customerdelete';

$route['Supplier'] = 'Administration/Supplier';
$route['addSupplier'] = 'Administration/addSupplier';
$route['getSupplier'] ='Administration/getSupplier';
$route['editSupplier/(:num)'] = 'Administration/editSupplier/$1';
$route['deleteSupplier'] = 'Administration/deleteSupplier';

$route['Tax'] = 'Administration/Tax';
$route['getTaxdetails'] = 'Administration/getTaxdetails';
$route['addTax'] = 'Administration/addTax';
$route['deleteTaxdetails'] = 'Administration/deleteTaxdetails';
$route['editTaxdetails/(:num)'] = 'Administration/editTaxdetails/$1';

$route['Area'] = 'Administration/Area';
$route['getArea'] = 'Administration/getArea';
$route['Area/add'] = 'Administration/addArea';
$route['Area/edit/(:num)'] = 'Administration/editArea/$1';
$route['AreaDelete'] = 'Administration/deleteArea';

$route['Bank'] = 'Administration/Bank';
$route['getBank'] = 'Administration/getBank';
$route['Bank/add'] = 'Administration/addBank';
$route['BankDelete'] = 'Administration/deleteBank';
$route['Bank/edit/(:num)'] = 'Administration/editBank/$1';

$route['Productcategory'] = 'Category/Productcategory';
$route['getMainCategory'] = 'Category/getMainCategory';
$route['AddmainCategory'] = 'Category/AddmainCategory';
$route['CategoryDelete'] = 'Category/CategoryDelete';
$route['Categoryedit/(:num)'] = 'Category/Categoryedit/$1';

$route['Productsubcategory'] = 'Category/Productsubcategory';
$route['getsubCategory'] = 'Category/getsubCategory';
$route['AddsubCategory'] = 'Category/AddsubCategory';
$route['subCategoryDelete'] = 'Category/subCategoryDelete';
$route['subCategoryedit/(:num)'] = 'Category/subCategoryedit/$1';

$route['Unit'] = 'Product/Unit';
$route['getUnit'] = 'Product/getUnit';
$route['addUnit'] = 'Product/addUnit';
$route['unitDelete'] = 'Product/unitDelete';
$route['Unitedit/(:num)'] = 'Product/Unitedit/$1';

$route['Item'] = 'Product/Item';
$route['getProducts'] = 'Product/getProducts';
$route['addItem'] = 'Product/addItem';
$route['importItem'] = 'Product/ImportExcel';
$route['addImport'] = 'Product/addImport';
$route['itemDelete'] = 'Product/itemDelete';
$route['editProduct/(:num)'] = 'Product/editProduct/$1';
$route['activeProduct/(:num)/(:num)'] = 'Product/activeProduct/$1/$2';
$route['deactiveProduct/(:num)/(:num)'] = 'Product/deactiveProduct/$1/$2';


$route['Openingstock'] = 'Product/Openingstock';
$route['addOpeningstock'] = 'Product/addOpeningstock';
$route['getItembyCompany'] = 'Product/getItembyCompany';
$route['getOpenstock'] = 'Product/getOpenstock';
$route['deleteOpenstock'] = 'Product/deleteOpenstock';
$route['Openstock/edit/(:num)'] = 'Product/editOpening/$1';

$route['Employee'] = 'Hrmodule/Employee';
$route['getEmployee'] = 'Hrmodule/getEmployee';
$route['addEmployee'] = 'Hrmodule/addEmployee';
$route['Employee/delete'] = 'Hrmodule/deleteEmployee';
$route['Employee/status'] = 'Hrmodule/changeEmployeeStatus';
$route['Employee/edit/(:num)'] = 'Hrmodule/editEmployee/$1';

$route['PieceRateEmployee'] = 'Hrmodule/PieceRateEmployee';
$route['getPieceEmployee'] = 'Hrmodule/getPieceEmployee';
$route['getItemLists'] = 'Hrmodule/getItemLists';
$route['addPieceEmployee'] = 'Hrmodule/addPieceEmployee';
$route['editPieceRateEmployee/(:num)'] = 'Hrmodule/editPieceRateEmployee/$1';
$route['deletePeiceRateEmployee'] = 'Hrmodule/deletePeiceRateEmployee';


$route['Attendance'] = 'Hrmodule/Attendance';
$route['Attendence/get'] = 'Hrmodule/getAttendence';
$route['Attendence/attend_reg'] = 'Hrmodule/attend_reg';
$route['Attendence/absent_reg'] = 'Hrmodule/absent_reg';
$route['Attendence/multi_attend_reg'] = 'Hrmodule/multi_attend_reg';

$route['PayAdvance'] = 'Hrmodule/PayAdvance';
$route['PayAdvance/get'] = 'Hrmodule/getpayAdvance';
$route['PayAdvance/add'] = 'Hrmodule/addPayAdvance';
$route['getEmployeesbyCompany'] = 'Hrmodule/getEmployeesbyCompany';
$route['getBasicofEmployee'] = 'Hrmodule/getBasicofEmployee';
$route['PayAdvance/edit/(:num)'] = 'Hrmodule/editPayAdvance/$1';
$route['getSalaryMode'] = 'Hrmodule/getSalaryMode';
$route['getAttendanceofEmployee'] = 'Hrmodule/getAttendanceofEmployee';
$route['getAllAttendanceofEmployee'] = 'Hrmodule/getAllAttendanceofEmployee';

$route['Payroll'] = 'Hrmodule/Payroll';
$route['Payroll/get'] = 'Hrmodule/getPayroll';
$route['Payroll/add'] = 'Hrmodule/addPayroll';
$route['getAdvanceofEmployee'] = 'Hrmodule/getAdvanceofEmployee';
$route['getLeaveofEmployee'] = 'Hrmodule/getLeaveofEmployee';

$route['Overtime'] = 'Hrmodule/Overtime';
$route['Overtime/add'] = 'Hrmodule/addOvertime';
$route['Overtime/get'] = 'Hrmodule/getOvertime';
$route['Overtime/edit/(:num)'] = 'Hrmodule/editOvertime/$1';
$route['Overtime/delete'] = 'Hrmodule/deleteOvertime';
$route['getOvertimeofEmployee'] = 'Hrmodule/getOvertimeofEmployee';
//Inventory
$route['Purchase'] = 'Inventory/Purchase';
$route['getPurchase'] = 'Inventory/getPurchase';
$route['addPurchase'] = 'Inventory/addPurchase';
$route['getSuppDetails'] = 'Inventory/getSuppDetails';
$route['getItemlist'] = 'Inventory/getItemlist';
$route['getTaxlist'] = 'Inventory/getTaxlist';
$route['getPriceName'] = 'Inventory/getPriceName';
$route['getPrice'] = 'Inventory/getPrice';
$route['getSupplierbyCompany'] = 'Inventory/getSupplierbyCompany';
$route['stockUpdate'] = 'Inventory/stockUpdate';
$route['Purchase/edit/(:num)'] = 'Inventory/PurchaseEdit/$1';
$route['checkInvoice']='Inventory/checkInvoice';
$route['deletePurchase'] = 'Inventory/deletePurchase';

$route['Stock'] = 'Inventory/Stock';
$route['getStockdetails'] = 'Inventory/getStockdetails';

//Manufacturing
$route['ManufacturingProducts'] = 'Manufacturing/productList';
$route['ManufacturingProducts/addItem']='Manufacturing/addItem';
$route['ManufacturingProducts/getProducts'] = 'Manufacturing/getProducts';
$route['activateProduct/(:num)/(:num)'] = 'Manufacturing/activeProduct/$1/$2';
$route['deactivateProduct/(:num)/(:num)'] = 'Manufacturing/deactiveProduct/$1/$2';
$route['editProducts/(:num)'] = 'Manufacturing/editProducts/$1';
$route['itemDeleted'] = 'Manufacturing/itemDelete';

$route['Production'] = 'Manufacturing/Production';
$route['Production/addProduction']= 'Manufacturing/addProduction';
$route['getItems'] = 'Manufacturing/getItems';
$route['getProductName'] = 'Manufacturing/getProductName';
$route['getAvailable'] = 'Manufacturing/getAvailable';
$route['getProduction'] = 'Manufacturing/getProduction';
$route['Production/view/(:num)'] = 'Manufacturing/viewProduction/$1';
$route['Production/delete']='Manufacturing/deleteProduction';
$route['Production/edit/(:num)'] = 'Manufacturing/editProduction/$1';
$route['Production/updateProduction'] ='Manufacturing/updateProduction';

$route['Sale'] = 'Sale';
$route['Sale/add'] = 'Sale/add';
$route['getCustomerbyCompany'] = 'Sale/getCustomerbyCompany';
$route['getcustDetails'] = 'Sale/getcustDetails';
$route['checkInvoicenumber'] = 'Sale/checkInvoicenumber';
$route['getSale']='Sale/getSale';
$route['Sale/edit/(:num)'] = 'Sale/edit/$1';
$route['deleteSale'] = 'Sale/deleteSale';

//accounts
$route['Voucherhead'] = 'Accounts/Voucherhead';
$route['Voucherhead/add'] = 'Accounts/addVoucherhead/';
$route['getVoucherHeads'] = 'Accounts/getVoucherHeads';
$route['Voucherhead/edit/(:num)'] = 'Accounts/editVoucherhead/$1';
$route['VoucherheadDelete'] = 'Accounts/deleteVoucherHead';

$route['Receipthead'] = 'Accounts/Receipthead';
$route['Receipthead/add'] = 'Accounts/addReceipthead/';
$route['getReceipthead'] = 'Accounts/getReceipthead';
$route['Receipthead/edit/(:num)'] = 'Accounts/editReceipthead/$1';
$route['ReceiptheadDelete'] = 'Accounts/deleteReceipthead';

$route['Receipt'] = 'Accounts/Receipt';
$route['Receipt/add'] = 'Accounts/addReceipt';
$route['Receipt/get']='Accounts/getReceipt';
$route['Receipt/edit/(:num)'] = 'Accounts/editReceipt/$1';
$route['Receipt/delete'] = 'Accounts/deleteReceipt';

$route['Voucher'] = 'Accounts/Voucher';
$route['Voucher/add'] = 'Accounts/addVoucher';
$route['Voucher/get']='Accounts/getVoucher';
$route['Voucher/edit/(:num)'] = 'Accounts/editVoucher/$1';
$route['Voucher/delete'] = 'Accounts/deleteVoucher';

$route['Groups'] = 'Accounts/Groups';
$route['Groups/add'] = 'Accounts/addGroups';
$route['Groups/get']='Accounts/getGroups';
$route['Groups/edit/(:num)'] = 'Accounts/editGroups/$1';
$route['Groups/delete'] = 'Accounts/deleteGroups';

$route['Subgroups'] = 'Accounts/Subgroups';
$route['Subgroups/add'] = 'Accounts/addSubgroups';
$route['getgroupslist'] = 'Accounts/getgroupslist';
$route['Subgroup/get'] = 'Accounts/getSubgroup';
$route['Subgroup/edit/(:num)'] = 'Accounts/editsubGroups/$1';
$route['Subgroup/delete'] = 'Accounts/deleteSubgroup';

$route['Ledgerhead'] = 'Accounts/Ledgerhead';
$route['Ledgerhead/add'] = 'Accounts/addLedgerhead';
$route['Ledgerhead/get']='Accounts/getLedgerhead';
$route['Ledgerhead/edit/(:num)'] = 'Accounts/editLedgerhead/$1';
$route['Ledgerhead/delete'] = 'Accounts/deleteLedgerhead';

$route['Journal'] = 'Accounts/Journal';
$route['Journal/add'] = 'Accounts/addJournal';
$route['getLedgerHeadlist'] = 'Accounts/getLedgerHeadlist';
$route['getJournallist'] = 'Accounts/getJournallist';
$route['Journal/edit/(:any)'] = 'Accounts/editJournal/$1';
$route['deleteJournal'] = 'Accounts/deleteJournal';

$route['Types'] = 'Accounts/Types';
$route['Types/get'] = 'Accounts/getTypes/';

$route['Ledger'] = 'Accountsreports/Ledger';
$route['Ledger/getLedger'] = 'Accountsreports/getLedger';

$route['Daybook'] = 'Accountsreports/Daybook';
$route['Daybook/get'] = 'Accountsreports/getDaybook';
$route['Profitloss'] = 'Accountsreports/Profitloss';
$route['Profitloss/get'] = 'Accountsreports/getProfitloss';
$route['Trialbalance'] = 'Accountsreports/Trialbalance';
$route['Trialbalance/get'] = 'Accountsreports/getTrialbalance';
$route['Balancesheet'] = 'Accountsreports/Balancesheet';
$route['Balancesheet/get'] = 'Accountsreports/getBalancesheet';
$route['addProfit'] = 'Accountsreports/addProfit';

//Payroll Report
$route['payrollReport'] = 'Reports/payrollReport';
$route['getPayrollReport'] = 'Reports/getPayrollReport';

//Attendance Report
$route['attendanceReport'] = 'Reports/attendanceReport';
$route['getAttendanceTabele'] = 'Reports/getAttendanceTabele';
$route['getAbsentTable'] = 'Reports/getAbsentTable';

//Stock Report
$route['stockReport'] = 'Reports/stockReport';
$route['getStockReport'] = 'Reports/getStockReport';

//Production Report
$route['productionReport'] = 'Reports/productionReport';
$route['getProductionReportRM'] = 'Reports/getProductionReportRM';
$route['getProductionReportOP'] = 'Reports/getProductionReportOP';

//Sale Report
$route['saleReport'] = 'Reports/saleReport';
$route['getSaleTable'] = 'Reports/getSaleTable';

//Purchase Report
$route['purchaseReport'] = 'Reports/purchaseReport';
$route['getPurchaseTable'] = 'Reports/getPurchaseTable';

//Company Reports
//Purchase Reports//
$route['cmpPurchaseReport'] = 'Companyreport/purchaseReport';
$route['GetcmpPurchaseReport'] = 'Companyreport/getPurchaseTable';

//Sale Reports
$route['cmpSaleReport'] = 'Companyreport/saleReport';
$route['GetcmpSaleReport'] = 'Companyreport/getSaleTable';

//Stock Reports
$route['cmpStockReport'] = 'Companyreport/stockReport';
$route['GetcmpStockReport'] = 'Companyreport/getStockReport';