<?php

namespace App\Http\Controllers\API\V1\Proxy;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rule;

class ProxyController
{
    private array $allowedHttpVerbs = ['get', 'post', 'put', 'patch','delete'];

    public function forward(Request $request)
    {
        $request->validate([
            'url' => 'required|url',
            'query' => 'nullable|string',
            'method' => ['required', Rule::in($this->allowedHttpVerbs)],
            'body' => 'sometimes|array',
            'config' => 'sometimes|array',
            'headers' => 'sometimes|array',
            'cookies' => 'nullable',
            'url_encoded' => 'nullable|boolean',
        ]);

        $url = $request->get('url');

        $query = $request->get('query') ?? '';
        $method = strtolower($request->get('method'));
        $body = $request->get('body') ?? [];
        $config = $request->get('config')?? [];
        $headers = $request->get('headers') ?? [];
        $cookies = $request->get('cookies');

        $response = Http::withHeaders($headers);

        if ($method === 'get') {
            $res =  $response->get(url: $url, query: $query);
        }elseif (in_array($method, ['post', 'put', 'patch', 'delete'])) {

            // Hotfix of urlencoded form data
            if(request()->url_encoded == true)
                $res = $response->asForm();
            
            $res = $response->$method(url: $url, data: $body);
        }

        return response($res, 200)
            ->header('Content-Type', $res->header('Content-Type'));
    }
}
