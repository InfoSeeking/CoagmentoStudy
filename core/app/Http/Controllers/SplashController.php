<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\StageProgressService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Validator;
use Auth;
use App\Http\Controllers\StageProgressController;
use App\Utilities\Status;
use App\Models\V2Notification;

class SplashController extends Controller
{
    public function index() {
        if(Auth::check()){
            return redirect('/stages');
//            $stageProgressController = new StageProgressController(App::make(StageProgressService::class));
//            $stageProgressController->getStage();
//            return view('workspace.panel', [
//                'user' => Auth::user(),
//                'projectCount' => 0,
//                'sharedProjectCount' => 0
//            ]);
        }else{
            return view('splash');
        }

    }
    public function notify(Request $req) {
        $validator = Validator::make($req->all(), [
            'email' => 'required|email|unique:v2_notifications,email'
            ]);
        if ($validator->fails()) {
            return Status::fromValidator($validator)->asRedirect('new')->withInput();
        }
        // Store that email.
        $notification = new V2Notification($req->all());
        $notification->save();
        return redirect('new')->with(['emailSaved' => $req->input('email')]);
    }
}
