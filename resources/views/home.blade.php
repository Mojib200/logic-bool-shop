@extends('layouts.dashboardmaster')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5 mb-5">
            <div class="thank-you-area">
                <div class="container">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-md-12">
                            <div class="inner_complated">
                                <div class="img_cmpted"><img src="{{'dashboard/'}}assets/images/icons/cmpted_logo.png" alt=""></div>
                                <p class="dsc_cmpted">Welcome {{Auth::user()->name}}</p>
                                <div class="btn_cmpted">
                                    <a href="shop-4-column.html" class="shop-btn" title="Go To Shop">Continue This Work </a>
                                </div>
                            </div>
                            <div class="main_quickorder text-align-center">
                                <h3 class="title">Your Email</h3>
                                <div class="cntct typewriter-effect"><span class="call_desk"><a href="tel:+01234567890" id="typewriter_num">{{Auth::user()->email}}</a></span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
