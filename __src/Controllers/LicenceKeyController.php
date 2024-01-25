<?php

namespace Shumonpal\LaravelAppTracker\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use Shumonpal\LaravelAppTracker\Models\LicenceKey;

class LicenceKeyController extends Controller
{

    /**
     * Display a listing of the LicenceKey.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $licences = LicenceKey::latest()
            ->when($search = $request->search, function ($query) use($search) {
                $query->where('domain', 'LIKE', '%'. $search . '%')
                ->orWhere('code', 'LIKE', '%'. $search . '%');
            })
            ->paginate(20)->withQueryString();
        return view('shumonpal::licence-keys.index', compact('licences'));
    }


    /**
     * Store a newly created LicenceKey in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate(LicenceKey::rules());

        LicenceKey::create($validated);

        return redirect(route('app-tracker.licence-keys.index'))->with('success', 'Licence key successfully created!');
    }


    /**
     * Remove the specified LicenceKey from storage.
     *
     * @param LicenceKey $licenceKey
     *
     * @return Response
     */
    public function destroy(LicenceKey $licenceKey)
    {
        $licenceKey->delete();

        return redirect(route('app-tracker.licence-keys.index'))->with('success', 'Licence key successfully deleted!');
    }
}
