<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;

class JobPolicy
{

    public function edit(User $user, Job $job): bool
    {
        return $job->employer->user->is($user);
    }

    // Check if the user can delete the job
    public function delete(User $user, Job $job): bool
    {
        return $job->employer->user->is($user);
    }

}
