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
 * Delete the storable.
 */
(new Query())
    ->delete()
    ->from('aui_crud_demo')
    ->where('storable_id', '=', $_POST['storable_id'])
    ->execute();

/**
 * OK response.
 */
return new Response('OK', 'Success');