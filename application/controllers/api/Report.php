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

            $cmpRow = $cmp->row_array();
            $csuRow = $csu->row_array();
            $this->response(array(
                "About" => array(
                    "ReportNo" => "",
                    "ReportType" => "",
                    "ChannelNo" => "",
                    "CorpID" => ""
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
                        "LegalForm" => "",
                        "DateRegistered" => $cmpRow['Est'],
                        "DateFounded" => "",
                        "InitialCapital" => 0,
                        "InitialMoneyId" => "IDR",
                        "InitialCapitalUSD" => 0,
                        "NationalityCEO" => "",
                        "EducationCEO" => "",
                        "YearInBizCEO" => "",
                        "RegisterCapital" => 0,
                        "RegisterMoneyId" => "IDR",
                        "RegisterCapitalUSD" => 0,
                        "EmployeeNum" => $cmpRow['TotalEmp'],
                        "BranchNumber" => 0,
                        "BranchEmployeeNum" => 0,
                        "PaidUpCapital" => $cmpRow['PaidCap'],
                        "PaidUpMoneyId" => "IDR",
                        "PaidUpCapitalUSD" => 0,
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
                        "Managers" => array(),
                        "BranchDetailInfos" => $cbrLists
                    )
                )
            ));
        }

    }
}
