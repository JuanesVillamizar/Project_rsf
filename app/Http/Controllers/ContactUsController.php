<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormContactUsRequest;
use App\Models\Contact;

class ContactUsController extends Controller
{
    public function store(FormContactUsRequest $request)
    {
        Contact::saveContact($request->validated());
        return back();
    }
}
