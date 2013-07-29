<?php
/**
 * **************************************************************************
 *
 * File:         getTransactionHistory.php
 *
 * Purpose:      Holds the functionality for [getTransactionHistory] Text2Pay API action.
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
 * Represents the action <b>getTransactionHistory</b> executed in Text2Pay API.
 *
 * Refer to constructor for additional documentation.
 *
 * @author Braga, Bruno <bruno.braga@gmail.com>
 *
 * @since 0.5
 *
 * @package Text2Pay
 *
 * @subpackage Request
 *
 */
final class Text2PayApi_getTransactionHistory_Request
extends Text2PayApi_RequestBase {

    /**
     * Retrieves transaction records from Text2Pay database.
     *
     * <p>
     * Note: Due to performance reasons, such queries are cached in our system, and
     * query data volume and frequency rules may apply.
     *
     * Official documentation is available at:
     * <a href="https://merchants.text2pay.com/integrate/api_documentation/">https://merchants.text2pay.com/integrate/api_documentation/</a>
     * (you will need proper merchant credentials to access contents here)
     *
     * @param Text2PayApi_Connection $apiConnection the connection object
     *
     * @param string $campaignId the campaign identification
     *
     * @param int $from Start date of your report. Must be in format of YYYYMMDD
     *
     * @param int $to End date of your report. Must be in format of YYYYMMDD
     *
     * @param string $countryCode OPTIONAL International ISO-3166 country code
     *
     * @param string $reportStatusCode OPTIONAL Defines the outcome of the transaction.
     * Refer to {@link Text2PayApi_Constants_StatusCode} for valid values.
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
     * @since 0.5
     *
     */
    public function __construct($apiConnection,
        $campaignId,
        $from,
        $to,
        $countryCode = null,
        $reportStatusCode = null) {

        parent::__construct($apiConnection);

        // Set remaining stuff for this action
        $this->setArgument('action',      'getTransactionHistory');
        $this->setArgument('campaign_id', $campaignId);
        $this->setArgument('from_date',   $from);
        $this->setArgument('to_date',     $to);

        // Set optional arguments if applicable
        if (!empty($countryCode))      $this->setArgument('country_code',     $countryCode);
        if (!empty($reportStatusCode)) $this->setArgument('report_status_code',   $reportStatusCode);
    }

    /**
     * Simply executes the base class {@link Text2PayApi_RequestBase::execute()}
     * and returns a corresponding object to this request's purpose.
     *
     * @return Text2PayApi_getTransactionHistory_Response object
     *
     * @see Text2PayApi_RequestBase
     * @see Text2PayApi_RequestBase::execute()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.5
     *
     */
    public function execute() {

        // Execute all from base class
        $response = parent::execute();

        // Map the result in a proper response object
        return new Text2PayApi_getTransactionHistory_Response($response);
    }
}


/**
 * Represents the response for the action <b>getTransactionHistory</b> executed
 * in Text2Pay API, with {@link Text2PayApi_getTransactionHistory_Request}.
 *
 * This is a simple object that will hold the response information from the
 * action above, accessible through its getter methods:
 *
 * <ul>
 *  <li>{@link Text2PayApi_getTransactionHistory_Response::getTransactionInfos()}
 * </ul>
 *
 * @see Text2PayApi_getTransactionHistory_Request
 *
 * @author Braga, Bruno <bruno.braga@gmail.com>
 *
 * @since 0.5
 *
 * @package Text2Pay
 *
 * @subpackage Response
 *
 */
final class Text2PayApi_getTransactionHistory_Response
extends Text2PayApi_ResponseBase {

    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_getTransactionHistory_Response::getTransactionInfos()}
     *
     * @var array of rows
     *
     * @see Text2PayApi_getTransactionHistory_Response
     * @see Text2PayApi_getTransactionHistory_Response::getTransactionInfos()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.5
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
     * @since 0.5
     *
     */
    public function __construct($raw) {
        parent::__construct($raw);

        // in this case, the response property is null because we are not dealing
        // with XML data. So, get it from raw data directly, while properly handling
        // errors.

        // Map all response data into this object
        $this->transactionInfos = array();

        $temp = explode(PHP_EOL, $raw);

        if (count($temp) > 0) {
            $keys = str_getcsv($temp[0]);
            for ($i = 1; $i < count($temp); $i++) {
                if (strlen($temp[$i]) > 0) {
                    $item = array();
                    $values = str_getcsv($temp[$i]);
                    for ($j = 0; $j < count($keys); $j++) {
                        $item[$keys[$j]] = $values[$j];
                    }
                    array_push($this->transactionInfos, $item);
                }
            }
        }
    }
    /**
     * Returns the data (parsed from CSV format into array format).
     *
     * @return array of associative arrays, with the following keys:
     * timestamp,total_transactions,payment_type,transaction_id,transaction_group_id,
     * publisher_reference,commodity_value,brand,credit_title,msisdn,carrier_title,
     * carrier_code,country_code,country_name,currency_symbol,currency_prefix,
     * price_point_net_payout,costs,price_point,full_price_point,price_point_user_offportal,
     * date,report_status_code,report_status_description,group_success,group_failed,
     * group_refunded,optin_confirmation_timestamp,group_conf,purchase_confirmation_timestamp
     *
     *
     * @see Text2PayApi_getTransactionHistory_TransactionInfo
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.5
     *
     */
    public function getTransactionInfos() {
        return $this->transactionInfos;
    }
}

?>