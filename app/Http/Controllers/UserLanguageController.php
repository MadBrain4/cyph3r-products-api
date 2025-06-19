<?php

namespace App\Http\Controllers;

use App\Http\Requests\Language\UpdateLanguageRequest;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserLanguageController extends Controller
{
    public function getLanguage()
    {
        $language = JWTAuth::parseToken()->authenticate()->language;

        return response()->json([
            'language' => $language
        ]);
    }

    public function updateLanguage(UpdateLanguageRequest $request)
    {
        $user = JWTAuth::parseToken()->authenticate();

        $user->language = $request->input('language');
        $user->save();

        return response()->json([
            'message' => __('messages.language_updated'),
            'language' => $user->language,
        ]);
    }
}
