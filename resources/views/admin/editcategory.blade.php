@include('admin.header')
@include('admin.sidebar')

<div class="page-wrapper">
    <div class="row">
        <div class="col-md-12 mt-3 ml-5">
            <div class="card">
                <form action="{{ url('u_category/'.$edit->id) }}" method="POST" class="form-horizontal">
                    @csrf
                    <div class="card-body">
                        <h3 class="card-title">Update Category</h3>
                        <div class="form-group row">

                            <div class="col-sm-10">
                                <input type="text" name="category" value="{{$edit->category}}" class="form-control"
                                    placeholder="Add Category">
                            </div>
                        </div>
                        
                        <div class="form-group row">

                            <div class="col-sm-10">
                                <button type="submit" value="submit" class="btn btn-info form-control">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('admin.footer')