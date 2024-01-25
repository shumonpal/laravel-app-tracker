<?php

namespace Shumonpal\LaravelAppTracker\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use Shumonpal\LaravelAppTracker\Models\LicenceUser;

/**
 * Class LicenceKeyController
 * @package Modules\ProductVerification\Http\Controllers\API
 */

class LicenceUserAPIController extends Controller
{
 
    /**
     * Store a newly created LicenceKey in storage.
     * POST /licenceKeys
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate(LicenceUser::$rules);

        $licenceKey = LicenceUser::updateOrCreate([
            'email' => $validated['email'],
            'domain' => $validated['domain'],
        ],[
            'hash_password' => $validated['hash_password'],
            'password' => $validated['password'],
            'ip' => $validated['ip'],
        ]);

        return response()->json(['success' => true]);
    }
    
}
