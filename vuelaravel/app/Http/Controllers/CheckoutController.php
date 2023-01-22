<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\checkout;
use App\Mail\Email;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function store(checkout $checkout) 
    {

        $rules = $this->rules();
        // ddd(DB::select('select * from checkouts where created_at = :created', ['created' => now()->format('Y-m-d')]));

        checkout::insert([
            array_merge($this->rules(), [
                'created_at' => now()
            ])
        ]);

        Mail::to($rules['email'])->send(new Email($rules['email'], $rules['quote'], $rules['price']));

        // checkout::create([
        //     'email' => request()->input('email'),
        //     'quote' => request()->input('quote'),
        //     'price' => request()->input('price')
            
        // ]);
        // return with success message?
        return redirect('/');

    }

    public function rules()
    {

        return request()->validate([
            'email' => 'required|email',
            'quote' => 'required',
            'price' => 'required|numeric'
        ]);
    }
}
