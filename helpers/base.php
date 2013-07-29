<?php
/**
 * **************************************************************************
 *
 * File:         base.php
 *
 * Purpose:      Holds all Text2Pay API wrapping functionality, to be easily
 *               accessible by PHP developers connecting to Text2Pay services
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
 *
 * Documentation:
 * --------------
 *
 * Comprehensive documentation about the Text2Pay API is available at:
 *
 * {@link http://merchants.text2pay.com/developers/api_documentation}
 * (you will need proper merchant credentials to access contents here)
 *
 * The documentation provided here merely attempts to facilitate development
 * process. If you are not sure of the functionalities here described, always
 * refer to official documentation.
 *
 * Feel free to contact Text2Pay if you have any trouble:
 * {@link http://www.text2pay.com/contact}
 *
 * **************************************************************************
 */



/**
 * Holds the connection information used to authenticate a merchant
 * to Text2Pay API system. See constructor for details.
 *
 * @final
 *
 * @author Braga, Bruno <bruno.braga@gmail.com>
 * @author Martens, Scott <smartens80@gmail.com>
 *
 * @since 0.1
 *
 * @package Text2Pay
 *
 * @subpackage Connection
 *
 */
final class Text2PayApi_Connection {

    /**
     * Holds the API key value passed to the constructor of this class.
     * See constructor documentation for details.
     *
     * This value is retrievable with
     * {@link Text2PayApi_Connection::getApiKey()}
     *
     * @var string
     *
     * @see Text2PayApi_Connection
     * @see Text2PayApi_Connection::getApiKey()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.1
     *
     */
    private $apiKey;

    /**
     * Holds the merchant account username value passed to the constructor
     * of this class. See constructor documentation for details.
     *
     * This value is retrievable with
     * {@link Text2PayApi_Connection::getUsername()}
     *
     * @var string
     *
     * @see Text2PayApi_Connection
     * @see Text2PayApi_Connection::getUsername()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.1
     *
     */
    private $username;

    /**
     * Holds the merchant account password value passed to the constructor
     * of this class. See constructor documentation for details.
     *
     * This value is retrievable with
     * {@link Text2PayApi_Connection::getPassword()}
     *
     * @var string
     *
     * @see Text2PayApi_Connection
     * @see Text2PayApi_Connection::getPassword()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.1
     *
     */
    private $password;

    /**
     * Holds the publisher identification value passed to the constructor
     * of this class. See constructor documentation for details.
     *
     * This value is retrievable with
     * {@link Text2PayApi_Connection::getPublisherId()}
     *
     * @var int
     *
     * @see Text2PayApi_Connection
     * @see Text2PayApi_Connection::getPublisherId()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.1
     *
     */
    private $publisherId;

    /**
     * Holds the source parameter that will be informed to Text2Pay API in any
     * requests using this connection. See constructor documentation for details.
     *
     * This value is retrievable with
     * {@link Text2PayApi_Connection::getSource()}
     *
     * @var string
     *
     * @see Text2PayApi_Connection
     * @see Text2PayApi_Connection::getPublisherId()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     *
     */
    private $source;

    /**
     * Creates a new connection to be used for executing the functionalities
     * available in this wrapper.
     *
     * @param string $apiKey Holds the API Key value, which is provided
     * by Text2Pay Support. Go to
     * <a href="http://merchants.text2pay.com/developers/api_documentation/">http://merchants.text2pay.com/developers/api_documentation/</a>
     * (you will need proper merchant credentials to access contents here)
     * to retrieve your API key.
     *
     * @param int $publisherId Holds the publisher identification value,
     * which is provided by Text2Pay Support. Go to
     * <a href="http://merchants.text2pay.com/developers/api_documentation/">http://merchants.text2pay.com/developers/api_documentation/</a>
     * (you will need proper merchant credentials to access contents here)
     * to retrieve your publisher identification value.
     *
     * @param string $username Holds the merchant account username value,
     * which is provided by Text2Pay Support. Go to
     * <a href="http://merchants.text2pay.com/developers/api_documentation/">http://merchants.text2pay.com/developers/api_documentation/</a>
     * (you will need proper merchant credentials to access contents here)
     * to retrieve your publisher identification value.
     *
     * @param string $password Holds the merchant account password value,
     * which is provided by Text2Pay Support. Go to
     * <a href="http://merchants.text2pay.com/developers/api_documentation/">http://merchants.text2pay.com/developers/api_documentation/</a>
     * (you will need proper merchant credentials to access contents here)
     * to retrieve your publisher identification value.
     *
     * @param string $source Defines the source connecting to the API. This is
     * for advanced use. If you need assistance with this, contact Text2Pay Support.
     *
     * @see Text2PayApi_Connection
     * @see Text2PayApi_Common::validateEmpty()
     *
     * @uses Text2PayApi_Common::validateEmpty() to validate informed arguments
     *
     * @throws Text2PayException in case the required arguments are informed as
     * null or empty.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.1
     *
     */
    public function __construct($apiKey, $publisherId, $username, $password, $source=null) {

        // Initial validations
        Text2PayApi_Common::validateEmpty(array(
                'apiKey'      => $apiKey,
                'publisherId' => $publisherId,
                'username'    => $username,
                'password'    => $password));

        // Set initial values
        $this->apiKey      = $apiKey;
        $this->publisherId = $publisherId;
        $this->username    = $username;
        $this->password    = $password;
        $this->source      = $source;
    }

    /**
     * Returns the API Key value, previously informed
     * this class instantiation.
     *
     * @return The API key value.
     *
     * @see Text2PayApi_Connection
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.1
     *
     */
    public function getApiKey()      {
        return $this->apiKey;
    }

    /**
    * Returns the username value, previously informed upon
    * this class instantiation.
    *
    * @return The API key value.
    *
    * @see Text2PayApi_Connection
    *
    * @author Braga, Bruno <bruno.braga@gmail.com>
    * @author Martens, Scott <smartens80@gmail.com>
    *
    * @since 0.1
    *
    */
    public function getUsername()    {
    return $this->username;
    }

    /**
    * Returns the password value, previously informed upon
     * this class instantiation.
     *
     * @return The API key value.
     *
     * @see Text2PayApi_Connection
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.1
     *
     */
     public function getPassword()    {
     return $this->password;
     }

     /**
      * Returns the publisher identification value, previously informed
      * upon this class instantiation.
      *
      * @return The API key value.
      *
      * @see Text2PayApi_Connection
      *
      * @author Braga, Bruno <bruno.braga@gmail.com>
      * @author Martens, Scott <smartens80@gmail.com>
      *
      * @since 0.1
      *
      */
     public function getPublisherId() {
         return $this->publisherId;
     }

     /**
      * Returns the source value, previously informed
      * upon this class instantiation.
      *
      * @return The source value.
      *
      * @see Text2PayApi_Connection
      *
      * @author Braga, Bruno <bruno.braga@gmail.com>
      * @author Martens, Scott <smartens80@gmail.com>
      *
      * @since 0.3
      *
      */
     public function getSource() {
         return $this->source;
     }
}




/**
 * Represents the base class used for all response classes of functionalities
 * in Text2Pay API.
 *
 * This class can not be instantiated on its own. Use other extended classes.
 *
 * Note: You should never worry about this, as such classes just wrap the
 * 		 contents from API response into a proper object for better usability.
 * 		 Just call the execute() method of a request object, and it should
 * 		 return a proper object of this type.
 *
 * @abstract
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
abstract class Text2PayApi_ResponseBase {

    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_ResponseBase::getRaw()}
     *
     * @var array
     *
     * @see Text2PayApi_ResponseBase
     * @see Text2PayApi_ResponseBase::getRaw()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.1
     *
     */
    private $raw;

    /**
     * The response object with array parsed values from the base response constructor.
     */
    protected $response;


    /**
     * Determines if the {@link Text2PayApi_ResponseBase::getRaw} value is a plain
     * text response or XML data (that would be parsed as array data).
     *
     * @param string $raw the raw response string retrieved from an API call.
     *
     * @return boolean True if the raw is a guessed as XML format (should be
     * treated with XML parsers).
     *
     * @see Text2PayApi_ResponseBase
     *
     * @static
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.5
     *
     */
    public static function isRawResponseXml($raw) {
        return (substr($raw, 0, 1) == "<");
    }
   /**
    * Determines if the {@link Text2PayApi_ResponseBase::getRaw} value is a plain
    * response error or actual data.
    *
    * @param string @text the plain text to be checked for error formatting.
    *
    * @return boolean True if the raw text is an error message (should be treated
    * with {@link Text2PayApiException::initWithPlainResult} method).
    *
    * @see Text2PayApi_ResponseBase
    *
    * @author Braga, Bruno <bruno.braga@gmail.com>
    *
    * @since 0.5
    *
    */
    public static function isPlainRawResponseError($text) {
        $temp = explode(',', $text);
        return (count($temp) == 2 && intval($temp[0] == $temp[0]));
    }

    /**
     * Creates a new response object that represents the value returned by a
     * previous successful Text2Pay API call.
     *
     * @param string $raw The raw value from the API call response.
     *
     * @abstract
     *
     * @see Text2PayApi_ResponseBase
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.2
     *
     * @throws Text2PayException for unexpected errors.
     *
     * @throws Text2PayApiException for all API returned errors.
     *
     */
    public function __construct($raw) {

        $this->raw = $raw;

        // process response
        try {
            // only try to parse if applicable
            if (self::isRawResponseXml($raw)) {
                $this->response = Text2PayApi_Common::xml2Array(simplexml_load_string($raw, null, LIBXML_NOCDATA));

                if (array_key_exists('error_code', $this->response)) {
                    if ($this->response['error_code'] != Text2PayApiException::API_SUCCESS)
                        throw Text2PayApiException::initWithResult($this->response);
                }
            }
            else {
                if (self::isPlainRawResponseError($raw))
                    throw Text2PayApiException::initWithPlainResult($raw);
            }
        }
        catch (Text2PayApiException $taex) {
            throw $taex;
        }
        catch (Exception $ex) {
            throw new Text2PayException(
                    'Unable to properly parse response from API.',
                    Text2PayException::LIB_ERROR_UNKNOWN, $ex);
        }
    }

    /**
     * Returns the raw value of the response object from the API call, useful
     * for troubleshooting purposes.
     *
     * @return array the raw value of the response object from the API call.
     *
     * @see Text2PayApi_ResponseBase
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.1
     *
     */
    public function getRaw() {
        return $this->raw;
    }


    /**
     * Fixes the array inconsistency in XML to PHP object parsing by {@link xml2Array}
     * method (in case of single values, it does not return a sequence array, but
     * an associative array instead).
     *
     * @param array $array
     * @return array a sequence array representation of the associative passed
     * (or does nothing if the array is already sequence).
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.3
     *
     */
    protected function fixXmlPhpArray($array) {
        $arr = array();
        if (Text2PayApi_Common::isAssocArray($array))
            $arr[] = $array;
        else
            $arr = $array;
        return $arr;
    }

    /**
     * Fixes the array inconsistency in XML to PHP object parsing by {@link xml2Array}
     * method (in case of empty values, it does not return a null, but
     * an empty array instead).
     *
     * @param mixed $object
     * @return null if the object is an empty array, or the object itself
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.3
     *
     */
    protected function fixEmptyArray($object) {
        if (is_array($object) && empty($object))
            return null;
        else
            return $object;
    }
}


/**
 * Represents the base class used for all request classes of functionalities
 * in Text2Pay API.
 *
 * This class can not be instantiated on its own. Use other extended classes.
 *
 * Here is a list of available functionalities extending this class:
 *
 * <ul>
 *     <li>{@link Text2PayApi_initiateTransaction_Request}
 *     <li>{@link Text2PayApi_verifyTransaction_Request}
 *     <li>{@link Text2PayApi_completeTransaction_Request}
 *     <li>{@link Text2PayApi_checkTransactionStatus_Request}
 *     <li>{@link Text2PayApi_validateMSISDN_Request}
 *     <li>{@link Text2PayApi_getCarriers_Request}
 *     <li>{@link Text2PayApi_getCountries_Request}
 *     <li>{@link Text2PayApi_getServices_Request}
 *     <li>{@link Text2PayApi_getTerms_Request}
 *     <li>{@link Text2PayApi_getHelpLine_Request}
 * </ul>
 *
 * See each extended class for usage information and additional documentation.
 *
 * @abstract
 *
 * @see Text2PayApi_initiateTransaction_Request
 * @see Text2PayApi_verifyTransaction_Request
 * @see Text2PayApi_completeTransaction_Request
 * @see Text2PayApi_checkTransactionStatus_Request
 * @see Text2PayApi_validateMSISDN_Request
 * @see Text2PayApi_getCarriers_Request
 * @see Text2PayApi_getCountries_Request
 * @see Text2PayApi_getServices_Request
 * @see Text2PayApi_getTerms_Request
 * @see Text2PayApi_getHelpLine_Request
 *
 * @author Braga, Bruno <bruno.braga@gmail.com>
 * @author Martens, Scott <smartens80@gmail.com>
 *
 * @since 0.1
 *
 * @package Text2Pay
 *
 * @subpackage Request
 *
 */
abstract class Text2PayApi_RequestBase {

    /**
     * Holds the API URL location, used to reach Text2Pay servers.
     * This value is hard-coded here, as it will not be interchangeable.
     *
     * @var string
     *
     * @see Text2PayApi_RequestBase
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.1
     *
     */
    public static $url = 'https://api.text2pay.com/v1/';

    /**
     * Holds the API connection information used to communicate with Text2Pay
     * servers.
     *
     * @var Text2PayApi_Connection
     *
     * @see Text2PayApi_RequestBase
     * @see Text2PayApi_Connection
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.1
     *
     */
    private $apiConnection;

    /**
     * Holds the argument array that will be translated into a HTTP GET
     * querystring with the {@link http_build_query()} built-in function.
     * See also {@link Text2PayApi_RequestBase::apiPost()} method.
     *
     * @var array
     *
     * @see http_build_query()
     * @see Text2PayApi_RequestBase::apiPost()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.1
     *
     */
    private $args;

    /**
     * Creates a new Request object for Text2Pay API interconnection.
     * Each extending class, after instantiation, will trigger the
     * {@link Text2PayApi_RequestBase::execute()} method, that will return a
     * corresponding response object.
     *
     * <code>
     * $cn = new Text2PayApiConnection();
     * $o = new Text2PayApi_{function}_Request($cn);
     * $response = $o->execute();
     * </code>
     *
     * @param Text2PayApi_Connection $apiConnection the connection object
     *
     * @throws Text2PayException if the connection is not a valid connection
     *
     * @see Text2PayApi_RequestBase
     * @see Text2PayApi_RequestBase::execute()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.1
     *
     */
    public function __construct($apiConnection) {

        // Validate connection
        if (get_class($apiConnection) != 'Text2PayApi_Connection')
            throw new Text2PayException(
                    "apiConnection must be a Text2PayApiConnection type.",
                    Text2PayException::LIB_ERROR_INVALID_ARG);

        // Set initial values
        $this->apiConnection = $apiConnection;
        $this->args = array();

        // publisher is always part of arguments to be sent to the API
        $this->setArgument('pub_id', $this->apiConnection->getPublisherId());
    }

    /**
     * Sets the argument name and value that is used to build the HTTP GET
     * querystring with the {@link http_build_query()} built-in function,
     * in the format of <i>url?name=value</i>.
     *
     * This method will basically populate the private object {@link args}.
     *
     * See also {@link Text2PayApi_RequestBase::apiPost()} method.
     *
     * @param string $name defines the argument name that will be placed in
     * querystring format as <i>url?name=value</i>.
     *
     * @param mixed $value defines the argument value that will be placed in
     * querystring format as <i>url?name=value</i>.
     *
     * @throws Text2PayException due to validation issues
     *
     * @see http_build_query()
     * @see Text2PayApi_RequestBase::apiPost()
     *
     * @uses Text2PayApi_Common::validateEmpty() to validate informed arguments
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.1
     *
     */
    protected function setArgument($name, $value) {

        // validate passed values
        Text2PayApi_Common::validateEmpty(array($name => $value));
        $this->args[$name] = $value;
    }

    /**
     * Creates a signature string based on HTTP GET querystring elements, used
     * for matching the API Key to Text2Pay servers.
     *
     * The basic algorithm should work as:
     *
     * 	<i>md5(arg1=val1arg2=val2...argN=valN{ApiKey})</i>, having all args
     *  placed in ascending order.
     *
     * See also {@link Text2PayApi_RequestBase::apiPost()} method.
     *
     * @param string $apiKey the Text2Pay API key, available in
     * {@link Text2PayApi_Connection}.
     *
     * @param array $params the key/value arguments used in the URL
     * request.
     *
     * @return string the hashed signature
     *
     * @see Text2PayApi_RequestBase::apiPost()
     *
     * @uses ksort() to order the arguments
     * @uses urlencode() to handle possible encoding issues
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.1
     *
     */
    public static function createSignature($apiKey, $params=null) {

        $str = '';
        $ignoreKeys = array('sig');
        $urlEncodeKeys = array('title', 'trans_ref', 'user_ref', 'browser_ua', 'referrer_url');
        if (!empty($params)) {
            ksort($params);
            foreach ($params as $k=>$v) {
                if(in_array($k, $ignoreKeys))
                	continue;
                if (in_array($k, $urlEncodeKeys))
                    $v = urlencode($v);
                $str .= "$k=$v";
            }
        }
        $str .= $apiKey; // include the API key into the hashing string
        return md5($str);
    }

    /**
     * Executes the HTTP GET by calling the private {@link apiPost()} method,
     * which is purposefully not accessible by extending classes for simplicity
     * reasons.
     *
     *  Here a special validation will be done, to ensure an action has been
     *  properly defined in the arguments to be sent tot the API. Without this,
     *  the API will return an error. This wrapper saves the cost trouble of
     *  network to solve it. However, developers do not need to worry about
     *  this, unless extending on this class manually.
     *
     * @see apiPost()
     *
     * @return array object with all raw values returned from API.
     *
     * @throws Text2PayException In case the argument action was not properly
     * defined, or due to internet connectivity issues, thrown by
     * {@link apiPost()} method.
     *
     * @throws Text2PayApiException For API response issues, thrown by
     * {@link apiPost()} method.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.1
     *
     */
    public function execute() {

        // final validations
        if (!array_key_exists('action', $this->args))
            throw new Text2PayException(
                    'Can not execute without an action defined.');

        // Call API
        return $this->apiPost();
    }

    /**
     * The executing HTTP post URL.
     * Used for debugging and troubleshooting.
     * This is filled if the API is ever called (from {@link apiPost} method).
     *
     * @var string
     */
    public $executedUrl = '';

    /**
     * The raw response from the HTTP request, before parsing into PHP objects.
     * This should be useful for troubleshooting purposes.
     * This is filled if the API is ever called (from {@link apiPost} method).
     *
     * @var string
     */
    public $rawData = '';


    /**
     * The actual CURL execution that communicates with Text2Pay API by HTTP
     * GET request. Here, the arguments prepared for the URL querystring will
     * be properly "stringfied" by the built-in {@link http_build_query()},
     * in addition to the signature that is created by
     * {@link Text2PayApi_RequestBase::createSignature()} method.
     *
     * @return array object with all raw values returned from API.
     *
     * @throws Text2PayException In case the argument action was not properly
     * defined, or due to internet connectivity issues (CURL or HTTP errors).
     *
     * @throws Text2PayApiException For API response issues.
     *
     * @see Text2PayApi_RequestBase::createSignature()
     *
     * @uses curl_init() and related CURL functionalities for HTTP requests.
     * @uses http_build_query() to stringfy the arguments array
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.1
     *
     */
    private function apiPost() {

        $result = array();

        $params = $this->args;

        // include the source if applicable
        $source = $this->apiConnection->getSource();
        if (!empty($source))
            $params['source'] = $source;

        // create our signature hash value
        $params['sig'] = Text2PayApi_RequestBase::createSignature(
                $this->apiConnection->getApiKey(),
                $params);

        // manually build URL for debugging purposes
        $this->executedUrl = Text2PayApi_RequestBase::$url . '?' . http_build_query($params);

        // execute the request
        $this->rawData = Text2PayApi_Common::httpGet(
                Text2PayApi_RequestBase::$url,
                $params,
                $this->apiConnection->getUsername(),
                $this->apiConnection->getPassword());

        return $this->rawData;
    }
}

?>
