<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class Report extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();      
    }

    public function getReport_get(){
        $cmp = $this->db->where("ID",$this->get("id"))->get("30cmp");
        $csu = $this->db->where("CID",$this->get("id"))->get("43csu");
        if($cmp->num_rows()==1){
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
                    "Subsidiaries" => array(
                        
                    )
                )
            )
        ));
        }
        
    } 
    /*
     * 
<BackGround>The subject company is a leading provider of IT, networking technology solutions and Business Support Services to the global telecommunications industry. It is part of the US $11.1 billion Mahindra Group, in partnership with British Telecommunications plc (BT), one of the world's leading communications service providers, focused primarily on the telecommunications industry. In 2009 it expanded its IT portfolio by acquiring the leading global business and information technology services company Satyam Computer Services Limited ( Mahindra Satyam).</BackGround>
<FormerRegisterNo></FormerRegisterNo>
<LastCapitalDate></LastCapitalDate>
<ListedSharePriceDate>2014-04-11</ListedSharePriceDate>
<ListedSharePrice>1739.45</ListedSharePrice>
<ListedSharePriceMoneyID>INR</ListedSharePriceMoneyID>
<ShareRemark></ShareRemark>
<ParentRemark></ParentRemark>
<UParentRemark></UParentRemark>
<Subsidiaries>
<Subsidiary>
<Name>Tech Mahindra GmbH </Name>
<Code></Code>
<Contact></Contact>
<Address></Address>
</Subsidiary>
<Subsidiary>
<Name>
Tech Talenta Inc USA </Name>
<Code></Code>
<Contact></Contact>
<Address></Address>
</Subsidiary>
<Subsidiary>
<Name>
CanvasM (Americas) Inc </Name>
<Code></Code>
<Contact></Contact>
<Address></Address>
</Subsidiary>
<Subsidiary>
<Name>
Tech Mahindra Foundation </Name>
<Code></Code>
<Contact></Contact>
<Address></Address>
</Subsidiary>
<Subsidiary>
<Name>
CanvasM Technologies Ltd </Name>
<Code></Code>
<Contact></Contact>
<Address></Address>
</Subsidiary>
<Subsidiary>
<Name>
PT Tech Mahindra Indonesia </Name>
<Code></Code>
<Contact></Contact>
<Address></Address>
</Subsidiary>
<Subsidiary>
<Name>
Tech Mahindra (Nigeria) Ltd </Name>
<Code></Code>
<Contact></Contact>
<Address></Address>
</Subsidiary>
<Subsidiary>
<Name>
Tech Mahindra (Thailand) Ltd </Name>
<Code></Code>
<Contact></Contact>
<Address></Address>
</Subsidiary>
<Subsidiary>
<Name>
Venturbay Consultants Pvt Ltd </Name>
<Code></Code>
<Contact></Contact>
<Address></Address>
</Subsidiary>
<Subsidiary>
<Name>
Tech Mahindra (Bahrain) Ltd SPC </Name>
<Code></Code>
<Contact></Contact>
<Address></Address>
</Subsidiary>
<Subsidiary>
<Name>
Tech Mahindra (Americas) Inc USA </Name>
<Code></Code>
<Contact></Contact>
<Address></Address>
</Subsidiary>
<Subsidiary>
<Name>
Tech Mahindra (Malaysia) SDN BHD </Name>
<Code></Code>
<Contact></Contact>
<Address></Address>
</Subsidiary>
<Subsidiary>
<Name>
Tech Mahindra (Singapore) Pte Ltd </Name>
<Code></Code>
<Contact></Contact>
<Address></Address>
</Subsidiary>
<Subsidiary>
<Name>
Tech Mahindra (Beijing) IT Services Ltd </Name>
<Code></Code>
<Contact></Contact>
<Address></Address>
</Subsidiary>
<Subsidiary>
<Name>
Mahindra Logisoft Business Solutions Ltd </Name>
<Code></Code>
<Contact></Contact>
<Address></Address>
</Subsidiary>
<Subsidiary>
<Name>
Tech Mahindra Brasil Servicecos De Informatica Ltd</Name>
<Code></Code>
<Contact></Contact>
<Address></Address>
</Subsidiary>
</Subsidiaries>
<Relateds>
<Related>
<Name>Mahindra BT Investment Company (Mauritius) Ltd</Name>
<Code></Code>
</Related>
<Related>
<Name>Satyam BPO Ltd </Name>
<Code></Code>
</Related>
<Related>
<Name>
Satyam Computer Services Ltd </Name>
<Code></Code>
</Related>
<Related>
<Name>
Satyam Computer Services (Shanghai) Co Ltd</Name>
<Code></Code>
</Related>
</Relateds>
<Affiliates>
</Affiliates>
<Managers>
<Manager>
<Name>Anand Gopal Mahindra</Name>
<Title>Additional Director</Title>
<Nationality></Nationality>
<WorkExperience></WorkExperience>
<Age>59</Age>
</Manager>
<Manager>
<Name>Rajyalakshmi Rao Meka</Name>
<Title>Additional Director</Title>
<Nationality></Nationality>
<WorkExperience></WorkExperience>
<Age>65</Age>
</Manager>
<Manager>
<Name>Bharat Narotam Doshi</Name>
<Title>Additional Director</Title>
<Nationality></Nationality>
<WorkExperience></WorkExperience>
<Age>65</Age>
</Manager>
<Manager>
<Name>Chander Prakash Gurnani</Name>
<Title>Managing Director</Title>
<Nationality></Nationality>
<WorkExperience></WorkExperience>
<Age>56</Age>
</Manager>
<Manager>
<Name>Vineet Nayyar</Name>
<Title>Whole Time Director</Title>
<Nationality></Nationality>
<WorkExperience></WorkExperience>
<Age>76</Age>
</Manager>
<Manager>
<Name>Ulhas Narayan Yargop</Name>
<Title>Nominee Director</Title>
<Nationality></Nationality>
<WorkExperience></WorkExperience>
<Age>60</Age>
</Manager>
<Manager>
<Name>Ravindra Krishna Kulkarni</Name>
<Title>Director</Title>
<Nationality></Nationality>
<WorkExperience></WorkExperience>
<Age>69</Age>
</Manager>
<Manager>
<Name>Anupam Pradip Puri</Name>
<Title>Director</Title>
<Nationality></Nationality>
<WorkExperience></WorkExperience>
<Age></Age>
</Manager>
<Manager>
<Name>Thothala Narayanasamy Manoharan</Name>
<Title>Additional Director</Title>
<Nationality></Nationality>
<WorkExperience></WorkExperience>
<Age>58</Age>
</Manager>
<Manager>
<Name>Meleveetil Damodaran</Name>
<Title>Director</Title>
<Nationality></Nationality>
<WorkExperience></WorkExperience>
<Age>67</Age>
</Manager>
<Manager>
<Name>G Jayaraman</Name>
<Title>Company Secretary</Title>
<Nationality></Nationality>
<WorkExperience></WorkExperience>
<Age></Age>
</Manager>
</Managers>
<BranchDetailInfos>
<BranchDetailInfo>
<Name>Corporate Office</Name>
<Address>Sharda Centre, Off Karve Road, Pune - 411 004, Maharashtra, India</Address>
<Contact>91  20   6601 8100</Contact>
<Holdings></Holdings>
<Remark></Remark>
</BranchDetailInfo>
<BranchDetailInfo>
<Name>Noida Office</Name>
<Address>A-7, Sector 64, NOIDA - 201 301, Uttar Pradesh, India</Address>
<Contact>91  120  4096000</Contact>
<Holdings></Holdings>
<Remark></Remark>
</BranchDetailInfo>
<BranchDetailInfo>
<Name>Other Address</Name>
<Address>Delta Building (Unit No.Iii) 5Th Floor, Gigaspace, Pune - 411 016, Maharashtra, India</Address>
<Contact></Contact>
<Holdings></Holdings>
<Remark></Remark>
</BranchDetailInfo>
<BranchDetailInfo>
<Name>Bengaluru  Office</Name>
<Address>Plot No. 45 - 47, Kiadb Industrial Area Phase - Ii, Electronic City, Bengaluru - `560100, Karnataka, India</Address>
<Contact>91  80    67807777 </Contact>
<Holdings></Holdings>
<Remark></Remark>
</BranchDetailInfo>
</BranchDetailInfos>
<ShareHolders>
<ShareHolder>
<Name>Mahindra &amp; Mahindra Limited</Name>
<Ratio>25.99</Ratio>
<SharesHold>60676252</SharesHold>
<ValueHold></ValueHold>
<ValueMoneyID></ValueMoneyID>
<ValueUSD></ValueUSD>
</ShareHolder>
<ShareHolder>
<Name>TML Benefit Trust(Through Mr.Ulhasnarayan Yargop,Trustee)</Name>
<Ratio>10.28</Ratio>
<SharesHold>24000000</SharesHold>
<ValueHold></ValueHold>
<ValueMoneyID></ValueMoneyID>
<ValueUSD></ValueUSD>
</ShareHolder>
<ShareHolder>
<Name>LIC of India Money Plus Growth Fund</Name>
<Ratio>2.30</Ratio>
<SharesHold>5370475</SharesHold>
<ValueHold></ValueHold>
<ValueMoneyID></ValueMoneyID>
<ValueUSD></ValueUSD>
</ShareHolder>
<ShareHolder>
<Name>City of Newyork Group Trust</Name>
<Ratio>1.47</Ratio>
<SharesHold>3436714</SharesHold>
<ValueHold></ValueHold>
<ValueMoneyID></ValueMoneyID>
<ValueUSD></ValueUSD>
</ShareHolder>
<ShareHolder>
<Name>Hsbc Global Investment Funds A/C SBC Gif Mauritius Limited</Name>
<Ratio>1.40</Ratio>
<SharesHold>3267181</SharesHold>
<ValueHold></ValueHold>
<ValueMoneyID></ValueMoneyID>
<ValueUSD></ValueUSD>
</ShareHolder>
<ShareHolder>
<Name>National Westminster Bank Plc as Depository of First State Global Emerging Markets Leaders Fund a Su</Name>
<Ratio>1.15</Ratio>
<SharesHold>2677163</SharesHold>
<ValueHold></ValueHold>
<ValueMoneyID></ValueMoneyID>
<ValueUSD></ValueUSD>
</ShareHolder>
<ShareHolder>
<Name>Government of Singapore</Name>
<Ratio>1.09</Ratio>
<SharesHold>2533628</SharesHold>
<ValueHold></ValueHold>
<ValueMoneyID></ValueMoneyID>
<ValueUSD></ValueUSD>
</ShareHolder>
<ShareHolder>
<Name>Skagen Kon-Tiki Verdipapirfond</Name>
<Ratio>1.08</Ratio>
<SharesHold>2529440</SharesHold>
<ValueHold></ValueHold>
<ValueMoneyID></ValueMoneyID>
<ValueUSD></ValueUSD>
</ShareHolder>
<ShareHolder>
<Name>ABU Dhabi Investment Authority - Gulab</Name>
<Ratio>1.07</Ratio>
<SharesHold>2498865</SharesHold>
<ValueHold></ValueHold>
<ValueMoneyID></ValueMoneyID>
<ValueUSD></ValueUSD>
</ShareHolder>
<ShareHolder>
<Name>Government Pension Fund Global</Name>
<Ratio>1.04</Ratio>
<SharesHold>2436731</SharesHold>
<ValueHold></ValueHold>
<ValueMoneyID></ValueMoneyID>
<ValueUSD></ValueUSD>
</ShareHolder>
</ShareHolders>
</OverView>
     */
}
