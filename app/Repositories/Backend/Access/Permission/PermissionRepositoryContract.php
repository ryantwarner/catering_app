<?php

namespace App\Repositories\Backend\Access\Permission;

/**
 * Interface PermissionRepositoryContract
 * @package App\Repositories\Permission
 */
interface PermissionRepositoryContract
{

    /**
     * @param  string  $event_by
     * @param  string  $sort
     * @return mixed
     */
    public function getAllPermissions($event_by = 'sort', $sort = 'asc');
}