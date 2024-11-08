@extends('admin.master')

@section('content')
<div class="">
 <div class="mt-3">
    <marquee behavior="" direction=""><h2>Welcome to Admin Dashboard</h2>
    </marquee>
 </div>


    <div class="col-12 mt-3">
        <div class="d-flex justify-content-between">
            <h2 class="text-dark ">Employee Lists</h2>
            <div class="">
                <form action="{{route('home#employee')}}" method="get">
                    @csrf
                   <div class="input-group">
                    <input type="text" class="form-control border-grey" name="key" value="{{request('key')}}" placeholder="Search by name...">
                    <button class="btn btn-dark" type="submit">Search</button>
                   </div>
                </form>
            </div>
            <div class="d-flex justify-content-end  me-4">
                <a href="{{route('employee#create')}}">
                    <button type="button" class="btn btn-secondary">Add Employee</button>
                </a>

            </div>
        </div>
        <hr>
        <div class="mt-3">
            <table class="table table-data2">
                <thead>
                    <tr>
                        <th>Profile</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Company Name</th>
                        <th>Created Date</th>
                        <th>CRUD</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employee as $item)
                    <tr class="tr-shadow">


                        <td>
                            @if ($item->profile!= null)
                            <img src="{{asset('storage/'.$item->profile)}}" style="width: 130px; height: 100px;" alt="">

                            @else
                            <img src="{{asset('image/food.png')}}" style="width: 130px; height: 100px;"  alt="Blank Profile">
                            @endif
                        </td>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->phone}}</td>
                        <td>{{$item->company_name}}</td>
                        <td>{{$item->created_at->format('d-M-y')}}</td>
                        <td>
                            <div class="table-data-feature">

                                <a href="{{route('employee#edit',$item->id)}}" class="text-primary">
                                        Edit
                                </a>

                                <a href="{{route('employee#delete',$item->id)}}" class="mr-1 text-danger">
                                       Delete
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
        <div class="my-2">
            {{$employee->appends(request()->query())->links()}}

        </div>
    </div>
</div>
@endsection


