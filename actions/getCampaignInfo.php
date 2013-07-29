<?php
/**
 * **************************************************************************
 *
 * File:         getCampaignInfo.php
 *
 * Purpose:      Holds the functionality for [getCampaignInfo] Text2Pay API action.
 *               Refer to detailed documentation below, or on Text2Pay website.
 *
 * Last
 *   Changes:    Rev $Rev: 7 $
 *               on $Date: 2012-11-13 13:31:31 +1000 (Tue, 13 Nov 2012) $
 *               by $Author: bruno.braga@gmail.com $
 *
 * **************************************************************************
 *
 * Copyright 2012 Text2Pay, Inc. http://www.text2pay.com/
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may
 * not use this file except in compliance with the License. You may obtain
 * a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, softwareAPI
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 *
 * **************************************************************************
 */


/**
 * Represents the action <b>getCampaignInfo</b> executed in Text2Pay API.
 *
 * Refer to constructor for additional documentation.
 *
 * @author Braga, Bruno <bruno.braga@gmail.com>
 *
 * @since 0.4
 *
 * @package Text2Pay
 *
 * @subpackage Request
 *
 */
final class Text2PayApi_getCampaignInfo_Request extends Text2PayApi_RequestBase {

    /**
     * Retrieves all active countries setup for the specified brand.
     *
     * Official documentation is available at:
     * <a href="https://merchants.text2pay.com/integrate/api_documentation/">https://merchants.text2pay.com/integrate/api_documentation/</a>
     * (you will need proper merchant credentials to access contents here)
     *
     * Example:
     * <code>
     *     // Create a Text2Pay API connection
     *     $cn = new Text2PayApi_Connection('apiKey', 1, 'username', 'password');
     *
     *     // Get campaign information
     *     $campaignId = 1;
     *     $o = new Text2PayApi_getCampaignInfo_Request($cn, $campaignId);
     *     $resp = $o->execute();
     *
     *     // print results
     *     print_r($resp);
     *
     * </code>
     *
     * @param Text2PayApi_Connection $apiConnection the connection object
     *
     * @param string $campaignId the campaign identification
     * @param string $countryCode OPTIONAL International ISO-3166 country code
     * @param string $internal if True, brings additional information that is
     * used by Text2Pay widget.

     * @throws Text2PayException if the connection is not a valid connection
     * (thrown by the base class {@link Text2PayApi_RequestBase}, or if
     * required arguments are not valid (thrown by
     * {@link Text2PayApi_RequestBase::setArgument()} method).
     *
     * @see Text2PayApi_RequestBase
     * @see Text2PayApi_RequestBase::setArgument()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.1
     *
     */
    public function __construct($apiConnection, $campaignId, $countryCode=null,
            $internal=false) {

        parent::__construct($apiConnection);

        // Set remaining stuff for this action
        $this->setArgument('action',       'getCampaignInfo');
        $this->setArgument('campaign_id', $campaignId);
        if (!empty($countryCode))
            $this->setArgument('country_code', $countryCode);
        if ($internal)
            $this->setArgument('type', 'internal');
    }

    /**
     * Simply executes the base class {@link Text2PayApi_RequestBase::execute()}
     * and returns a corresponding object to this request's purpose.
     *
     * @return Text2PayApi_getCountries_Response object
     *
     * @see Text2PayApi_RequestBase
     * @see Text2PayApi_RequestBase::execute()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.1
     *
     */
    public function execute() {

        // Execute all from base class
        $response = parent::execute();

        // Map the result in a proper response object
        return new Text2PayApi_getCampaignInfo_Response($response);
    }
}

/**
 * Represents the response for the action <b>getCampaignInfo</b> executed
 * in Text2Pay API, with {@link Text2PayApi_getCampaignInfo_Request}.
 *
 * This is a simple object that will hold the response information from the
 * action above, accessible through its getter methods:
 *
 * <ul>
 *  <li>{@link Text2PayApi_getCampaignInfo_Response::getCountryInfos()}
 *  <li>{@link Text2PayApi_getCampaignInfo_Response::getName()}
 *  <li>{@link Text2PayApi_getCampaignInfo_Response::getId()}
 * </ul>
 *
 * @see Text2PayApi_getCampaignInfo_Request
 *
 * @author Braga, Bruno <bruno.braga@gmail.com>
 *
 * @since 0.4
 *
 * @package Text2Pay
 *
 * @subpackage Response
 *
 */
final class Text2PayApi_getCampaignInfo_Response
extends Text2PayApi_ResponseBase {


    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_getCampaignInfo_Response::getCountryCodes()}
     *
     * @var array of Text2PayApi_getCampaignInfo_CountryInfo
     *
     * @see Text2PayApi_getCampaignInfo_Response
     * @see Text2PayApi_getCampaignInfo_Response::getCountryInfos()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     */
    private $countryInfos;

    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_getCampaignInfo_Response::getName()}
     *
     * @var string
     *
     * @see Text2PayApi_getCampaignInfo_Response
     * @see Text2PayApi_getCampaignInfo_Response::getName()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     */
    private $name;

    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_getCampaignInfo_Response::getId()}
     *
     * @var string
     *
     * @see Text2PayApi_getCampaignInfo_Response
     * @see Text2PayApi_getCampaignInfo_Response::getId()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     */
    private $id;

    /**
     * Creates a new instance of this response object, but this should not be
     * directly handled by enternal code, as the wrapper uses it to return more
     * accessible values from the Text2Pay API.
     *
     * @param string $raw The raw value from the API call response.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     *
     */
    public function __construct($raw) {
        parent::__construct($raw);

        $this->id = $this->response['campaign']['@attributes']['id'];
        $this->name = $this->response['campaign']['@attributes']['name'];

        // Map all response data into this object
        $this->countryInfos = array();
        foreach($this->fixXmlPhpArray($this->response['campaign']['country']) as $co) {
            array_push($this->countryInfos, new Text2PayApi_getCampaignInfo_CountryInfo(
            $co['@attributes']['code'],
            $co['brand_name'],
            $co['credit_title'],
            $co['send_confirmation'],
            $co['product_type'],
            $co['adult_allowed'],
            $co['gambling_allowed'],
            $co['accept_bitcoin']
            ));
        }
    }

    /**
     * Returns country information for the campaign.
     *
     * @return array of Text2PayApi_getCampaignInfo_CountryInfo
     *
     * @see Text2PayApi_getCampaignInfo_Response
     * @see Text2PayApi_getCampaignInfo_CountryInfo
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     *
     */
    public function getCountryInfos() { return $this->countryInfos; }

    /**
     * The campaign identification number.
     *
     * @return int
     *
     * @see Text2PayApi_getCampaignInfo_Response
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     *
     */
    public function getId() { return $this->id; }

    /**
     * The campaign name.
     *
     * @return string
     *
     * @see Text2PayApi_getCampaignInfo_Response
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     *
     */
    public function getName() { return $this->name; }
}


/**
 * A helper class that holds Country information, usually coming with
 * {@link Text2PayApi_getCampaignInfo_Response} queries to Text2Pay API.
 * This was created to ease object-ization of this type of information.
 *
 * This is a simple object that will hold the response information from the
 * action above, accessible through its getter methods:
 *
 * <ul>
 *  <li>{@link Text2PayApi_getCampaignInfo_CountryInfo::getBrandName()}
 *  <li>{@link Text2PayApi_getCampaignInfo_CountryInfo::getCreditTitle()}
 *  <li>{@link Text2PayApi_getCampaignInfo_CountryInfo::getSendConfirmation()}
 *  <li>{@link Text2PayApi_getCampaignInfo_CountryInfo::getProductType()}
 *  <li>{@link Text2PayApi_getCampaignInfo_CountryInfo::getAdultAllowed()}
 *  <li>{@link Text2PayApi_getCampaignInfo_CountryInfo::getGamblingAllowed()}
 *  <li>{@link Text2PayApi_getCampaignInfo_CountryInfo::getAcceptBitcoin()}
 * </ul>
 *
 * @see Text2PayApi_getCampaignInfo_Response
 *
 * @author Braga, Bruno <bruno.braga@gmail.com>
 * @author Martens, Scott <smartens80@gmail.com>
 *
 * @since 0.3
 *
 * @package Text2Pay
 *
 * @subpackage Objects
 */
final class Text2PayApi_getCampaignInfo_CountryInfo {

    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_Objects_CountryInfo::getCode()}
     *
     * @var string
     *
     * @see Text2PayApi_Objects_CountryInfo
     * @see Text2PayApi_Objects_CountryInfo::getCode()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     */
    private $code;
    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_getCountryInfo_Response::getBrandName()}
     *
     * @var boolean
     *
     * @see Text2PayApi_getCountryInfo_Response
     * @see Text2PayApi_getCountryInfo_Response::getBrandName()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     */
    private $brandName;

    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_getCountryInfo_Response::getCreditTitle()}
     *
     * @var Text2PayApi_Objects_CurrencyInfo
     *
     * @see Text2PayApi_getCountryInfo_Response
     * @see Text2PayApi_getCountryInfo_Response::getCreditTitle()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     */
    private $creditTitle;

    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_getCountryInfo_Response::getSendConfirmation()}
     *
     * @var Text2PayApi_Objects_CurrencyInfo
     *
     * @see Text2PayApi_getCountryInfo_Response
     * @see Text2PayApi_getCountryInfo_Response::getSendConfirmation()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     */
    private $sendConfirmation;

    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_getCountryInfo_Response::getProductType()}
     *
     * @var Text2PayApi_Objects_CurrencyInfo
     *
     * @see Text2PayApi_getCountryInfo_Response
     * @see Text2PayApi_getCountryInfo_Response::getProductType()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     */
    private $productType;

    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_getCountryInfo_Response::getAdultAllowed()}
     *
     * @var Text2PayApi_Objects_CurrencyInfo
     *
     * @see Text2PayApi_getCountryInfo_Response
     * @see Text2PayApi_getCountryInfo_Response::getAdultAllowed()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     */
    private $adultAllowed;

    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_getCountryInfo_Response::getGamblingAllowed()}
     *
     * @var Text2PayApi_Objects_CurrencyInfo
     *
     * @see Text2PayApi_getCountryInfo_Response
     * @see Text2PayApi_getCountryInfo_Response::getGamblingAllowed()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     */
    private $gamblingAllowed;

    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_getCountryInfo_Response::getAcceptBitcoin()}
     *
     * @var Text2PayApi_Objects_CurrencyInfo
     *
     * @see Text2PayApi_getCountryInfo_Response
     * @see Text2PayApi_getCountryInfo_Response::getAcceptBitcoin()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     */
    private $acceptBitcoin;



    /**
     * Creates a new instance of this object, but this should not be
     * directly handled by enternal code, as the wrapper uses it to return more
     * accessible values from the Text2Pay API.
     *
     * @param string $code the country code.
     *
     * @param string $brandName Defines the brand name used in the campaign
     *
     * @param string $creditTitle Defines the credit title used in the campaign
     *
     * @param string $sendConfirmation Defines if confirmation messages (SMS)
     * will be sent by Text2Pay system.
     *
     * @param string $productType Defines the product type.
     * See values in {@link Text2PayApi_Constants_ProductType}
     *
     * @param string $adultAllowed Defines if Adult content is allowed
     *
     * @param string $gamblingAllowed Defines if gambling usage is allowed
     *
     * @param string $acceptBitcoin Defines if BitCoin is accepted in this country and campaign
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     */
    public function __construct($code, $brandName, $creditTitle, $sendConfirmation,
            $productType, $adultAllowed, $gamblingAllowed, $acceptBitcoin) {
        $this->code = $code;
        $this->brandName = $brandName;
        $this->creditTitle = $creditTitle;
        $this->sendConfirmation = $sendConfirmation;
        $this->productType = $productType;
        $this->adultAllowed = $adultAllowed;
        $this->gamblingAllowed = $gamblingAllowed;
        $this->acceptBitcoin = $acceptBitcoin;
    }

    /**
     * Returns the <a href="http://en.wikipedia.org/wiki/ISO_3166-1_alpha-2">ISO-3166</a>
     * value of the country code.
     *
     * @return string the country code value
     *
     * @see Text2PayApi_Objects_CountryInfo
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     *
     */
    public function getCode() { return $this->code; }
    /**
     * Access to the brand name information.
     *
     * @return string
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     */
    public function getBrandName() { return $this->brandName; }
    /**
     * Access to the credit title information of the campaign.
     *
     * @return string
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     */
    public function getCreditTitle() { return $this->creditTitle; }
    /**
     * Access to the send confirmation information.
     *
     * @return boolean True if the campaign is set to send confirmation messages (SMS)
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     */
    public function getSendConfirmation() { return $this->sendConfirmation; }
    /**
     * Access to the product type information. See values in
     * {@link Text2PayApi_Constants_ProductType} class.
     *
     * @return string
     *
     * @see Text2PayApi_Constants_ProductType
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     */
    public function getProductType() { return $this->productType; }
    /**
     * Access to the adult allowed information.
     *
     * @return boolean True if Adult content is allowed for this country and campaign.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     */
    public function getAdultAllowed() { return $this->adultAllowed; }
    /**
     * Access to the gambling allowed information.
     *
     * @return boolean True if gambling is allowed for this country and campaign.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     */
    public function getGamblingAllowed() { return $this->gamblingAllowed; }
    /**
     * Access to the bitcoin allowed information.
     *
     * @return boolean True if the cmapaign and country accepts BitCoin payments.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     */
    public function getAcceptBitcoin() { return $this->acceptBitcoin; }

}


?>