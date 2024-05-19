<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories.index', [
            'title' => 'Categories List',
            'categories' => Category::all()
        ]);
    }

    public function edit($id)
    {
        return view('admin.categories.edit', [
            'title' => 'Edit Categories',
            'category' => Category::findOrFail($id)
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
        ]);

        if (Category::where('title', $validated['title'])->exists()) {
            toast('Failed, Title Already Exist!', 'error');
            return back();
        }

        Category::create($validated);
        toast('New Category Added!', 'success');
        return back();
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        $request->validate([
            'title' => 'required',
            'description' => 'nullable'
        ]);
        if ($request->title == $category->title) {
            $category->update([
                'title' => $category->title,
                'description' => $request->description
            ]);
        } else {
            $category->update([
                'title' => $request->title,
                'description' => $request->description
            ]);
        }
        toast('Selected Category Updated!', 'success');
        return redirect()->route('admin_categories');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        $course = Course::whereIn('category_id', $ids);
        $course->update([
            'category_id' => 'none'
        ]);
        Category::whereIn('id', $ids)->delete();
        return response()->json(['success', 'Selected Categories Deleted']);
    }
}
