<?php

namespace App\Http\Controllers;

use App\Http\Resources\SatResurs;
use App\Models\Sat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SatController extends BaseController
{
    public function index()
    {
        $satovi = Sat::all();
        return $this->uspesnoOdgovor(SatResurs::collection($satovi), 'Vraceni su svi satovi.');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'proizvodjacID' => 'required',
            'model' => 'required',
            'polID' => 'required',
            'cena' => 'required'
        ]);
        if($validator->fails()){
            return $this->greskaOdgovor($validator->errors());
        }

        $sat = Sat::create($input);

        return $this->uspesnoOdgovor(new SatResurs($sat), 'Novi sat je kreiran.');
    }


    public function show($id)
    {
        $sat = Sat::find($id);
        if (is_null($sat)) {
            return $this->greskaOdgovor('Sat sa zadatim ID-em ne postoji.');
        }
        return $this->uspesnoOdgovor(new SatResurs($sat), 'Sat sa zadatim ID-em je vracen.');
    }


    public function update(Request $request, $id)
    {
        $sat = Sat::find($id);
        if (is_null($sat)) {
            return $this->greskaOdgovor('Sat sa zadatim ID-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'proizvodjacID' => 'required',
            'model' => 'required',
            'polID' => 'required',
            'cena' => 'required'
        ]);

        if($validator->fails()){
            return $this->greskaOdgovor($validator->errors());
        }

        $sat->proizvodjacID = $input['proizvodjacID'];
        $sat->model = $input['model'];
        $sat->polID = $input['polID'];
        $sat->cena = $input['cena'];
        $sat->save();

        return $this->uspesnoOdgovor(new SatResurs($sat), 'Sat je azuriran.');
    }

    public function destroy($id)
    {
        $sat = Sat::find($id);
        if (is_null($sat)) {
            return $this->greskaOdgovor('Sat sa zadatim ID-em ne postoji.');
        }

        $sat->delete();
        return $this->uspesnoOdgovor([], 'Sat je obrisan.');
    }
}
