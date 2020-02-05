<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Validator;
class ApiContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = Contact::all();

        return response()->json($contact);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [

            'name'=>'required',
            'address' => 'required',
            'phone' => 'required|min:10|numeric'

        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){

            return response()->json($validator->errors(), 400);

        }
        $contact = new Contact();

        $contact->name = request('name');

        $contact->address = request('address');

        $contact->phone = request('phone');

        $contact->save();

        return response()->json($contact);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::find($id);

        if(!$contact){
            
            return response()->json([

                'message'=>'data not found'

            ],404);

        } 
        return response()->json($contact);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $contact = Contact::find($id);
        if(!$contact){
            
            return response()->json([

                'message'=>'data not found'

            ],404);

        } 
        $contact->name = request('name');
        $contact->address = request('address');
        $contact->phone = request('phone');
        $contact->save();
        return response()->json($contact);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);

        if(!$contact){
            
            return response()->json([

                'message'=>'data not found. So record cannot be deleted.'

            ],404);

        } 

        $contact->delete();

        return response()->json($contact);
    }
}
