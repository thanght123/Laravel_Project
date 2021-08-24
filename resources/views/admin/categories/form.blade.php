<div class="row mb-3">
            <label for="title" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control @error('name') is-invalid @enderror"
              id="title" name="name" value="{{old('name', $category->name)}}">
              @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label for="parent" class="col-sm-2 col-form-label">Parent_id</label>
            <div class="col-sm-10">
              <input type="text" class="form-control @error('parent_id') is-invalid @enderror"
              id="parent" name="parent_id" value="{{old('parent_id', $category->parent_id)}}">
              @error('parent_id')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label for="description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
              <textarea rows="8" cols="" class="form-control" id="description"
              name="description">{{old('description', $category->description)}}</textarea>
            </div>
          </div>
          <div class="row mb-3">
            <label for="photo" class="col-sm-2 col-form-label">Photo</label>
            <div class="col-sm-10">
           
            <input type="hidden" name="old_photo" value="">
            <input class="form-control  @error('photo') is-invalid @enderror" type="file" id="photo" name="photo">
            @error('photo')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
            </div>
          </div>