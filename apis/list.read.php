<?php
/**
 * Read the list for the component.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation version 3.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software Foundation,
 * Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301  USA
 *
 * @package aui-crud-demo
 * @author Grant Martin <commgdog@gmail.com>
 * @copyright  2020 Dynamic Suite Team
 * @noinspection PhpUnused
 */

namespace DynamicSuite\Pkg\AuiCrudDemo;
use DynamicSuite\API\Response;
use DynamicSuite\Database\Query;
use DynamicSuite\Pkg\Aui\CrudRead;
use Exception;

try {

    /**
     * The CRUD read takes a query for an argument, build out how your data will be fetched.
     */
    $list = (new Query())
        ->select([
            'storable_id AS id',      // Each returned record MUST have an "id"
            'name AS title',          // "group" components must have a "title"
            'description AS subtext'  // "group" components must have a "subtext"
        ])
        ->from('aui_crud_demo');

    /**
     * Set up the read.
     */
    $crud = (new CrudRead($list))
        /**
         * Columns you want the search to run on.
         */
        ->searchColumns(['name', 'description'])
        /**
         * Sort map.
         *
         * This must map the actual column names "key" to the returned table alias (see $list above).
         */
        ->sortMap([
            'storable_id' => 'id',
            'name' => 'title',
            'description' => 'subtext'
        ])
        ->execute();

    /**
     * Return the component data.
     */
    return new Response('OK', 'Success', $crud);

} catch (Exception $exception) {
    error_log($exception->getMessage());
    return new Response('SERVER_ERROR', 'A server error has occurred');
}