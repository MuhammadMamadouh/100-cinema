<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function profile($id)
    {
        $user = User::find($id);

        $followers = $user->followers;
        $reviews = $user->reviews();
        return view('front.user.profile', compact('user', 'reviews', 'followers'));
    }

    public function edit($id)
    {
        $this->middleware('auth');
        $user = User::find($id);
        $reviews = $user->reviews();
        return view('front.user.edit', compact('user', 'reviews'));
    }

    /**
     * Update a specific user
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id)
    {
        $data = $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,id,' . $id,
            'password' => 'required|min:6',
            'site' => 'sometimes|nullable|url',
            'about' => 'string',
            'short_bio' => 'nullable|string|max:255',
            'image' => v_image() . '|nullable',
            'new_password' => 'nullable:confirmed',
            'country' => 'required',

        ]);
        if (request()->has('password')) {
            $data['password'] = bcrypt(request('password'));
        }


//        User::where('id', $id)->update($data);

        $user = User::find($id);

        $user->name = \request()->name;
        $user->email = \request()->email;
        if ($data['new_password'] != '') {
            $user->password = bcrypt(\request()->new_password);
        } else {
            $user->password = bcrypt(\request()->password);
        }
        $user->site = $data['site'];
        $user->about = $data['about'];
        $user->country = $data['country'];
        if (!empty($data['image'])) {
            $data['image'] = request()->file('image')->storeAs('user/', $data['name'] . time() . '.' . request()->image->extension());
            Storage::delete($user->image);
            $user->image = $data['image'];
        }
        $user->save();

//        return \request();
        return redirect('user/' . $user->id)->with('success', 'updated successfully');
    }

    /**
     * Auth can follow user
     *
     * @return \Response
     */
    public function follow()
    {
        $id = \request()->id;
        $user = User::find($id);
        if ($user) {
            try {
                $user->insertFollower($user->id);
                return response(['success' => 'success']);

            } catch (\Illuminate\Database\QueryException $exception) {
                return response(['exception' => $exception->getMessage()]);
            }
        } else {
            return back()->with('this user does not exist');
        }
    }

    /**
     * Auth can follow user
     *
     * @return \Response
     */
    public function deleteFollow()
    {

        $user = User::find(\request()->id);
        if ($user) {
            try {
                $user->deleteFollower($user->id);
                return response(['success' => 'success']);

            } catch (\Illuminate\Database\QueryException $exception) {
                return response(['exception' => $exception->getMessage()]);
            }
        } else {
            return back()->with('this user does not exist');
        }
    }

}
