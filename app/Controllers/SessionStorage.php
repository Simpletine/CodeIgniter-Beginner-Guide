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

namespace App\Controllers;

class SessionStorage extends BaseController
{
    public function index()
    {
        // Start a session
        $session = session();

        // Set session data
        $session->set('username', 'JohnDoe');

        // Retrieve session data
        $username = $session->get('username');
        echo "Username: {$username} <br>";

        // Check if a session variable is set
        if ($session->has('username')) {
            echo 'Username is set in session <br>';
        }

        // Remove a session variable
        $session->remove('username');
        if (! $session->has('username')) {
            echo 'Username is removed in session <br>';
        }

        // Destroy the session
        $session->destroy();
        echo 'Session is destroyed <br>';
    }

    /**
     * --------------------------------------------------------------------
     * Session flashdata and tempdata method available
     * --------------------------------------------------------------------
     * setFlashdata($key, $value): Sets flashdata.
     * getFlashdata($key): Retrieves flashdata.
     * keepFlashdata($key): Keeps flashdata available for another request.
     * markAsFlashdata($key): Marks a regular session variable as flashdata.
     * unmarkFlashdata($key): Unmarks flashdata, making it a regular session variable.
     * getFlashKeys(): Returns an array of flashdata keys.
     * setTempdata($key, $value, $ttl): Sets tempdata with a time-to-live (TTL) value.
     * getTempdata($key): Retrieves tempdata.
     * removeTempdata($key): Removes specific tempdata.
     * markAsTempdata($key, $ttl): Marks a regular session variable as tempdata with a TTL.
     * unmarkTempdata($key): Unmarks tempdata, making it a regular session variable.
     * getTempKeys(): Returns an array of tempdata keys.
     */
    public function flashData()
    {
        // Start a session
        $session = session();

        // 1. Set flashdata
        $session->setFlashdata('flash_message', 'This is a flash message.');
        echo 'Flashdata set.<br>';

        // 2. Retrieve and display flashdata
        $flashMessage = $session->getFlashdata('flash_message');
        echo $flashMessage ? "Flashdata: {$flashMessage}<br>" : 'No flashdata available.<br>';

        // 3. Keep flashdata for another request
        $session->keepFlashdata('flash_message');

        // 4. Set regular session data and mark as flashdata
        $session->set('info', 'This is a regular session data.');
        $session->markAsFlashdata('info');
        echo 'Regular session data marked as flashdata.<br>';

        // 5. Retrieve and display marked flashdata
        $infoMessage = $session->getFlashdata('info');
        echo $infoMessage ? "Marked Flashdata: {$infoMessage}<br>" : 'No marked flashdata available.<br>';

        // 6. Unmark flashdata, making it regular session data again
        $session->setFlashdata('tempData', 'This is flashdata to be unmarked.');
        $session->unmarkFlashdata('tempData'); // Return to regular session tempData
        echo 'Flashdata unmarked.<br>';

        // 7. Get all flashdata keys
        $flashKeys = $session->getFlashKeys();
        echo 'Flashdata keys: <pre>' . print_r($flashKeys, true) . '</pre>';

        // 8. Set tempdata with a time-to-live (TTL) value
        $session->setTempdata('notice', 'This is temp data.', 5); // Expires in 5 seconds
        echo 'Tempdata notice set for 5 seconds.<br>';

        // 9. Retrieve and display tempdata
        $tempNotice = $session->getTempdata('notice');
        echo $tempNotice ? "Tempdata notice: {$tempNotice}<br>" : 'No tempdata available.<br>';

        // 10. Set tempdata to be removed
        $session->setTempdata('toRemove', 'This temp data will be removed.');
        echo 'Tempdata toRemove set.<br>';
        $session->removeTempdata('toRemove');
        echo 'Tempdata toRemove removed.<br>';

        // 11. Mark regular session data as tempdata
        $session->set('tempKey', 'This is regular session data.');
        $session->markAsTempdata('tempKey', 10); // Will expire in 10 seconds
        echo 'Regular session data marked as tempdata.<br>';

        // 12. Unmark tempdata, making it regular session data again
        $session->setTempdata('tempUnmark', 'This is tempdata to be unmarked.', 10);
        $session->unmarkTempdata('tempUnmark'); // Return to regular session tempUnmark
        echo 'Tempdata unmarked.<br>';

        // 13. Get all tempdata keys
        $tempKeys = $session->getTempKeys();
        echo 'Tempdata keys: <pre>' . print_r($tempKeys, true) . '</pre>';
    }
}
