@extends('layouts.dashboardmaster')
@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-12 mt-5 mb-5">
            <div class="">
                <div class="container">
                    <div class="row ">
                     
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header text-center bg-primary">
                                    <h3>Contact Information</h3>
                                </div>
                                <div class="card-body bg-info">
                                 <form action="{{route('c_information')}}" method="post" >
                                    @csrf
                                    <div>
                                        <label for=""> Email*</label>
                                        <input type="email" placeholder="Email@gmail.com" name="email" class="form-control">
                                    </div>
                                    <div>
                                        <label for=""> Phone*</label>
                                        <input type="number" placeholder="01700-000000" name="phone" class="form-control">
                                    </div>
                                    <div>
                                        <label for=""> Address*</label>
                                        <input type="text" placeholder="Address" name="address" class="form-control">
                                    </div>
                                    <div>
                                        <label for=""> Facebook*</label>
                                        <input type="text" placeholder="Facebook Id Link " name="facebook" class="form-control">
                                    </div>
                                    <div>
                                        <label for=""> Twitter*</label>
                                        <input type="text" placeholder="Twitter Id Link" name="twitter" class="form-control">
                                    </div>
                                    <div>
                                        <label for=""> Youtube*</label>
                                        <input type="text" placeholder="Youtube Id Link " name="youtube" class="form-control">
                                    </div>
                                    <div>
                                        <label for=""> Instagram*</label>
                                        <input type="text" placeholder="Instagram Id Link " name="instagram" class="form-control">
                                    </div>

                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-danger" >Click Me</button>
                                       </div>
                                 </form>
                              
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header text-center  bg-primary">
                                    <h3>Contact Information</h3>
                                </div>
                                <div class="card-body bg-info">
                                 <div class=" mt-3">
                                    <h3>Email:{{$contact_info->email}}</h3>
                                 </div>
                                 <div class=" mt-3">
                                    <h3>Phone:{{$contact_info->phone}}</h3>
                                 </div>
                                 <div class=" mt-3">
                                    <h3>Address:{{$contact_info->address}}</h3>
                                 </div>
                                 <div class=" mt-3">
                                    <h3>FaceBook:{{$contact_info->facebook}}</h3>
                                 </div>
                                 <div class=" mt-3">
                                    <h3>Youtube:{{$contact_info->youtube}}</h3>
                                 </div>
                                 <div class=" mt-3">
                                    <h3>Twitter:{{$contact_info->twitter}}</h3>
                                 </div>
                                 <div class=" mt-3">
                                    <h3>Instagram:{{$contact_info->instagram}}</h3>
                                 </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection