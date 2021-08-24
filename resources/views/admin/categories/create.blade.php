@extends('admin.layouts.app')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="position: absolute;right: 0px;">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom" style="margin-top: 100px;text-align: center;">
    <h1 class="text-center">Thêm danh mục sản phẩm</h1>
    <hr>
  </div>
  @include('admin/alert/default')
  <form method="post" enctype="multipart/form-data" action="{{route('admin.categories.store')}}">
  @csrf
  @include('admin/categories/form')
          <button type="submit" class="btn btn-primary">Save</button>
        </form>
 </main>
@stop


