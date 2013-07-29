<?php
/**
 * **************************************************************************
 *
 * File:         getServiceDetails.php
 *
 * Purpose:      Holds the functionality for [getServiceDetails] Text2Pay API action.
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
 * Represents the action <b>getServiceDetails</b> executed in Text2Pay API.
 *
 * Refer to constructor for additional documentation.
 *
 * @author Braga, Bruno <bruno.braga@gmail.com>
 *
 * @since 0.3
 *
 * @package Text2Pay
 *
 * @subpackage Request
 */
final class Text2PayApi_getServiceDetails_Request
extends Text2PayApi_RequestBase {

    /**
     * Retrieves all the available service details setup for the specified
     * brandId and countryCode.
     *
     * Official documentation is available at:
     * <a href="https://merchants.text2pay.com/integrate/api_documentation/">
     * https://merchants.text2pay.com/integrate/api_documentation/</a>
     * (you will need proper merchant credentials to access contents here)
     *
     * @param Text2PayApi_Connection $apiConnection the connection object
     *
     * @param int $campaignId represents the identification number for the campaign,
     * created in the <a href="http://www.text2pay.com">Text2Pay</a> merchant system.
     * <br/>
     * Merchant brands are available at:
     * <a href="https://merchants.text2pay.com/setup/campaigns/">
     * https://merchants.text2pay.com/setup/campaigns/</a>
     * <br/>
     * (you will need proper merchant credentials to access contents here)
     *
     * @param string carrierCode represents the mobile carrier code associated with the
     * <i>campaignId</i> and <i>countryCode</i>. You will need to rely on other API
     * calls to know this value, either {@link Text2PayApi_getServiceDetails_Request}.
     *
     * @param float pricePoint the price point amount for the <i>carrierCode</i>, which
     * defines the value in real currency that will be charged to the
     * end-user in his/her mobile bill.
     * Refer to available price points in a campaign at:
     * <a href="http://merchants.text2pay.com/integrate/campaign_info/">
     * http://merchants.text2pay.com/integrate/campaign_info/</a>
     * <br/>
     * (you will need proper merchant credentials to access contents here)
     *
     * @param float creditAmount Amount of virtual currency or commodity type
     * to be awarded to the user. This is defined in the campaign setup.
     * Refer to the available values in your campaign setup, at:
     * <a href="https://merchants.text2pay.com/setup/campaigns/">
     * https://merchants.text2pay.com/setup/campaigns/</a>
     * <br/>
     * (you will need proper merchant credentials to access contents here)
     *
     * @param boolean isSubscription defines if the payment in the campaign must be done
     * periodically (which is defined in Text2Pay merchant interface) or it is a
     * one time only (once-off) payment transaction. This is defined during the
     * campaign setup.
     * 
     * @param float $creditAmount Amount of virtual currency or commodity type
     * to be awarded to the user
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
     * @since 0.3
     *
     */
    public function __construct($apiConnection,
        $campaignId,
        $carrierCode,
        $pricePoint,
        $isSubscription,
        $creditAmount=null) {

        parent::__construct($apiConnection);

        // Set remaining stuff for this action
        $this->setArgument('action', 'getServiceDetails');
        $this->setArgument('campaign_id', $campaignId);
        $this->setArgument('carrier_code', $carrierCode);
        $this->setArgument('price_point', number_format((float)$pricePoint, 2, '.', ''));
        $this->setArgument('is_subscription', $isSubscription ? '1' : '0');

        // Set optional arguments if applicable
        if (!empty($creditAmount)) $this->setArgument('credit_amount', number_format((float)$creditAmount, 2, '.', ''));
    }

    /**
     * Simply executes the base class {@link Text2PayApi_RequestBase::execute()}
     * and returns a corresponding object to this request's purpose.
     *
     * @return Text2PayApi_getServiceDetails_Response object
     *
     * @see Text2PayApi_RequestBase
     * @see Text2PayApi_RequestBase::execute()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.3
     *
     */
    public function execute() {

        // Execute all from base class
        $response = parent::execute();

        // Map the result in a proper response object
        return new Text2PayApi_getServiceDetails_Response($response);
    }
}


/**
 * Represents the response for the action <b>getServiceDetails</b> executed
 * in Text2Pay API, with {@link Text2PayApi_getServiceDetails_Request}.
 *
 * This is a simple object that will hold the response information from the
 * action above, accessible through its getter methods:
 *
 * <ul>
 *  <li>{@link Text2PayApi_getServiceDetails_Response::getServiceId()}
 *  <li>{@link Text2PayApi_getServiceDetails_Response::getInitialOptin()}
 *  <li>{@link Text2PayApi_getServiceDetails_Response::getSecondaryOptin()}
 *  <li>{@link Text2PayApi_getServiceDetails_Response::getFrequencyPeriod()}
 *  <li>{@link Text2PayApi_getServiceDetails_Response::getShortCode()}
 *  <li>{@link Text2PayApi_getServiceDetails_Response::getChargeType()}
 *  <li>{@link Text2PayApi_getServiceDetails_Response::getTerms()}
 *  <li>{@link Text2PayApi_getServiceDetails_Response::getCountryCode()}
 *  <li>{@link Text2PayApi_getServiceDetails_Response::getCurrencyPrefix()}
 *  <li>{@link Text2PayApi_getServiceDetails_Response::getCurrencySymbol()}
 *  <li>{@link Text2PayApi_getServiceDetails_Response::getLanguageCode()}
 *  <li>{@link Text2PayApi_getServiceDetails_Response::getSupportNumber()}
 *  <li>{@link Text2PayApi_getServiceDetails_Response::getCreditAmount()}
 *  <li>{@link Text2PayApi_getServiceDetails_Response::getCreditTitle()}
 *  <li>{@link Text2PayApi_getServiceDetails_Response::getTotalMessages()}
 * </ul>
 *
 * @see Text2PayApi_getServiceDetails_Request
 *
 * @author Braga, Bruno <bruno.braga@gmail.com>
 *
 * @since 0.3
 *
 * @package Text2Pay
 *
 * @subpackage Response
 *
 */
final class Text2PayApi_getServiceDetails_Response
extends Text2PayApi_ResponseBase {

	/**
	 * See main documentation in its getter method, defined as
	 * {@link Text2PayApi_getServiceDetails_Response::getServiceId()}
	 *
	 * @see Text2PayApi_getServiceDetails_Response
	 * @see Text2PayApi_getServiceDetails_Response::getServiceId()
	 *
	 * @author Braga, Bruno <bruno.braga@gmail.com>
	 *
	 * @since 0.3
	 *
     * @var int
     */
    private $serviceId = -1;
	/**
	 * See main documentation in its getter method, defined as
	 * {@link Text2PayApi_getServiceDetails_Response::getInitialOptin()}
	 *
	 * @see Text2PayApi_getServiceDetails_Response
	 * @see Text2PayApi_getServiceDetails_Response::getInitialOptin()
	 *
	 * @author Braga, Bruno <bruno.braga@gmail.com>
	 *
	 * @since 0.3
	 *
     * @var Text2PayApi_getServiceDetails_OptinInfo
     */
    private $initialOptin;
	/**
	 * See main documentation in its getter method, defined as
	 * {@link Text2PayApi_getServiceDetails_Response::getSecondaryOptin()}
	 *
	 * @see Text2PayApi_getServiceDetails_Response
	 * @see Text2PayApi_getServiceDetails_Response::getSecondaryOptin()
	 *
	 * @author Braga, Bruno <bruno.braga@gmail.com>
	 *
	 * @since 0.3
	 *
     * @var Text2PayApi_getServiceDetails_OptinInfo
     */
    private $secondaryOptin;
	/**
	 * See main documentation in its getter method, defined as
	 * {@link Text2PayApi_getServiceDetails_Response::getSuppresion()}
	 *
	 * @see Text2PayApi_getServiceDetails_Response
	 * @see Text2PayApi_getServiceDetails_Response::getSuppresion()
	 *
	 * @author Braga, Bruno <bruno.braga@gmail.com>
	 *
	 * @since 0.3
	 *
     * @var Text2PayApi_getServiceDetails_Suppression
     */
    private $suppression;
	/**
	 * See main documentation in its getter method, defined as
	 * {@link Text2PayApi_getServiceDetails_Response::getFrequencyPeriod()}
	 *
	 * @see Text2PayApi_getServiceDetails_Response
	 * @see Text2PayApi_getServiceDetails_Response::getFrequencyPeriod()
	 *
	 * @author Braga, Bruno <bruno.braga@gmail.com>
	 *
	 * @since 0.3
	 *
     * @var string
     */
    private $frequencyPeriod = "";
   	/**
	 * See main documentation in its getter method, defined as
	 * {@link Text2PayApi_getServiceDetails_Response::getShortCode()}
	 *
	 * @see Text2PayApi_getServiceDetails_Response
	 * @see Text2PayApi_getServiceDetails_Response::getShortCode()
	 *
	 * @author Braga, Bruno <bruno.braga@gmail.com>
	 *
	 * @since 0.3
	 *
     * @var int
     */
    private $shortCode = "";
   	/**
	 * See main documentation in its getter method, defined as
	 * {@link Text2PayApi_getServiceDetails_Response::getChargeType()}
	 *
	 * @see Text2PayApi_getServiceDetails_Response
	 * @see Text2PayApi_getServiceDetails_Response::getChargeType()
	 *
	 * @author Braga, Bruno <bruno.braga@gmail.com>
	 *
	 * @since 0.3
	 *
     * @var int
     */
    private $chargeType = "";
   	/**
	 * See main documentation in its getter method, defined as
	 * {@link Text2PayApi_getServiceDetails_Response::getTerms()}
	 *
	 * @see Text2PayApi_getServiceDetails_Response
	 * @see Text2PayApi_getServiceDetails_Response::getTerms()
	 *
	 * @author Braga, Bruno <bruno.braga@gmail.com>
	 *
	 * @since 0.3
	 *
     * @var string
     */
    private $terms = "";
   	/**
	 * See main documentation in its getter method, defined as
	 * {@link Text2PayApi_getServiceDetails_Response::getCountryCode()}
	 *
	 * @see Text2PayApi_getServiceDetails_Response
	 * @see Text2PayApi_getServiceDetails_Response::getCountryCode()
	 *
	 * @author Braga, Bruno <bruno.braga@gmail.com>
	 *
	 * @since 0.3
	 *
     * @var string
     */
    private $countryCode = "";
   	/**
	 * See main documentation in its getter method, defined as
	 * {@link Text2PayApi_getServiceDetails_Response::getCcurrencyPrefix()}
	 *
	 * @see Text2PayApi_getServiceDetails_Response
	 * @see Text2PayApi_getServiceDetails_Response::getCcurrencyPrefix()
	 *
	 * @author Braga, Bruno <bruno.braga@gmail.com>
	 *
	 * @since 0.3
	 *
     * @var string
     */
    private $currencyPrefix = "";
   	/**
	 * See main documentation in its getter method, defined as
	 * {@link Text2PayApi_getServiceDetails_Response::getCcurrencySymbol()}
	 *
	 * @see Text2PayApi_getServiceDetails_Response
	 * @see Text2PayApi_getServiceDetails_Response::getCcurrencySymbol()
	 *
	 * @author Braga, Bruno <bruno.braga@gmail.com>
	 *
	 * @since 0.3
	 *
     * @var string
     */
    private $currencySymbol = "";
   	/**
	 * See main documentation in its getter method, defined as
	 * {@link Text2PayApi_getServiceDetails_Response::getLanguageCode()}
	 *
	 * @see Text2PayApi_getServiceDetails_Response
	 * @see Text2PayApi_getServiceDetails_Response::getLanguageCode()
	 *
	 * @author Braga, Bruno <bruno.braga@gmail.com>
	 *
	 * @since 0.3
	 *
     * @var string
     */
    private $languageCode = "";
   	/**
	 * See main documentation in its getter method, defined as
	 * {@link Text2PayApi_getServiceDetails_Response::getLanguageCode()}
	 *
	 * @see Text2PayApi_getServiceDetails_Response
	 * @see Text2PayApi_getServiceDetails_Response::getSsupportNumber()
	 *
	 * @author Braga, Bruno <bruno.braga@gmail.com>
	 *
	 * @since 0.3
	 *
     * @var string
     */
    private $supportNumber = "";
   	/**
	 * See main documentation in its getter method, defined as
	 * {@link Text2PayApi_getServiceDetails_Response::getTotalMessages()}
	 *
	 * @see Text2PayApi_getServiceDetails_Response
	 * @see Text2PayApi_getServiceDetails_Response::getTotalMessages()
	 *
	 * @author Braga, Bruno <bruno.braga@gmail.com>
	 *
	 * @since 0.3
	 *
     * @var int
     */
    private $totalMessages = 0;
   	/**
	 * See main documentation in its getter method, defined as
	 * {@link Text2PayApi_getServiceDetails_Response::getCreditAmount()}
	 *
	 * @see Text2PayApi_getServiceDetails_Response
	 * @see Text2PayApi_getServiceDetails_Response::getCreditAmount()
	 *
	 * @author Braga, Bruno <bruno.braga@gmail.com>
	 *
	 * @since 0.3
	 *
     * @var float
     */
    private $creditAmount = 0.0;
   	/**
	 * See main documentation in its getter method, defined as
	 * {@link Text2PayApi_getServiceDetails_Response::getCreditTitle()}
	 *
	 * @see Text2PayApi_getServiceDetails_Response
	 * @see Text2PayApi_getServiceDetails_Response::getCreditTitle()
	 *
	 * @author Braga, Bruno <bruno.braga@gmail.com>
	 *
	 * @since 0.3
	 *
     * @var string
     */
    private $creditTitle = "";

    /**
     * Creates a new instance of this response object, but this should not be
     * directly handled by enternal code, as the wrapper uses it to return more
     * accessible values from the Text2Pay API.
     *
     * @param string $raw The raw value from the API call response.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.3
     */
    public function __construct($raw) {
        parent::__construct($raw);

        // Map all response data into this object
        $this->serviceId       = $this->response['service_id'];
        $this->frequencyPeriod = $this->fixEmptyArray($this->response['frequency_period']);
        $this->shortCode       = $this->response['short_code'];
        $this->countryCode     = $this->response['country_code'];
        $this->chargeType      = $this->response['charge_type'];
        $this->terms           = $this->fixEmptyArray($this->response['terms']);
        $this->currencyPrefix  = $this->response['currency_prefix'];
        $this->currencySymbol  = $this->response['currency_symbol'];
        $this->languageCode    = $this->response['language_code'];
        $this->supportNumber   = $this->response['support_number'];
        $this->totalMessages   = $this->response['total_messages'];
        $this->creditAmount    = $this->response['credit_amount'];
        $this->creditTitle     = $this->response['credit_title'];

        $temp = $this->fixEmptyArray($this->response['initialoptin']);
        if (!empty($temp)) {
            $this->initialOptin = new Text2PayApi_getServiceDetails_OptinInfo();
            $this->initialOptin->keyword = $temp['keyword'];
            $this->initialOptin->confirmationText = $temp['keyword'];
            $this->initialOptin->contentText = $temp['keyword'];
        }
        else
            $this->initialOptin = null;

        $temp = $this->fixEmptyArray($this->response['secondaryoptin']);
        if (!empty($temp)) {
            $this->secondaryOptin = new Text2PayApi_getServiceDetails_OptinInfo();
            $this->secondaryOptin->keyword = $temp['keyword'];
            $this->secondaryOptin->confirmationText = $temp['keyword'];
            $this->secondaryOptin->contentText = $temp['keyword'];
        }
        else
            $this->secondaryOptin = null;

        $temp = $this->fixEmptyArray($this->response['suppression']);
        if (!empty($temp)) {
            $this->suppression = new Text2PayApi_getServiceDetails_Suppression();
            $this->suppression->confirmationMt = $temp['confirmation_mt'];
            $this->suppression->contentMt = $temp['content_mt'];
        }
        else
            $this->suppression = null;
    }

    /**
     * Access the value of <i>service_id</i> XML node, from the API response.
     *
     * @return int value indicating service Id.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     */
    public function getServiceId() { return $this->serviceId; }
    /**
     * Access the value of <i>initial_optin</i> XML node, from the API response.
     *
     * @return {@link Text2PayApi_getServiceDetails_OptinInfo} value indicating the information for a initial Optin.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     */
    public function getInitialOptin() { return $this->initialOptin; }
    /**
     * Access the value of <i>secondary_optin</i> XML node, from the API response.
     *
     * @return {@link Text2PayApi_getServiceDetails_OptinInfo} value indicating  the information for a secondary Optin, if applicable.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     */
    public function getSecondaryOptin() { return $this->secondaryOptin; }
    /**
     * Access the value of <i>suppression</i> XML node, from the API response.
     *
     * @return {@link Text2PayApi_getServiceDetails_Suppression} value indicating  the information for suppression, if applicable.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     */
    public function getSuppression() { return $this->suppression; }
    /**
     * Access the value of <i>frequency_period</i> XML node, from the API response.
     *
     * @return String value indicating the frequency, if applicable.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     */
    public function getFrequencyPeriod() { return $this->frequencyPeriod; }
    /**
     * Access the value of <i>short_code</i> XML node, from the API response.
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
     * Access the value of <i>charge_type</i> XML node, from the API response.
     *
     * @return String value indicating the charge type.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     */
    public function getChargeType() { return $this->chargeType; }
    /**
     * Access the value of <i>terms</i> XML node, from the API response.
     *
     * @return String value indicating the terms.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     */
    public function getTerms() { return $this->terms; }
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
     * Access the value of <i>currency_prefix</i> XML node, from the API response.
     *
     * @return String value indicating the currency prefix.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     */
    public function getCurrencyPrefix() { return $this->currencyPrefix; }
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
     * Access the value of <i>language_code</i> XML node, from the API response.
     *
     * @return String value indicating the language code.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     */
    public function getLanguageCode() { return $this->languageCode; }
    /**
     * Access the value of <i>support_number</i> XML node, from the API response.
     *
     * @return String value indicating the support number.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     */
    public function getSupportNumber() { return $this->supportNumber; }

    /**
     * Access the value of <i>credit_amount</i> XML node, from the API response.
     *
     * @return {@link double} value used indicating the credit amount of the transaction.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 2.0.6
     */
    public function getCreditAmount() { return $this->creditAmount; }
    /**
     * Access the value of <i>credit_title</i> XML node, from the API response.
     *
     * @return String value used indicating the credit title of the campaign, as defined in Text2Pay system.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 2.0.6
     */
    public function getCreditTitle() { return $this->creditTitle; }

    /**
     * Access the value of <i>total_messages</i> XML node, from the API response.
     *
     * @return int value used indicating the total SMS messages to be send.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     */
    public function getTotalMessages() { return $this->totalMessages; }



}

/**
 * A helper class that holds Optin information, usually coming with
 * {@link Text2PayApi_getServiceDetails_Request} queries to Text2Pay API.
 * This was created to ease object-ization of this type of information.
 *
 * @see Text2PayApi_getServiceDetails_Request
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
final class Text2PayApi_getServiceDetails_OptinInfo {
    /**
     * Access to the keyword value of the Optin information.
     * This means the string value used for replying SMS messages, if needed.
     *
     * @return the String containing the Keyword information of the Optin.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     */
    public $keyword;
    /**
     * Access to the text value of the Optin information.
     * This means the expected text that is received in SMS messages,
     * as confirmation information.
     *
     * @return the String containing the Text information of the Optin.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     */
    public $confirmationText;
    /**
     * Access to the text value of the Optin information.
     * This means the expected text that is received in SMS messages,
     * as content information.
     *
     * @return the String containing the Text information of the Optin.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     */
    public $contentText;
}

/**
 * A helper class that holds suppression information, usually coming with
 * {@link Text2PayApi_getServiceDetails_Request} queries to Text2Pay API.
 * This was created to ease object-ization of this type of information.
 *
 * @see Text2PayApi_getServiceDetails_Request
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
final class Text2PayApi_getServiceDetails_Suppression {
    /**
     * Access to the suppression of confirmation MT's.
     *
     * @var boolean
     *
     * @return True if needed to suppress confirmation MT's
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     */
    public $confirmationMt;
    /**
     * Access to the suppression of content MT's.
     *
     * @var boolean
     *
     * @return True if needed to suppress content MT's
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     */
    public $contentMt;
}
?>