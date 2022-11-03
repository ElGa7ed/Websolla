<?php

namespace App\Http\Controllers;

use App\Models\SectionOne;
use App\Models\SectionTwo;
use Illuminate\Http\Request;

class SectionController extends Controller
{

    public function index(Request $request)
    {
        $sections = SectionOne::orderBy('order', 'ASC')->get();
        $sections_two = SectionTwo::orderBy('order', 'ASC')->get();
        return view('section', compact('sections', 'sections_two'));
    }

    /**
     * Write code for update
     *
     * @return response()
     */
    public function update(Request $request)
    {
        if ($request->ajax()) {
            SectionOne::find($request->pk)
                ->update([
                    $request->name => $request->value
                ]);

            return response()->json(['success' => true]);
        }
    }
    public function sortable(Request $request)
    {
        $sections = SectionOne::all();

        foreach ($sections as $section) {
            foreach ($request->order as $order) {
                if ($order['id'] == $section->id) {
                    $section->update(['order' => $order['position']]);
                }
            }
        }

        return response('Update Successfully.', 200);
    }

    /**
     * Write code for delete
     *
     * @return response()
     */
    public function delete($id)
    {
        $section = SectionOne::find($id);
        $section->delete();
        return response()->json(['success' => 'success']);
    }


    /**
     * Write code for update
     *
     * @return response()
     */
    public function update_two(Request $request)
    {
        if ($request->ajax()) {
            SectionTwo::find($request->pk)
                ->update([
                    $request->name => $request->value
                ]);

            return response()->json(['success' => true]);
        }
    }
    public function sortable_two(Request $request)
    {
        $sections = SectionTwo::all();

        foreach ($sections as $section) {
            foreach ($request->order as $order) {
                if ($order['id'] == $section->id) {
                    $section->update(['order' => $order['position']]);
                }
            }
        }

        return response('Update Successfully.', 200);
    }

    /**
     * Write code for delete
     *
     * @return response()
     */
    public function delete_two($id)
    {
        $section = SectionTwo::find($id);
        $section->delete();
        return response()->json(['success' => 'success']);
    }
}
