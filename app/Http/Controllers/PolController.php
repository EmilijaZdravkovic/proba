<?php

namespace App\Http\Controllers;

use App\Http\Resources\PolResurs;
use App\Models\Pol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PolController extends BaseController
{
    public function index()
    {
        $polovi = Pol::all();
        return $this->uspesnoOdgovor(PolResurs::collection($polovi), 'Vracene su svi polovi.');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'pol' => 'required',
        ]);
        if($validator->fails()){
            return $this->greskaOdgovor($validator->errors());
        }

        $pol = Pol::create($input);

        return $this->uspesnoOdgovor(new PolResurs($pol), 'Novi pol je kreiran.');
    }


    public function show($id)
    {
        $pol = Pol::find($id);
        if (is_null($pol)) {
            return $this->greskaOdgovor('Pol sa zadatim ID-em ne postoji.');
        }
        return $this->uspesnoOdgovor(new PolResurs($pol), 'Pol sa zadatim ID-em je vracen.');
    }


    public function update(Request $request, $id)
    {
        $pol = Pol::find($id);
        if (is_null($pol)) {
            return $this->greskaOdgovor('Pol sa zadatim ID-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'pol' => 'required',
        ]);

        if($validator->fails()){
            return $this->greskaOdgovor($validator->errors());
        }

        $pol->pol = $input['pol'];
        $pol->save();

        return $this->uspesnoOdgovor(new PolResurs($pol), 'Pol je azuriran.');
    }

    public function destroy($id)
    {
        $pol = Pol::find($id);
        if (is_null($pol)) {
            return $this->greskaOdgovor('Pol sa zadatim ID-em ne postoji.');
        }

        $pol->delete();
        return $this->uspesnoOdgovor([], 'Pol je obrisan.');
    }
}
