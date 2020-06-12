<?php
/*
 * Copyright 2016 MasterCard International.
 *
 * Redistribution and use in source and binary forms, with or without modification, are
 * permitted provided that the following conditions are met:
 *
 * Redistributions of source code must retain the above copyright notice, this list of
 * conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright notice, this list of
 * conditions and the following disclaimer in the documentation and/or other materials
 * provided with the distribution.
 * Neither the name of the MasterCard International Incorporated nor the names of its
 * contributors may be used to endorse or promote products derived from this software
 * without specific prior written permission.
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES
 * OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT
 * SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED
 * TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS;
 * OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER
 * IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING
 * IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF
 * SUCH DAMAGE.
 *
 */

 namespace MasterCard\Api\Disbursements;

 use MasterCard\Core\Model\BaseObject;
 use MasterCard\Core\Model\RequestMap;
 use MasterCard\Core\Model\OperationMetadata;
 use MasterCard\Core\Model\OperationConfig;


/**
 * 
 */
class Disbursement extends BaseObject {



    protected static function getOperationConfig($operationUUID) {
        switch ($operationUUID) {
            case "26c95719-4c2f-43de-b1bf-72d1fcdb1c87":
                return new OperationConfig("/send/#env/v1/partners/{partnerId}/disbursements/{disbursementId}", "read", array(), array());
            case "9929972c-58d1-48b9-9a28-ed5873ab8c7d":
                return new OperationConfig("/send/#env/v1/partners/{partnerId}/disbursements", "query", array("ref"), array());
            case "33eb98e0-b8b9-4557-ae81-cd336f61b32d":
                return new OperationConfig("/send/#env/v1/partners/{partnerId}/disbursements/payment", "create", array(), array());
            
            default:
                throw new \Exception("Invalid operationUUID supplied: $operationUUID");
        }
    }

    protected static function getOperationMetadata() {
        $config = ResourceConfig::getInstance();
        return new OperationMetadata($config->getVersion(), $config->getHost(), $config->getContext(), $config->getJsonNative(), $config->getContentTypeOverride());
    }






    /**
     * Returns objects of type Disbursement by id and optional criteria
     * @param type $id
     * @param type $criteria
     *
     * @throws ApiException - which encapsulates the http status code and the error return by the server
     *
     * @return Disbursement of the response
     */
    public static function readByID($id, $criteria = null)
    {
        $map = new RequestMap();
        if (!empty($id)) {
            $map->set("id", $id);
        }
        if ($criteria != null) {
            $map->setAll($criteria);
        }
        return self::execute("26c95719-4c2f-43de-b1bf-72d1fcdb1c87",new Disbursement($map));
    }






    /**
     * Query objects of type Disbursement by id and optional criteria
     *
     * @param type $criteria
     *
     * @throws ApiException - which encapsulates the http status code and the error return by the server
     *
     * @return Disbursement of the response
     */
    public static function readByReference($criteria)
    {
        return self::execute("9929972c-58d1-48b9-9a28-ed5873ab8c7d",new Disbursement($criteria));
    }
   /**
    * Creates object of type Disbursement
    *
    * @param Map map, containing the required parameters to create a new object
    * @return Disbursement of the response of created instance.
    */
    public static function create($map)
    {
        return self::execute("33eb98e0-b8b9-4557-ae81-cd336f61b32d", new Disbursement($map));
    }







}

