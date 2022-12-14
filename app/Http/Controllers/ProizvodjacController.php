<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProizvodjacResurs;
use App\Models\Proizvodjac;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProizvodjacController extends BaseController
{
    public function index()
    {
        $proizvodjaci = Proizvodjac::all();
        return $this->uspesnoOdgovor(ProizvodjacResurs::collection($proizvodjaci), 'Vraceni su svi proizvodjaci.');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'proizvodjac' => 'required',
        ]);
        if($validator->fails()){
            return $this->greskaOdgovor($validator->errors());
        }

        $proizvodjac = Proizvodjac::create($input);

        return $this->uspesnoOdgovor(new ProizvodjacResurs($proizvodjac), 'Novi proizvodjac je kreiran.');
    }


    public function show($id)
    {
        $proizvodjac = Proizvodjac::find($id);
        if (is_null($proizvodjac)) {
            return $this->greskaOdgovor('Proizvodjac sa zadatim ID-em ne postoji.');
        }
        return $this->uspesnoOdgovor(new ProizvodjacResurs($proizvodjac), 'Proizvodjac sa zadatim id-em je vracen.');
    }


    public function update(Request $request, $id)
    {
        $proizvodjac = Proizvodjac::find($id);
        if (is_null($proizvodjac)) {
            return $this->greskaOdgovor('Proizvodjac sa zadatim ID-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'proizvodjac' => 'required',
        ]);

        if($validator->fails()){
            return $this->greskaOdgovor($validator->errors());
        }

        $proizvodjac->proizvodjac = $input['proizvodjac'];
        $proizvodjac->save();

        return $this->uspesnoOdgovor(new ProizvodjacResurs($proizvodjac), 'Proizvodjac je azuriran.');
    }

    public function destroy($id)
    {
        $proizvodjac = Proizvodjac::find($id);
        if (is_null($proizvodjac)) {
            return $this->greskaOdgovor('Proizvodjac sa zadatim ID-em ne postoji.');
        }
        $proizvodjac->delete();
        return $this->uspesnoOdgovor([], 'Proizvodjac je obrisan.');
    }
}
