<?php


namespace Victorino\RdCrm\Resources;


use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

abstract class Resource
{
    protected $httpClient;


    public function __construct()
    {
        $this->token = config('rdcrm.token');

        $this->httpClient = new Client([
            'base_uri' => 'https://plugcrm.net/api/v1/',
            'headers' => [
                'Accept'        => 'application/json',
                'Content-Type'  => 'application/json'
            ],
            'query' => ['token' => $this->token],
        ]);
    }

    /**
     * @param string $path
     * @param array $data
     * @return mixed
     */
    protected function post(string $path, array $data) {
        $response = $this->request('POST', $path, $data);
        return $this->processBody($response);
    }

    /**
     * @param string $path
     * @param array $data
     * @return mixed
     */
    protected function put(string $path, array $data) {
        $response = $this->request('PUT', $path, $data);
        return $this->processBody($response);
    }

    /**
     * @param string $path
     * @param array $data
     * @return mixed
     */
    protected function delete(string $path, array $data) {
        $response = $this->request('DELETE', $path, $data);
        return $this->processBody($response);
    }

    /**
     * @param string $path
     * @param array $data
     * @return mixed
     */
    protected function patch(string $path, array $data) {
        $response = $this->request('PATCH', $path, $data);
        return $this->processBody($response);
    }

    /**
     * @param string $path
     * @return string
     */
    protected function sanitalizePath(string $path): string {
        return trim(trim($path),'/');
    }

    /**
     * @param string $method
     * @param $path
     * @param $data
     * @return ResponseInterface
     */
    protected function request(string $method, $path, $data) {
        return $this->httpClient->request(
            $method,
            $this->sanitalizePath($path),
            [
                'json'  => $data
            ]
        );
    }

    /**
     * @param string $path
     * @param array $data
     * @return mixed
     */
    protected function get(string $path, array $data)
    {
        $data = array_merge($data, [
            'token' => $this->token
        ]);
        $response = $this->httpClient->get(
            $this->sanitalizePath($path),
            [
                'query' => $data
            ]
        );
        return $this->processBody($response);
    }

    /**
     * @param ResponseInterface $response
     * @return mixed
     */
    protected function processBody(ResponseInterface $response) {
        return json_decode($response->getBody()->getContents());
    }
}
