<?php

declare(strict_types=1);

/**
 * This file is part of CodeIgniter 4 framework.
 *
 * (c) 2021 CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param array|null $arguments
     *
     * @return RequestInterface|ResponseInterface|string|void
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        // Start a session
        $session = session();

        // $session->set('isLoggedIn', true);

        // Check session
        if (! $session->get('isLoggedIn')) {
            // If not logged in, run logic
            echo 'Please login before continue';

            exit;
        }
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param array|null $arguments
     *
     * @return ResponseInterface|void
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // This method will be executed after the controller action.

        // Log the request and response data
        $logger = \Config\Services::logger();

        // Log request information
        $logger->info('Request URL: ' . $request->getUri());
        $logger->info('Request Method: ' . $request->getMethod());
        $logger->info('Request Headers: ' . json_encode($request->getHeaders()));
        $logger->info('Request Body: ' . $request->getBody());

        // Log response information
        $logger->info('Response Status Code: ' . $response->getStatusCode());
        $logger->info('Response Headers: ' . json_encode($response->getHeaders()));
        $logger->info('Response Body: ' . $response->getBody());
    }
}
