<?php

namespace App\Policies;

use App\Models\ReportFile;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ReportFilePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        if ($user->can('report-file-view-all')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  ReportFile $report_file
     * @return mixed
     */
    public function view(User $user, ReportFile $report_file)
    {
        if ($user->can('report-file-view')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->can('report-file-store')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  ReportFile $report_file
     * @return mixed
     */
    public function update(User $user, ReportFile $report_file)
    {
        if ($user->id == $report_file->user_id) {
            return Response::allow();
        }
        if ($user->can('report-file-update')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  ReportFile $report_file
     * @return mixed
     */
    public function delete(User $user, ReportFile $report_file)
    {
        if ($user->id == $report_file->user_id) {
            return Response::allow();
        }
        if ($user->can('report-file-destroy')) {
            return Response::allow();
        }
    }
}
