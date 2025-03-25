<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Jobs\StoreUserJob;
use App\Mail\User\PasswordMail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        // TODO: send random password in email and make it queueable
        // StoreUserJob::dispatch($data);

        $password = Str::random(16);
        $data['password'] = Hash::make($password);

        $user = User::firstOrCreate(['email' => $data['email']], $data);

        return redirect()->route('admin.user.index')->with('notification', 'User successfully created.');
    }
}
