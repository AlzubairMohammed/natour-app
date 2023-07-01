<?php

namespace App\Repositories;

use App\Http\Requests\RentRequest;
use App\Models\Rent;
use Carbon\Carbon;

class RentRepository extends Repository
{
   public function model()
   {
    return Rent::class;
   }

   public function getAllRents()
   {
    $rents = $this->model()::query();
    return $rents->latest()->get();
   }

   public function getByTodays()
   {
       $rents = $this->model()::whereDate('created_at', Carbon::today());
       return $rents->latest()->paginate(10);
   }

   public function getAll()
   {
       $rent = $this->model()::query();
       
       if (request()->short_by) {
        $rent = $rent->latest('id');
       }

       if (request()->city) {
        $city = request()->city;
        $rent = $rent->whereHas('RentInfo', function ($RentInfo) use ($city) {
            $RentInfo->where('city_id', $city);
        });
       }

       if (request()->rent_type) {
        $rent_type = request()->rent_type;
        $rent = $rent->where('type',$rent_type);
       }
       
       if (request()->area) {
        $area = request()->area;
        $rent = $rent->where('area',$area);
       }

       $male_student = request()->male_student;
       if ($male_student) {
        $rent = $rent->whereHas('ForRent', function ($forRent) use ($male_student) {
            $forRent->where('male_student', '1');
        });
       }
       if (request()->female_student) {
        $rent = $rent->whereHas('ForRent', function ($forRent){
            $forRent->where('female_student', '1');
        });
       }
       if (request()->man_job) {
        $rent = $rent->whereHas('ForRent', function ($forRent){
            $forRent->where('man_job', '1');
        });
       }
       if (request()->women_job) {
        $rent = $rent->whereHas('ForRent', function ($forRent){
            $forRent->where('women_job', '1');
        });
       }
       if (request()->room_number) {
        $rent = $rent->whereHas('ForRent', function ($forRent){
            $forRent->where('room_number', '1');
        });
       }

       $badroom = request()->badroom;
       if ($badroom) {
        if ($badroom == 5) {
            $rent = $rent->where('bad', '>=', $badroom);
        }else{
            $rent = $rent->where('bad', $badroom);
        }
       }

       $washroom = request()->washroom;
       if ($washroom) {
        if ($washroom == 5) {
            $rent = $rent->where('washroom', '>=', $washroom);
        }else{
            $rent = $rent->where('washroom', $washroom);
        }
       }

       $month = request()->month;
       if ($month) {
        $rent = $rent->whereHas('RentInfo', function ($rentinfo) use ($month) {
            $rentinfo->where('month', $month)->latest('id');
        });
       }

       $min = request()->min;
       $max = request()->max;
       if ($min && $max=='') {
        $rent = $rent->whereHas('Cost', function ($cost) use ($min) {
            $cost->where('rent_price', '>=', $min);
        });
       }
       elseif ($max && $min=='') {
        $rent = $rent->whereHas('Cost', function ($cost) use ($max) {
            $cost->where('rent_price', '<=', $max);
        });
       }
       elseif ($min && $max) {
        $rent = $rent->whereHas('Cost', function ($cost) use ($min,$max) {
            $cost->whereBetween('rent_price', [$min, $max]);
        });
       }

        $heighToLow = request()->heigh_to_low;
        if ($heighToLow == 1) {
            $rent->orderBy('price','desc');
        }
        if ($heighToLow == 0) {
            $rent->orderBy('price','asc');
        }
       
       return $rent->isActive()->get();
   }

   public function findById($id)
   {
       return $this->model()::find($id);
   }

   public function storeByRequest(RentRequest $request)
   {
       $customer  = auth()->user()->customer;
       $rent = $this->model()::create([
           'customer_id' => $customer->id,
           'title' => $request->title,
           'description' => $request->description,
           'type' => $request->type,
           'washroom' => $request->washroom,
           'balcony' => $request->balcony,
           'position' => $request->position,
           'bad' => $request->bad,
           'price' => $request->rent_price,
           'room_number'=> $request->room_number,
           'lng'=>$request->lng,
           'lat'=>$request->lat,
           'is_active' => 1,
       ]);

       (new CostRepository())->storeByRequest($request,$rent);
       (new FacilityRepository())->storeByRequest($request,$rent);
       (new ForRentRepository())->storeByRequest($request,$rent);
       (new ReligionRepository())->storeByRequest($request,$rent);
       (new RentInfoRepository())->storeByRequest($request,$rent);
       (new RentThumbnailRepository())->storeByRequest($request,$rent);

       return $rent;
   }

   public function updateByRequest(RentRequest $request, Rent $rent): Rent
   {
        $customer  = auth()->user()->customer;
        $rent->update([
            'customer_id' => $customer->id,
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
            'washroom' => $request->washroom,
            'balcony' => $request->balcony,
            'position' => $request->position,
            'bad' => $request->bad,
            'price' => $request->rent_price,
        ]);

        (new CostRepository())->updateByRequest($request,$rent);
        (new FacilityRepository())->updateByRequest($request,$rent);
        (new ForRentRepository())->updateByRequest($request,$rent);
        (new ReligionRepository())->updateByRequest($request,$rent);
        (new RentInfoRepository())->updateByRequest($request,$rent);
        (new RentThumbnailRepository())->updateByRequest($request,$rent);

        return $rent;
   }

   public function updateStatusById(Rent $rent): Rent
   {
       $rent->update([
           'is_active' => !$rent->is_active
       ]);

       return $rent;
   }
  
}