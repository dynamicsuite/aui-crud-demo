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
use DynamicSuite\AUI\CrudRead;
use DynamicSuite\Database\Query;

/**
 * Set up the database read.
 */
$list = (new Query())
    ->select([
        'storable_id',
        'name AS title',
        'description AS subtext'
    ])
    ->from('aui_crud_demo');

/**
 * Read the data.
 */
$crud = (new CrudRead($list))
    ->searchColumns(['name', 'description'])
    ->sortMap([
        'name' => 'title',
        'description' => 'subtext'
    ])
    ->execute();

/**
 * Return the data.
 */
return new Response('OK', 'Success', $crud);