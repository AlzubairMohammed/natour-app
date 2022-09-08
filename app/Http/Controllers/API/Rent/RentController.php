<?php

namespace App\Http\Controllers\API\Rent;

use App\Http\Controllers\Controller;
use App\Http\Requests\RentRequest;
use App\Http\Resources\RentResource;
use App\Models\Rent;
use App\Repositories\RentRepository;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class RentController extends Controller
{

    public function index()
    {
        $rents = (new RentRepository())->getAll();
        return $this->json('Rent list', [
            'rents' => RentResource::collection($rents)
        ]);
    }

    public function show($id)
    {
        $rent = (new RentRepository())->findById($id);
        return $this->json('rent details', [
            'rent' => (new RentResource($rent))
        ]);
    }

    public function store(RentRequest $request)
    {
        $rent = (new RentRepository())->storeByRequest($request);
        return $this->json('Post Added successfully', [
            'posts' => (new RentResource($rent))
        ]);
    }

    public function update(RentRequest $request, Rent $rent)
    {
        $rent = (new RentRepository())->updateByRequest($request, $rent);
        return $this->json('Post updated successfully', [
            'posts' => (new RentResource($rent))
        ]);
    }

    public function myPosts()
    {
        $customer = auth()->user()->customer;
        $posts = $customer->rents()->isActive()->latest()->get();
        return $this->json('My posts', [
            'posts' => RentResource::collection($posts)
        ]);
    }

    public function rentType()
    {
        $type = config('enums.rent_types');
        return $this->json('Rent Type', [
            'type' => $type
        ]);
    }

    public function destroy(Rent $rent)
    {
        if ($rent) {
            $thumbnails = $rent->thumbnails;

            foreach ($thumbnails as $thumbnail) {
                if (Storage::exists($thumbnail['path'])) {
                    Storage::delete($thumbnail['path']);
                }
            }

            $rent->delete();

            return $this->json('Post is deleted successfully');
        }
        return $this->json('Sorry, Something was wrong', [], Response::HTTP_BAD_REQUEST);
    }
}
