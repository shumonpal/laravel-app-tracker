<?php

namespace Shumonpal\LaravelAppTracker\Controllers;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Shumonpal\LaravelAppTracker\Models\LicenceUser;

class LicenceUserController extends AppBaseController
{

    /**
     * Display a listing of the LicenceUser.
     *
          * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $users = LicenceUser::latest()
            ->when($search = $request->search, function ($query) use($search) {
                $query->where('domain', 'LIKE', '%'. $search . '%')
                ->orWhere('code', 'LIKE', '%'. $search . '%');
            })
            ->paginate(20)->withQueryString();
        return view('shumonpal::licence-users.index', compact('users'));
    }

 
    /**
     * Remove the specified LicenceUser from storage.
     *
     * @param LicenceUser $licenceUser
     *
     * @return Response
     */
    public function destroy(LicenceUser $licenceUser)
    {
        $licenceUser->delete();

        return redirect(route('app-tracker.licence-users.index'))->with('success', 'User successfully deleted!');
    }
}
