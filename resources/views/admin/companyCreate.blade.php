@extends('admin.master')
@section('content')
    <div class="">
        <div class="row">
            <div class="col-3 offset-8">
                <a href="{{route('home#company')}}"><button class="btn bg-dark text-white my-3">List</button></a>
            </div>
        </div>
        <div class="col-lg-6 offset-3">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h3 class="text-center title-2"> Form</h3>
                    </div>
                    <hr>
                    <form action="{{route('company#insert')}}" method="post" enctype="multipart/form-data" novalidate="novalidate">
                        @csrf
                        <div class="form-group mt-3">
                            <label for="" class="control-label mb-1">Company Name</label>
                            <input id="" name="name" value="" type="text" class="form-control @error('name') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="">
                            @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>

                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="" class="control-label mb-1">Email</label>
                            <input id="" name="email" value="" type="text" class="form-control @error('email') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="">
                            @error('email')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>

                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="" class="control-label mb-1">Logo</label>
                            <input id="" name="logo" value="" type="file" class="form-control @error('logo') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="">
                            @error('logo')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>

                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="" class="control-label mb-1">website</label>
                            <input id="" name="website" value="" type="url" class="form-control @error('website') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Enter website URL">
                            @error('website')
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
