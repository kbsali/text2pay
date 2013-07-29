<?php
/**
 * **************************************************************************
 *
 * File:         verifyTransaction.php
 *
 * Purpose:      Holds the functionality for [verifyTransaction] Text2Pay API action.
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
 * Represents the action <b>verifyTransaction</b> executed in Text2Pay API.
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
final class Text2PayApi_verifyTransaction_Request
extends Text2PayApi_RequestBase {

    /**
     * Verify that a transaction (created via 'initiateTransaction') has been
     * confirmed by the consumer (MO has been received by the Text2Pay system)
     * <p>
     * Note: Either $transactionId or $transactionGroupId is required.
     * <p>
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
     * @param int $transactionGroupId OPTIONAL The transaction_group_id for the entire
     * transaction. A transaction_group_id will group all transaction_id's to
     * make up the complete transaction. Eg: A transaction may be made up of
     * more than 1 transaction_id (often the case for high price points)
     * from initiateTransaction function.
     * See {@link Text2PayApi_initiateTransaction_Request} for details.
     * 
     * @param int $transactionId OPTIONAL first value of a transactionId
     * (also referred to as the parent transaction_id) from initiateTransaction
     * function. See {@link Text2PayApi_initiateTransaction_Request} for
     * details.
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
    $serviceId,
    $transactionGroupId=null,
    $transactionId=null
    ) {

        parent::__construct($apiConnection);

        // Set remaining stuff for this action
        $this->setArgument('action',   		 'verifyTransaction' );
        $this->setArgument('service_id',     $serviceId          );

        // As a rule, either of the optional values must be passed.
        if (!isset($transactionId) && !isset($transactionGroupId))
            throw new Text2PayException(
                "Either the transactionId or transactionGroupId must be informed.",
                Text2PayException::LIB_ERROR_INVALID_ARG);

        if (isset($transactionId))
            $this->setArgument('transaction_id', $transactionId );
        if (isset($transactionGroupId))
            $this->setArgument('transaction_group_id', $transactionGroupId);
    }

    /**
     * Simply executes the base class {@link Text2PayApi_RequestBase::execute()}
     * and returns a corresponding object to this request's purpose.
     *
     * @return Text2PayApi_verifyTransaction_Response object
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
        return new Text2PayApi_verifyTransaction_Response($response);
    }
}

/**
 * Represents the response for the action <b>verifyTransaction</b> executed
 * in Text2Pay API, with {@link Text2PayApi_verifyTransaction_Request}.
 *
 * This is a simple object that will hold the response information from the
 * action above, accessible through its getter methods:
 *
 * <ul>
 *  <li>{@link Text2PayApi_verifyTransaction_Response::getConfirmations()}
 *  <li>{@link Text2PayApi_verifyTransaction_Response::getTransactionGroupId()}
 * </ul>
 *
 * @see Text2PayApi_verifyTransaction_Request
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
final class Text2PayApi_verifyTransaction_Response
extends Text2PayApi_ResponseBase {

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
     * {@link Text2PayApi_verifyTransaction_Response::getTransactionInfos()}
     *
     * @var mixed
     *
     * @see Text2PayApi_verifyTransaction_Response
     * @see Text2PayApi_verifyTransaction_Response::getTransactionInfos()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.5
     *
     */
    private $transactionInfos;

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
        $this->transactionGroupId = $this->response['transaction_group_id']['@attributes']['id'];
        $this->transactionInfos = array();
        if (Text2PayApi_Common::isAssocArray($this->response['transaction_group_id']['transaction_id'])) {
            // it is a single transaction
            $trxid = $this->response['transaction_group_id']['transaction_id']['@attributes']['id'];
            $confirmation = $this->response['transaction_group_id']['transaction_id']['confirmation'];
            $this->transactionInfos[] = new Text2PayApi_verifyTransaction_TransactionInfo($trxid, $confirmation);
        }
        else {
            // it is a list of multiple transactions
            foreach($this->response['transaction_group_id']['transaction_id'] as $t) {
                $trxid = $t['@attributes']['id'];
                $confirmation = $t['confirmation'];
            	$this->transactionInfos[] = new Text2PayApi_verifyTransaction_TransactionInfo($trxid, $confirmation);
            }
        }
    }

    /**
     * Returns the transaction information for all transactions within the 
     * transaction group returned by the API.
     *
     * @return array of Text2PayApi_verifyTransaction_TransactionInfo
     *
     * @see Text2PayApi_verifyTransaction_TransactionInfo
     * @see Text2PayApi_verifyTransaction_Response
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.5
     *
     */
    public function getTransactionInfos()  {
        return $this->transactionInfos;
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
}


/**
 * A helper class that holds Transaction information, usually coming with
 * {@link Text2PayApi_verifyTransaction_Response} queries to Text2Pay API.
 * This was created to ease object-ization of this type of information.
 *
 * This is a simple object that will hold the response information from the
 * action above, accessible through its getter methods:
 *
 * <ul>
 *  <li>{@link Text2PayApi_verifyTransaction_TransactionInfo::getTransactionId()}
 *  <li>{@link Text2PayApi_verifyTransaction_TransactionInfo::getConfirmation()}
 * </ul>
 *
 * @see Text2PayApi_verifyTransaction_Response
 *
 * @author Braga, Bruno <bruno.braga@gmail.com>
 * @author Martens, Scott <smartens80@gmail.com>
 *
 * @since 0.5
 *
 * @package Text2Pay
 *
 * @subpackage Objects
 */
class Text2PayApi_verifyTransaction_TransactionInfo {
	/**
	 * See main documentation in its getter method, defined as
	 * {@link Text2PayApi_verifyTransaction_TransactionInfo::getTransactionId()}
	 *
	 * @see Text2PayApi_verifyTransaction_TransactionInfo
	 * @see Text2PayApi_verifyTransaction_TransactionInfo::getTransactionId()
	 *
	 * @author Braga, Bruno <bruno.braga@gmail.com>
	 *
	 * @since 0.5
	 *
	 * @var int
	 */
	private $transactionId;
	/**
	 * See main documentation in its getter method, defined as
	 * {@link Text2PayApi_verifyTransaction_TransactionInfo::getConfirmation()}
	 *
	 * @see Text2PayApi_verifyTransaction_TransactionInfo
	 * @see Text2PayApi_verifyTransaction_TransactionInfo::getConfirmation()
	 *
	 * @author Braga, Bruno <bruno.braga@gmail.com>
	 *
	 * @since 0.5
	 *
	 * @var string
	 */
	private $confirmation;

	/**
	 * Creates a new instance of this object, but this should not be
	 * directly handled by enternal code, as the wrapper uses it to return more
	 * accessible values from the Text2Pay API.
	 *
	 * @param int $transactionId The transaction ID of a transaction group
	 * @param string $confirmation The confirmation info of the transaction
	 *
	 * @author Braga, Bruno <bruno.braga@gmail.com>
	 *
	 * @since 0.5
	 */
	public function __construct($transactionId, $confirmation) {
		$this->transactionId = $transactionId;
		$this->confirmation = $confirmation;
	}

	/**
	 * Access to the Transaction ID information.
	 *
	 * @return int the value of the transactionId.
	 *
	 * @author Braga, Bruno <bruno.braga@gmail.com>
	 * @author Martens, Scott <smartens80@gmail.com>
	 *
	 * @since 0.5
	 */
	public function getTransactionId() { return $this->transactionId; }
	/**
	 * Access to the confirmation information of a transaction.
	 *
	 * @return string the confirmation value (could be a date, representing when
	 * the confirmation was received, or a string message saying it is pending).
	 *
	 * @author Braga, Bruno <bruno.braga@gmail.com>
	 * @author Martens, Scott <smartens80@gmail.com>
	 *
	 * @since 0.5
	 */
	public function getConfirmation() { return $this->confirmation; }
}

?>