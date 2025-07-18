<?php

namespace App\Http\Controllers\Backend\Landlord;

use App\Http\Controllers\Controller;
use App\Models\StorageType;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class WarehouseController extends Controller
{
    private function processData($items)
    {
        foreach($items as $item) {
            $item->action = '
            <a href="'. route('landlord.warehouses.edit', $item->id) .'" class="action-button edit-button" title="Edit"><i class="bi bi-pencil-square"></i></a>
            <a id="'.$item->id.'" class="action-button delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            switch ($item->status) {
                case 1:
                    $item->status = '<span class="status active-status">Active</span>';
                    break;

                case 2:
                    $item->status = '<span class="status pending-status">Pending</span>';
                    break;

                default:
                    $item->status = '<span class="status inactive-status">Inactive</span>';
                    break;
            }
        }

        return $items;
    }

    public function index(Request $request)
    {
        $user = Auth::user();
        $pagination = $request->pagination ?? 10;
        $items = $user->warehouses()->orderBy('id', 'desc')->paginate($pagination);
        $items = $this->processData($items);

        return view('backend.landlord.warehouses.index', [
            'items' => $items,
            'pagination' => $pagination
        ]);
    }

    public function create()
    {
        $storage_types = StorageType::where('status', 1)->get();

        return view('backend.landlord.warehouses.create', [
            'storage_types' => $storage_types
        ]);
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:0|max:255',
            'address_name' => 'required|min:0|max:255',
            'address_en' => 'required|min:0|max:255',
            'city_en' => 'required|min:0|max:255',
            'address_ar' => 'required|min:0|max:255',
            'city_ar' => 'required|min:0|max:255',
            'latitude' => 'required|min:0|max:255',
            'longitude' => 'required|min:0|max:255',
            'storage_type_id' => 'required|integer',
            'total_area' => 'required',
            'total_pallets' => 'required|integer',
            'available_pallets' => 'required|integer',
            'pallet_dimension' => 'required',
            'temperature_type' => 'required|in:dry,ambient,cold,freezer',
            'temperature_range' => 'required',
            'wms' => 'required|in:yes,no',
            'equipment_handling' => 'required|in:yes,no',
            'temperature_sensor' => 'required|in:yes,no',
            'humidity_sensor' => 'required|in:yes,no',
            'new_thumbnail' => 'max:30720',
            'new_images.*' => 'max:30720',
            'new_videos.*' => 'max:204800',
            'new_licenses.*' => 'max:30720',
            'status' => 'required|in:0,1,2'
        ], [
            'address_name' => 'Address field is required.',
            'address_en' => 'Address field is required.',
            'city_en' => 'Address field is required.',
            'address_ar' => 'Address field is required.',
            'city_ar' => 'Address field is required.',
            'latitude' => 'Address field is required.',
            'longitude' => 'Address field is required.',
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'error' => 'Creation Failed!',
                'route' => route('landlord.warehouses.index')
            ]);
        }

        if($request->file('new_thumbnail')) {
            $thumbnail = $request->file('new_thumbnail');
            $thumbnail_name = Str::random(40) . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->storeAs('backend/warehouses', $thumbnail_name);
        }
        else {
            $thumbnail_name = $request->old_thumbnail;
        }

        $new_images = [];
        if($request->file('new_images')) {
            foreach($request->file('new_images') as $image) {
                $image_name = Str::random(40) . '.' . $image->getClientOriginalExtension();
                $image->storeAs('backend/warehouses', $image_name);
                $new_images[] = $image_name;
            }
        }

        $new_videos = [];
        if($request->file('new_videos')) {
            foreach($request->file('new_videos') as $video) {
                $video_name = Str::random(40) . '.' . $video->getClientOriginalExtension();
                $video->storeAs('backend/warehouses', $video_name);
                $new_videos[] = $video_name;
            }
        }

        $new_licenses = [];
        if($request->file('new_licenses')) {
            foreach($request->file('new_licenses') as $license) {
                $license_name = Str::random(40) . '.' . $license->getClientOriginalExtension();
                $license->storeAs('backend/warehouses', $license_name);
                $new_licenses[] = $license_name;
            }
        }

        $data = $request->except(
            'old_thumbnail',
            'new_thumbnail',
            'old_images',
            'new_images',
            'old_videos',
            'new_videos',
            'old_licenses',
            'new_licenses'
        );

        $user = Auth::user();
        $data['thumbnail'] = $thumbnail_name;
        $data['user_id'] = $user->id;
        $data['images'] = $new_images ? json_encode($new_images) : null;
        $data['videos'] = $new_videos ? json_encode($new_videos) : null;
        $data['licenses'] = $new_licenses ? json_encode($new_licenses) : null;
        $warehouse = Warehouse::create($data);  

        return redirect()->route('landlord.warehouses.edit', $warehouse)->with([
            'success' => "Update Successful!",
            'route' => route('landlord.warehouses.index')
        ]);
    }

    public function edit(Warehouse $warehouse)
    {
        $storage_types = StorageType::where('status', 1)->get();

        return view('backend.landlord.warehouses.edit', [
            'warehouse' => $warehouse,
            'storage_types' => $storage_types
        ]);
    }

    public function update(Request $request, Warehouse $warehouse)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:0|max:255',
            'address_name' => 'required|min:0|max:255',
            'address_en' => 'required|min:0|max:255',
            'city_en' => 'required|min:0|max:255',
            'address_ar' => 'required|min:0|max:255',
            'city_ar' => 'required|min:0|max:255',
            'latitude' => 'required|min:0|max:255',
            'longitude' => 'required|min:0|max:255',
            'storage_type_id' => 'required|integer',
            'total_area' => 'required',
            'total_pallets' => 'required|integer',
            'available_pallets' => 'required|integer',
            'pallet_dimension' => 'required',
            'temperature_type' => 'required|in:dry,ambient,cold,freezer',
            'temperature_range' => 'required',
            'wms' => 'required|in:yes,no',
            'equipment_handling' => 'required|in:yes,no',
            'temperature_sensor' => 'required|in:yes,no',
            'humidity_sensor' => 'required|in:yes,no',
            'new_thumbnail' => 'max:30720',
            'new_images.*' => 'max:30720',
            'new_videos.*' => 'max:204800',
            'new_licenses.*' => 'max:30720',
            'status' => 'required|in:0,1,2'
        ], [
            'address_name' => 'Address field is required.',
            'address_en' => 'Address field is required.',
            'city_en' => 'Address field is required.',
            'address_ar' => 'Address field is required.',
            'city_ar' => 'Address field is required.',
            'latitude' => 'Address field is required.',
            'longitude' => 'Address field is required.',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'error' => 'Update Failed!',
                'route' => route('landlord.warehouses.index')
            ]);
        }

        if($request->file('new_thumbnail')) {
            if($request->old_thumbnail) {
                Storage::delete('backend/warehouses/' . $request->old_thumbnail);
            }

            $thumbnail = $request->file('new_thumbnail');
            $thumbnail_name = Str::random(40) . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->storeAs('backend/warehouses', $thumbnail_name);
        }
        else if($request->old_thumbnail == null) {
            if($warehouse->thumbnail) {
                Storage::delete('backend/warehouses/' . $warehouse->thumbnail);
            }
            $thumbnail_name = null;
        }
        else {
            $thumbnail_name = $request->old_thumbnail;
        }

        // Images
            $existing_images = json_decode($warehouse->images ?? '[]', true);
            $current_images  = json_decode(htmlspecialchars_decode($request->old_images ?? '[]'), true);

            foreach(array_diff($existing_images, $current_images) as $image) {
                Storage::delete('backend/warehouses/' . $image);
            }

            if($request->file('new_images')) {
                foreach($request->file('new_images') as $image) {
                    $image_name = Str::random(40) . '.' . $image->getClientOriginalExtension();
                    $image->storeAs('backend/warehouses', $image_name);
                    $current_images[] = $image_name;
                }
            }
            
            $images = $current_images ? json_encode($current_images) : null;
        // Images

        // Videos
            $existing_videos = json_decode($warehouse->videos ?? '[]', true);
            $current_videos  = json_decode(htmlspecialchars_decode($request->old_videos ?? '[]'), true);

            foreach(array_diff($existing_videos, $current_videos) as $video) {
                Storage::delete('backend/warehouses/' . $video);
            }

            if($request->file('new_videos')) {
                foreach($request->file('new_videos') as $video) {
                    $video_name = Str::random(40) . '.' . $video->getClientOriginalExtension();
                    $video->storeAs('backend/warehouses', $video_name);
                    $current_videos[] = $video_name;
                }
            }
            
            $videos = $current_videos ? json_encode($current_videos) : null;
        // Videos

        // Licenses
            $existing_licenses = json_decode($warehouse->licenses ?? '[]', true);
            $current_licenses  = json_decode(htmlspecialchars_decode($request->old_licenses ?? '[]'), true);

            foreach(array_diff($existing_licenses, $current_licenses) as $license) {
                Storage::delete('backend/warehouses/' . $license);
            }

            if($request->file('new_licenses')) {
                foreach($request->file('new_licenses') as $license) {
                    $license_name = Str::random(40) . '.' . $license->getClientOriginalExtension();
                    $license->storeAs('backend/warehouses', $license_name);
                    $current_licenses[] = $license_name;
                }
            }
            
            $licenses = $current_licenses ? json_encode($current_licenses) : null;
        // Licenses

        $data = $request->except(
            'old_thumbnail',
            'new_thumbnail',
            'old_images',
            'new_images',
            'old_videos',
            'new_videos',
            'old_licenses',
            'new_licenses',
        );

        $data['thumbnail'] = $thumbnail_name;
        $data['images'] = $images;
        $data['videos'] = $videos;
        $data['licenses'] = $licenses;
        $warehouse->fill($data)->save();
        
        return redirect()->back()->with([
            'success' => "Update Successful!",
            'route' => route('landlord.warehouses.index')
        ]);
    }

    public function destroy(Warehouse $warehouse)
    {
        $warehouse->delete();

        return redirect()->back()->with('delete', 'Successfully Deleted!');
    }

    public function filter(Request $request)
    {
        if($request->action == '⟲ Reset Filter') {
            return redirect()->route('landlord.warehouses.index');
        }

        $name = $request->name;
        $address = $request->address;
        $order_by = $request->order_by;
        $status = $request->status;

        $user = Auth::user();
        $items = $user->warehouses();

        if($name) {
            $items->where('name', 'like', '%' . $name . '%');
        }

        if($address) {
            $items->where(function($data) use ($address) {
                $data->where('address_en', 'like', "%{$address}%")
                ->orWhere('address_ar', 'like', "%{$address}%");
            });
        }

        if($order_by == 'a-z') {
            $items->orderBy('id', 'asc');
        }
        else {
            $items->orderBy('id', 'desc');
        }

        if($status != null) {
            $items->where('status', $status);
        }

        $pagination = $request->pagination ?? 10;
        $items = $items->paginate($pagination);
        $items = $this->processData($items);

        return view('backend.landlord.warehouses.index', [
            'items' => $items,
            'pagination' => $pagination,
            'name' => $name,
            'address' => $address,
            'order_by' => $order_by,
            'status' => $status
        ]);
    }
}