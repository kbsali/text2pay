<?php
/**
 * **************************************************************************
 *
 * File:         checkTransactionStatus.php
 *
 * Purpose:      Holds the functionality for [checkTransactionStatus] Text2Pay API action.
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
 * Represents the action <b>checkTransactionStatus</b> executed in Text2Pay API.
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
final class Text2PayApi_checkTransactionStatus_Request
extends Text2PayApi_RequestBase {

    /**
     * Use this call to check the current status of any given premium
     * transactionId or transactionRef (unique merchant transaction reference);
     * This will allow you to check instantly if a certain transaction has
     * been successfully billed, or if not - the reason it has failed.
     *
     * Official documentation is available at:
     * <a href="https://merchants.text2pay.com/integrate/api_documentation/">https://merchants.text2pay.com/integrate/api_documentation/</a>
     * (you will need proper merchant credentials to access contents here)
     *
     * @param Text2PayApi_Connection $apiConnection the connection object
     *
     * @param int $transactionGroupId The transaction_group_id for the entire
     * transaction. A transaction_group_id will group all transaction_id's to
     * make up the complete transaction. Eg: A transaction may be made up of more
     * than 1 transaction_id (often the case for high price points)
     *
     * @param int $transactionId first value of a transactionId
     * (also referred to as the parent transaction_id) from initiateTransaction
     * function. See {@link Text2PayApi_initiateTransaction_Request} for
     * details.
     *
     * @param string $transactionRef An opaque unique transaction reference
     *
     * @throws Text2PayException if the connection is not a valid connection
     * (thrown by the base class {@link Text2PayApi_RequestBase}, or if
     * required arguments are not valid (thrown by
     * {@link Text2PayApi_RequestBase::setArgument()} method).
     *
     * @see Text2PayApi_RequestBase
     * @see Text2PayApi_RequestBase::setArgument()
     * @see Text2PayApi_initiateTransaction_Request
     * @see Text2PayApi_getServices_Request
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.1
     *
     */
    public function __construct($apiConnection,
    $transactionGroupId = null,
    $transactionId = null,
    $transactionRef = null) {

        parent::__construct($apiConnection);

        // Set remaining stuff for this action
        $this->setArgument('action', 'checkTransactionStatus');

        // As a rule, either of the optional values must be passed.
        if (!isset($transactionGroupId) && !isset($transactionId) && !isset($transactionRef))
            throw new Text2PayException(
                    "Either the transactionGroupId, transactionId or transactionRef must be informed.",
                    Text2PayException::LIB_ERROR_INVALID_ARG);

        if (isset($transactionGroupId))
            $this->setArgument('transaction_group_id', $transactionGroupId );
        if (isset($transactionId))
            $this->setArgument('transaction_id', $transactionId );
        if (isset($transactionRef))
            $this->setArgument('trans_ref', $transactionRef);
    }

    /**
     * Simply executes the base class {@link Text2PayApi_RequestBase::execute()}
     * and returns a corresponding object to this request's purpose.
     *
     * @return Text2PayApi_checkTransactionStatus_Response object
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
        return new Text2PayApi_checkTransactionStatus_Response($response);
    }
}

/**
 * A helper class that holds Transaction information, usually coming with
 * {@link Text2PayApi_initiateTransaction_Request} queries to Text2Pay API.
 * This was created to ease object-ization of this type of information.
 *
 * @see Text2PayApi_initiateTransaction_Request
 *
 * @author Braga, Bruno <bruno.braga@gmail.com>
 * @author Martens, Scott <smartens80@gmail.com>
 *
 * @since 0.3
 * 
 * @package Text2Pay
 * 
 * @subpackage Objects
 * 
 */
final class Text2PayApi_checkTransactionStatus_TransactionStatusInfo {
    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_checkTransactionStatus_TransactionStatusInfo::getTransactionId()}
     *
     * @var int
     *
     * @see Text2PayApi_checkTransactionStatus_Response
     * @see Text2PayApi_checkTransactionStatus_TransactionStatusInfo::getTransactionId()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.1
     *
     */
    private $transactionId;
    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_checkTransactionStatus_TransactionStatusInfo::getMerchantRef()}
     *
     * @var string
     *
     * @see Text2PayApi_checkTransactionStatus_Response
     * @see Text2PayApi_checkTransactionStatus_TransactionStatusInfo::getMerchantRef()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.1
     *
     */
    private $merchantRef;
    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_checkTransactionStatus_TransactionStatusInfo::getConfirmationStatus()}
     *
     * @var string
     *
     * @see Text2PayApi_checkTransactionStatus_Response
     * @see Text2PayApi_checkTransactionStatus_TransactionStatusInfo::getConfirmationStatus()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.1
     *
     */
    private $confirmationStatus;
    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_checkTransactionStatus_TransactionStatusInfo::getStatusCode()}
     *
     * @var int
     *
     * @see Text2PayApi_checkTransactionStatus_Response
     * @see Text2PayApi_checkTransactionStatus_TransactionStatusInfo::getStatusCode()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.1
     *
     */
    private $statusCode;
    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_checkTransactionStatus_TransactionStatusInfo::getStatusTitle()}
     *
     * @var string
     *
     * @see Text2PayApi_checkTransactionStatus_Response
     * @see Text2PayApi_checkTransactionStatus_TransactionStatusInfo::getStatusTitle()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.1
     *
     */
    private $statusTitle;
    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_checkTransactionStatus_TransactionStatusInfo::getStatusDescription()}
     *
     * @var string
     *
     * @see Text2PayApi_checkTransactionStatus_Response
     * @see Text2PayApi_checkTransactionStatus_TransactionStatusInfo::getStatusDescription()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.1
     *
     */
    private $statusDescription;
    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_checkTransactionStatus_TransactionStatusInfo::getServiceId()}
     *
     * @var int
     *
     * @see Text2PayApi_checkTransactionStatus_Response
     * @see Text2PayApi_checkTransactionStatus_TransactionStatusInfo::getServiceId()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.1
     *
     */
    private $serviceId;
    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_checkTransactionStatus_TransactionStatusInfo::getPricePoint()}
     *
     * @var float
     *
     * @see Text2PayApi_checkTransactionStatus_Response
     * @see Text2PayApi_checkTransactionStatus_TransactionStatusInfo::getPricePoint()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.1
     *
     */
    private $pricePoint;
    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_checkTransactionStatus_TransactionStatusInfo::getCommodityAmount()}
     *
     * @var string
     *
     * @see Text2PayApi_checkTransactionStatus_Response
     * @see Text2PayApi_checkTransactionStatus_TransactionStatusInfo::getCommodityAmount()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.1
     *
     */
    private $commodityAmount;

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

        // Map all response data into this object
        $this->transactionId      = $raw['@attributes']['id'];
        if (!empty($raw['merchant_reference']))
            $this->merchantRef    = $raw['merchant_reference'];
        $this->confirmationStatus = $raw['confirmation_status'];
        $this->statusCode         = $raw['status_code'];
        $this->statusTitle        = $raw['status_title'];
        $this->statusDescription  = $raw['status_description'];
        $this->serviceId          = $raw['service_id'];
        $this->pricePoint         = $raw['price_point'];
        $this->commodityAmount    = $raw['commodity_amount'];
    }


    /**
     * Returns the value of transactionId, retrieved by the API response as
     * [transaction_id] XML node.
     *
     * @return int value of transactionId
     *
     * @see Text2PayApi_checkTransactionStatus_Response
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.1
     *
     */
    public function getTransactionId()      {
        return $this->transactionId;
    }
    /**
     * Returns the value of merchantRef, retrieved by the API response as
     * [merchant_reference] XML node.
     *
     * @return int value of merchantRef
     *
     * @see Text2PayApi_checkTransactionStatus_Response
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.1
     *
     */
    public function getMerchantRef()        {
        return $this->merchantRef;
    }
    /**
     * Returns the value of confirmationStatus, retrieved by the API response as
     * [confirmation_status] XML node.
     *
     * @return int value of confirmationStatus
     *
     * @see Text2PayApi_checkTransactionStatus_Response
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.1
     *
     */
    public function getConfirmationStatus() {
        return $this->confirmationStatus;
    }
    /**
     * Returns the value of statusCode, retrieved by the API response as
     * [status_code] XML node.
     *
     * @return int value of statusCode
     *
     * @see Text2PayApi_checkTransactionStatus_Response
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.1
     *
     */
    public function getStatusCode()         {
        return $this->statusCode;
    }
    /**
     * Returns the value of statusTitle, retrieved by the API response as
     * [status_title] XML node.
     *
     * @return string value of statusTitle
     *
     * @see Text2PayApi_checkTransactionStatus_Response
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.1
     *
     */
    public function getStatusTitle()        {
        return $this->statusTitle;
    }
    /**
     * Returns the value of statusDescription, retrieved by the API response as
     * [status_description] XML node.
     *
     * @return string value of statusDescription
     *
     * @see Text2PayApi_checkTransactionStatus_Response
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.1
     *
     */
    public function getStatusDescription()  {
        return $this->statusDescription;
    }
    /**
     * Returns the value of serviceId, retrieved by the API response as
     * [service_id] XML node.
     *
     * @return int value of serviceId
     *
     * @see Text2PayApi_checkTransactionStatus_Response
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.1
     *
     */
    public function getServiceId()          {
        return $this->serviceId;
    }
    /**
     * Returns the value of pricePoint, retrieved by the API response as
     * [price_point] XML node.
     *
     * @return float value of pricePoint
     *
     * @see Text2PayApi_checkTransactionStatus_Response
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.1
     *
     */
    public function getPricePoint()         {
        return $this->pricePoint;
    }
    /**
     * Returns the value of commodityAmount, retrieved by the API response as
     * [commodity_amount] XML node.
     *
     * @return string value of commodityAmount
     *
     * @see Text2PayApi_checkTransactionStatus_Response
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.1
     *
     */
    public function getCommodityAmount()    {
        return $this->commodityAmount;
    }
}



/**
 * Represents the response for the action <b>checkTransactionStatus</b> executed
 * in Text2Pay API, with {@link Text2PayApi_checkTransactionStatus_Request}.
 *
 * This is a simple object that will hold the response information from the
 * action above, accessible through its getter methods:
 *
 * <ul>
 *  <li>{@link Text2PayApi_checkTransactionStatus_Response::getTransactionId()}
 *  <li>{@link Text2PayApi_checkTransactionStatus_Response::getMerchantRef()}
 *  <li>{@link Text2PayApi_checkTransactionStatus_Response::getConfirmationStatus()}
 *  <li>{@link Text2PayApi_checkTransactionStatus_Response::getStatusCode()}
 *  <li>{@link Text2PayApi_checkTransactionStatus_Response::getStatusTitle()}
 *  <li>{@link Text2PayApi_checkTransactionStatus_Response::getStatusDescription()}
 *  <li>{@link Text2PayApi_checkTransactionStatus_Response::getServiceId()}
 *  <li>{@link Text2PayApi_checkTransactionStatus_Response::getPricePoint()}
 *  <li>{@link Text2PayApi_checkTransactionStatus_Response::getCommodityAmount()}
 * </ul>
 *
 * @see Text2PayApi_checkTransactionStatus_Request
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
final class Text2PayApi_checkTransactionStatus_Response
extends Text2PayApi_ResponseBase {

    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_checkTransactionStatus_Response::getTransactionStatusInfos()}
     *
     * @var string
     *
     * @see Text2PayApi_checkTransactionStatus_Response
     * @see Text2PayApi_checkTransactionStatus_Response::getTransactionStatusInfos()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.2
     *
     */
    private $transactionStatusInfos;
    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_checkTransactionStatus_Response::getTotalPricePoint()}
     *
     * @var string
     *
     * @see Text2PayApi_checkTransactionStatus_Response
     * @see Text2PayApi_checkTransactionStatus_Response::getTotalPricePoint()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.2
     *
     */
    private $totalPricePoint;
    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_checkTransactionStatus_Response::getTotalCommodityAmount()}
     *
     * @var string
     *
     * @see Text2PayApi_checkTransactionStatus_Response
     * @see Text2PayApi_checkTransactionStatus_Response::getTotalCommodityAmount()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.2
     *
     */
    private $totalCommodityAmount;


    /**
     * Creates a new instance of this response object, but this should not be
     * directly handled by enternal code, as the wrapper uses it to return more
     * accessible values from the Text2Pay API.
     *
     * @param string $raw The raw value from the API call response.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.2
     *
     */
    public function __construct($raw) {
        parent::__construct($raw);

        $this->transactionGroupId =   $this->response['transaction_group_id']['@attributes']['id'];
        $this->totalPricePoint =      $this->response['transaction_group_id']['@attributes']['total_price_point'];
        $this->totalCommodityAmount = $this->response['transaction_group_id']['@attributes']['total_commodity_amount'];

        $this->transactionStatusInfos = array();
        if (Text2PayApi_Common::isAssocArray($this->response['transaction_group_id']['transaction_id'])) {
            // it is a single transaction
            array_push($this->transactionStatusInfos, new Text2PayApi_checkTransactionStatus_TransactionStatusInfo($this->response['transaction_group_id']['transaction_id']));
        }
        else {
            // it is a list of multiple transactions
            foreach($this->response['transaction_group_id']['transaction_id'] as $t)
                array_push($this->transactionStatusInfos, new Text2PayApi_checkTransactionStatus_TransactionStatusInfo($t));
        }
    }

    /**
     * Returns status information for all transactions, retrieved by the API response.
     *
     * @return array of Text2PayApi_checkTransactionStatus_TransactionStatusInfo objects
     *
     * @see Text2PayApi_checkTransactionStatus_Response
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.2
     *
     */
    public function getTransactionStatusInfos()    {
        return $this->transactionStatusInfos;
    }
    /**
     * Returns the value of pricePoint, retrieved by the API response as
     * [total_price_point] XML attribute.
     *
     * @return string
     *
     * @see Text2PayApi_checkTransactionStatus_Response
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.2
     *
     */
    public function getTotalPricePoint()    {
        return $this->totalPricePoint;
    }
    /**
     * Returns the value of total commodity, retrieved by the API response as
     * [total_commodity_amount] XML attribute.
     *
     * @return string
     *
     * @see Text2PayApi_checkTransactionStatus_Response
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.2
     *
     */
    public function getTotalCommodityAmount()    {
        return $this->totalCommodityAmount;
    }
}

?>