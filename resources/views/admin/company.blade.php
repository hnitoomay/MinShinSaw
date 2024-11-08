@extends('admin.master')

@section('content')
<div class="">
 <div class="mt-3">
    <marquee behavior="" direction=""><h2>Welcome to Admin Dashboard</h2>
    </marquee>
 </div>


    <div class="col-12 mt-3">
        <div class="d-flex justify-content-between">
            <h2 class="text-dark ">Company Lists</h2>
            <div class="">
                <form action="{{route('home#company')}}" method="get">
                    @csrf
                   <div class="input-group">
                    <input type="text" class="form-control border-grey" name="key" value="{{request('key')}}" placeholder="Search...">
                    <button class="btn btn-dark" type="submit">Search</button>
                   </div>
                </form>
            </div>
            <div class="d-flex justify-content-end  me-4">
                <a href="{{route('company#create')}}">
                    <button type="button" class="btn btn-secondary">Add Company</button>
                </a>

            </div>
        </div>
        <hr>
        <div class="mt-3">
            <table class="table table-data2">
                <thead>
                    <tr>
                        <th>Logo</th>
                        <th>ID</th>
                        <th>Company Name</th>
                        <th>Email</th>
                        <th>Website</th>
                        <th>Created Date</th>
                        <th>CRUD</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($company as $item)
                    <tr class="tr-shadow">

                        <td >
                            @if ($item->logo!= null)
                            <img src="{{asset('storage/'.$item->logo)}}" style="width: 150px; height: 120px; border:1px solid grey;" alt="">

                            @else
                            <img src="{{asset('image/food.png')}}" style="width: 150px; height: 120px; border:1px solid grey;"  alt="Blank Profile">
                            @endif

                        </td>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->website}}</td>
                        <td>{{$item->created_at->format('d-M-y')}}</td>
                        <td>
                            <div class="table-data-feature">

                                <a href="{{route('company#edit',$item->id)}}" class="text-primary">

                                        Edit

                                </a>

                                <a href="{{route('company#delete',$item->id)}}" class="mr-1 text-danger">

                                       Delete

                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="me-4 my-2">
            {{$company->appends(request()->query())->links()}}

        </div>

        <div class="col-6 offset-1">
            <h2>Numbers of Employees</h2>
            <table class="table table-bordered table-dark">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Company</th>
                    <th scope="col">No. of Employee</th>

                  </tr>
                </thead>
                <tbody>
                    @foreach ($company as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->employees_count }}</td> <!-- This uses the withCount result -->
                    </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection


