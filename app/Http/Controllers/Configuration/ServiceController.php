<?php

namespace App\Http\Controllers\Configuration;

use App\Http\Controllers\Controller;
use App\Models\Configuration\Service;
use App\Models\Configuration\SubService;
use App\Models\Configuration\TariffCapacity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function index()
    {
        $models = Service::with('sub_services.capacity')->orderBy('id', 'DESC')->get();
        return response([
            'msg'=> 'Success',
            'data'=> $models
        ],200);
    }

    public function iplc_list()
    {
        $models = Service::leftJoin('sub_services','sub_services.service_id','services.id')
        ->leftJoin('tariff_capacities','tariff_capacities.sub_service_id','sub_services.id')
        ->select(
            'services.id',
            'services.service',
            'sub_services.id as sub_service_id',
            'sub_services.sub_service',
            'tariff_capacities.id as tariff_id',
            'tariff_capacities.capacity_name',
            'tariff_capacities.charge'
        )->orderBy('id', 'DESC')->get();
        return response([
            'msg'=> 'Success',
            'data'=> $models
        ],200);
    }

    public function update_capacity(Request $request)
    {
        TariffCapacity::where('id', $request->tariff_id)->update([
            'capacity_name'=> $request->capacity_name,
            'charge'=> $request->charge
        ]);
        return response([
            'msg'=> 'Success'
        ],200);
    }


    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            if ($request->id) {
                $item = Service::find($request->id);
                if ($item) {
                    $model = Service::where('id', $item->id)->update([
                        'service'=> $request->service
                    ]);
                    $sub_model = SubService::where('service_id', $item->id)->get();
                    foreach ($sub_model as $key => $value) {
                        $value->create_capacity()->delete();
                        $value->delete();
                    }

                    foreach ($request->sub_service as $key => $value) {
                        $sub_model = SubService::create([
                            'service_id'=> $request->id,
                            'sub_service'=> $value['sub_service']
                        ]);

                        foreach ($value['capacity'] as $key => $item) {
                            TariffCapacity::create([
                                'sub_service_id'=> $sub_model->id,
                                'capacity_name'=> $item['capacity_name']
                            ]);
                        }
                    }
                }
            }else{
                $model = Service::create($request->all());

                foreach ($request->sub_service as $key => $value) {
                    $sub_model = SubService::create([
                        'service_id'=> $model->id,
                        'sub_service'=> $value['sub_service']
                    ]);

                    foreach ($value['capacity'] as $key => $item) {
                        TariffCapacity::create([
                            'sub_service_id'=> $sub_model->id,
                            'capacity_name'=> $item['capacity_name']
                        ]);
                    }
                }
            }
            // $model->create_sub_service()->delete();
            // $model->create_sub_service()->createMany($request->sub_service);

            DB::commit();
            return response([
                'msg'=> 'Success',
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response([
                'msg'=> 'ERROR',
            ], 500);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy(Request $request)
    {
        Service::where('id', $request->id)->update([
            'status'=> 0
        ]);

        return response([
            'msg'=> 'Success',
        ], 200);
    }
}
