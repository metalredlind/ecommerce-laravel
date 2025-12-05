<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    use ImageUploadTrait;

    public function index()
    {
        $homepage_section_banner_one = Advertisement::where('key','homepage_section_banner_one')->first();
        $homepage_section_banner_one = json_decode($homepage_section_banner_one->value);
        return view('admin.advertisement.index', compact('homepage_section_banner_one'));
    }

    public function homepageBannerSectionOne(Request $request)
    {
        $request->validate([
            'banner_image' => ['image'],
            'banner_url' => ['required']
        ]);

        //Handle image upload
        $imagePath = $this->updateImage($request, 'banner_image', 'uploads');
        // 'banner_image' => empty(!$imagePath) ? $imagePath : $product->thumb_image;

        $value =[
            'banner_one' => [
                'banner_url' => $request->banner_url,
                'status' => $request->status == 'on' ? 1 : 0  
            ]
        ];

        if (empty(!$imagePath)) {
            $value['banner_one']['banner_image'] = $imagePath;
        } else {
            $value['banner_one']['banner_image'] = $request->banner_old_image;
        }

        $value = json_encode($value);

        Advertisement::updateOrCreate(
            ['key' => 'homepage_section_banner_one'],
            ['value' => $value]
        );

        toastr('Banner section one updated successfully', 'success','Success');

        return redirect()->back();
    }
}
