<?php
/**
 * This is helpers functions script call by autoload
 */

/**
 * this will fetch data from airtable
 * @param $url
 * @return mixed
 */
function airtableCallByCurl($url, $headers) {

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HTTPGET, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_URL, $url);
    $entries = curl_exec($ch);
    curl_close($ch);
    $airtableResponse = json_decode($entries, TRUE);

    return $airtableResponse;
}

/**
 * This will insert recode to Airtable
 * @param $url
 * @param $headers
 * @param $params
 * @return mixed
 */
function airtableCallByCurlSave($url, $headers, $params) {

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
    $entries = curl_exec($ch);
    curl_close($ch);
    $airtableResponse = json_decode($entries, TRUE);

    return $airtableResponse;
}