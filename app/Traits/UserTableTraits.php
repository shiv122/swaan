<?php

namespace App\Traits;

use App\Models\User;

trait UserTableTraits
{

  public function changeStatus(string $id, bool $status)
  {


    $user =  User::findOrFail($id);
    $user->status = $status;
    $user->save();
    $this->dispatchBrowserEvent(
      'lwToast',
      [
        'title' => 'Success',
        'message' =>  '<span class="text-danger">' . $user->name . '</span> is  ' . ($status ? 'activated' : 'deactivated') . ' successfully',
        'type' => 'success'
      ]
    );
  }
}
