<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(User $user, UpdateRequest $request)
    {
        $data = $request->validated();
        $user->update($data);
        return redirect()->route('user.show', $user->id);
    }
}
