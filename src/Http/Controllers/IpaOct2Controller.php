<?php

namespace Antron\Ipa\Http\Controllers;

use Illuminate\Http\Request;
use Antron\Ipa\Models\IpaOct3;

class IpaOct2Controller extends \App\Http\Controllers\Controller
{

    public function create()
    {
        return view('ipa::ipa_oct2.create');
    }

    public function destroy($id)
    {
        $ipa_oct2 = \Antron\Ipa\Models\IpaOct2::find($id);

        if ($ipa_oct2->hasNotChild()) {
            $ipa_oct2->delete();
        }

        return redirect('ipa_oct2');
    }

    public function edit($id)
    {
        $ipa_oct2 = \Antron\Ipa\Models\IpaOct2::findOrFail($id);

        return view('ipa::ipa_oct2.edit', compact('ipa_oct2'));
    }

    public function index()
    {
        $ipa_oct2s = \Antron\Ipa\Models\IpaOct2::orderBy('value', 'ASC')
                ->get();

        return view('ipa::ipa_oct2.index', compact('ipa_oct2s'));
    }

    public function show($id)
    {
        $ipa_oct2 = \Antron\Ipa\Models\IpaOct2::findOrFail($id);

        $ipa_oct3s = IpaOct3::where('bits', 'LIKE', $ipa_oct2->bits . '.%')
                ->orderBy('value', 'ASC')
                ->get();

        return view('ipa::ipa_oct2.show', compact('ipa_oct2', 'ipa_oct3s'));
    }

    public function store(\Antron\Ipa\Http\Requests\IpaOct2Request $request)
    {
        $ipa_oct2 = new \Antron\Ipa\Models\IpaOct2();

        $ipa_oct2->bits = $request->get('bits');

        $ipa_oct2->save();

        return redirect('ipa_oct2/' . $ipa_oct2->bits);
    }

    public function update(Request $request, $id)
    {
        $ipa_oct2 = \Antron\Ipa\Models\IpaOct2::find($id);

        $ipa_oct2->fill($request->all());

        $ipa_oct2->save();

        return redirect('ipa_oct2/' . $ipa_oct2->bits);
    }

}
