@extends('layouts.app')

@section('content')



    <!-- jumbotron -->

    <div class="container px-5">
        <div class="row justify-content-center">
            <div class="col-md-10 text-center bg-kiddies py-4">
                <h2 class="display-4 text-white fw-600">Retailer</h2>
            </div>
        </div>
    </div>


    <!-- main -->

    <div class="container px-5 pt-3">
        <div class="row justify-content-center py-4">
            <div class="col-md-10 text-center">
                <div class="row">
                    <div class="col-md-7 px-0">
                        <form  method="POST" action="{{ route('retailer.store') }}">@csrf
                            @include('layouts.alerts')
                            <div class="form-row">
                                <div class="col">
                                    <label for="forName" class="mb-0 fs-14 fw-600 text-black float-left">Retailer Name*</label>
                                    <input type="text" class="form-control whitesmoke" id="forName" aria-describedby="nameHelp" placeholder="" name="name" required>
                                </div>
                                <div class="col">
                                    <label for="InputEmail1" class="mb-0 fs-14 fw-600 text-black float-left">Company Name*</label>
                                <input type="text" class="form-control whitesmoke" id="InputEmail1" aria-describedby="emailHelp" placeholder="" name="company" required>
                                </div>
                            </div>
                            <div class="form-row pt-3">
                                <div class="col">
                                    <label for="forName" class="mb-0 fs-14 fw-600 text-black float-left">Mobile Contact*</label>
                                    <input type="text" class="form-control whitesmoke" id="forName" aria-describedby="nameHelp" placeholder="" name="contact" required>
                                </div>
                                <div class="col">
                                    <label for="InputEmail1" class=" mb-0 fs-14 fw-600 text-black float-left">Email*</label>
                                <input type="email" class="form-control whitesmoke" id="InputEmail1" aria-describedby="emailHelp" placeholder="" name="email" required>
                                </div>
                            </div>
                            <div class="form-group pt-3">
                                <label for="InputMobile" class="mb-0 fs-14 fw-600 text-black float-left">Address*</label>
                                <input type="text" class="form-control whitesmoke" id="InputMobile" placeholder="" name="address" required>
                            </div>
                            <div class="form-group pt-3">
                                <label for="exampleFormControlTextarea1" class="mb-0 fs-14 fw-600 text-black float-left">*Message</label>
                                <textarea class="form-control whitesmoke" id="exampleFormControlTextarea1" rows="3" name="massage"></textarea>
                            </div>
                            <button type="submit" class="btn btn-danger float-left">Send</button>
                        </form>
                    </div>
                    <div class="col-md-5">
                        <div class="bg-kiddies text-white py-5">
                            <div class="py-5">
                                <div class="py-5 px-3 text-left">
                                    <h1 class="mb-1">Retailer</h1>
                                    <p class="mb-0">A quick and simlified answer is that Lorem Ipsum refers to text that the DTP (Desktop Publishing) Industry</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



@endsection

@section('js')
    
@endsection

