<?php

namespace App\Http\Controllers\Backend\Landlord;

use App\Http\Controllers\Controller;
use App\Models\License;
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
        $licenses = License::where('status', 1)->get();

        return view('backend.landlord.warehouses.create', [
            'storage_types' => $storage_types,
            'licenses' => $licenses,
        ]);
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_en' => 'required|min:3|max:255',
            'description_en' => 'required',
            'address_name' => 'required|min:3|max:255',
            'address_en' => 'required|min:3|max:255',
            'city_en' => 'required|min:3|max:255',
            'address_ar' => 'required|min:3|max:255',
            'city_ar' => 'required|min:3|max:255',
            'latitude' => 'required|min:3|max:255',
            'longitude' => 'required|min:3|max:255',
            'storage_type_id' => 'required|integer',
            'total_area' => 'required',
            'total_pallets' => 'required|integer',
            'available_pallets' => 'required|integer',
            'rent_per_pallet' => 'required|numeric|min:1',
            'pallet_dimension' => 'required|in:120x80x150,120x100x150,other',
            'temperature_type' => 'required|in:dry,ambient,cold,freezer',
            'temperature_range' => 'required',
            'wms' => 'required|in:yes,no',
            'equipment_handling' => 'required|in:yes,no',
            'temperature_sensor' => 'required|in:yes,no',
            'humidity_sensor' => 'required|in:yes,no',
            'new_thumbnail' => 'max:30720',
            'new_outside_image' => 'max:30720',
            'new_loading_image' => 'max:30720',
            'new_off_loading_image' => 'max:30720',
            'new_handling_equipment_image' => 'max:30720',
            'new_storage_area_image' => 'max:30720',
            'new_videos.*' => 'max:204800',
            'new_licenses.*' => 'max:30720'
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
            $thumbnail = process_image($request->file('new_thumbnail'), 'backend/warehouses', $request->old_thumbnail);
        }
        else {
            $thumbnail = $request->old_thumbnail;
        }

        if($request->file('new_outside_image')) {
            $outside_image = process_image($request->file('new_outside_image'), 'backend/warehouses', $request->old_outside_image);
        }
        else {
            $outside_image = $request->old_outside_image;
        }

        if($request->file('new_loading_image')) {
            $loading_image = process_image($request->file('new_loading_image'), 'backend/warehouses', $request->old_loading_image);
        }
        else {
            $loading_image = $request->old_loading_image;
        }

        if($request->file('new_off_loading_image')) {
            $off_loading_image = process_image($request->file('new_off_loading_image'), 'backend/warehouses', $request->old_off_loading_image);
        }
        else {
            $off_loading_image = $request->old_off_loading_image;
        }

        if($request->file('new_handling_equipment_image')) {
            $handling_equipment_image = process_image($request->file('new_handling_equipment_image'), 'backend/warehouses', $request->old_handling_equipment_image);
        }
        else {
            $handling_equipment_image = $request->old_handling_equipment_image;
        }

        if($request->file('new_storage_area_image')) {
            $storage_area_image = process_image($request->file('new_storage_area_image'), 'backend/warehouses', $request->old_storage_area_image);
        }
        else {
            $storage_area_image = $request->old_storage_area_image;
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
                $processed_image = process_image($license, 'backend/warehouses');
                $new_licenses[] = $processed_image;
            }
        }

        // Features EN
            $features_en = [];
            if($request->feature_titles_en) {
                foreach($request->feature_titles_en as $key => $title) {
                    array_push($features_en, [
                        'title' => $title,
                        'description' => $request->feature_descriptions_en[$key] ?? null
                    ]);
                }
            }
            $features_en = $features_en ? json_encode($features_en) : null;
        // Features EN

        // Features AR
            $features_ar = [];
            if($request->feature_titles_ar) {
                foreach($request->feature_titles_ar as $key => $title) {
                    array_push($features_ar, [
                        'title' => $title,
                        'description' => $request->feature_descriptions_ar[$key] ?? null
                    ]);
                }
            }
            $features_ar = $features_ar ? json_encode($features_ar) : null;
        // Features AR

        // Amenities EN
            $amenities_en = [];
            if($request->amenity_titles_en) {
                foreach($request->amenity_titles_en as $key => $title) {
                    array_push($amenities_en, [
                        'title' => $title,
                        'description' => $request->amenity_descriptions_en[$key] ?? null
                    ]);
                }
            }
            $amenities_en = $amenities_en ? json_encode($amenities_en) : null;
        // Amenities EN

        // Amenities AR
            $amenities_ar = [];
            if($request->amenity_titles_ar) {
                foreach($request->amenity_titles_ar as $key => $title) {
                    array_push($amenities_ar, [
                        'title' => $title,
                        'description' => $request->amenity_descriptions_ar[$key] ?? null
                    ]);
                }
            }
            $amenities_ar = $amenities_ar ? json_encode($amenities_ar) : null;
        // Amenities AR

        // Details EN
            $details_en = [];
            if($request->detail_titles_en) {
                foreach($request->detail_titles_en as $key => $title) {
                    array_push($details_en, [
                        'title' => $title,
                        'description' => $request->detail_descriptions_en[$key] ?? null
                    ]);
                }
            }
            $details_en = $details_en ? json_encode($details_en) : null;
        // Details EN

        // Details AR
            $details_ar = [];
            if($request->detail_titles_ar) {
                foreach($request->detail_titles_ar as $key => $title) {
                    array_push($details_ar, [
                        'title' => $title,
                        'description' => $request->detail_descriptions_ar[$key] ?? null
                    ]);
                }
            }
            $details_ar = $details_ar ? json_encode($details_ar) : null;
        // Details AR

        $data = $request->except(
            'old_thumbnail',
            'new_thumbnail',
            'old_outside_image',
            'new_outside_image',
            'old_loading_image',
            'new_loading_image',
            'old_off_loading_image',
            'new_off_loading_image',
            'old_handling_equipment_image',
            'new_handling_equipment_image',
            'old_storage_area_image',
            'new_storage_area_image',
            'old_videos',
            'new_videos',
            'old_licenses',
            'new_licenses',
            'feature_titles_en',
            'feature_descriptions_en',
            'feature_titles_ar',
            'feature_descriptions_ar',
            'amenity_titles_en',
            'amenity_descriptions_en',
            'amenity_titles_ar',
            'amenity_descriptions_ar',
            'detail_titles_en',
            'detail_descriptions_en',
            'detail_titles_ar',
            'detail_descriptions_ar',
        );

        $user = Auth::user();
        $data['user_id'] = $user->id;
        $data['thumbnail'] = $thumbnail;
        $data['outside_image'] = $outside_image;
        $data['loading_image'] = $loading_image;
        $data['off_loading_image'] = $off_loading_image;
        $data['handling_equipment_image'] = $handling_equipment_image;
        $data['storage_area_image'] = $storage_area_image;
        $data['videos'] = $new_videos ? json_encode($new_videos) : null;
        $data['licenses'] = $new_licenses ? json_encode($new_licenses) : null;
        $data['features_en'] = $features_en;
        $data['features_ar'] = $features_ar;
        $data['amenities_en'] = $amenities_en;
        $data['amenities_ar'] = $amenities_ar;
        $data['details_en'] = $details_en;
        $data['details_ar'] = $details_ar;
        $data['status'] = 2;
        $warehouse = Warehouse::create($data);  

        return redirect()->route('landlord.warehouses.edit', $warehouse)->with([
            'success' => "Update Successful!",
            'route' => route('landlord.warehouses.index')
        ]);
    }

    public function edit(Warehouse $warehouse)
    {
        $storage_types = StorageType::where('status', 1)->get();
        $licenses = License::where('status', 1)->get();

        return view('backend.landlord.warehouses.edit', [
            'warehouse' => $warehouse,
            'storage_types' => $storage_types,
            'licenses' => $licenses,
        ]);
    }

    public function update(Request $request, Warehouse $warehouse)
    {
        $validator = Validator::make($request->all(), [
            'name_en' => 'required|min:3|max:255',
            'description_en' => 'required',
            'address_name' => 'required|min:3|max:255',
            'address_en' => 'required|min:3|max:255',
            'city_en' => 'required|min:3|max:255',
            'address_ar' => 'required|min:3|max:255',
            'city_ar' => 'required|min:3|max:255',
            'latitude' => 'required|min:3|max:255',
            'longitude' => 'required|min:3|max:255',
            'storage_type_id' => 'required|integer',
            'total_area' => 'required',
            'total_pallets' => 'required|integer',
            'rent_per_pallet' => 'required|numeric|min:1',
            'available_pallets' => 'required|integer',
            'pallet_dimension' => 'required|in:120x80x150,120x100x150,other',
            'temperature_type' => 'required|in:dry,ambient,cold,freezer',
            'temperature_range' => 'required',
            'wms' => 'required|in:yes,no',
            'equipment_handling' => 'required|in:yes,no',
            'temperature_sensor' => 'required|in:yes,no',
            'humidity_sensor' => 'required|in:yes,no',
            'new_thumbnail' => 'max:30720',
            'new_outside_image' => 'max:30720',
            'new_loading_image' => 'max:30720',
            'new_off_loading_image' => 'max:30720',
            'new_handling_equipment_image' => 'max:30720',
            'new_storage_area_image' => 'max:30720',
            'new_videos.*' => 'max:204800',
            'new_licenses.*' => 'max:30720'
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
            $thumbnail = process_image($request->file('new_thumbnail'), 'backend/warehouses', $request->old_thumbnail);
        }
        else {
            $thumbnail = $request->old_thumbnail;
        }

        if($request->file('new_outside_image')) {
            $outside_image = process_image($request->file('new_outside_image'), 'backend/warehouses', $request->old_outside_image);
        }
        else {
            $outside_image = $request->old_outside_image;
        }

        if($request->file('new_loading_image')) {
            $loading_image = process_image($request->file('new_loading_image'), 'backend/warehouses', $request->old_loading_image);
        }
        else {
            $loading_image = $request->old_loading_image;
        }

        if($request->file('new_off_loading_image')) {
            $off_loading_image = process_image($request->file('new_off_loading_image'), 'backend/warehouses', $request->old_off_loading_image);
        }
        else {
            $off_loading_image = $request->old_off_loading_image;
        }

        if($request->file('new_handling_equipment_image')) {
            $handling_equipment_image = process_image($request->file('new_handling_equipment_image'), 'backend/warehouses', $request->old_handling_equipment_image);
        }
        else {
            $handling_equipment_image = $request->old_handling_equipment_image;
        }

        if($request->file('new_storage_area_image')) {
            $storage_area_image = process_image($request->file('new_storage_area_image'), 'backend/warehouses', $request->old_storage_area_image);
        }
        else {
            $storage_area_image = $request->old_storage_area_image;
        }

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
                $processed_image = process_image(null, 'backend/warehouses', $license);
                $processed_image = process_image(null, 'backend/warehouses/thumbnails', $license);
            }

            if($request->file('new_licenses')) {
                foreach($request->file('new_licenses') as $license) {
                    $processed_image = process_image($license, 'backend/warehouses');
                    $current_licenses[] = $processed_image;
                }
            }
            
            $licenses = $current_licenses ? json_encode($current_licenses) : null;
        // Licenses

        // Features EN
            $features_en = [];
            if($request->feature_titles_en) {
                foreach($request->feature_titles_en as $key => $title) {
                    array_push($features_en, [
                        'title' => $title,
                        'description' => $request->feature_descriptions_en[$key] ?? null
                    ]);
                }
            }
            $features_en = $features_en ? json_encode($features_en) : null;
        // Features EN

        // Features AR
            $features_ar = [];
            if($request->feature_titles_ar) {
                foreach($request->feature_titles_ar as $key => $title) {
                    array_push($features_ar, [
                        'title' => $title,
                        'description' => $request->feature_descriptions_ar[$key] ?? null
                    ]);
                }
            }
            $features_ar = $features_ar ? json_encode($features_ar) : null;
        // Features AR

        // Amenities EN
            $amenities_en = [];
            if($request->amenity_titles_en) {
                foreach($request->amenity_titles_en as $key => $title) {
                    array_push($amenities_en, [
                        'title' => $title,
                        'description' => $request->amenity_descriptions_en[$key] ?? null
                    ]);
                }
            }
            $amenities_en = $amenities_en ? json_encode($amenities_en) : null;
        // Amenities EN

        // Amenities AR
            $amenities_ar = [];
            if($request->amenity_titles_ar) {
                foreach($request->amenity_titles_ar as $key => $title) {
                    array_push($amenities_ar, [
                        'title' => $title,
                        'description' => $request->amenity_descriptions_ar[$key] ?? null
                    ]);
                }
            }
            $amenities_ar = $amenities_ar ? json_encode($amenities_ar) : null;
        // Amenities AR

        // Details EN
            $details_en = [];
            if($request->detail_titles_en) {
                foreach($request->detail_titles_en as $key => $title) {
                    array_push($details_en, [
                        'title' => $title,
                        'description' => $request->detail_descriptions_en[$key] ?? null
                    ]);
                }
            }
            $details_en = $details_en ? json_encode($details_en) : null;
        // Details EN

        // Details AR
            $details_ar = [];
            if($request->detail_titles_ar) {
                foreach($request->detail_titles_ar as $key => $title) {
                    array_push($details_ar, [
                        'title' => $title,
                        'description' => $request->detail_descriptions_ar[$key] ?? null
                    ]);
                }
            }
            $details_ar = $details_ar ? json_encode($details_ar) : null;
        // Details AR

        $data = $request->except(
            'old_thumbnail',
            'new_thumbnail',
            'old_outside_image',
            'new_outside_image',
            'old_loading_image',
            'new_loading_image',
            'old_off_loading_image',
            'new_off_loading_image',
            'old_handling_equipment_image',
            'new_handling_equipment_image',
            'old_storage_area_image',
            'new_storage_area_image',
            'old_videos',
            'new_videos',
            'old_licenses',
            'new_licenses',
            'feature_titles_en',
            'feature_descriptions_en',
            'feature_titles_ar',
            'feature_descriptions_ar',
            'amenity_titles_en',
            'amenity_descriptions_en',
            'amenity_titles_ar',
            'amenity_descriptions_ar',
            'detail_titles_en',
            'detail_descriptions_en',
            'detail_titles_ar',
            'detail_descriptions_ar',
        );

        $data['thumbnail'] = $thumbnail;
        $data['outside_image'] = $outside_image;
        $data['loading_image'] = $loading_image;
        $data['off_loading_image'] = $off_loading_image;
        $data['handling_equipment_image'] = $handling_equipment_image;
        $data['storage_area_image'] = $storage_area_image;
        $data['videos'] = $videos;
        $data['licenses'] = $licenses;
        $data['features_en'] = $features_en;
        $data['features_ar'] = $features_ar;
        $data['amenities_en'] = $amenities_en;
        $data['amenities_ar'] = $amenities_ar;
        $data['details_en'] = $details_en;
        $data['details_ar'] = $details_ar;
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
        $name = $request->name;
        $address = $request->address;
        $status = $request->status;
        $column = $request->column ?? 'id';
        $direction = $request->direction ?? 'desc';

        $valid_columns = ['name_en', 'address_en', 'total_area', 'total_pallets', 'status', 'id'];
        $valid_directions = ['asc', 'desc'];

        if(!in_array($column, $valid_columns)) {
            $column = 'id';
        }

        if(!in_array($direction, $valid_directions)) {
            $direction = 'desc';
        }

        $user = Auth::user();
        $items = $user->warehouses()->orderBy($column, $direction);

        if($name) {
            $items->where(function ($query) use ($name) {
                $query->where('name_en', 'like', '%' . $name . '%')
                    ->orWhere('name_ar', 'like', '%' . $name . '%');
            });
        }

        if($address) {
            $items->where(function($data) use ($address) {
                $data->where('address_en', 'like', "%{$address}%")
                ->orWhere('address_ar', 'like', "%{$address}%");
            });
        }

        if($status != null) {
            $items->where('status', $status);
        }

        $pagination = $request->pagination ?? 10;
        $items = $items->paginate($pagination);
        $items = $this->processData($items);

        if($request->ajax()) {
            $tbodyView = view('backend.landlord.warehouses._tbody', compact('items'))->render();
            $paginationView = $items->appends($request->except('page'))->links("pagination::bootstrap-5")->render();

            return response()->json([
                'tbody' => $tbodyView,
                'pagination' => $paginationView,
            ]);
        }

        return view('backend.landlord.warehouses.index', [
            'items' => $items,
            'pagination' => $pagination,
            'name' => $name,
            'address' => $address,
            'status' => $status
        ]);
    }
}