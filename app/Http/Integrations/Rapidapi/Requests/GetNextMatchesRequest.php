<?php

namespace App\Http\Integrations\Rapidapi\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetNextMatchesRequest extends Request
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
            'date' => now()->toDateString(),
            'status' => 'NS',
        ];
    }
}
