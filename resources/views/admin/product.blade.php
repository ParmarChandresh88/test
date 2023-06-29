@include('admin.header')
@include('admin.sidebar')

<div class="page-wrapper">
    <div class="card">
        <div class="card-body mt-3">
            <h5 class="card-title m-b-0">Product Table</h5>
        </div>
        @if (session()->has('success'))
        <div class="alert alert-success">{{session()->get('success')}}</div> 
        @endif
        @if (session()->has('delete'))
        <div class="alert alert-danger">{{session()->get('delete')}}</div> 
        @endif
        @if (session()->has('edit'))
        <div class="alert alert-success">{{session()->get('edit')}}</div> 
        @endif

        <table class="table mt-3">
            <div> <a href="{{ url('/v_addproduct') }}" class="btn btn-info ml-5">Add Product</a></div>
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>MRP</th>
                    <th>Price</th>
                    <th>Quentity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 0;
                @endphp
                @foreach ($pro as $row)
                    @php
                        $no = $no + 1;
                    @endphp

                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $row->category }}</td>
                        <td>{{$row->name}}</td>
                        <td><img src="{{ asset('upload/' . $row->image) }}" height="70px" width="70px"></td>
                        <td>{{$row->mrp}}</td>
                        <td>{{$row->price}}</td>
                        <td>{{$row->qty}}</td>
                        <td>

                            @if ($row->status == 1)
                            <button class="btn btn-success" id="0" type="button" onclick="updated_status('{{$row->id}}',document.getElementById('0').value)" value="1" >Active</button>
                            
                            @else
                            <button class="btn btn-secondary" id="1" type="button" onclick="updated_status('{{$row->id}}',document.getElementById('1').value)" value="0">Deactive</button>

                            @endif
                            <a href="{{url('v_editproduct/'. $row->id)}}" class="btn btn-primary">Edit</a>
                            <a href="{{url('d_product/'. $row->id)}}" class="btn btn-danger">Delete</a>
                            {{-- @if ($row->status == 1)
                        <h5 style="color: #2196F3">{{'Active'}}</h5>
                        <select name="status" id="status"  onchange="updated_status('{{$row->id}}',this.options[this.selectedIndex].value)" class="form-control" >
                            <option value="" hidden>update Status</option>
                            <option value="1">Active</option>
                            <option value="0">Deactive</option>
                        </select>  
                            @else
                            <h5 style="color: #c8cccf">{{'Deactive'}}</h5>
                            <select name="status" id="status" onchange="updated_status('{{$row->id}}',this.options[this.selectedIndex].value)" class="form-control" >
                                <option value="" hidden>update Status</option>
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                            </select>
                            @endif --}}
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@include('admin.footer')
<script>

function updated_status(id,get_value) {
      if (get_value == 1) {
        get_value = 0;
        $status = window.location.href = 'update/'+ id +'/'+ get_value;
      }else{
        get_value = 1;
        $status = window.location.href = 'update/'+ id +'/'+ get_value;
      }
}
    // function updated_status(id,get_value) {
    //     $status = window.location.href = 'update/'+ id +'/'+ get_value;
    // }
</script>
