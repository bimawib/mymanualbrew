
@extends('layouts.main')

@section('child-container')

<script>
    var totalPouring = 0;
    var pouringOrder = [];
    var pouringTime = [];
    var waterRatio = [];
</script>

<hr class="mb-5">
<div class="container lexend mb-3" id="guide_body">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- <a href="/guides" class="btn btn-warning mb-3 border border-dark"><span data-feather="arrow-left"></span> Back to Guides</a> --}}
<h2>{{ $guide->title }}</h2>
<p>By <a style="text-decoration: none" href="/users/{{ $guide->user->username }}">{{ $guide->user->name }}</a> {{ $guide->created_at->diffForHumans() }}</p>
@if($guide->image)
    <img style="max-height: 400px; overflow:hidden; border-radius: 13px" src="{{ asset('storage/'.$guide->image) }}" alt="userguide" class=" mb-3 img-fluid">
            @else
            <img src="https://source.unsplash.com/1200x600?coffee" alt="unsplash-coffee" class="mb-3 img-fluid" style="border-radius: 13px">
            @endif
<h5>Methods = {{ $guide->guide_category->name }}</h5>
<h5>Origin = {{ $guide->origin }}</h5>
<h5>Process = {{ $guide->proses }}</h5>
<h5>Notes = {{ $guide->notes }}</h5>
<h5>Ratio = 1 : {{ $guide->ratio }}</h5>

<div class="accordion accordion-flush border border-dark mt-3" id="accordionFlushExample">
@foreach ($pourings->pouring as $pour)
    
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-heading<?php echo $pour->pouring_order; ?>">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo $pour->pouring_order; ?>" aria-expanded="false" aria-controls="flush-collapse<?php echo $pour->pouring_order; ?>">
              Pouring Number {{ $pour->pouring_order }}
            </button>
          </h2>
          <div id="flush-collapse<?php echo $pour->pouring_order; ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?php echo $pour->pouring_order; ?>" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                Pouring Time : {{ $pour->pouring_time }} second
                <br>
                Water Ratio : {{ $pour->water_ratio }} / 100%
            </div>
            <script>
                totalPouring++;
                pouringOrder.push("{{ $pour->pouring_order }}");
                pouringTime.push("{{ $pour->pouring_time }}");
                waterRatio.push("{{ $pour->water_ratio }}");
            </script>
          </div>
        </div>

@endforeach
</div>

<div id="start_pour" class="container lexend mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8 d-flex justify-content-center">
            <a href="/guides" class="btn btn-warning mx-3">BACK TO GUIDES</a>
            <button class="btn btn-success mx-3" id="start_brewing">
                BREW WITH THIS GUIDE!
            </button>
        </div>
    </div>
</div>

</div>
</div>
</div>

<div id="pouring_body" class="container lexend mb-5 not_displayed">

    {{-- display this after click --}}
<div class="display_this_after_start not_displayed">

    <div class="row justify-content-center">
        <div class="col-md-8 d-flex justify-content-center" style="max-width: 400px">
            <h1 id="cobaNumber">
                Pouring Number
            </h1>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8 mt-3 d-flex justify-content-center" style="max-width: 400px">
            <h5 id="pourNeeded">
                You need to pour 
            </h5>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8 d-flex justify-content-center" style="max-width: 400px">
            <h5 id="pourAfter">
                (Total Water Poured After :)
            </h5>
        </div>
    </div>

    <div class="row justify-content-center mt-3 mb-3">
        <div class="col-md-8 d-flex justify-content-center" style="max-width: 400px">
            <h1 id="cobaDelay" style="font-size: 96px">
                00:00
            </h1>
        </div>
    </div>

    <div class="row d-flex justify-content-center mt-3 mb-3">
        <div class="col-md-8 " style="max-width: 400px">
            <div class="progress" style="height: 20px; ">
                <div id="theProgress" class="progress-bar bg-info justify-content-center" role="progressbar" aria-label="Info example" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
    </div>

</div>

<div class="remove_this_after_start">
    <div class="row justify-content-center mb-3 amount_option">
        <div class="col-md-8 d-flex justify-content-between" style="max-width: 400px">
            <div class="input-group-text">Enter the amount of</div>
            <select class="form-select selected_ratio" id="inlineFormSelectPref" required style="max-width: 182px">
                <option value="1"> Coffee </option>
                <option value="2"> Water </option>
            </select>
        </div>
    </div>
    <div class="row justify-content-center mb-3 gram_option">
        <div class="col-md-8 d-flex " style="max-width: 400px">
            <div class="input-group">
            <input type="number" class="form-control inputted_amount" id="inlineFormInputGroupUsername" style="max-width: 300px; text-align:center">
            </div>
            <div class="input-group-text">gram</div>
        </div>
    </div>

    <div class="row justify-content-center mb-3">
        <div class="col-md-8 d-flex justify-content-center" style="max-width: 400px">
            <div class="input-group">
                <div id="amounts_of" style="display: none">
                <input class="form-control amount_of" type="text" value="You need x grams of x" aria-label="Disabled input example" style="text-align:center" disabled readonly>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="brewing_complete not_displayed" style="margin-top: 23px">
    <div class="row justify-content-center mb-3">
        <div class="col-md-8 d-flex justify-content-evenly" style="max-width: 400px">
            <h1>
                <b>Brewing Complete</b>
            </h1>
        </div>
    </div>
    <div class="row justify-content-center mt-3 mb-3">
        <div class="col-md-8 d-flex justify-content-evenly" style="max-width: 400px">
            <img width="130px" src="{{ URL::asset('img/tick.png') }}" alt="Tick icons created by Freepik - Flaticon</a>">
        </div>
    </div>
    <div class="row justify-content-center mb-3">
        <div class="col-md-8 d-flex justify-content-evenly" style="max-width: 400px">
            <h2>
                <b>Enjoy Your Coffee!</b>
            </h2>
        </div>
    </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8 d-flex justify-content-evenly" style="max-width: 400px">
            <div id="stop_the_brew" class="not_displayed">
            <a style="text-decoration: none; color:white" href="/guides/{{ $guide->slug }}" class="btn btn-danger mx-3 mt-3">STOP BREWING</a>
            </div>
            <div id="back_to_guide">
                <a style="text-decoration: none;" href="/guides/{{ $guide->slug }}" class="btn btn-warning ">BACK TO GUIDE</a>
            </div>
            <button class="btn btn-success remove_after_brewing" id="start_pouring">
                START BREWING!
            </button>
        </div>
    </div>
    
</div>

<script>

    var arrayLength = pouringOrder.length;
    var guideRatio = "{{ $guide->ratio }}";
    var selectedValue;
    var totalCoffee;
    var totalWater;
    var asu = 1;

    var secondCountdown;
    var progressAfter;
    var progressTotal;
    var progressTick;
    var waterAfter;
    var calculatedWater;

    var secondArray;
    var waterArray;

    jQuery(document).ready(function(){
        
        $('#start_brewing').on('click',function(){
            $('#guide_body').toggleClass('not_displayed');
            $('#pouring_body').toggleClass('not_displayed'); 
        });

        function checkAmount(){
            if(totalCoffee == ''){
                $('#amounts_of').attr('style','display: none');
            } else {
                $('#amounts_of').attr('style','');
            }
        }

        function valueOnChange(){
            selectedValue = $('.selected_ratio').val();

            if(selectedValue == 2){
                totalWater = $('.inputted_amount').val();
                if(totalWater > 2000){
                    alert('The value of water should not exceed 2000 grams');
                } else {
                    totalCoffee = totalWater / guideRatio;
                    $('.amount_of').attr('value',"You need "+totalCoffee.toPrecision(4)+" grams of coffee");
                    checkAmount();
                }   
            } else if(selectedValue == 1){
                totalCoffee = $('.inputted_amount').val();
                if(totalCoffee > 150){
                    alert('The value of coffee should not exceed 150 grams');
                } else {
                    totalWater = totalCoffee * guideRatio;
                    $('.amount_of').attr("value","You need "+totalWater+" grams of water");
                    checkAmount();
                }
            }
        }

        $('.selected_ratio').change(function(){
            valueOnChange();
        });
        $('.inputted_amount').change(function(){
            valueOnChange();
        });
        

        $('#start_pouring').on('click',function(){

            selectedValue = $('.selected_ratio').val();
            if(selectedValue == 2){
                totalWater = $('.inputted_amount').val();
                totalCoffee = totalWater / guideRatio;
                    if(totalWater > 2000){
                    alert('The value of water should not exceed 2000 grams');
                    return;
                }
            } else if(selectedValue == 1){
                totalCoffee = $('.inputted_amount').val();
                totalWater = totalCoffee * guideRatio;
                    if(totalCoffee > 150){
                    alert('The value of coffee should not exceed 150 grams');
                    return;
                }
            }

            if(totalCoffee == ''){
                alert('Fill the amount before starting the brewing process');
                return;
            }

            $(this).remove();
            $('#back_to_guide').toggleClass('not_displayed');
            $('#stop_the_brew').toggleClass('not_displayed');
            $('.display_this_after_start').toggleClass('not_displayed');
            $('.remove_this_after_start').toggleClass('not_displayed');

            // for(let i = 0; i < arrayLength; i++){
            //     waterAfter = 0;
            //     progressAfter = 0;
            //     secondArray = pouringTime[i];
            //     wadahSecondArray = parseInt(secondArray);
            //     waterArray = waterRatio[i];
            //     progressTick = 100 / secondArray;
            //     calculatedWater = (waterArray / 100) * totalWater;
            // }
            // var totalPouring = 0;
            // var pouringOrder = [];
            // var pouringTime = [];
            // var waterRatio = [];

            var counter = 1;
            var ct = 0;
            var tick = 0;
            var toMinute = 0;
            var toSeconds = 0;
            var weightHelper = 0;
            var weightNow = 0;
            var weightAfter = 0;
            function cobaInt(){
                var asu = setInterval(function() {
                    var tickPercent = 100 / (parseInt(pouringTime[ct]));
                    var pouringTotale = ct + 1;
                    tick += tickPercent;
                    ngeCounter = pouringTime[ct] - counter;
                    weightNow = totalWater * (waterRatio[ct]/100);
                    weightAfter = weightHelper + weightNow;
                    toMinute = Math.floor(ngeCounter / 60);
                    toSeconds = ngeCounter - toMinute * 60;
                    if(toSeconds < 10){
                        toSeconds = '0'+toSeconds;
                    }

                    $('#theProgress').attr('style','width:'+tick+'%');
                    $('#theProgress').attr('aria-valuenow',tick);
                    $('#cobaNumber').html('Pouring Number '+pouringTotale);
                    $('#cobaDelay').html(toMinute+':'+toSeconds);
                    $('#pourNeeded').html('You need to pour <b>'+weightNow+'</b> gr of water');
                    $('#pourAfter').html('(Total Water Poured After : '+weightAfter+' gr)');
                    

                    console.log('now'+weightNow);
                    console.log('after'+weightAfter);
                    console.log(toMinute+':'+toSeconds);
                    console.log(tick+'%');
                    counter++;
                if(counter == pouringTime[ct]){
                    clearInterval(asu);
                    ct++;
                    weightHelper+=weightNow;
                    if(ct < arrayLength){
                        // taruh disini yang buat gram water
                        counter = 0;
                        tick = 0;
                        cobaInt();
                    } else {
                        $('#stop_the_brew a').removeClass('btn-danger');
                        $('#stop_the_brew a').addClass('btn-success');
                        $('.display_this_after_start').css('display','none');
                        $('.brewing_complete').toggleClass('not_displayed');
                        $('#stop_the_brew a').html('GO BACK TO GUIDE');

                        console.log('beres');
                    }
                }
            },1000);
            }
            cobaInt();


    });
});

</script>

@endsection
                

