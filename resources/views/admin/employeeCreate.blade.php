@extends('admin.master')
@section('content')
    <div class="">
        <div class="row">
            <div class="col-3 offset-8">
                <a href="{{route('home#employee')}}"><button class="btn bg-dark text-white my-3">List</button></a>
            </div>
        </div>
        <div class="col-lg-6 offset-3">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h3 class="text-center title-2"> Form</h3>
                    </div>
                    <hr>
                    <form action="{{route('employee#insert')}}" method="post" enctype="multipart/form-data" novalidate="novalidate">
                        @csrf
                        <div class="form-group mt-3">
                            <label for="" class="control-label mb-1"> Name</label>
                            <input id="" name="name" value="{{old('name')}}" type="text" class="form-control @error('name') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="">
                            @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>

                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="" class="control-label mb-1">Phone</label>
                            <input id="" name="phone" value="{{old('phone')}}" type="text" class="form-control @error('phone') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="">
                            @error('phone')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>

                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label mb-1">Company</label>
                            <select name="company" class="form-control @error('company')
                                is-invalid
                            @enderror" id="">
                               <option value="">Choose Company...</option>
                               @foreach ($company as $item)
                               <option class="" value="{{$item->id}}" {{old('company') == $item->id ? 'selected':''}}>{{$item->name}}</option>

                               @endforeach

                            </select>
                            @error('company')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="" class="control-label mb-1">profile</label>
                            <input id="" name="profile" value="" type="file" class="form-control @error('profile') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="">
                            @error('profile')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>

                            @enderror
                        </div>

                        <div class="mt-3">
                            <button  type="submit" class="btn btn-info btn-block">
                                <span >Create</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
