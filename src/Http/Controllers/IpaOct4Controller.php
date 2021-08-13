<?php

namespace Antron\Ipa\Http\Controllers;

use Illuminate\Http\Request;

class IpaOct4Controller extends \App\Http\Controllers\Controller
{

    public function create()
    {
        
    }

    public function destroy($id)
    {
        $ipa_oct4 = \Antron\Ipa\Models\IpaOct4::find($id);
        
        $ipa_oct4->delete();

        return redirect('ipa_oct4');
    }

    public function edit($id)
    {
        $ipa_oct4 = \Antron\Ipa\Models\IpaOct4::find($id);

        return view('ipa::ipa_oct4.edit', compact('ipa_oct4'));
    }

    public function index()
    {
        $ipa_oct4s = \Antron\Ipa\Models\IpaOct4::orderBy('value', 'ASC')
                ->get();

        return view('ipa::ipa_oct4.index', compact('ipa_oct4s'));
    }

    public function show($id)
    {
        $ipa_oct4 = \Antron\Ipa\Models\IpaOct4::find($id);

        if (is_null($ipa_oct4)) {
            $bits = $id;

            return view('ipa::ipa_oct4.create', compact('bits'));
        }

        return view('ipa::ipa_oct4.show', compact('ipa_oct4'));
    }

    public function store(Request $request)
    {
        $ipa_oct4 = new \Antron\Ipa\Models\IpaOct4();

        $ipa_oct4->bits = $request->get('bits');

        $ipa_oct4->status = 2;

        $ipa_oct4->save();

        return redirect('ipa_oct4/' . $ipa_oct4->bits);
    }

    public function update(\Antron\Ipa\Http\Requests\IpaOct4Request $request, $id)
    {
        $ipa_oct4 = \Antron\Ipa\Models\IpaOct4::find($id);

        $ipa_oct4->fill($request->all());

        $ipa_oct4->save();

        return redirect('ipa_oct4/' . $ipa_oct4->bits);
    }

}
