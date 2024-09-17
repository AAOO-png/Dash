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
    $request->validate([
        'name_img' => 'required',
        'slug' => 'required|unique:slides,slug',
        'img' => 'required|image',
    ]);

    $slide = new Slide();
    $slide->name_image = $request->input('name_img');
    $slide->slug = $request->input('slug'); // Manually inputted slug
    $slide->image = $request->file('img')->store('slides');

    $slide->save();

    return redirect()->route('slides.index')->with('success', 'Slide created successfully');
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
            'slug' => 'required|unique:slides,slug,'.$id.',id',
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
    // public function toggle(Request $request, $id)
    // {
    //     $slider = Slide::findOrFail($id);
    //     $slider->is_publish = $request->has('is_publish') ? 1 : 0;
    //     $slider->save();

    //     return redirect()->route('slides.index')->with('success', 'Slider visibility updated successfully.');
    // }

    public function publishSlides($id)
    {
        $photo = Slide::findOrFail($id);
        $photo->is_publish = !$photo->is_publish; // Toggle nilai
        $photo->save();

        return redirect()->back()->with('success', 'Status publikasi berhasil diubah.');
    }
}
