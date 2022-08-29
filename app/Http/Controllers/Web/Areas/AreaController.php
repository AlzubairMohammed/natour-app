<?php

namespace App\Http\Controllers\Web\Areas;

use App\Http\Controllers\Controller;
use App\Http\Requests\AreaAdminRequest;
use App\Models\Area;
use App\Models\City;
use App\Repositories\AreaRepository;
use App\Repositories\CityRepository;

class AreaController extends Controller
{
    public function index()
    {
        $areas = (new AreaRepository())->getAll();
        $cities = (new CityRepository())->getAll();
        return view('areas.index', compact('areas','cities'));
    }

    public function store(AreaAdminRequest $request)
    {
        (new AreaRepository())->storeByRequest($request);
        return redirect()->back();
    }

    public function update(AreaAdminRequest $request, Area $area)
    {
        (new AreaRepository())->updateByRequest($request,$area);
        return redirect()->back();
    }
}
