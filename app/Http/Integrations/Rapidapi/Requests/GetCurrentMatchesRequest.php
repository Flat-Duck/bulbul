<?php

namespace App\Http\Integrations\Rapidapi\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

use Illuminate\Http\Request as GetRequest;

class GetCurrentMatchesRequest extends Request
{
    /**
     * Define the HTTP method
     *
     * @var Method
     */
    protected Method $method = Method::GET;

    /**
     * Define the endpoint for the request
     *
     * @return string
     */
    public function resolveEndpoint(): string
    {
        return '/fixtures';
    }

        /**
     * Default Query Parameters
     *
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return [
            'timezone' => 'africa/tripoli',
            'live' => 'all',
            'status'=> '1H-HT-2H-ET-BT-P-SUSP-INT-LIVE',
        ];
    }
}
