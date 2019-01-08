<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    /**
     * show user's profile that holds his information
     * @param $id
     * @return \View
     */
    public function profile($id)
    {
        // Validate the value...
        $user = User::find($id);
        if ($user) {
            $posts = $user->posts()->orderBy('created_at', 'desc')->limit(2)->get();
            $reviews = $user->reviews()->limit(3)->get();
            $review = $user->review;
            return view('front.user.profile', compact('user', 'reviews', 'posts', 'review'));
        } else {
            abort(404, 'not found');

        }
    }

    /**
     * Edit user profile
     * @param $id
     * @return \View
     */
    public function edit()
    {
        $this->middleware('auth');
        return view('front.user.edit');
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
        return response(['redirectTo' => route('profile', \auth()->user()->id)]);
    }

    /**
     * Auth can follow user
     *
     * @return \Response
     */
    public function follow()
    {
        if (Auth::check()) {
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


    /**
     * show user's reviews on works that he reviewed
     * @param $id
     * @return \View
     * @throws \Throwable
     */
    public function reviews($id)
    {
        $user = User::find($id);

        $reviews = $user->reviews()->simplePaginate(5);

        if (\request()->ajax()) {
            return view('front.user.loads.reviews', compact('user', 'reviews'))->render();
        }
        return view('front.user.reviews', compact('user', 'reviews'));
    }

    /**
     * show user's posts on works that he posted
     * @param $id
     * @return \View
     * @throws \Throwable
     */
    public function posts($id)
    {
        $user = User::find($id);

        $posts = $user->posts()->simplePaginate(5);

        if (\request()->ajax()) {
            return view('front.user.loads.posts', compact('user', 'posts'))->render();
        }
        return view('front.user.posts', compact('user', 'posts'));
    }


}
