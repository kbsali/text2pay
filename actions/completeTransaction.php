<?php
/**
 * **************************************************************************
 *
 * File:         completeTransaction.php
 *
 * Purpose:      Holds the functionality for [completeTransaction] Text2Pay API action.
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
 * Represents the action <b>completeTransaction</b> executed in Text2Pay API.
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
final class Text2PayApi_completeTransaction_Request
extends Text2PayApi_RequestBase {

    /**
     * This action is used to confirm / validate if the PIN a user entered
     * matches the PIN sent to the user via the 'initiateTransaction' API action.
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
     * @param int $transactionGroupId The transaction_group_id for the entire
     * transaction. A transaction_group_id will group all transaction_id's to
     * make up the complete transaction. Eg: A transaction may be made up of
     * more than 1 transaction_id (often the case for high price points)
     * from initiateTransaction function.
     * See {@link Text2PayApi_initiateTransaction_Request} for details.
     *
     * @param int $pinCode Consumers PIN code that was sent to their handset.
     * Not required for MO transactions.
     *
     * @param int $messageNumber The message number of the PIN you wish to check.
     * Eg: 2 would specify you are checking the PIN of the 2nd PIN confirmation
     * MT sent to the user. Required for multiple PIN transactions
     *
     * @param int $messageCount The total number of PINs the user must enter
     * before the entire transaction is completed. Required for multiple PIN transactions
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
        $transactionGroupId,
        $pinCode = null,
        $messageNumber = null,
        $messageCount = null
    ) {

        parent::__construct($apiConnection);

        // Set remaining stuff for this action
        $this->setArgument('action',   		       'completeTransaction');
        $this->setArgument('service_id',           $serviceId           );
        $this->setArgument('transaction_group_id', $transactionGroupId  );
        if (isset($pinCode))       $this->setArgument('pincode',        $pinCode      );
        if (isset($messageNumber)) $this->setArgument('message_number', $messageNumber);
        if (isset($messageCount))  $this->setArgument('message_count',  $messageCount );
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
        return new Text2PayApi_completeTransaction_Response($response);
    }
}

/**
 * Represents the response for the action <b>completeTransaction</b> executed
 * in Text2Pay API, with {@link Text2PayApi_completeTransaction_Request}.
 *
 * This is a simple object that will hold the response information from the
 * action above, accessible through its getter methods:
 *
 * <ul>
 *  <li>{@link Text2PayApi_completeTransaction_Response::getTransactionGroupId()}
 *  <li>{@link Text2PayApi_completeTransaction_Response::getConfirmation()}
 * </ul>
 *
 * @see Text2PayApi_completeTransaction_Request
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
final class Text2PayApi_completeTransaction_Response
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
     * {@link Text2PayApi_completeTransaction_Response::getConfirmation()}
     *
     * @var string
     *
     * @see Text2PayApi_completeTransaction_Response
     * @see Text2PayApi_completeTransaction_Response::getConfirmation()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.1
     *
     */
    private $confirmation;

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
        $this->confirmation = $this->response['confirmation'];
    }

    /**
     * Returns the value of confirmation, retrieved by the API response as
     * [confirmation] XML node.
     *
     * @return string value of confirmation
     *
     * @see Text2PayApi_completeTransaction_Response
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.1
     *
     */
    public function getConfirmation()  {
        return $this->confirmation;
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

?>