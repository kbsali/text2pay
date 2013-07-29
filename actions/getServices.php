<?php
/**
 * **************************************************************************
 *
 * File:         getServices.php
 *
 * Purpose:      Holds the functionality for [getServices] Text2Pay API action.
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
 * Represents the action <b>getServices</b> executed in Text2Pay API.
 *
 * Refer to constructor for additional documentation.
 *
 * @author Braga, Bruno <bruno.braga@gmail.com>
 *
 * @since 0.1
 *
 * @package Text2Pay
 *
 * @subpackage Request
 *
 */
final class Text2PayApi_getServices_Request
extends Text2PayApi_RequestBase {

    /**
     * Retrieves all the current services setup for the specified
     * brandId and countryCode.
     *
     * Official documentation is available at:
     * <a href="https://merchants.text2pay.com/integrate/api_documentation/">https://merchants.text2pay.com/integrate/api_documentation/</a>
     * (you will need proper merchant credentials to access contents here)
     *
     * @param Text2PayApi_Connection $apiConnection the connection object
     *
     * @param int $campaignId the campaign identification number
     *
     * @param string $countryCode International ISO-3166 country code
     *
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
    public function __construct($apiConnection,
    $campaignId,
    $countryCode) {

        parent::__construct($apiConnection);

        // Set remaining stuff for this action
        $this->setArgument('action',   		 'getServices');
        $this->setArgument('campaign_id',    $campaignId  );
        $this->setArgument('country_code',   $countryCode );
    }

    /**
     * Simply executes the base class {@link Text2PayApi_RequestBase::execute()}
     * and returns a corresponding object to this request's purpose.
     *
     * @return Text2PayApi_getServices_Response object
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
        return new Text2PayApi_getServices_Response($response);
    }
}


/**
 * Represents the response for the action <b>getServices</b> executed
 * in Text2Pay API, with {@link Text2PayApi_getServices_Request}.
 *
 * This is a simple object that will hold the response information from the
 * action above, accessible through its getter methods:
 *
 * <ul>
 *  <li>{@link Text2PayApi_getServices_Response::getServices()}
 * </ul>
 *
 * @see Text2PayApi_getCountries_Request
 *
 * @author Braga, Bruno <bruno.braga@gmail.com>
 *
 * @since 0.1
 *
 * @package Text2Pay
 *
 * @subpackage Response
 *
 */
final class Text2PayApi_getServices_Response
extends Text2PayApi_ResponseBase {

    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_getServices_Response::getCountryInfo()}
     *
     * @see Text2PayApi_getServices_Response
     * @see Text2PayApi_getServices_Response::getCountryInfo()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.1
     *
     * @var Text2PayApi_getServices_CountryInfo
     */
    private $countryInfo;

    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_getServices_Response::getServiceInfos()}
     *
     * @var array
     *
     * @see Text2PayApi_getServices_Response
     * @see Text2PayApi_getServices_Response::getServiceInfos()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.1
     *
     */
    private $serviceInfos;

    /**
     * Creates a new instance of this response object, but this should not be
     * directly handled by enternal code, as the wrapper uses it to return more
     * accessible values from the Text2Pay API.
     *
     * @param string $raw The raw value from the API call response.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.1
     *
     */
    public function __construct($raw) {
        parent::__construct($raw);

        $this->countryInfo = new Text2PayApi_getServices_CountryInfo(
                $this->response['country']['@attributes']['code'],
                $this->response['country']['@attributes']['symbol'],
                $this->response['country']['@attributes']['currency']);

        $this->serviceInfos = array();
        foreach($this->fixXmlPhpArray($this->response['country']['shortcode']) as $sc) {
            $shortCode = $sc['@attributes']['code'];
            foreach($this->fixXmlPhpArray($sc['carrier']) as $ca) {
                $carrierCode = $ca['@attributes']['code'];
                $type = $ca['type']['@attributes']['name'];
                foreach($this->fixXmlPhpArray($ca['type']['service']) as $sv) {
                    $serviceId = $sv['@attributes']['id'];
                    $pricePoint = $sv['pricepoint']['@attributes']['amount'];
                    $aggregatorRef = $sv['aggregator']['@attributes']['reference'];

                    $chargePerMo = $sv['charges']['@attributes']['per_mo'];
                    $chargePerMt = $sv['charges']['@attributes']['per_mt'];
                    $chargePerBulkMt = $sv['charges']['@attributes']['per_bulk_mt'];
                    $chargePerFailedTransaction = $sv['charges']['@attributes']['per_failed_trans'];
                    $chargePerNetworkLookup = $sv['charges']['@attributes']['network_lookup'];

                    $charges = new Text2PayApi_getServices_Charges($chargePerMo, $chargePerMt,
                    		$chargePerBulkMt, $chargePerFailedTransaction, $chargePerNetworkLookup);

                    // got all elements, so push in the object into the array
                    array_push($this->serviceInfos, new Text2PayApi_getServices_ServiceInfo(
                        $aggregatorRef, $pricePoint, $serviceId, $type, $carrierCode, $shortCode, $charges));
                }
            }
        }
    }

    /**
     * Returns the value of services, retrieved by the API response as
     * all XML nodes and their child nodes.
     *
     * @return array value of services, in an array format, left unchanged.
     *
     * @see Text2PayApi_getServices_Response
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.1
     *
     */
    public function getServiceInfos() {
        return $this->serviceInfos;
    }

    /**
     * Returns the value of services, retrieved by the API response as
     * all XML nodes and their child nodes.
     *
     * @return Text2PayApi_getServices_CountryInfo country information
     *
     * @see Text2PayApi_getServices_Response
     * @see Text2PayApi_getServices_CountryInfo
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.1
     */
    public function getCountryInfo() {
        return $this->countryInfo;
    }

}

/**
 * A helper class that holds Service information, usually coming with
 * {@link Text2PayApi_getServices_Response} queries to Text2Pay API.
 * This was created to ease object-ization of this type of information.
 *
 * This is a simple object that will hold the response information from the
 * action above, accessible through its getter methods:
 *
 * <ul>
 *  <li>{@link Text2PayApi_getServices_ServiceInfo::getPricePoint()}
 *  <li>{@link Text2PayApi_getServices_ServiceInfo::getServiceId()}
 *  <li>{@link Text2PayApi_getServices_ServiceInfo::getType()}
 *  <li>{@link Text2PayApi_getServices_ServiceInfo::getCarrierCode()}
 *  <li>{@link Text2PayApi_getServices_ServiceInfo::getShortCode()}
 * </ul>
 *
 * @see Text2PayApi_getServices_Response
 *
 * @author Braga, Bruno <bruno.braga@gmail.com>
 *
 * @since 0.3
 *
 * @package Text2Pay
 *
 * @subpackage Objects
 *
 */
class Text2PayApi_getServices_ServiceInfo {

    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_getServices_ServiceInfo::getAggregatorRef()}
     *
     * @see Text2PayApi_getServices_ServiceInfo
     * @see Text2PayApi_getServices_ServiceInfo::getAggregatorRef()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.3
     *
     * @var string
     *
     */
    private $aggregatorRef;
    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_getServices_ServiceInfo::getPricePoint()}
     *
     * @see Text2PayApi_getServices_ServiceInfo
     * @see Text2PayApi_getServices_ServiceInfo::getPricePoint()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.3
     *
     * @var float
     */
    private $pricePoint;
    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_getServices_ServiceInfo::getServiceId()}
     *
     * @see Text2PayApi_getServices_ServiceInfo
     * @see Text2PayApi_getServices_ServiceInfo::getServiceId()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.3
     *
     * @var int
     */
    private $serviceId;
    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_getServices_ServiceInfo::getType()}
     *
     * @see Text2PayApi_getServices_ServiceInfo
     * @see Text2PayApi_getServices_ServiceInfo::getType()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.3
     *
     * @var string
     */
    private $type;
    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_getServices_ServiceInfo::getCarrierCode()}
     *
     * @see Text2PayApi_getServices_ServiceInfo
     * @see Text2PayApi_getServices_ServiceInfo::getCarrierCode()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.3
     *
     * @var string
     */
    private $carrierCode;
    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_getServices_ServiceInfo::getShortCode()}
     *
     * @see Text2PayApi_getServices_ServiceInfo
     * @see Text2PayApi_getServices_ServiceInfo::getShortCode()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.3
     *
     * @var string
     */
    private $shortCode;

    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_getServices_ServiceInfo::getChargesPerMo()}
     *
     * @see Text2PayApi_getServices_ServiceInfo
     * @see Text2PayApi_getServices_ServiceInfo::getChargesPerMo()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     *
     * @var Text2PayApi_getServices_Charges
     *
     */
    private $charges;

    /**
     * Creates a new instance of this class, but this should not be
     * directly handled by enternal code, as the wrapper uses it to return more
     * accessible values from the Text2Pay API.
     *
     * @param string $aggregatorRef value of aggregator reference
     * @param float $pricePoint valud of price point
     * @param string $serviceId value of service identification
     * @param string $type type of the service
     * @param string $carrierCode value of the carrier code
     * @param string $shortCode value of the short code
     * @param Text2PayApi_getServices_Charges $charges the charges applied for this service
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.3
     *
     */
    public function __construct($aggregatorRef, $pricePoint, $serviceId,
            $type, $carrierCode, $shortCode, $charges) {
        $this->aggregatorRef = $aggregatorRef;
        $this->pricePoint = $pricePoint;
        $this->serviceId = $serviceId;
        $this->type = $type;
        $this->carrierCode = $carrierCode;
        $this->shortCode = $shortCode;
        $this->charges = $charges;
    }
    /**
     * Access the value of <i>aggregator_ref</i> XML node, from the API response.
     *
     * @return String value indicating the aggregator reference.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     */
    public function getAggregatorRef() { return $this->aggregatorRef; }
    /**
     * Access the value of <i>price_point</i> XML node, from the API response.
     *
     * @return float value indicating the price point.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     */
    public function getPricePoint() { return $this->pricePoint; }
    /**
     * Access the value of <i>service_id</i> XML node, from the API response.
     *
     * @return int value indicating the service identification.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     */
    public function getServiceId() { return $this->serviceId; }
    /**
     * Access the value of <i>type</i> XML node, from the API response.
     *
     * @return String value indicating the type of the service.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     */
    public function getType() { return $this->type; }
    /**
     * Access the value of <i>carrier_code</i> XML node, from the API response.
     *
     * @return String value indicating the carrier code.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     */
    public function getCarrierCode() { return $this->carrierCode; }
    /**
     * Access the value of <i>shortcode</i> XML node, from the API response.
     *
     * @return String value indicating the short code.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     */
    public function getShortCode() { return $this->shortCode; }
    /**
     * Access the value of <i>charges</i> XML node, from the API response.
     *
     * @return String value indicating the charges applied to this service.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     */
    public function getCharges() { return $this->charges; }
}

/**
 * A helper class that holds Country information, usually coming with
 * {@link Text2PayApi_getServices_Response} queries to Text2Pay API.
 * This was created to ease object-ization of this type of information.
 *
 * This is a simple object that will hold the response information from the
 * action above, accessible through its getter methods:
 *
 * <ul>
 *  <li>{@link Text2PayApi_getServices_CountryInfo::getCountryCode()}
 *  <li>{@link Text2PayApi_getServices_CountryInfo::getCurrencySymbol()}
 *  <li>{@link Text2PayApi_getServices_CountryInfo::getCurrencyCode()}
 * </ul>
 *
 * @see Text2PayApi_getServices_Response
 *
 * @author Braga, Bruno <bruno.braga@gmail.com>
 *
 * @since 0.3
 *
 * @package Text2Pay
 *
 * @subpackage Objects
 *
 */
class Text2PayApi_getServices_CountryInfo {

    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_getServices_ServiceInfo::getCountryCode()}
     *
     * @see Text2PayApi_getServices_ServiceInfo
     * @see Text2PayApi_getServices_ServiceInfo::getCountryCode()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.3
     *
     * @var string
     */
    private $countryCode;
    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_getServices_ServiceInfo::getCurrencySymbol()}
     *
     * @see Text2PayApi_getServices_ServiceInfo
     * @see Text2PayApi_getServices_ServiceInfo::getCurrencySymbol()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.3
     *
     * @var string
     */
    private $currencySymbol;
    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_getServices_ServiceInfo::getCurrencyCode()}
     *
     * @see Text2PayApi_getServices_ServiceInfo
     * @see Text2PayApi_getServices_ServiceInfo::getCurrencyCode()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.3
     *
     * @var string
     */
    private $currencyCode;

    /**
     * Creates a new instance of this class, but this should not be
     * directly handled by enternal code, as the wrapper uses it to return more
     * accessible values from the Text2Pay API.
     *
     * @param string $countryCode value of country code
     * @param string $currencySymbol valud of currency symbol
     * @param string $currencyCode value of currency code
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.3
     *
     */
    public function __construct($countryCode, $currencySymbol, $currencyCode) {
        $this->countryCode = $countryCode;
        $this->currencySymbol = $currencySymbol;
        $this->currencyCode = $currencyCode;
    }
    /**
     * Access the value of <i>country_code</i> XML node, from the API response.
     *
     * @return String value indicating the country code.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     */
    public function getCountryCode() { return $this->countryCode; }
    /**
     * Access the value of <i>currency_symbol</i> XML node, from the API response.
     *
     * @return String value indicating the currency symbol.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     */
    public function getCurrencySymbol() { return $this->currencySymbol; }
    /**
     * Access the value of <i>currency_code</i> XML node, from the API response.
     *
     * @return String value indicating the currency code.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     */
    public function getCurrencyCode() { return $this->currencyCode; }
}

/**
 * A helper class that holds Service information, usually coming with
 * {@link Text2PayApi_getServices_ServiceInfo} queries to Text2Pay API.
 * This was created to ease object-ization of this type of information.
 *
 * This is a simple object that will hold the response information from the
 * action above, accessible through its getter methods:
 *
 * <ul>
 *  <li>{@link Text2PayApi_getServices_Charges::getChargePerMo()}
 *  <li>{@link Text2PayApi_getServices_Charges::getChargePerMt()}
 *  <li>{@link Text2PayApi_getServices_Charges::getChargePerBulkMt()}
 *  <li>{@link Text2PayApi_getServices_Charges::getChargePerFailedTransaction()}
 *  <li>{@link Text2PayApi_getServices_Charges::getChargePerNetworkLookup()}
 * </ul>
 *
 * @see Text2PayApi_getServices_Response
 * @see Text2PayApi_getServices_ServiceInfo
 *
 * @author Braga, Bruno <bruno.braga@gmail.com>
 *
 * @since 0.4
 *
 * @package Text2Pay
 *
 * @subpackage Objects
 *
 */
class Text2PayApi_getServices_Charges {
	/**
	 * See main documentation in its getter method, defined as
	 * {@link Text2PayApi_getServices_Charges::getChargePerMo()}
	 *
	 * @see Text2PayApi_getServices_Charges
	 * @see Text2PayApi_getServices_Charges::getChargePerMo()
	 *
	 * @author Braga, Bruno <bruno.braga@gmail.com>
	 *
	 * @since 0.4
	 *
	 * @var double
	 */
	private $chargePerMo;
	/**
	 * See main documentation in its getter method, defined as
	 * {@link Text2PayApi_getServices_Charges::getChargePerMt()}
	 *
	 * @see Text2PayApi_getServices_Charges
	 * @see Text2PayApi_getServices_Charges::getChargePerMt()
	 *
	 * @author Braga, Bruno <bruno.braga@gmail.com>
	 *
	 * @since 0.4
	 *
	 * @var double
	 */
	private $chargePerMt;
	/**
	 * See main documentation in its getter method, defined as
	 * {@link Text2PayApi_getServices_Charges::getChargePerBulkMt()}
	 *
	 * @see Text2PayApi_getServices_Charges
	 * @see Text2PayApi_getServices_Charges::getChargePerBulkMt()
	 *
	 * @author Braga, Bruno <bruno.braga@gmail.com>
	 *
	 * @since 0.4
	 *
	 * @var double
	 */
	private $chargePerBulkMt;
	/**
	 * See main documentation in its getter method, defined as
	 * {@link Text2PayApi_getServices_Charges::getChargePerFailedTransaction()}
	 *
	 * @see Text2PayApi_getServices_Charges
	 * @see Text2PayApi_getServices_Charges::getChargePerFailedTransaction()
	 *
	 * @author Braga, Bruno <bruno.braga@gmail.com>
	 *
	 * @since 0.4
	 *
	 * @var double
	 */
	private $chargePerFailedTransaction;
	/**
	 * See main documentation in its getter method, defined as
	 * {@link Text2PayApi_getServices_Charges::getChargePerNetworkLookup()}
	 *
	 * @see Text2PayApi_getServices_Charges
	 * @see Text2PayApi_getServices_Charges::getChargePerNetworkLookup()
	 *
	 * @author Braga, Bruno <bruno.braga@gmail.com>
	 *
	 * @since 0.4
	 *
	 * @var double
	 */
	private $chargePerNetworkLookup;

	/**
	 * Creates a new instance of this class, but this should not be
	 * directly handled by enternal code, as the wrapper uses it to return more
	 * accessible values from the Text2Pay API.
	 *
	 * @param double $chargePerMo charges per MO message
	 * @param double $chargePerMt charges per MT message
	 * @param double $chargePerBulkMt charges per bulk MT messages
	 * @param double $chargePerFailedTransaction charges per failed transaction
	 * @param double $chargePerNetworkLookup charges per network lookup
	 *
	 * @author Braga, Bruno <bruno.braga@gmail.com>
	 *
	 * @since 0.3
	 *
	 */
	public function __construct($chargePerMo, $chargePerMt, $chargePerBulkMt,
			$chargePerFailedTransaction, $chargePerNetworkLookup) {
		$this->chargePerMo = $chargePerMo;
		$this->chargePerMt = $chargePerMt;
		$this->chargePerBulkMt = $chargePerBulkMt;
		$this->chargePerFailedTransaction = $chargePerFailedTransaction;
		$this->chargePerNetworkLookup = $chargePerNetworkLookup;
	}

	/**
	 * Access the value of <i>per_mo</i> XML node, from the API response.
	 *
	 * @return double value indicating the charge per MO message.
	 *
	 * @author Braga, Bruno <bruno.braga@gmail.com>
	 *
	 * @since 0.4
	 */
	public function getChargePerMo() { return $this->chargePerMo; }
	/**
	 * Access the value of <i>per_mt</i> XML node, from the API response.
	 *
	 * @return double value indicating the charge per MT message.
	 *
	 * @author Braga, Bruno <bruno.braga@gmail.com>
	 *
	 * @since 0.4
	 */
	public function getChargePerMt() { return $this->chargePerMt; }
	/**
	 * Access the value of <i>per_bulk_mt</i> XML node, from the API response.
	 *
	 * @return double value indicating the charge per Bulk of MT messages.
	 *
	 * @author Braga, Bruno <bruno.braga@gmail.com>
	 *
	 * @since 0.4
	 */
	public function getChargePerBulkMt() { return $this->chargePerBulkMt; }
	/**
	 * Access the value of <i>per_failed_trans</i> XML node, from the API response.
	 *
	 * @return double value indicating the charge per failed transaction.
	 *
	 * @author Braga, Bruno <bruno.braga@gmail.com>
	 *
	 * @since 0.4
	 */
	public function getChargePerFailedTransaction() { return $this->chargePerFailedTransaction; }
	/**
	 * Access the value of <i>network_lookup</i> XML node, from the API response.
	 *
	 * @return double value indicating the charge per network lookup.
	 *
	 * @author Braga, Bruno <bruno.braga@gmail.com>
	 *
	 * @since 0.4
	 */
	public function getChargePerNetworkLookup() { return $this->chargePerNetworkLookup; }

}
?>