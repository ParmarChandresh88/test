@include('admin.header')
@include('admin.sidebar')

<div class="page-wrapper">
    <div class="row">
        <div class="col-md-12 mt-3 ml-5">
            <div class="card">
                <form action="{{ url('addcategory') }}" method="POST" class="form-horizontal">
                    @csrf
                    <div class="card-body">
                        <h3 class="card-title">Add Category</h3>
                        <div class="form-group row">

                            <div class="col-sm-10">
                                <input type="text" name="category" value="" class="form-control"
                                    placeholder="Add Category">
                            </div>
                        </div>
                        {{-- <div class="form-group row">

                            <div class="col-sm-10">
                            <select class="form-control" name="status"> 
                                <option value="">status update</option>
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                            </select>
                            </div>
                        </div> --}}
                        <div class="form-group row">

                            <div class="col-sm-10">
                                <button type="submit" value="submit" class="btn btn-info form-control">Submit</button>
                            </div>
                        </div>
                    @if (session()->has('fail'))
                       <div class="alert alert-danger">{{session()->get('fail')}}</div> 
                    @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('admin.footer')