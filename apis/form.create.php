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
use DynamicSuite\AUI\CrudPostValidation;
use DynamicSuite\Database\Query;

/**
 * Validate for length errors in the given data.
 */
$errors = (new CrudPostValidation())
    ->minimums([
        'name' => 2,
        'description' => 4
    ])
    ->maximums([
        'name' => 32,
        'description' => 64
    ])
    ->prefixMap([
        'name' => 'Storable Name'
    ])
    ->validate();

/**
 * If there are errors.
 *
 * Must return INPUT_ERROR with the $errors as the validated errors.
 */
if ($errors) {
    return new Response('INPUT_ERROR', 'Input validation error', $errors);
}

/**
 * Create the storable.
 */
$new_id = (new Query())
    ->insert([
        'name' => $_POST['name'],
        'description' => $_POST['description']
    ])
    ->into('aui_crud_demo')
    ->execute();

/**
 * OK response.
 */
return new Response('OK', 'Success', $new_id);