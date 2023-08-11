<?php

namespace App\Http\Controllers\Api;

use App\Models\Lead;
use App\Mail\MailToLead;
use App\Mail\MailToAdmin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{

    private $validations = [
        'name'      => 'required|string|min:3|max:80',
        'email'     => 'required|email|max:255',
        'message'   => 'required|string',
    ];

    public function store(Request $request)
    {
        $data = $request->all();

        // validare i dati 
        $validator = Validator::make($data, $this->validations);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ]);
        }

        // salvare i dati nel db
        $newLead = new Lead();
        $newLead->name      = $data['name'];
        $newLead->email     = $data['email'];
        $newLead->message   = $data['message'];
        $newLead->save();

        // inviare mail al lead
        Mail::to($newLead->email)->send(new MailToLead($newLead));

        // inviare mail all'admin
        Mail::to(env('ADMIN_ADDRESS', 'pek@boolpress.com'))->send(new MailToAdmin($newLead));

        // ritornare un valore di success al front
        return response()->json([
            'success' => true,
        ]);

        // return response()->json($request->all());
    }
}
