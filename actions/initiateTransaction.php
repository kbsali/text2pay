<?php
/**
 * **************************************************************************
 *
 * File:         initiateTransaction.php
 *
 * Purpose:      Holds the functionality for [initiateTransaction] Text2Pay API action.
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
 * Represents the action <b>initiateTransaction</b> executed in Text2Pay API.
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
final class Text2PayApi_initiateTransaction_Request
extends Text2PayApi_RequestBase {

    /**
     * Initiate a new Once Off or Subscription transaction.
     *
     * Official documentation is available at:
     * <a href="https://merchants.text2pay.com/integrate/api_documentation/">https://merchants.text2pay.com/integrate/api_documentation/</a>
     * (you will need proper merchant credentials to access contents here)
     *
     * @param Text2PayApi_Connection $apiConnection the connection object
     *
     * @param int $serviceId Market & product identifier. This is a unique
     * number based on the carrier, price_point and purchase type. See
     * {@link Text2PayApi_getServices_Request} for details.
     *
     * @param int $msisdn Mobile consumers phone number in E.164
     * (see {@link http://en.wikipedia.org/wiki/E.164} for details.
     *
     * @param string $consumerIdentity IP address of consumer (or unique
     * identifier of the users handset if in-app)
     *
     * @param int $creditAmount Amount of virtual currency or commodity type
     * to be awarded to the user
     *
     * @param string $transactionRef An opaque unique transaction reference
     *
     * @param float $pricePoint Price point of commodity user is purchasing
     * (Required for some DB confirmation type)
     *
     * @param string $zipCode Zip code of MSISDN billing address
     * (Required for some DB confirmation type)
     *
     * @param string $sessionId Session ID / Server Session string of the consumer
     * (Required for AT&T US PSMS PIN opt-in)
     *
     * @param string $browserUserAgent Browser User Agent string of the consumer
     * (Required for AT&T US PSMS PIN opt-in)
     *
     * @param string $thankyouUrl required for OP optin_method. This is where the
     * user will be redirected back too once they have completed the OP purchase
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
        $serviceId,
        $msisdn,
        $consumerIdentity,
        $creditAmount,
        $transactionRef = null,
        $pricePoint = null,
        $zipCode = null,
        $sessionId = null,
        $browserUserAgent = null,
    	$thankyouUrl = null) {

        parent::__construct($apiConnection);

        // Set remaining stuff for this action
        $this->setArgument('action',        'initiateTransaction');
        $this->setArgument('service_id',    $serviceId);
        $this->setArgument('msisdn',        $msisdn);
        $this->setArgument('consumer_id',   $consumerIdentity);
        $this->setArgument('credit_amount', $creditAmount);

        // Set optional arguments if applicable
        if (!empty($transactionRef))    $this->setArgument('trans_ref',     $transactionRef);
        if (!empty($pricePoint))        $this->setArgument('price_point',   number_format((float)$pricePoint, 2, '.', ''));
        if (!empty($zipCode))           $this->setArgument('zipcode',       $zipCode);
        if (!empty($sessionId))         $this->setArgument('session_id',    $sessionId);
        if (!empty($browserUserAgent))  $this->setArgument('browser_ua',    $browserUserAgent);
        if (!empty($thankyouUrl))       $this->setArgument('thank_you_url', $thankyouUrl);
    }

    /**
     * Simply executes the base class {@link Text2PayApi_RequestBase::execute()}
     * and returns a corresponding object to this request's purpose.
     *
     * @return Text2PayApi_initiateTransaction_Response object
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
        return new Text2PayApi_initiateTransaction_Response($response);
    }
}


/**
 * Represents the response for the action <b>initiateTransaction</b> executed
 * in Text2Pay API, with {@link Text2PayApi_initiateTransaction_Request}.
 *
 * This is a simple object that will hold the response information from the
 * action above, accessible through its getter methods:
 *
 * <ul>
 *  <li>{@link Text2PayApi_initiateTransaction_Response::getTotalTransactions()}
 *  <li>{@link Text2PayApi_initiateTransaction_Response::getTransactionIds()}
 *  <li>{@link Text2PayApi_initiateTransaction_Response::getOptinMethod()}
 *  <li>{@link Text2PayApi_initiateTransaction_Response::getBillingType()}
 * </ul>
 *
 * @see Text2PayApi_initiateTransaction_Request
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
final class Text2PayApi_initiateTransaction_Response
extends Text2PayApi_ResponseBase {

    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_initiateTransaction_Response::getUserId()}
     *
     * @var int
     *
     * @see Text2PayApi_initiateTransaction_Response
     * @see Text2PayApi_initiateTransaction_Response::getUserId()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.8
     *
     */
    private $userId;
    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_initiateTransaction_Response::getTotalTransactions()}
     *
     * @var int
     *
     * @see Text2PayApi_initiateTransaction_Response
     * @see Text2PayApi_initiateTransaction_Response::getTotalTransactions()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.1
     *
     */
    private $totalTransactions;
    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_initiateTransaction_Response::getTransactionGroupId()}
     *
     * @var int
     *
     * @see Text2PayApi_initiateTransaction_Response
     * @see Text2PayApi_initiateTransaction_Response::getTransactionGroupId()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.2
     *
     */
    private $transactionGroupId;
    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_initiateTransaction_Response::getTransactionIds()}
     *
     * @var array
     *
     * @see Text2PayApi_initiateTransaction_Response
     * @see Text2PayApi_initiateTransaction_Response::getTransactionIds()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.1
     *
     */
    private $transactionIds;
    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_initiateTransaction_Response::getOptinMethod()}
     *
     * @var string
     *
     * @see Text2PayApi_initiateTransaction_Response
     * @see Text2PayApi_initiateTransaction_Response::getOptinMethod()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.1
     *
     */
    private $optinMethod;
    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_initiateTransaction_Response::getBillingType()}
     *
     * @var string
     *
     * @see Text2PayApi_initiateTransaction_Response
     * @see Text2PayApi_initiateTransaction_Response::getBillingType()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.1
     *
     */
    private $billingType;
	/**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_initiateTransaction_Response::getOffPortalUrl()}
     *
     * @var string
     *
     * @see Text2PayApi_initiateTransaction_Response
     * @see Text2PayApi_initiateTransaction_Response::getOffPortalUrl()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.3
     *
     */
    private $offPortalUrl;

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

        // Map all response data into this object
        $this->transactionGroupId = $this->response['transaction_group_id'];
        $this->totalTransactions = $this->response['total_transactions'];
        $this->optinMethod = $this->response['optin_method'];
        $this->userId = $this->response['user_id'];
        $this->billingType = $this->response['billing_type'];
        if (array_key_exists('offportal_url', $this->response))
	        $this->offPortalUrl = $this->response['offportal_url'];
        $this->transactionIds = array();
        foreach($this->response as $key => $value) {
            if (substr($key, 0, 15) == "transaction_id_")
                array_push($this->transactionIds, $value);
        }
    }
    /**
     * Returns the value of the user identification, retrieved by the API response as
     * [user_id] XML node. This can be used for tracking the user of a specific
     * transaction (eg. subscription cancellation, etc).
     *
     * @return int
     *
     * @see Text2PayApi_initiateTransaction_Response
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.8
     *
     */
    public function getUserId() {
        return $this->userId;
    }
    /**
     * Returns the value of transaction group identification, retrieved by the API response as
     * [transaction_group_id] XML node.
     *
     * @return int value of the transaction group identification
     *
     * @see Text2PayApi_initiateTransaction_Response
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.2
     *
     */
    public function getTransactionGroupId() {
        return $this->transactionGroupId;
    }
    /**
     * Returns the value of totalTransactions, retrieved by the API response as
     * [total_transactions] XML node.
     *
     * @return int value of totalTransactions
     *
     * @see Text2PayApi_initiateTransaction_Response
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.1
     *
     */
    public function getTotalTransactions() {
        return $this->totalTransactions;
    }
    /**
     * Returns the value of all transactionId, retrieved by the API response as
     * [transaction_id_*] XML nodes.
     *
     * @return array of integer values
     *
     * @see Text2PayApi_initiateTransaction_Response
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.1
     *
     */
    public function getTransactionIds()    {
        return $this->transactionIds;
    }
    /**
     * Returns the value of optinMethod, retrieved by the API response as
     * [confirmation_type] XML node.
     *
     * @return string value of optinMethod
     *
     * @see Text2PayApi_initiateTransaction_Response
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.1
     *
     */
    public function getOptinMethod()  {
        return $this->optinMethod;
    }
	/**
     * Returns the value of billingType, retrieved by the API response as
     * [confirmation_type] XML node.
     *
     * @return string value of billingType
     *
     * @see Text2PayApi_initiateTransaction_Response
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.1
     *
     */
    public function getBillingType()  {
        return $this->billingType;
    }
    /**
     * Returns the value of the off-portal URL, retrieved by the API response as
     * [offportal_url] XML node.
     *
     * @return string value of URL for off-portal access
     *
     * @see Text2PayApi_initiateTransaction_Response
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     *
     */
    public function getOffPortalUrl()  {
    	return $this->offPortalUrl;
    }
}

?>