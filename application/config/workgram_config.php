<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//Custon configuration file.

// function employeeservices->getEmployeeswithdep() ->  // designation 23 -> is managing director   not get report

//This is to set the site title
$config['APPLICATION_MAIN_TITLE']	= "WORKGRAM ";

//LankaCom Country ID
$config['LCS_COUNTRY_ID']	= "1";

$config['LCS_CURRENCY_ID']	= "1";

//LankaCom Customer ID
$config['LCS_CUSTOMER_ID']	= "0";

//LankaCom Company ID
$config['LCS_COMPANY_ID'] = "1";

//PO Statuses
$config['NEW_PO_REQUEST_ID']          = "209";
$config['PENDING_ACD_PO_ID']          = "210"; //No PO GRN
$config['PENDING_HOD_PO_ID']          = "211";
$config['REJECTED_HOD_PO_ID']         = "1000";
$config['APPROVED_HOD_PO_ID']         = "24";      
$config['RETURNED_HOD_PO_ID']         = "1001";
$config['APPROVED_ACD_PO_ID']         = "300";
$config['REJECTED_ACD_PO_ID']         = "1002";
$config['RETURNED_ACD_PO_ID']         = "1003";
$config['GOODS_RECEIVED_PARTIALLY_ID']= "1004";
$config['GOODS_RECEIVED_FULLY_ID']    = "1005";
$config['PO_REQUEST_DELETED_ID']      = "1006";
$config['CANCELLED_ACD_PO_ID']        = "999";
$config['CLOSED_PO']                  = "39";
$config['APPROVED_MANAGER_PO_ID']     = "1007";
$config['REJECTED_MANAGER_PO_ID']     = "1008";
$config['RETURNED_MANAGER_PO_ID']     = "1009";
$config['APPROVED_MD_PO_ID']          = "1010";
$config['REJECTED_MD_PO_ID']          = "1011";
$config['RETURNED_MD_PO_ID']          = "1012";

//Admin Department ID
$config['ADMIN_DEPARTMENT_ID']	="1";

//PO Detail Statuses
$config['NOT_APPROVED']          = "1";
$config['APPROVED']              = "2";
$config['PARTIALLY_APPROVED']    = "3";

//GRN Statuses
//$config['NEW_GRN']              = "1";
//$config['PENDING_APPROVAL_HOD'] = "2";
//$config['APPROVED_HOD']         = "3";
//$config['SENT_BACK_HOD']        = "4";
//$config['PENDING_APPROVAL_ACD'] = "5";
//$config['APPROVED_ACD']         = "6";
//$config['SENT_BACK_ACD']        = "7";
//$config['CLOSED_GRN']           = "8";

$config['GRN_CREATED']                     = "25";
$config['APPROVED_GRN/GRN_VERIFICATION']   = "26";
$config['APPROVED_GRN/GRN_VERIFICATION']   = "29";
$config['APPROVED_GRN/GRN_VERIFICATION_1'] = "26";
$config['GRN_CLOSED']                      = "30";
$config['PENDING_APPROVAL_GRN']            = "31";

//Item Status
//$config['ITEM_RECEIVED']        = "1";
//$config['ITEM_NOT_RECEIVED']    = "2";
//$config['ITEM_CANCELlED']       = "3";
//$config['ITEM_DISPOSED']        = "4";


$config['AVAILABLE_CAN_USE']                 = "1";
$config['STOCK_ISSUED_PENDING APPROVAL']     = "2";
$config['ISSUED_ITEM']                       = "3";
$config['RAW_METERIAL_OF_MANUFACTURED_ITEM'] = "7";
$config['CAN_USE']                           = "9";
$config['NOT_DEFINED']                       = "20";
$config['ITEM_CANCELLED']                    = "21";
$config['ITEM_TEMPORARILY_OUT']              = "22";

//Bulk Type Code
$config['SINGLE_ITEM']  = "1";
$config['BULK_ITEM']    = "2";

//PO Types
$config['WITH_PO']  = "1";
$config['NO_PO']    = "0";

//FA Item Status
$config['CURRENTLY_DEPRECIATING']   = "1";
$config['CATEGORY_BEFORE']          = "2";
$config['CATEGORY_AFTER']           = "3";
$config['FULLY_DEPRECIATED']        = "4";

//FA Item Dispose Status
$config['NOT_DISPOSED']         = "0";
$config['SELECTED_DISPOSE']     = "1";
//$config['VERIFIED']           = "2";
$config['DISPOSED']             = "3";

//FA Items Selected For FA Status
$config['NOT_SELECTED']     = "0";
$config['SELECTED']         = "1";
$config['APPROVED']         = "2";
$config['REJECTED']         = "3";


$config['MAILBOX']             = "{203.143.14.246:143/notls}";
$config['MAILBOX2']            = "{203.143.14.229:143/notls}";


// Image path for different document
$config['EMPLOYEE_IMAGE']       = "employee_photo";
$config['EMPLOYEE_CONTRACT'] 	= "contract_document";
$config['ITEM_MASTER'] 		 = "item_master";
$config['LEAVE_DOC'] 		 = "leave_docs";



// leave request status in ta_leave_status
$config['PENDING_HOD_APPROVAL'] = 1;//	Pending Approval by Manager/HOD
$config['HOD_APPROVED']       	= 2;//	Approved by Manager/HOD
$config['HOD_REJECTED']       	= 3;//	Rejected by Manager/HOD
$config['PENDING_HR_APPROVAL']  = 4;//  Pending Approval by HR
$config['HR_APPROVED']       	= 5;//	Approved by HR
$config['HR_REJECTED']       	= 6;//	Rejected by HR


//system codes where even if the user has no privileges the system default view should be shown
$config['DEFAULT_VIEW_SYSTEMS'] = array(5,6,7,15);
    
// MCMS - Medical Claim Status
$config['MEDICAL_CLAIM_CREATED'] = "1";
$config['MEDICAL_CLAIM_ACD_APPROVED'] = "2";
$config['MEDICAL_CLAIM_FINANCE_DEPT_APPROVED'] = "3";

// MCS - Medical Claim Status
$config['FINANTIAL_YEAR_START'] = "0000-04-1 00:00:00";   //Start of the Finantial year.
$config['FINANTIAL_YEAR_END'] = "0000-03-31 00:00:00";      //End of the finantial year.
 