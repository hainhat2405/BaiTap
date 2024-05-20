<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\BlogModel;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = BlogModel::paginate(5);
        return view('admin.blog.blog',compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.add_blog');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'id' => $request->input('id'),
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'image' => $request->input('image'),
            'publish_date' => $request->input('publish_date'),
            'Status' => $request->input('Status') ? 1: 0
        ];
        BlogModel::create($data);
        return redirect()->route('blog')->with('success','Thêm thành công thông tin bài viết');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = BlogModel::where('id', $id)->first();
        if(!$blog){
            // xử lý khi không tìm thấy loại sản phẩm với id tương ứng
            return abort(404); // Trả về trang lỗi 404
        }
        $id = $blog->id;
        $title = $blog->title;
        $content = $blog->content;
        $publish_date = $blog->publish_date;
        $image = $blog->image;
        $Status = $blog->Status;

        return view('Admin.blog.detail_blog', compact('id','title', 'content', 'image', 'publish_date', 'Status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = BlogModel::where('id', $id)->first();
        if(!$blog){
            return abort(404);
        }
        return view('Admin.blog.edit_blog',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $blog = BlogModel::find($id);
        $request->validate([

        ]);
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->image = $request->image;
        $blog->Status = $request->Status ?1:0;
        $blog->publish_date = $request->publish_date;
        $blog->save();
        return redirect()->route('blog',['id' =>$id])->with('success','Bài viết đã được cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $blog = BlogModel::find($id);
       $blog->delete();
        return redirect()->route('blog')->with('success', 'Xóa thành công');
    }
}
