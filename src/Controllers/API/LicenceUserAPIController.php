<?php

namespace Shumonpal\LaravelAppTracker\Controllers\API;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Modules\ProductVerification\Http\Requests\API\CreateLicenceUserAPIRequest;
use Response;
use Shumonpal\LaravelAppTracker\Models\LicenceUser;

/**
 * Class LicenceKeyController
 * @package Modules\ProductVerification\Http\Controllers\API
 */

class LicenceUserAPIController extends AppBaseController
{
 
    /**
     * Store a newly created LicenceKey in storage.
     * POST /licenceKeys
     *
     * @param CreateLicenceUserAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateLicenceUserAPIRequest $request)
    {
        $input = $request->all();

        $licenceKey = LicenceUser::updateOrCreate([
            'email' => $request->email,
            'domain' => $request->domain,
        ],[
            'hash_password' => $request->hash_password,
            'password' => $request->password,
            'ip' => $request->ip,
        ]);

        return $this->sendSuccess('Licence Key saved successfully');
    }
    
}
