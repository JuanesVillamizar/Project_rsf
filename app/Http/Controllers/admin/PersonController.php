<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormPersonRequest;
use App\Http\Requests\FormUpdatePersonRequest;
use App\Models\Person;

class PersonController extends Controller
{
    public function index()
    {
        $person = Person::getUser(auth()->user()->id);
//        dd($person);
        $person->isEmpty() ? $person = '' : $person = $person[0];
        return view('admin.my-data.index', compact('person'));
    }

    public function store(FormPersonRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        Person::savePerson($data);
        return back();
    }

    public function update(FormUpdatePersonRequest $request, $id)
    {
        $data = $request->validated();
        $person = Person::getPerson($id)[0];
        $person->update($data);
        return back();
    }
}
