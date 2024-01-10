<?php

namespace Shumonpal\LaravelAppTracker\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Response;
use Shumonpal\LaravelAppTracker\Models\LicenceKey;

/**
 * Class LicenceKeyController
 * @package Modules\ProductVerification\Http\Controllers\API\V1
 */

class LicenceKeyAPIController extends Controller
{

    /**
     * Verify and update the specified LicenceKey.
     * POST /licence-key-verify
     *
     * @param Request $request
     *
     * @return Response
     */
    public function verify(Request $request)
    {
        try {
            $validateUser = Validator::make(
                $request->all(),
                [
                    'code' => 'required',
                    'domain' => 'required',
                ]
            );

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation error',
                    'errors' => $validateUser->errors()
                ], 422);
            }

            $existingKey = LicenceKey::whereCode($request->code)->first();
            if ($existingKey) {
                if ($existingKey->domain) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Licence key already in use: '. $existingKey->domain,
                    ]);
                }

                $existingKey->update(['domain' => $request->domain, 'status' => 2]);
                return response()->json([
                    'success' => true,
                    'message' => 'Licence key updated successfully',
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'You enterd an invalid licence Key',
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Something went to be wrong, please try again letter.',
            ]);
        }
        
        
        
    }

    
}
