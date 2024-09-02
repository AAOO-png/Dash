<?php
namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    public function index()
    {
        $slides = Slide::all();
    return view('admin.slide.createslide', compact('slides'));
    }
    
    
    public function store(Request $request)
{
    // Validasi request
    $request->validate([
        'name_img' => 'required|string|max:255',
        'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'is_publish' => 'nullable|boolean',
    ]);

    // Menangani upload file
    $fileName = time() . '.' . $request->img->extension();  
    $request->img->move(public_path('uploads'), $fileName);

    // Membuat record slider baru
    Slide::create([
        'name_image' => $request->name_img, // Pastikan nama field sesuai
        'image' => $fileName,
        'is_publish' => $request->has('is_publish') ? 1 : 0,
    ]);

        return redirect()->route('slides.index')->with('success', 'Slider created successfully.');
    }

    public function edit($id)
    {
        $slider = Slide::findOrFail($id);
        return view('editslide', compact('slider')); // Assuming you have an editSlider view
    }

    public function update(Request $request, $id)
    {
        $slider = Slide::findOrFail($id);

        // Validate the request
        $request->validate([
            'name_img' => 'required|string|max:255',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_publish' => 'nullable|boolean',
        ]);

        // Prepare data for update
        $data = [
            'name_img' => $request->name_img,
            'is_publish' => $request->has('is_publish') ? 1 : 0,
        ];

        // Handle file upload if a new image is provided
        if ($request->hasFile('img')) {
            // Delete old image
            if ($slider->img) {
                $oldImagePath = public_path('uploads/' . $slider->img);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $fileName = time().'.'.$request->img->extension();
            $request->img->move(public_path('uploads'), $fileName);
            $data['img'] = $fileName;
        }

        $slider->update($data);

        return redirect()->route('slides.index')->with('success', 'Slider updated successfully.');
    }

    public function destroy($id)
    {
        $slider = Slide::findOrFail($id);

        // Delete image file
        if ($slider->img) {
            $imagePath = public_path('uploads/' . $slider->img);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $slider->delete();

        return redirect()->route('slides.index')->with('success', 'Slider deleted successfully.');
    }
    public function toggle(Request $request, $id)
    {
        $slider = Slide::findOrFail($id);
        $slider->is_publish = $request->has('is_publish') ? 1 : 0;
        $slider->save();

        return redirect()->route('slides.index')->with('success', 'Slider visibility updated successfully.');
    }
}
