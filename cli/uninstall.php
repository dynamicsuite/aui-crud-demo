<?php
/**
 * This file is part of the Dynamic Suite AUI CRUD demo package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package DynamicSuite\AUICrudDemo
 * @author Grant Martin <commgdog@gmail.com>
 * @copyright 2021 Dynamic Suite Team
 * @noinspection PhpUnused
 */

namespace DynamicSuite\AuiCrudDemo;
use DynamicSuite\DynamicSuite;
use DynamicSuite\Util\CLI;

/**
 * Create the instance.
 */
require_once __DIR__ . '/../../../include/create_instance.php';

/**
 * Get DSN components.
 */
$db_host = CLI::readDSNKey(DynamicSuite::$cfg->db_dsn, 'host');
$db_name = CLI::readDSNKey(DynamicSuite::$cfg->db_dsn, 'dbname');

/**
 * Drop tables.
 */
CLI::out('Dropping tables...');
$db_err = exec(
    "mysql " .
    "--user=\"" . DynamicSuite::$cfg->db_user . "\" " .
    "--password=\"" . DynamicSuite::$cfg->db_pass . "\" " .
    "--host=\"$db_host\" " .
    "--database=\"$db_name\" " .
    "< \"" . DS_ROOT_DIR . "/packages/aui-crud-demo/sql/drop_tables.sql\""
);
if ($db_err) {
    CLI::err('Error dropping tables!', false);
    CLI::err($db_err);
}