<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\User;
use App\Reservation;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Restaurant;
use Illuminate\Support\Facades\Redirect;


class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user , Reservation $reservation ,Restaurant $restaurant)
    {
        $userCount= $user->where('role','user')->count();
        $newUsersCount=$user->where('role','user')->whereDate('created_at','=',Carbon::today()->toDateString())->count();
        $restaurantCount= $restaurant->count();
        $reservationCount= $reservation->count();

        $dateE = Carbon::now()->startOfMonth(); 
        $siteVisits = $user->where('role', 'user')->whereMonth('created_at', '=', $dateE)->count();

        // return $siteVisits;

        return view('admin.dashboard',compact('userCount','newUsersCount','restaurantCount','reservationCount','siteVisits'));
    }


      //**********************************************//
     //******admins****//
    //**********************************************//


    //show all admins .........................................
    public function showAllAdmins(User $user)
    {
        $users = $user->all();
        return view('admin.allAdmins',compact('users'));
    }

    //add new admin............................................
    public function addAdmin()
    {
        return view('admin.addAdmin');
    }

    // Store a newly created admin............................
    public function storeAdmin(Request $request,User $user)
    {
        $this->validate($request,[
            'UserName' => 'required|min:3|max:50',
            'email' => 'required|email|max:255|unique:users',
            'password'  => 'required|min:8|max:50'

            ]);

        $user->UserName      = $request['UserName'];
        $user->email         = $request['email'];
        $user->password      = bcrypt($request['password']);
        $user->role          = 'admin';
        $user->save();

        // return redirect('/allAdmins')->withFlashMessage('Admin added successfully');
        return redirect('/allAdmins')->with('success', __('site.addedSuccessfully'));

    }



    // Show the form for editing admin the specified resource...........

    public function editAdmin($id)
    {
        $user = User::find($id);
        return view('admin.editAdmin',compact('user'));
    }

    // Update the admin specified resource in storage...........................

    public function updateAdmin(Request $request, $id)
    {
        $this->validate($request,[
          'UserName' => 'required|min:3|max:50',
            'email' => 'required|email|max:255|unique:users',
            'password'  => 'required|min:8|max:50'
            ]);
        $user = User::find($id);
        $user->UserName      = $request['UserName'];
        $user->email         = $request['email'];
        $user->password  = bcrypt($request['password']);


        $user->save();

        $users = $user->all();
        return view('admin.allAdmins',compact('users'))->with('success', __('site.editedSuccessfully'));
    }

    //Remove the admin specified resource from storage.

    public function destroyAdmin($id)
    {
        $user = User::find($id);
        $user->delete();
        return back()->with('success', __('site.deletedSuccessfully'));
    }

    // show all restaurants....................................................
    public function showAllRestaurants(Restaurant $restaurant,User $user)
    {
        $restaurants = $restaurant->all();

        return view('admin.allRestaurants',compact('restaurants'));
    }

    //add new restaurant............................................
    public function addRestaurant()
    {

        return view('admin.addRestaurant');
    }

    // Store a newly created admin............................
    public function storeRestaurant(Request $request,Restaurant $restaurant,User $user)
    {

        $this->validate($request,[
            'RestaurantName'   => 'required|min:2|max:50',
            'RestaurantPhone'  => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email' => 'required|email|max:255|unique:users',
            'password'  => 'required|min:8|max:50'





        ]);
        $admin = User::findOrFail(Auth::user()->id);
              ///add to the user table the infoo of restaurant manger///
        $user->UserName   = $request['RestaurantName'];
        $user->email         = $request['email'];
        $user->password  = bcrypt($request['password']);
        $user->role          = 'RManager';
        $user->save();
           ///add to the restaurant /////////
        $restaurant->RestaurantName   = $request['RestaurantName'];
        $restaurant->RestaurantPhone  = $request['RestaurantPhone'];
        $restaurant->AddedBy            = $admin->UserName;
        $restaurant->RestaurantManager=$user->id;
        $restaurant->save();

        return redirect('/allRestaurants')->with('success', __('site.addedSuccessfully'));
    }



    // Show the form for editing admin the specified resource...........
     /*
    public function editRestaurant($id)
    {
        $restaurant = Restaurant::find($id);
        return view('admin.editRestaurant',compact('restaurant'));
    }


    // Update the admin specified resource in storage...........................

    public function updateRestaurant(Request $request, $id)
    {
        $this->validate($request,[
            'RestaurantName' => 'required|min:2|max:50',
            'RestaurantPhone'         => 'required'
            ]);
        $restaurant = Restaurant::find($id);
        $restaurant->RestaurantName   = $request['RestaurantName'];
        $restaurant->RestaurantPhone  = $request['RestaurantPhone'];

        $restaurant->save();

        return redirect('/allRestaurants')->withFlashMessage('Restaurant updated successfully');
    }    */

    //Remove the admin specified resource from storage.

    public function destroyRestaurant($id)
    {
        $restaurant = Restaurant::find($id);
        $restaurant->delete();
        return back()->with('success', __('site.deletedSuccessfully'));
    }

    public function showAllUsers(User $user)
    {
       $users =$user->all()->where('role','user');

        return view('admin.allUsers',compact('users'));
    }


    //Remove the admin specified resource from storage.

    public function destroyUser($id)
    {
        $restaurant = Restaurant::find($id);
        $restaurant->delete();
        return back()->with('success', __('site.deletedSuccessfully'));
    }


    ///////ADMIN PROFILE.............................///

    public function showProfile($id)
    {
        $user = User::find($id);
        return view('admin.profile');
    }
    public function editProfile(Request $request, $id)
    {
        $user = User::find($id);
        $user->UserName           = $request['UserName'];
        $user->UserPhone          = $request['UserPhone'];
        $user->UserJob            = $request['UserJob'];
        /*not working*/
        $user->UserInterests      = $request['UserInterests'];
        /**/
        $user->UserAbout          = $request['UserAbout'];

        $user->save();

        $users = $user->all();
        return back()->with('success', __('site.editedSuccessfully'));
    }

    public function upload(Request $request,$id)
    {
        $user = User::find($id);
        $pic=Auth::user()->UserPhoto;
        if ($request->hasFile('UserPhoto')) {

            $picName =uploadImage($request->file('UserPhoto'), base_path().'/public/uploads/'.$pic);
            $user->UserPhoto = $picName;
            $user->save();


            return back();
        }
    }
    public function editPassword(Request $request, $id)
    {
        $user = User::find($id);
        $user->password =bcrypt($request->password);
        $user->save();

        return back()->with('success', __('site.editedSuccessfully'));
    }
    
    public function logout(Request $request)
    {

        Auth::logout();

        return redirect('/');
    }
}
