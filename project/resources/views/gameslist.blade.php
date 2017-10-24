@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="flex-center position-ref">
                    <div class="content">
                        <h1>List of Games</h1>
                        <h2>Taken from the Steam API</h2>


                        @php
                            echo $games;
                        @endphp

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




@section('content')



@endsection