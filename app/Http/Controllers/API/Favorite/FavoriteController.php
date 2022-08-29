<?php

namespace App\Http\Controllers\API\Favorite;

use App\Http\Controllers\Controller;
use App\Http\Requests\FavoriteRequest;
use App\Http\Resources\FavoriteResource;
use App\Models\Favorite;
use App\Repositories\FavoriteRepository;
use Illuminate\Http\Response;

class FavoriteController extends Controller
{
   
    public function index()
    {
        $favorites = (new FavoriteRepository())->getFavorites();
        return $this->json('customer favorite list',[
            'favorites' => FavoriteResource::collection($favorites)
        ]);
    }

    public function store(FavoriteRequest $request)
    {
        $favorite = (new FavoriteRepository())->storeByRequest($request);

        return $this->json('favorite is added successfully',[
            'favorites' => (new FavoriteResource($favorite))
        ]);
    }

    public function destroy(Favorite $favorite)
    {
        if($favorite){
            $favorite->delete();
            return $this->json('favorite is removed successfully');
       }
       return $this->json('Sorry, Something was wrong',[], Response::HTTP_BAD_REQUEST);
    }
}
