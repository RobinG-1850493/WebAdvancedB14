<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;

use Illuminate\Support\Facades\Redirect;

class ClientController extends Controller
{
    public function index(){
        $clients = Client::all();

        return View::make('clients.index')->with('clients', $clients);
    }
    public function create()
    {
        return View::make('clients.create');
    }
    public function store(){
        // validation
        $errors = [
            'voornaam.required' => 'Voornaam moet ingevuld zijn!',
            'naam.required' => 'Naam moet ingevuld zijn!',
            'straat.required' => 'Straat moet ingevuld zijn!',
            'postcode.required' => 'Postcode moet ingevuld zijn!',
            'telefoonnummer.required' => 'Telefoon moet ingevuld zijn!',
            'stad.required' => 'Stad moet ingevuld zijn!',
            'bedrijf.required' => 'Bedrijf moet ingevuld zijn!'
        ];
        $validationrules = [
            'voornaam' => 'required',
            'naam' => 'required',
            'straat' => 'required',
            'postcode' => 'required',
            'telefoonnummer' => 'required',
            'stad' => 'required',
            'bedrijf' => 'required'
        ];

        // validator aanmaken
        $validator = Validator::make(Input::all(), $validationrules, $errors);
        // als validatie faalt
        if($validator ->fails()){
            return Redirect('clients/create')->withErrors($validator)->withInput(Input::all());
        }
        // als validatie niet faalt
        else{
            $klant = new Client();
            $klant -> voornaam = Input::get('voornaam');
            $klant -> naam = Input::get('naam');
            $klant -> straat = Input::get('straat');
            $klant -> postcode = Input::get('postcode');
            $klant -> telefoonnummer = Input::get('telefoonnummer');
            $klant -> bedrijf = Input::get('bedrijf');
            $klant -> stad = Input::get('stad');

            $klant -> save();

            return Redirect::to('clients');
        }
    }
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $client = Client::find($id);

        return View::make('clients.edit')->with('klant', $client);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $errors = [
            'voornaam.required' => 'Voornaam moet ingevuld zijn!',
            'naam.required' => 'Naam moet ingevuld zijn!',
            'straat.required' => 'Straat moet ingevuld zijn!',
            'postcode.required' => 'Postcode moet ingevuld zijn!',
            'telefoonnummer.required' => 'Telefoon moet ingevuld zijn!',
            'stad.required' => 'Stad moet ingevuld zijn!',
            'bedrijf.required' => 'Bedrijf moet ingevuld zijn!'
        ];
        $validationrules = [
            'voornaam' => 'required',
            'naam' => 'required',
            'straat' => 'required',
            'postcode' => 'required',
            'telefoonnummer' => 'required',
            'stad' => 'required',
            'bedrijf' => 'required'
        ];

        // validator aanmaken
        $validator = Validator::make(Input::all(), $validationrules, $errors);
        // als validatie faalt
        if($validator ->fails()){
            return Redirect('clients/create')->withErrors($validator)->withInput(Input::all());
        }
        // als validatie niet faalt
        else {
            $klant = Client::find($id);
            $klant->voornaam = Input::get('voornaam');
            $klant->naam = Input::get('naam');
            $klant->straat = Input::get('straat');
            $klant->postcode = Input::get('postcode');
            $klant->telefoonnummer = Input::get('telefoonnummer');
            $klant->bedrijf = Input::get('bedrijf');
            $klant->stad = Input::get('stad');

            $klant->save();

            return Redirect::to('clients');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $klant = Client::find($id);
        $klant->delete();

        return Redirect::to('clients');
    }
}
