<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Store;
use App\Http\Requests\User\Update;
use App\Models\User;
use App\Queries\UsersQueryBuilder;
use Illuminate\View\View;

class UsersController extends Controller
{

    protected UsersQueryBuilder $usersQueryBuilder;

    public function __construct(
        UsersQueryBuilder $usersQueryBuilder
    )
    {
        $this->usersQueryBuilder = $usersQueryBuilder;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(): View
    {
        return view('admin.users.users',
            [
                'usersList' => $this->usersQueryBuilder->getAll()
            ]
        );
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Store $request): \Illuminate\Http\RedirectResponse
    {

    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user): View
    {
        return view('admin.users.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Update $request, User $user): \Illuminate\Http\RedirectResponse
    {

        $user = $user->fill(
            $request->validated()
        );
        $user->isAdmin = $request->get('isAdmin')?1:0;

        if ($user->save()) {
            return \redirect()
                ->route('admin.users.index')
                ->with('success', 'User profile has been update');
        }
        return \back()->with('error', 'User profile not been update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
