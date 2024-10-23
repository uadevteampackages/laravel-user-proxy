<?php

namespace Uadevteampackages\LaravelUserProxy\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;

class MsGraphApiService
{
    protected $client;
    protected $tenant_id;
    protected $client_id;
    protected $client_secret;



    public function __construct()
    {
        // Set the necessary credentials from environment variables
        $this->tenant_id = env('AZURE_TENANT_ID');
        $this->client_id = env('AZURE_CLIENT_ID');
        $this->client_secret = env('AZURE_CLIENT_SECRET');

        // Initialize GuzzleHttp client
        $this->client = new Client([
            'base_uri' => 'https://graph.microsoft.com/v1.0/',
        ]);
    }

   
    
    public function getAccessToken()
    {
        // Use Cache to store the token and avoid requesting a new one each time
        return Cache::remember('ms_graph_token', 3000, function () {
            try {
                $response = $this->client->request('POST', "https://login.microsoftonline.com/{$this->tenant_id}/oauth2/v2.0/token", [
                    'form_params' => [
                        'client_id' => $this->client_id,
                        'scope' => 'https://graph.microsoft.com/.default',
                        'client_secret' => $this->client_secret,
                        'grant_type' => 'client_credentials',
                    ]
                ]);

                $data = json_decode($response->getBody()->getContents(), true);

                return $data['access_token'];
            } catch (RequestException $e) {
                // Log error or handle failure to get token
                throw new \Exception('Failed to retrieve access token from Microsoft Graph API');
            }
        });
    }



    public function getUserInfoByUserPrincipalName($userPrincipalName)
    {
        $token = $this->getAccessToken();

        try {
            $response = $this->client->request('GET', 'https://graph.microsoft.com/v1.0/users/' . $userPrincipalName, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                    'Content-Type' => 'application/json',
                ],
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            return false;
        }
    }


}
