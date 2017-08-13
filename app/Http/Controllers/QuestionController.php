<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest;

use App\Question;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new question
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try{
            return view('question.contact');

        } catch (\Exception $e){

            $statusCode = $e->getCode();
            return response(array(
            'error' => true,
            'message' => $e->getMessage(),
            ), $statusCode);

        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ContactFormRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactFormRequest $request)
    {
        try {
            // save the details into database
            $customer = array();
            $customer['name'] = $request->input('name');
            $customer['email'] = $request->input('email');
            $customer['message'] = $request->input('message');

            $question = new Question();
            $question->name = $customer['name'];
            $question->email = $customer['email'];
            $question->message = $customer['message'];

            $result = $question->save();
            //$questionId = $result->id;

            // save into Airtable - questions table
            $apiKey = $_ENV['AIRTABLE_API_KEY'];
            $base = $_ENV['AIRTABLE_SPREADSHEET_ID'];
            $table = $_ENV['YOUR_TABLE_NAME'];
            $airtableApiUrl = 'https://api.airtable.com/v0/' . $base . '/' . $table;
            $params = ["fields" => ["Name" => $customer['name'], "Email" => $customer['email'], "Message" => $customer['message']]];
            //$airtableApiUrl = 'https://api.airtable.com/v0/' . $base . '/' . $table . '?maxRecords=10';

            $headers = array(
                'Authorization: Bearer ' . $apiKey
            );

            $airtableResponse = airtableCallByCurlSave($airtableApiUrl, $headers, $params);

            // send mail via mailgun
            \Mail::raw($customer['message'], function($message) use ($customer)
            {
                $message->subject('Customer\'s Query');
                $message->from($customer['email'], $customer['name']);
                $message->to('dhiraj.patra@gmail.com');
            });

            return \Redirect::route('contact')
                ->with('message', 'Thanks for contacting us!');

        } catch (\Exception $e){
            $statusCode = $e->getCode();
            return response(array(
                'error' => true,
                'message' => $e->getMessage(),
            ), $statusCode);

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
