<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Report extends REST_Controller
{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
    }

    public function getReport_get()
    {
        $cmp = $this->db->where("ID", $this->get("id"))->get("30cmp");
        $csu = $this->db->where("CID", $this->get("id"))->get("43csu");
        $cbr = $this->db->where('showed', '1')->where('CID', $this->get("id"))->from('31cbr')->order_by('BID')->get();
        $cpa = $this->db->where('CID', $this->get("id"))->from('42cpa')->get();
        $csh = $this->db->where('CID', $this->get("id"))->from('33csh')->get();
        $cmb = $this->db->where('CID', $this->get("id"))->from('35cmb')->get();

        if ($cmp->num_rows() == 1) {
            $cbrLists = array();
            foreach ($cbr->result_array() as $cbrList) {
                $cbrLists[]["BranchDetailInfo"] = array(
                    "Name" => $cbrList['usedFor'],
                    "Address" => $cbrList['address'],
                    "Contact" => $cbrList['phone'],
                    "Holdings" => "",
                    "Remark" => ""
                );
            }

            $cpaLists = array();
            foreach ($cpa->result_array() as $cpaList) {
                $cpaLists[]["Affiliate"] = array(
                    "Name" => $cpaList['Name'],
                    "Remark" => ""
                );
            }

            $cshLists = array();
            foreach ($csh->result_array() as $cshList) {
                $cshLists[]["ShareHolder"] = array(
                    "Name" => $cshList['Sharer'],
                    "Ratio" => $cshList['Percent'],
                    "SharesHold" => "",
                    "ValueHold" => "",
                    "ValueMoneyID" => "",
                    "ValueUSD" => ""
                );
            }

            $cmbLists = array();
            foreach ($cmb->result_array() as $cmbList) {
                $cmbLists[]["Manager"] = array(
                    "Name" => $cmbList['name'],
                    "Title" => $cmbList['Position'],
                    "Nationality" => "",
                    "WorkExperience" => "",
                    "Age" => ""
                );
            }

            $cmpRow = $cmp->row_array();
            $csuRow = $csu->row_array();
            $this->response(array(
                "About" => array(
                    "ReportNo" => "",
                    "ReportType" => "",
                    "ChannelNo" => "",
                    "DefaultCurrency" => "IDR",
                    "CorpID" => "Sinosure"
                ),
                "Subject" => array(
                    "BasicInfo" => array(
                        "EngName" => $cmpRow['Name'],
                        "ChnName" => "",
                        "TradeName" => "",
                        "City" => "",
                        "Province" => "",
                        "Country" => "INA",
                        "StreetAddress" => $cmpRow['Address'],
                        "ZipCode" => "",
                        "OtherAddress" => "",
                        "AddressRegistered" => $cmpRow['Address'],
                        "AddressCHN" => "",
                        "RegisterNo" => $cmpRow['LegalNo'],
                        "TelephoneNo" => $cmpRow['Phone'],
                        "FaxNo" => $cmpRow['Fax'],
                        "Website" => $cmpRow['Website'],
                        "Email" => $cmpRow['Email'],
                        "TaxID" => "",
                        "DunsNo" => "",
                    ),
                    "OverView" => array(
                        "LegalForm" => $cmpRow['LegalNo'],
                        "DateRegistered" => $cmpRow['Est'],
                        "DateFounded" => "",
                        "InitialCapital" => "",
                        "InitialMoneyId" => "",
                        "InitialCapitalUSD" => "",
                        "NationalityCEO" => "",
                        "EducationCEO" => "",
                        "YearInBizCEO" => "",
                        "RegisterCapital" => $cmpRow['AuthCap'],
                        "RegisterMoneyId" => "IDR",
                        "RegisterCapitalUSD" => "",
                        "EmployeeNum" => $cmpRow['TotalEmp'],
                        "BranchNumber" => "",
                        "BranchEmployeeNum" => "",
                        "PaidUpCapital" => $cmpRow['PaidCap'],
                        "PaidUpMoneyId" => "IDR",
                        "PaidUpCapitalUSD" => "",
                        "OperationStatus" => 1,
                        "ParentId" => "",
                        "Parent" => "",
                        "UParentId" => "",
                        "UltimateParent" => "",
                        "ListedFlag" => 1,
                        "StockExchange" => "",
                        "CEO" => "",
                        "CFO" => "",
                        "LegalChanges" => "",
                        "BackGround" => $csuRow['Background'],
                        "FormerRegisterNo" => "",
                        "LastCapitalDate" => "",
                        "ListedSharePriceDate" => "",
                        "ListedSharePrice" => "",
                        "ListedSharePriceMoneyID" => "IDR",
                        "ShareRemark" => "",
                        "ParentRemark" => "",
                        "UParentRemark" => "",
                        "Subsidiaries" => array(),
                        "Relateds" => array(),
                        "Affiliates" => $cpaLists,
                        "Managers" => $cmbLists,
                        "BranchDetailInfos" => $cbrLists,
                        "ShareHolders" => $cshLists
                    )
                )
            ));
        }

    }
}
