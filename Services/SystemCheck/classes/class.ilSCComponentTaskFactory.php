<?php

/* Copyright (c) 1998-2009 ILIAS open source, Extended GPL, see docs/LICENSE */

include_once './Services/SystemCheck/classes/class.ilSCTask.php';

/**
 * Factory for component tasks
 *
 * @author Stefan Meyer <smeyer.ilias@gmx.de>
 */
class ilSCComponentTaskFactory
{
	
	public static function getComponentTask($a_task_id)
	{
		include_once './Services/SystemCheck/classes/class.ilSCTasks.php';
		$group_id = ilSCTasks::lookupGroupId($a_task_id);
		
		include_once './Services/SystemCheck/classes/class.ilSCGroup.php';
		$component_id = ilSCGroup::lookupComponent($group_id);
		
		// this switch should not be used
		// find class by naming convention and component service
		switch($component_id)
		{
			case 'tree':
				include_once './Services/Tree/classes/class.ilSCTreeTasksGUI.php';
				include_once './Services/SystemCheck/classes/class.ilSCTask.php';
				return new ilSCTreeTasksGUI(new ilSCTask($a_task_id));
		}
	}
}
?>