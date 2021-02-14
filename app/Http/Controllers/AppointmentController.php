<?php

namespace App\Http\Controllers;

use App\Model\Appointment;
use Illuminate\Http\Request;
use Validator;

class AppointmentController extends Controller
{
    public function index() {
        return Appointment::all();
    }

    public function show(Appointment $appointment) {
        return $appointment;
    }

    public function store(Request $request) {
        $appointment = Appointment::create($request->all());

        return response()->json($appointment, 201);
    }

    public function update(Request $request, $id) {


        $validator = Validator::make(
            $request->all(), [
                'user' => 'unique:appointments|numeric',
            ]);

        if (!$validator->fails()) {
            $app = Appointment::find($id);
            $app->user = $request->user;
            $app->available = 0;
            $app->save();
            return response()->json($app, 200);
        } else {
            $this->error["errors"] = $validator->errors();
            return response()->json($this->error);
        }

        
    }

    public function delete(Appointment $appointment) {
        $appointment->delete();

        return response()->json(null, 204);
    }

    public function getFirstAvailable() {
        
        $appointment = Appointment::where('available','!=',0)
                        ->orderBy('sede_id','asc')
                        ->orderBy('date','asc')
                        ->orderBy('start_time','asc')
                        ->first();

        return response()->json($appointment, 200);
    }

    public function getOrder() {

        $appointment = Appointment::orderBy('sede_id','asc')
                        ->orderBy('date','asc')
                        ->orderBy('start_time','asc')
                        ->get();

        return response()->json($appointment, 200);
    }

    public function getFiltered(Request $request) {
    
        // return response()->json($request->date, 200);

        $appointments = Appointment::where('date',$request->date)
                        ->where('available','!=',0)
                        ->orderBy('sede_id','asc')
                        ->orderBy('date','asc')
                        ->orderBy('start_time','asc')
                        ->get();
        
        return response()->json($appointments, 200);
    }

    public function getAssigned(Request $request) {

        if ($request->date != null){
            $appointments = Appointment::where('date',$request->date)
                        ->where('available','=',0)
                        ->orderBy('sede_id','asc')
                        ->orderBy('date','asc')
                        ->orderBy('start_time','asc')
                        ->get();
        
            return response()->json($appointments, 200);
        } else {
            $appointments = Appointment::where('available','=',0)
                        ->orderBy('sede_id','asc')
                        ->orderBy('date','asc')
                        ->orderBy('start_time','asc')
                        ->get();
        
            return response()->json($appointments, 200);
        }
        
    }

}
