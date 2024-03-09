<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $details = Registration::sortable()->paginate(5);
        // $details=Registration::paginate(5);
        $userNames=User::pluck('name', 'id');
        $roles=User::pluck('role', 'id');
        return view('register.index_user',compact('details','userNames','roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('register.create_user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validateForm($request);
        if($request->has('file_path')){

            $file = $request->file('file_path');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $path = 'uploads/profile';
            $file->move($path, $filename);
        }
        $userId = Auth::id();
        Registration::updateOrCreate(
            ['user_id' => $userId], // Search condition
            [ 
                'dob' => $request->dob, 
                'phone_number_1' => $request->phone_number_1,
                'phone_number_2' => $request->phone_number_2, 
                'address_1' => $request->address_1, 
                'address_2' => $request->address_2,
                'file_path' => $path.$filename
            ]
        );
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Registration $registration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Registration $registration)
    {
        return view('register.edit_user',compact('registration'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Registration $registration)
    {
        if ($request->has('file_path')) {
            $file = $request->file('file_path');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;

            $path = 'uploads/profile/';
            $file->move($path, $filename);

            if (File::exists($registration->file_path)) {
            File::delete($registration->file_path);
        }

        $registration->file_path = $path . $filename;
        }

        $registration->update([
                'dob' => $request->dob, 
                'phone_number_1' => $request->phone_number_1,
                'phone_number_2' => $request->phone_number_2, 
                'address_1' => $request->address_1, 
                'address_2' => $request->address_2,
                'is_active' => $request->is_active
         ]);

        return redirect()->route('registrations.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Registration $registration)
    {
        if(File::exists($registration->file_path)){
            File::delete($registration->file_path);
        }
        $registration->delete();
        return back();
    }

    private function validateForm(Request $request)
    {
        $request->validate([
            'dob' => 'required|date',
            'phone_number_1' => 'required|numeric|digits:10',
            'phone_number_2' => 'nullable|numeric|digits:10',
            'file_path' => 'required|file|mimes:jpeg,png,pdf',    
        ]);
    }
}
