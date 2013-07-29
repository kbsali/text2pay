<?php
/**
 * **************************************************************************
 *
 * File:         exceptions.php
 *
 * Purpose:      Holds all Text2Pay API exceptions.
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
 * Helper class that holds common functionalities used accross different
 * classes of this wrapper.
 *
 * @author Braga, Bruno <bruno.braga@gmail.com>
 *
 * @since 0.1
 *
 * @package Text2Pay
 *
 * @subpackage Helpers
 *
 */
final class Text2PayApi_Common {

    /**
     * Validates the values of an array based on key/value list, throwing
     * {@link Text2PayException} exception if empty.
     *
     * @param array $array A key/value based array, from which the value should
     * be checked for null or empty strings (simple user input validation).
     *
     * @throws Text2PayException In case the value of any of the pair key/value
     * is empty.
     *
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.1
     *
     */
    public static function validateEmpty($array) {

        // Just make sure it can proceed
        if (!isset($array) || !is_array($array) || count($array) == 0)
            throw new Text2PayException(
                    "Invalid use of this method. Refer to doc for details.",
                    Text2PayException::LIB_ERROR_INVALID_ARG);

        foreach($array as $name => $value) {
            if (empty($value) && !($value === false || $value === 0 || $value === 0.0 || $value === '0'))
                throw new Text2PayException(
                        "Invalid value of ${name}. It can not be empty.",
                        Text2PayException::LIB_ERROR_INVALID_ARG);
        }
    }


    /**
     * Verifies if an array is an associative (key/value based instead of indexed list)
     *
     * @param array $array Any array to be tested
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @return TRUE, if the $array is an associative array (key/value based),
     * of FALSE otherwise
     *
     * @since 0.2
     *
     */
    public static function isAssocArray($array) {
        if (!is_array($array))
            return false;
        return (bool)count(array_filter(array_keys($array), 'is_string'));
    }

    /**
     * Executes a HTTP GET request with querystring arguments and credentials.
     *
     * @param string $url the target URL of the HTTP GET request
     *
     * @param array $params a key/value pair array of querystring elements to
     * be passed with the URL. This is optional.
     *
     * @param string $username the username for
     * <a href="http://en.wikipedia.org/wiki/Basic_access_authentication">Basic Authentication</a>
     * If none is passed, no extra headers will be sent.
     *
     * @param string $password the username's password for
     * <a href="http://en.wikipedia.org/wiki/Basic_access_authentication">Basic Authentication</a>
     * If none is passed, no extra headers will be sent.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @return string the raw response from the HTTP GET Request
     *
     * @throws Text2PayException in case of connectivity issues, invalid credentials, etc
     *
     * @since 0.3
     *
     */
    public static function httpGet($url, $params=null, $username=null, $password=null) {

        try {
            // compile request URL
            if (!empty($params))
                $requesturl = $url . '?' . http_build_query($params);
            else
                $requesturl = $url;

            // process the API request
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $requesturl);
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

            // apply credentials if applicable
            if (!empty($username) && !empty($password))
                curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);

            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            $response = curl_exec($ch);

            // validate CURL status
            if(curl_errno($ch))
                throw new Text2PayException(curl_error($ch),
                        Text2PayException::LIB_ERROR_CONNECTIVITY);

            // validate HTTP status code (user/password credential issues)
            $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if ($status_code != 200)
                throw new Text2PayException(
                        "Response from API with Status Code [" . $status_code . "].",
                        Text2PayException::LIB_ERROR_CONNECTIVITY);
        }
        catch (Text2PayException $tex) {
            if ($ch != null) curl_close($ch);
            // just propagate the error
            throw $tex;
        }
        catch(Exception $ex) {
            if ($ch != null) curl_close($ch);
            throw new Text2PayException(
                    'Unable to properly execute request to Text2Pay API.',
                    Text2PayException::LIB_ERROR_UNKNOWN, $ex);
        }

        // simulate finally block
        if ($ch != null) curl_close($ch);

        // return raw response with fixed Carriage Return (Windows issues)
        return preg_replace('/\r\n?/', "\n", $response);
    }


    /**
     * Recursively extracts properties from a {@link SimpleXMLElement} object
     * to an array format, for simplicity of usage.
     *
     * Note: depending on the XML formatting, the array might be dirty formed,
     * 		 with attributes and such placed as keys in the array list. This
     * 		 must be treated manually afterwards.
     *
     * @param SimpleXMLElement $xmlObject the XML object to be converted
     *
     * @return array object representation of the
     * 		   {@link SimpleXMLElement} object.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @example Text2PayApi_Common::xml2Array(@new SimpleXMLElement("&lt;xml..."));
     *
     * @since 0.1
     *
     */
    public static function xml2Array($xmlObject) {
        $out = array();
        foreach ((array) $xmlObject as $index => $node) {
            if (is_object($node) || is_array($node))
                $out[$index] = Text2PayApi_Common::xml2Array($node); // recursive call
            else
                $out[$index] = $node;
        }
        return $out;
    }
}

?>