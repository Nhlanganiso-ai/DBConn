<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Api
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Twilio\Rest\Api\V2010\Account\IncomingPhoneNumber\AssignedAddOn;

use Twilio\Exceptions\TwilioException;
use Twilio\Values;
use Twilio\Version;
use Twilio\InstanceContext;


class AssignedAddOnExtensionContext extends InstanceContext
    {
    /**
     * Initialize the AssignedAddOnExtensionContext
     *
     * @param Version $version Version that contains the resource
     * @param string $accountSid The SID of the [Account](https://www.twilio.com/docs/iam/api/account) that created the resource to fetch.
     * @param string $resourceSid The SID of the Phone Number to which the Add-on is assigned.
     * @param string $assignedAddOnSid The SID that uniquely identifies the assigned Add-on installation.
     * @param string $sid The Twilio-provided string that uniquely identifies the resource to fetch.
     */
    public function __construct(
        Version $version,
        $accountSid,
        $resourceSid,
        $assignedAddOnSid,
        $sid
    ) {
        parent::__construct($version);

        // Path Solution
        $this->solution = [
        'accountSid' =>
            $accountSid,
        'resourceSid' =>
            $resourceSid,
        'assignedAddOnSid' =>
            $assignedAddOnSid,
        'sid' =>
            $sid,
        ];

        $this->uri = '/Accounts/' . \rawurlencode($accountSid)
        .'/IncomingPhoneNumbers/' . \rawurlencode($resourceSid)
        .'/AssignedAddOns/' . \rawurlencode($assignedAddOnSid)
        .'/Extensions/' . \rawurlencode($sid)
        .'.json';
    }

    /**
     * Fetch the AssignedAddOnExtensionInstance
     *
     * @return AssignedAddOnExtensionInstance Fetched AssignedAddOnExtensionInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(): AssignedAddOnExtensionInstance
    {

        $headers = Values::of(['Content-Type' => 'application/x-www-form-urlencoded' ]);
        $payload = $this->version->fetch('GET', $this->uri, [], [], $headers);

        return new AssignedAddOnExtensionInstance(
            $this->version,
            $payload,
            $this->solution['accountSid'],
            $this->solution['resourceSid'],
            $this->solution['assignedAddOnSid'],
            $this->solution['sid']
        );
    }


    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string
    {
        $context = [];
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Api.V2010.AssignedAddOnExtensionContext ' . \implode(' ', $context) . ']';
    }
}
