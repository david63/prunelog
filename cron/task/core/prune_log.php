<?php
/**
*
* @package Prune Log
* @copyright (c) 2014 david63
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace david63\prunelog\cron\task\core;

use phpbb\config\config;
use phpbb\db\driver\driver_interface;
use phpbb\log\log;
use phpbb\user;

class prune_log extends \phpbb\cron\task\base
{
	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var \phpbb\log\log */
	protected $log;

	/** @var \phpbb\user */
	protected $user;

	/**
	* Constructor.
	*
	* @param phpbb_config		$config		The config
	* @param phpbb_db_driver	$db			The db connection
	* @param \phpbb\log\log		$log		Log object
	* @param \phpbb\user		$user		User object
	* @param array				$tables		phpBB db tables
	*/
	public function __construct(config $config, driver_interface $db, log $log, user $user, $tables)
	{
		$this->config	= $config;
		$this->db		= $db;
		$this->log		= $log;
		$this->user		= $user;
		$this->tables	= $tables;
	}

	/**
	* Runs this cron task.
	*
	* @return null
	*/
	public function run()
	{
		if ($this->config['prune_log_days'] > 0)
		{
			$last_log = time() - ($this->config['prune_log_days'] * $this->config['prune_log_gc']);

			$sql = 'DELETE FROM ' . $this->tables['log'] . '
				WHERE log_time < ' . $last_log . '
					AND ' . $this->db->sql_in_set('log_operation', 'LOG_USER_WARNING_BODY', true) . '
					AND ' . $this->db->sql_in_set('log_operation', 'LOG_USER_GENERAL', true);
			$this->db->sql_query($sql);

			$this->log->add('admin', $this->user->data['user_id'], $this->user->ip, 'LOG_PRUNE_LOG');

			$this->config->set('prune_log_last_gc', time(), true);
		}
	}

	/**
	* Returns whether this cron task can run, given current board configuration.
	*
	* @return bool
	*/
	public function is_runnable()
	{
		return (bool) $this->config['prune_log_days'] > 0;
	}

	/**
	* Returns whether this cron task should run now, because enough time
	* has passed since it was last run.
	*
	* @return bool
	*/
	public function should_run()
	{
		return $this->config['prune_log_days'] > 0 && time() > ($this->config['prune_log_last_gc'] + $this->config['prune_log_gc']);
	}
}
