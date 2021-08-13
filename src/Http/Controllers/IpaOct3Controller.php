<?php

namespace Antron\Ipa\Http\Controllers;

use Illuminate\Http\Request;

class IpaOct3Controller extends \App\Http\Controllers\Controller
{

    public function create()
    {
        
    }

    public function destroy($id)
    {
        $ipa_oct3 = \Antron\Ipa\Models\IpaOct3::find($id);

        if ($ipa_oct3->hasNotChild()) {
            $ipa_oct3->delete();
        }

        return redirect('ipa_oct3');
    }

    public function edit($id)
    {
        $ipa_oct3 = \Antron\Ipa\Models\IpaOct3::find($id);

        return view('ipa::ipa_oct3.edit', compact('ipa_oct3'));
    }

    public function index()
    {
        $ipa_oct3s = \Antron\Ipa\Models\IpaOct3::orderBy('value', 'ASC')
                ->get();

        return view('ipa::ipa_oct3.index', compact('ipa_oct3s'));
    }

    public function show($id)
    {
        $ipa_oct3 = \Antron\Ipa\Models\IpaOct3::find($id);

        if (is_null($ipa_oct3)) {

            $bits = $id;

            return view('ipa::ipa_oct3.create', compact('bits'));
        }

        $ipa_oct4s = \Antron\Ipa\Models\IpaOct4::where('bits', 'LIKE', $ipa_oct3->bits . '.%')
                ->orderBy('value', 'ASC')
                ->get();

        return view('ipa::ipa_oct3.show', compact('ipa_oct3', 'ipa_oct4s'));
    }

    public function store(Request $request)
    {
        $ipa_oct3 = new \Antron\Ipa\Models\IpaOct3();

        $ipa_oct3->bits = $request->get('bits');

        $ipa_oct3->status = 2;

        $ipa_oct3->save();

        return redirect('ipa_oct2/' . $ipa_oct3->ipa_oct2()->bits);
    }

    public function update(\Antron\Ipa\Http\Requests\IpaOct3Request $request, $id)
    {
        $ipa_oct3 = \Antron\Ipa\Models\IpaOct3::find($id);

        $ipa_oct3->fill($request->all());

        $ipa_oct3->save();

        return redirect('ipa_oct3/' . $ipa_oct3->bits);
    }

}
