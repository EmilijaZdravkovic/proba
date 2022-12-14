<?php

namespace App\Http\Resources;

use App\Models\Pol;
use App\Models\Proizvodjac;
use Illuminate\Http\Resources\Json\JsonResource;

class SatResurs extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $pol = Pol::find($this->polID);
        $proizvodjac = Proizvodjac::find($this->proizvodjacID);

        return [
            'id' => $this->id,
            'proizvodjacID' => $proizvodjac->proizvodjac,
            'model' => $this->model,
            'polID' => $pol->pol,
            'cena' => $this->cena . " EUR"
        ];
    }
}
