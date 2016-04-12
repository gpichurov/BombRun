@extends('layouts.app')
@section('content')
    <link href="/style.css" rel="stylesheet">
    <div class="panel panel-default todo-panel">
        <div class="panel-heading clearfix">
            <h3 class="pull-left">SHOP</h3>
        </div>

        <div class="panel-body">
            <div class="col-sm-2" id="category">
                <div>
                    <h4>Category:</h4>
                </div>
                <div class="list-group">
                    <input type="checkbox" value="bombs" id="bombs">
                    <label for="bombs">Bombs</label>
                    <br>
                    <input type="checkbox" value="energy" id="energy">
                    <label for="energy">Energy potions</label>
                    <br>
                    <input type="checkbox" value="speed" id="speed">
                    <label for="speed">Speed potions</label>
                </div>

            </div>
            <div class="row category-credit col-sm-offset-2" >
                @if ($items->isEmpty())
                    <div class="list-group-item">
                        Sorry, no items found
                    </div>
                @else
                    @foreach($items as $item)
                        <div class=" col-sm-3 thumbnail {{ $item->category }} " style="margin: 3em">
                            <div class="thumbnail">
                                <a class="" href="{{ route('shop.show', ['id' => $item->id]) }}">
                                    <img class="img-responsive" src="images/big/{{$item->big_image}}" alt="">
                                    <div class="wrapper">
                                        <div class="caption post-content">
                                            <h4>{{ $item->name }}</h4>
                                        </div>
                                    </div>
                                </a>
                                <div class="wrapper">
                                    <div class="post-meta">
                                        <div class="price text-right">{{ $item->price }}
                                            <img src="images/coins.png" alt="" height="20" width="20">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <script>

        $('#bombs,#energy,#speed').click(function() {

            if ($('#bombs').is(':checked')) {
                $(".bombs").show();
            } else {
                $(".bombs").hide();
            }

            if ($('#energy').is(':checked')) {
                $(".energy").show();
            } else {
                $(".energy").hide();
            }

            if ($('#speed').is(':checked')) {
                $(".speed").show();
            } else {
                $(".speed").hide();
            }

            if (!$('#bombs').is(':checked') && !$('#speed').is(':checked') && !$('#energy').is(':checked')) {
                $(".speed").show();
                $(".energy").show();
                $(".bombs").show();
            }
        });
    </script>

@endsection