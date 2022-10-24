<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\Admin\User\UpdateRequest;

class UserController extends Controller
{
    protected User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /** @return \Illuminate\Contracts\View\View*/
    public function index()
    {
        return view('admin.user.index', ['users' => User::paginate(20)]);
    }

    /**
     * @return \Illuminate\Contracts\View\View
     * @param int $id
     *
     * */
    public function show($id)
    {
        return view('admin.user.show', ['user' => User::find($id)]);
    }

    /**
     * @return \Illuminate\Contracts\View\View
     * @param int $id
     *
     * */
    public function edit($id)
    {
        return view('admin.user.edit', ['user' => User::find($id)]);
    }

    /**
     * @param UpdateRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request, $id)
    {
        return to_route('admin.user.index', $this->user->updateUser($request, $id));
    }
}
