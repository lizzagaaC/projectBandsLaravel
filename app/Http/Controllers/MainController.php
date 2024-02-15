<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Instrument;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendPasswordMail;

class MainController extends Controller
{

    function login(){
        return view("login");
    }

    function loginStore(Request $req){
        $this->validate($req, [
            "name"=>"required",
            "password"=>"required"
        ]);

        if(Auth::attempt(['name' => $req->name, 'password' => $req->password])){
            return redirect()->route("home");
        }

        return back()->withErrors([
            "name"=>"The provided credentials do not match our records",
            "password"=>"The provided credentials do not match our records"
        ]);
    }

    function signup(){
        return view("signup");
    }

    function signupStore(Request $req){
        $this->validate($req, [
            "name"=>"required",
            "bandname"=>"required", 
            "email"=>"required | email",
            "password"=>"required",
            "logo"=>"required | image"
        ]);

        $users = User::where("email", $req->email)->first();

        if(null == $users){
            if ($req->hasFile('logo')) {
                $logo = $req->file('logo');
                $imageName = "uploads/bands/" . time() . '.' . $logo->getClientOriginalExtension();
                $logo->move(public_path('uploads/bands'), $imageName);
            }
    
            if(User::create([
                "name" => $req->name,
                "bandname" => $req->bandname,
                "email" => $req->email,
                "password" => bcrypt($req->password),
                "logo" => $imageName])){
                    return redirect()->route("login");
            }
        } else {
            return back()->withErrors([
                "email"=>"El email ya existe"
            ]);
        }

        
    }

    function home(){

        $userId = Auth::id();

        $instrumentos = Instrument::where('band_id', $userId)->orderBy('id', 'desc')->get();

        return view("home", compact("instrumentos"));
    }

    function newInstrument(){
        return view("newInstrument");
    }

    function createInstrument(Request $req){

        $this->validate($req, [
            "family"=>"required",
            "type"=>"required",
            "brand"=>"required",
            "model"=>"required",
            "state"=>"required",
            "image"=>"required"
        ]);

        $instruments = Instrument::where("serial_number", $req->serial_number)->first();

        if(null == $instruments){
            if ($req->hasFile('image')) {
            $logo = $req->file('image');
            $imageName = "uploads/instruments/" . time() . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('uploads/instruments'), $imageName);
            }

            if(Instrument::create([
                "family"=>$req->family, 
                "type"=>$req->type, 
                "brand"=>$req->brand, 
                "model"=>$req->model, 
                "serial_number"=>$req->serial_number, 
                "acquisition_date"=>$req->acquisition_date, 
                "state"=>$req->state, 
                "comment"=>$req->comment, 
                "image"=>$imageName, 
                "band_id"=>Auth::id()])){
                    return redirect()->route("home");
            }
        } else {
            return back()->withErrors([
                "serial_number"=>"El número de serie ya existe"
            ]);
        }

    }

    function logout(){
        Auth::logout();
        return redirect()->route("login");
    }

    function forgetPass(){
        return view("forgetPass");
    }

    function sendMail(Request $req){
        $this->validate($req, [
            "email"=>"required | email",
            "password"=>"required"
        ]);

        $user = User::where("email", $req->email)->first();

        if($user){
            $newPassword = $req->password;

            $user->password = bcrypt($newPassword);
            $user->save();

            Mail::to($user->email)->send(new SendPasswordMail($user, $newPassword));

            return redirect()->route("login");
        } else {
            return back()->withErrors([
                "email" => "Email no existente"
            ])->onlyInput("email");
        }
    }

    public function generatePDF(Request $request){
        $userId = Auth::id();
        $instrumentos = Instrument::where('band_id', $userId)->orderBy('id', 'desc')->get();
        
        /*$pdf = PDF::loadView('pdf', compact('instrumentos'));

        return $pdf->download('instrumentos.pdf');*/
    }

    
}
