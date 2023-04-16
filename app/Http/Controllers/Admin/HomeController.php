<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contacts;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        return view('admin.dashboard');
    }

    public function contacts_list()
    {
        $contacts = Contacts::all();
        return view('admin.contacts.index', compact('contacts'));
    }
}
