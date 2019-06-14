<?php
/**
*
* @package Prune Log Extension
* @copyright (c) 2014 david63
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace david63\prunelog\migrations;

use phpbb\db\migration\migration;

class version_1_0_0 extends migration
{
	public function update_data()
	{
		return array(
			array('config.add', array('prune_log_days', '30')),
			array('config.add', array('prune_log_gc', '86400')),
			array('config.add', array('prune_log_last_gc', '0')),
		);
	}
}
