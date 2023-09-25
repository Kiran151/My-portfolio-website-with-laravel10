<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function alltestimonial()
    {

        $data = Testimonial::all();

        return view('admin.testimonials.all_testimonials', compact('data'));
    }

    public function addtestimonial($id = 0)
    {
        if ($id > 0) {
            $data = Testimonial::findOrFail($id);
            return view('admin.testimonials.add_testimonials', compact('data'));
        }
        return view('admin.testimonials.add_testimonials');
    }

    public function saveTestimonial(Request $request, $id = 0)
    {
        $image = $request->file('image');

        if ($id > 0) {
            $data = Testimonial::findOrFail($id);
            if ($image) {
                $fileName = date('YmdHis') . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/testimonials'), $fileName);
                $data->update([
                    'image' => $fileName,
                    'name' => $request->name,
                    'testimonial' => $request->testimonial,
                ]);
            } else {
                if ($request->remove_img == 1) {
                    unlink('uploads/testimonials/' . $data->image);
                    $data->image = '';
                    $data->name = $request->name;
                    $data->testimonial = $request->testimonial;
                    $data->save();
                }

            }
        } else {
            if ($image) {
                $fileName = date('YmdHis') . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/testimonials'), $fileName);
                Testimonial::insert([
                    'image' => $fileName,
                    'name' => $request->name,
                    'testimonial' => $request->testimonial,
                    'created_at' => date('Y-m-d')
                ]);
            } else {
                Testimonial::insert([
                    'name' => $request->name,
                    'testimonial' => $request->testimonial,
                    'created_at' => date('Y-m-d')
                ]);
            }
        }

        $notification = array(
            'message' => 'Testimonial Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect('/testimonial/all')->with($notification);



    }

    public function deleteTestimonial($id)
    {
        $data = Testimonial::findOrFail($id);
        if ($data->image) {
            unlink('uploads/testimonials/' . $data->image);
        }
        $data->delete();
        $notification = array(
            'message' => 'Testimonial Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect('/testimonial/all')->with($notification);
    }
}