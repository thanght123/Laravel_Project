@extends('admin.layouts.app')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="right: 0px;position:absolute">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom" style="margin-top: 100px;text-align: center;">
    <h1 class="text-center">Danh mục sản phẩm</h1>
    <hr>
    <a class="btn btn-success" href="{{route('admin.categories.create')}}" style="position: absolute;left: 22px;margin-top: 135px;"> Thêm danh mục sản phẩm</a>
  </div>
  @include('admin/alert/default')
  <div class="table">
    <table class="table table-bordered" style="margin-top: 75px;background-color: white;">
        <tr>
          <th scope="col" style="text-align:center">id</th>
          <th scope="col" style="text-align:center">Name</th>
          <th scope="col" style="text-align:center">Parent ID</th>
          <th scope="col" style="text-align:center">Photo</th>
          <th scope="col" style="text-align:center">Description</th>
        </tr>

      <tbody>
         @forelse ($categories as $category)
         <tr style="border-bottom : none">
            <td style="text-align:center;line-height: 100px;">{{$category->id}}</td>
            <td style="text-align:center;line-height: 100px;">{{$category->name}}</td>
            <td style="text-align:center;line-height: 100px;">{{$category->parent_id}}</td>
            <td style="text-align:center">
            @if ($category->photo)
              <img class="img-thumbnail" width="120px" src="{{ asset($category->photo) }}" alt="{{ $category->name }}" style="border: none;"/>
            @endif
            </td>
            <td style="text-align:center;line-height: 100px;">{{$category->description}}</td>
            <td style="text-align:center">
          <div class="btn-group" role="group" aria-label="Basic example">
                   
              <a class="btn btn-warning" href="{{ route('admin.categories.edit',$category->id)}}" style="margin-top: 30px;line-height: 30px;"> Edit</a>
                  <button type="button" class="delete btn btn-danger" data="{{ $category->id }}" style="margin-top: 30px;line-height: 30px;">Delete</button>
                </div>

          </td>
         </tr>
         @empty
         <tr>
          <td colspan="5"><p>No Categories</p></td>
        </tr>
        @endforelse
          
      </tbody>
    </table>
    <div class="text-center">
    {{ $categories->links()}}
    </div>
  </div>
</main>
@stop
@section('css')
<link href="../assets/css/dashboard.css" rel="stylesheet">
@stop
@section('modal')
<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{route('admin.categories.delete')}}" method="post">
      @csrf
      @method('DELETE')
      <input type="hidden" name="category_id" id="category_id" value="0">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Delete Category!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you want to delete this category?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Delete</button>
      </div>
      </form>
    </div>
  </div>
</div>

@section('js')
<script type="text/javascript">
  $('.delete').click(function(){
      $('#category_id').val($(this).attr('data'))
      var myModal = new bootstrap.Modal($('#deleteModal'),
      {
          keyboard: false
      });
      myModal.show();
  });
</script>
@stop


