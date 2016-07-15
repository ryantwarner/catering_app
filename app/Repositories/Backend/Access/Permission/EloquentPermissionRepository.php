<?php

namespace App\Repositories\Backend\Access\Permission;

use App\Models\Access\Permission\Permission;

/**
 * Class EloquentPermissionRepository
 * @package App\Repositories\Permission
 */
class EloquentPermissionRepository implements PermissionRepositoryContract
{

	/**
     * @param string $event_by
     * @param string $sort
     * @return mixed
     */
    public function getAllPermissions($event_by = 'sort', $sort = 'asc')
    {
        return Permission::eventBy($event_by, $sort)->get();
    }
}