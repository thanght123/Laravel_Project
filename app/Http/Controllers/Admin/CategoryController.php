<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::orderBy('id','desc')->paginate();
       return view('admin.categories.index',compact('categories'));
   }
   public function create(){
    $category = new Category();
    return view('admin.categories.create',compact('category'));
   }
   public function store(CategoryRequest $request){
    $data = $request->except('_token');
    $data=array_filter($data,'strlen');
    $path = $this->_upload($request);
    if ($path)
    {
        $data['photo'] = $path;
    }
    $category = Category::create($data);
    if($category){
        return redirect(route('admin.categories.index'));
    }
    return 'error!';
}
public function destroy(Request $request)
{
    $category = Category::find($request->input('category_id'));
    if ($category)
    {
       $category->delete();
        return redirect(route('admin.categories.index'))
        ->with('success', __('Delete category\'s success!'));
    }else{
    return redirect(route('admin.categories.index'))
    ->with('info', __('Category not found!'));
    
}
}
public function edit($id){
    $category = Category::find($id);
     if($category){
         return view('admin.categories.edit',compact('category'));
     }
     abort(404);
 }
 public function update(CategoryRequest $request,$id){
    $category = Category::find($id);
    if ($category)
    {   
        $path = $this->_upload($request);

        if ($path)
        {
            $category->photo = $path;
        }
        $category->name = $request->input('name');
        $category->parent_id = $request->input('parent_id');
        $category->description = $request->input('description');
        $category->save();
    }

    return redirect(route('admin.categories.index'))
    ->with('success', __('Update category\'s success!'));
}
private function _upload($request)
    {
        if ($request->hasFile('photo'))
        {
            $photo = $request->file('photo');
            $path = $photo->storeAs(
                'uploads', $photo->getClientOriginalName()
                );
            return $path;
        }
        return false;
    }
}
