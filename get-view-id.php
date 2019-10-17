<?php

class viewId {

    public function __construct($url, $accessToken) {
        $client = new Google_Client();
        $client->setAuthConfig( '<PATH_TO_CLIENT_SECRETS>/client_secrets.json');
        $client->addScope(Google_Service_Analytics::ANALYTICS_READONLY);
        $client->setAccessToken($accessToken);

        // Get user analytics data
        $analytics = new Google_Service_Analytics($client);

        //Call function to get VIEW_ID
        getViewId($analytics, $url);
    }

    function getViewId($analytics, $url) {
        /**
         * Note: This code assumes you have an authorized Analytics service object.
         * See the Account Summaries Developer Guide for details.
         */

        /**
         * Requests a list of all account summaries for the authorized user.
         */
        try {
            $accounts = $analytics->management_accountSummaries
                ->listManagementAccountSummaries();
        } catch (apiServiceException $e) {
            print 'There was an Analytics API service error '
                . $e->getCode() . ':' . $e->getMessage();

        } catch (apiException $e) {
            print 'There was a general API error '
                . $e->getCode() . ':' . $e->getMessage();
        }

        /**
         * The results of the list method are stored in the accounts object.
         * The following code shows how to iterate through them.
         */
        foreach ($accounts->getItems() as $account) {

            // Iterate through each Property.
            foreach ($account->getWebProperties() as $property) {

                // Check for Input domain
                if ($property->getWebsiteUrl() === $url) {
                    foreach ($property->getProfiles() as $profile) {
                        // Get VIEW_ID of this domain.
                        echo $profile->getId();
                    }
                }
            }
        }
    }

}

//EOF