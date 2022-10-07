@extends('dashboard.layouts.main')

@section('container')
<div class="container lexend mt-3" style="margin: 5px auto">
    <div class="row my-3">
        <div class="col-lg-8">
            <h1 class="mb-3">{{ $guide->title }}</h1>
            <a href="/dashboard/guides" class="btn btn-success"><span data-feather="arrow-left"></span> Back to Guides</a>
            <a href="/dashboard/guides/{{ $guide->slug }}/edit" class="btn btn-warning"><span data-feather="tool"></span> Edit</a>
            <form class="d-inline" action="/dashboard/guides/{{ $guide->slug }}" method="post">
                @method('delete')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('are you sure?')"><span data-feather="x-square"></span> Delete</button>
            </form>
            <br>
            @if($guide->image)
            <img src="{{ asset('storage/'.$guide->image) }}" alt="userpost" class="mt-3 mb-3 img-fluid" style="border-radius: 13px">
            @else
            <img src="https://source.unsplash.com/1200x600?coffee" alt="unsplash-coffee" class="mt-3 mb-3 img-fluid" style="border-radius: 13px">
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
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo $pour->pouring_order; ?>" aria-expanded="false" aria-controls="flush-collapse<?php echo $pour->pouring_order; ?>"> <b>
                              Pouring Number {{ $pour->pouring_order }}</b>
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

            <div id="back_to_guide" class="mt-3">
                <a style="text-decoration: none;" href="/guides/{{ $guide->slug }}" class="btn btn-success "><b> START BREWING WITH THIS GUIDE</b></a>
            </div>
            
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

{{-- <h5>{{ $guide->origin }}</h5>
    {{ $guide->proses }}
    <br>
    {{ $guide->notes }}
    <br>
    {{ $guide->ratio }}
    <br>
    <p>{{ $guide->body }}</p> --}}
