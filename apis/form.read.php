<?php
/**
 * This file is part of the Dynamic Suite AUI CRUD demo package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package DynamicSuite\AuiCrudDemo
 * @author Grant Martin <commgdog@gmail.com>
 * @copyright 2021 Dynamic Suite Team
 * @noinspection PhpUnhandledExceptionInspection
 */

namespace DynamicSuite\AuiCrudDemo;
use DynamicSuite\API\Response;
use DynamicSuite\Database\Query;

/**
 * Read the storable.
 */
$storable = (new Query())
    ->select([
        'storable_id',
        'name',
        'description'
    ])
    ->from('aui_crud_demo')
    ->where('storable_id', '=', $_POST['storable_id'])
    ->execute(fetch_single: true);

/**
 * Return the storable, or some other error.
 */
if (!$storable) {
    return new Response('NOT_FOUND', 'Storable not found');
} else {
    return new Response('OK', 'Success', $storable);
}