<?php
/**
 * **************************************************************************
 *
 * File:         getApplicationData.php
 *
 * Purpose:      Holds the functionality for [getApplicationData] Text2Pay API action.
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
 * Represents the action <b>getApplicationData</b> executed in Text2Pay API.
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
final class Text2PayApi_getApplicationData_Request
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
     * @param string $countryCode International ISO-3166 country code
     *
     * @param string carrierCode represents the mobile carrier code associated with the
     * <i>campaignId</i> and <i>countryCode</i>. You will need to rely on other API
     * calls to know this value, either {@link Text2PayApi_getApplicationData_Request}.
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
            $countryCode,
            $carrierCode) {

        parent::__construct($apiConnection);

        // Set remaining stuff for this action
        $this->setArgument('action', 'getApplicationData');
        $this->setArgument('campaign_id', $campaignId);
        $this->setArgument('country_code', $countryCode);
        $this->setArgument('carrier_code', $carrierCode);
    }

    /**
     * Simply executes the base class {@link Text2PayApi_RequestBase::execute()}
     * and returns a corresponding object to this request's purpose.
     *
     * @return Text2PayApi_getApplicationData_Response object
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
        return new Text2PayApi_getApplicationData_Response($response);
    }
}


/**
 * Represents the response for the action <b>getApplicationData</b> executed
 * in Text2Pay API, with {@link Text2PayApi_getApplicationData_Request}.
 *
 * This is a simple object that will hold the response information from the
 * action above, accessible through its getter methods:
 *
 * <ul>
 *  <li>{@link Text2PayApi_getApplicationData_Response::getApplicationData()}
 * </ul>
 *
 * @see Text2PayApi_getApplicationData_Request
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
final class Text2PayApi_getApplicationData_Response
extends Text2PayApi_ResponseBase {

	/**
	 * See main documentation in its getter method, defined as
	 * {@link Text2PayApi_getApplicationData_Response::getCampaignId()}
	 *
	 * @see Text2PayApi_getApplicationData_Response
	 * @see Text2PayApi_getApplicationData_Response::getCampaignId()
	 *
	 * @author Braga, Bruno <bruno.braga@gmail.com>
	 *
	 * @since 0.3
	 *
     * @var int
     */
    private $campaignId = -1;
	/**
	 * See main documentation in its getter method, defined as
	 * {@link Text2PayApi_getApplicationData_Response::getBrandId()}
	 *
	 * @see Text2PayApi_getApplicationData_Response
	 * @see Text2PayApi_getApplicationData_Response::getBrandId()
	 *
	 * @author Braga, Bruno <bruno.braga@gmail.com>
	 *
	 * @since 0.3
	 *
     * @var int
     */
    private $brandId = -1;
	/**
	 * See main documentation in its getter method, defined as
	 * {@link Text2PayApi_getApplicationData_Response::getApplicationName()}
	 *
	 * @see Text2PayApi_getApplicationData_Response
	 * @see Text2PayApi_getApplicationData_Response::getApplicationName()
	 *
	 * @author Braga, Bruno <bruno.braga@gmail.com>
	 *
	 * @since 0.3
	 *
     * @var string
     */
    private $applicationName;
	/**
	 * See main documentation in its getter method, defined as
	 * {@link Text2PayApi_getApplicationData_Response::getSupportNumber()}
	 *
	 * @see Text2PayApi_getApplicationData_Response
	 * @see Text2PayApi_getApplicationData_Response::getSupportNumber()
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
	 * {@link Text2PayApi_getApplicationData_Response::getCurrencySymbol()}
	 *
	 * @see Text2PayApi_getApplicationData_Response
	 * @see Text2PayApi_getApplicationData_Response::getCurrencySymbol()
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
	 * {@link Text2PayApi_getApplicationData_Response::getSuppressMessages()}
	 *
	 * @see Text2PayApi_getApplicationData_Response
	 * @see Text2PayApi_getApplicationData_Response::getSuppressMessages()
	 *
	 * @author Braga, Bruno <bruno.braga@gmail.com>
	 *
	 * @since 0.3
	 *
     * @var boolean
     */
    private $suppressMessages = "";
	/**
	 * See main documentation in its getter method, defined as
	 * {@link Text2PayApi_getApplicationData_Response::getPricePoint()}
	 *
	 * @see Text2PayApi_getApplicationData_Response
	 * @see Text2PayApi_getApplicationData_Response::getPricePoint()
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
	 * {@link Text2PayApi_getApplicationData_Response::getCreditAmount()}
	 *
	 * @see Text2PayApi_getApplicationData_Response
	 * @see Text2PayApi_getApplicationData_Response::getCreditAmount()
	 *
	 * @author Braga, Bruno <bruno.braga@gmail.com>
	 *
	 * @since 0.3
	 *
     * @var float
     */
    private $creditAmount;
	/**
	 * See main documentation in its getter method, defined as
	 * {@link Text2PayApi_getApplicationData_Response::getShortCode()}
	 *
	 * @see Text2PayApi_getApplicationData_Response
	 * @see Text2PayApi_getApplicationData_Response::getShortCode()
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
	 * {@link Text2PayApi_getApplicationData_Response::getKeywordInitialOptin()}
	 *
	 * @see Text2PayApi_getApplicationData_Response
	 * @see Text2PayApi_getApplicationData_Response::getKeywordInitialOptin()
	 *
	 * @author Braga, Bruno <bruno.braga@gmail.com>
	 *
	 * @since 0.3
	 *
     * @var string
     */
    private $keywordInitialOptin = "";
	/**
	 * See main documentation in its getter method, defined as
	 * {@link Text2PayApi_getApplicationData_Response::getKeywordSecondaryOptin()}
	 *
	 * @see Text2PayApi_getApplicationData_Response
	 * @see Text2PayApi_getApplicationData_Response::getKeywordSecondaryOptin()
	 *
	 * @author Braga, Bruno <bruno.braga@gmail.com>
	 *
	 * @since 0.3
	 *
     * @var string
     */
    private $keywordSecondaryOptin = "";
	/**
	 * See main documentation in its getter method, defined as
	 * {@link Text2PayApi_getApplicationData_Response::getIsSubscription()}
	 *
	 * @see Text2PayApi_getApplicationData_Response
	 * @see Text2PayApi_getApplicationData_Response::getIsSubscription()
	 *
	 * @author Braga, Bruno <bruno.braga@gmail.com>
	 *
	 * @since 0.3
	 *
     * @var boolean
     */
    private $isSubscription = "";
	/**
	 * See main documentation in its getter method, defined as
	 * {@link Text2PayApi_getApplicationData_Response::getMessageFrequency()}
	 *
	 * @see Text2PayApi_getApplicationData_Response
	 * @see Text2PayApi_getApplicationData_Response::getMessageFrequency()
	 *
	 * @author Braga, Bruno <bruno.braga@gmail.com>
	 *
	 * @since 0.3
	 *
     * @var string
     */
    private $messageFrequency = "";
	/**
	 * See main documentation in its getter method, defined as
	 * {@link Text2PayApi_getApplicationData_Response::BillingFrequency()}
	 *
	 * @see Text2PayApi_getApplicationData_Response
	 * @see Text2PayApi_getApplicationData_Response::BillingFrequency()
	 *
	 * @author Braga, Bruno <bruno.braga@gmail.com>
	 *
	 * @since 0.3
	 *
     * @var string
     */
    private $billingFrequency = "";
	/**
	 * See main documentation in its getter method, defined as
	 * {@link Text2PayApi_getApplicationData_Response::getBillingFrequencyName()}
	 *
	 * @see Text2PayApi_getApplicationData_Response
	 * @see Text2PayApi_getApplicationData_Response::getBillingFrequencyName()
	 *
	 * @author Braga, Bruno <bruno.braga@gmail.com>
	 *
	 * @since 0.3
	 *
     * @var string
     */
    private $billingFrequencyName = "";
	/**
	 * See main documentation in its getter method, defined as
	 * {@link Text2PayApi_getApplicationData_Response::getPeriodSuffix()}
	 *
	 * @see Text2PayApi_getApplicationData_Response
	 * @see Text2PayApi_getApplicationData_Response::getPeriodSuffix()
	 *
	 * @author Braga, Bruno <bruno.braga@gmail.com>
	 *
	 * @since 0.3
	 *
     * @var string
     */
    private $periodSuffix = "";
	/**
	 * See main documentation in its getter method, defined as
	 * {@link Text2PayApi_getApplicationData_Response::getEnableMobileTracker()}
	 *
	 * @see Text2PayApi_getApplicationData_Response
	 * @see Text2PayApi_getApplicationData_Response::getEnableMobileTracker()
	 *
	 * @author Braga, Bruno <bruno.braga@gmail.com>
	 *
	 * @since 0.3
	 *
     * @var string
     */
    private $enableMobileTracker = "";
	/**
	 * See main documentation in its getter method, defined as
	 * {@link Text2PayApi_getApplicationData_Response::getShowSkipButton()}
	 *
	 * @see Text2PayApi_getApplicationData_Response
	 * @see Text2PayApi_getApplicationData_Response::getShowSkipButton()
	 *
	 * @author Braga, Bruno <bruno.braga@gmail.com>
	 *
	 * @since 0.3
	 *
     * @var string
     */
    private $showSkipButton = "";
	/**
	 * See main documentation in its getter method, defined as
	 * {@link Text2PayApi_getApplicationData_Response::getHeader()}
	 *
	 * @see Text2PayApi_getApplicationData_Response
	 * @see Text2PayApi_getApplicationData_Response::getHeader()
	 *
	 * @author Braga, Bruno <bruno.braga@gmail.com>
	 *
	 * @since 0.3
	 *
     * @var string
     */
    private $header = "";
	/**
	 * See main documentation in its getter method, defined as
	 * {@link Text2PayApi_getApplicationData_Response::getTermsFull()}
	 *
	 * @see Text2PayApi_getApplicationData_Response
	 * @see Text2PayApi_getApplicationData_Response::getTermsFull()
	 *
	 * @author Braga, Bruno <bruno.braga@gmail.com>
	 *
	 * @since 0.3
	 *
     * @var string
     */
    private $termsFull = "";
	/**
	 * See main documentation in its getter method, defined as
	 * {@link Text2PayApi_getApplicationData_Response::getMoReachable()}
	 *
	 * @see Text2PayApi_getApplicationData_Response
	 * @see Text2PayApi_getApplicationData_Response::getMoReachable()
	 *
	 * @author Braga, Bruno <bruno.braga@gmail.com>
	 *
	 * @since 0.3
	 *
     * @var boolean
     */
    private $moReachable = "";
	/**
	 * See main documentation in its getter method, defined as
	 * {@link Text2PayApi_getApplicationData_Response::getShowConfirmationDialog()}
	 *
	 * @see Text2PayApi_getApplicationData_Response
	 * @see Text2PayApi_getApplicationData_Response::getShowConfirmationDialog()
	 *
	 * @author Braga, Bruno <bruno.braga@gmail.com>
	 *
	 * @since 0.3
	 *
     * @var boolean
     */
    private $showConfirmationDialog = "";
	/**
	 * See main documentation in its getter method, defined as
	 * {@link Text2PayApi_getApplicationData_Response::getConfirmationText()}
	 *
	 * @see Text2PayApi_getApplicationData_Response
	 * @see Text2PayApi_getApplicationData_Response::getConfirmationText()
	 *
	 * @author Braga, Bruno <bruno.braga@gmail.com>
	 *
	 * @since 0.3
	 *
     * @var string
     */
    private $confirmationText = "";

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
        $this->campaignId               = $this->response['campaign_id'];
        $this->brandId                  = $this->response['brand_id'];
        $this->applicationName          = $this->response['application_name'];
        $this->supportNumber            = $this->response['support_number'];
        $this->currencySymbol           = $this->response['currency_symbol'];
        $this->suppressMessages         = $this->response['suppress_messages'];
        $this->creditAmount             = $this->response['credit_amount'];
        $this->pricePoint               = $this->response['price_point'];
        $this->shortCode                = $this->response['short_code'];
        $this->keywordInitialOptin      = $this->fixEmptyArray($this->response['keyword_initialoptin']);
        $this->keywordSecondaryOptin    = $this->fixEmptyArray($this->response['keyword_secondaryoptin']);
        $this->isSubscription           = $this->response['is_subscription'];
        $this->messageFrequency         = $this->fixEmptyArray($this->response['message_frequency']);
        $this->billingFrequency         = $this->fixEmptyArray($this->response['billing_frequency']);
        $this->billingFrequencyName     = $this->fixEmptyArray($this->response['billing_frequency_name']);
        $this->periodSuffix             = $this->fixEmptyArray($this->response['period_suffix']);
        $this->enableMobileTracker      = $this->response['enable_mobile_tracker'];
        $this->showSkipButton           = $this->response['show_skip_button'];
        $this->header                   = $this->fixEmptyArray($this->response['header']);
        $this->termsFull                = $this->fixEmptyArray($this->response['terms_full']);
        $this->moReachable              = $this->response['mo_reachable'];
		$this->showConfiramtionDialog   = $this->response['show_confirmation_dialog'];
		$this->confirmationText         = $this->fixEmptyArray($this->response['confirmation_text']);
    }

    /**
     * Access the value of <i>campaign_id</i> XML node, from the API response.
     *
     * @return int value indicating campaign identification.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     */
    public function getCampaignId() { return $this->campaignId; }
    /**
     * Access the value of <i>brand_id</i> XML node, from the API response.
     *
     * @return int value indicating brand identification.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     */
    public function getBrandId() { return $this->brandId; }
    /**
     * Access the value of <i>application_name</i> XML node, from the API response.
     *
     * @return int value indicating the application name.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     */
    public function getApplicationName() { return $this->applicationName; }
    /**
     * Access the value of <i>support_number</i> XML node, from the API response.
     *
     * @return int value indicating the support number.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     */
    public function getSupportNumber() { return $this->supportNumber; }
    /**
     * Access the value of <i>currency_symbol</i> XML node, from the API response.
     *
     * @return int value indicating the currency symbol.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     */
    public function getCurrencySymbol() { return $this->currencySymbol; }
    /**
     * Access the value of <i>suppress_messages</i> XML node, from the API response.
     *
     * @return int value to suppress messages.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     */
    public function getSuppressMessages() { return $this->suppressMessages; }
    /**
     * Access the value of <i>credit_amount</i> XML node, from the API response.
     *
     * @return int value indicating the virtual currency credit amount.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     */
    public function getCreditAmount() { return $this->creditAmount; }
    /**
     * Access the value of <i>price_point</i> XML node, from the API response.
     *
     * @return int value indicating the price point.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     */
    public function getPricePoint() { return $this->pricePoint; }
    /**
     * Access the value of <i>short_code</i> XML node, from the API response.
     *
     * @return int value indicating short code.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     */
    public function getShortCode() { return $this->shortCode; }
    /**
     * Access the value of <i>keyword_initial_optin</i> XML node, from the API response.
     *
     * @return string value indicating the initial optin keyword.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     */
    public function getKeywordInitialOptin() { return $this->keywordInitialOptin; }
    /**
     * Access the value of <i>keyword_secondary_optin</i> XML node, from the API response.
     *
     * @return string value indicating the secondary optin keyword.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     */
    public function getKeywordSecondaryOptin() { return $this->keywordSecondaryOptin; }
    /**
     * Access the value of <i>is_subscription</i> XML node, from the API response.
     *
     * @return string value indicating if it is subscription.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     */
    public function getIsSubscription() { return $this->isSubscription; }
    /**
     * Access the value of <i>message_frequency</i> XML node, from the API response.
     *
     * @return string value indicating the message frequency.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     */
    public function getMessageFrequency() { return $this->messageFrequency; }
    /**
     * Access the value of <i>billing_frequency</i> XML node, from the API response.
     *
     * @return string value indicating billing frequency.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     */
    public function getBillingFrequency() { return $this->billingFrequency; }
    /**
     * Access the value of <i>billing_frequency_name</i> XML node, from the API response.
     *
     * @return string value indicating the billing frequency name.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     */
    public function getBillingFrequencyName() { return $this->billingFrequencyName; }
    /**
     * Access the value of <i>period_suffix</i> XML node, from the API response.
     *
     * @return string value indicating the period suffix.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     */
    public function getPeriodSuffix() { return $this->periodSuffix; }
    /**
     * Access the value of <i>enable_mobile_tracker</i> XML node, from the API response.
     *
     * @return boolean value for enabling mobile tracker.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     */
    public function getEnableMobileTracker() { return $this->enableMobileTracker; }
    /**
     * Access the value of <i>show_skip_button</i> XML node, from the API response.
     *
     * @return boolean value to show the skip button.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     */
    public function getShowSkipButton() { return $this->showSkipButton; }
    /**
     * Access the value of <i>header</i> XML node, from the API response.
     *
     * @return boolean value indicating the header message.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     */
    public function getHeader() { return $this->header; }
    /**
     * Access the value of <i>terms_full</i> XML node, from the API response.
     *
     * @return string value indicating the full terms.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     */
    public function getTermsFull() { return $this->termsFull; }
    /**
     * Access the value of <i>mo_reachable</i> XML node, from the API response.
     *
     * @return boolean value indicating if MO is reachable.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     */
    public function getMoReachable() { return $this->moReachable; }
    /**
     * Access the value of <i>show_confirmation_dialog</i> XML node, from the API response.
     *
     * @return boolean value of show confirmation dialog.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     */
    public function getShowConfirmationDialog() { return $this->showConfiramtionDialog; }
    /**
     * Access the value of <i>confirmation_text</i> XML node, from the API response.
     *
     * @return string value indicating confirmation text.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     */
	public function getConfirmationText() { return $this->confirmationText; }
}

?>