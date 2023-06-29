@include('admin.header')
@include('admin.sidebar')

<div class="page-wrapper">
    <div class="row">
        <div class="col-md-12 mt-3 ml-5">
            <div class="card">
                <form action="{{ url('u_product/'.$edit1->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <h3 class="card-title">Update Product</h3>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <label for="">Category</label>
                                <select name="category_id" id="" class="form-control">
                                    @foreach ($c as $data)
                                    @if ($edit1->category_id == $data->id)
                                    <option value="{{$data->id}}" selected >{{$data->category}}</option>
                                    @else 
                                    <option value="{{$data->id}}" >{{$data->category}}</option>
                                    @endif
                                    
                                    {{-- <option value="{{$data->category_id}}">{{$data->category}}</option> --}}
                                    @endforeach
                                   
                                </select>
                            </div>
                        </div> 
                         <div class="form-group row">
                            <div class="col-sm-10">
                                <label for="">Product Name</label>
                                <input type="text" name="name" value="{{$edit1->name}}" class="form-control"
                                    placeholder="Add Product">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <label for="">MRP</label>
                                <input type="text" name="mrp" value="{{$edit1->mrp}}" class="form-control"
                                    placeholder="Add mrp">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <label for="">Price</label>
                                <input type="text" name="price" value="{{$edit1->price}}" class="form-control"
                                    placeholder="Add price">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <label for="">Quentity</label>
                                <input type="text" name="qty" value="{{$edit1->qty}}" class="form-control"
                                    placeholder="Add quentity">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <label for="">Image</label>
                                <input type="file" name="image" value="{{$edit1->image}}" class="form-control"
                                    placeholder="Add Image">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <label for="">Short Description</label>
                                <input type="text" name="short_desc" value="{{$edit1->short_desc}}" class="form-control"
                                    placeholder="Add short description">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <label for="">Description</label>
                                <input type="text" name="description" value="{{$edit1->description}}" class="form-control"
                                    placeholder="Add Description">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <label for="">Meta Title</label>
                                <input type="text" name="meta_title" value="{{$edit1->meta_title}}" class="form-control"
                                    placeholder="Add meta title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <label for="">Meta Description</label>
                                <input type="text" name="meta_desc" value="{{$edit1->meta_desc}}" class="form-control"
                                    placeholder="Add meta description">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <label for="">Meta Keyword</label>
                                <input type="text" name="meta_keyword" value="{{$edit1->meta_keyword}}" class="form-control"
                                    placeholder="Add meta Keyword">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" value="submit" class="btn btn-info form-control">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('admin.footer')
