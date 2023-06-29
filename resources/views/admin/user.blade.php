@include('admin.header')
@include('admin.sidebar')

<div class="page-wrapper">
    <div class="card">
        <div class="card-body mt-3">
            <h5 class="card-title m-b-0">User Table</h5>
        </div>
        @if (session()->has('delete'))
        <div class="alert alert-danger">{{session()->get('delete')}}</div> 
        @endif
        <table class="table mt-3">
            
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 0;
                @endphp
                @foreach ($user as $row)
                    @php
                        $no = $no + 1;
                    @endphp

                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{$row->name}}</td>
                        <td>{{$row->email}}</td>
                        <td>{{$row->mobile}}</td>
                        <td>{{$row->added_on}}</td>
                       
                        <td>
                            <a href="{{url('d_user/'. $row->id)}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@include('admin.footer')
