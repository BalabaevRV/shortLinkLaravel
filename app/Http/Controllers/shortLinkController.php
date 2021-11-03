<?php

namespace App\Http\Controllers;

use App\Models\Shortlink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class shortLinkController extends Controller
{
    public function getShortLink(Request $request) {
        $rules = [
            "fullLink" => "required|url"
        ];

        $messages = [
            "fullLink.required" => "Нужно указать ссылка",
            "fullLink.url" => "Укажите ссылку в нужном формате"
        ];

        $validator = Validator::make($request->all(), $rules, $messages)->validate();

        do {
            $token = Str::random(6);
        } while (Shortlink::where('token', $token)->first());

        Shortlink::create(["link"=>$request->fullLink, "token"=>$token]);

        $shortLink = $token;

        return view("homepage", compact("shortLink"));
    }

    public function goToFullLink ($token) {
        $fullLink = Shortlink::where('token', $token)->first();

        return redirect($fullLink->link);
    }
}
