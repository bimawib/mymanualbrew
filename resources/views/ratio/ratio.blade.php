@extends('layouts.main')

{{-- extends relatif ke folder view --}}

@section('child-container')


<hr class="mb-3">


<h1 class="mb-5 text-center features3">{{ $title }}</h1>

<div class="container lexend mb-3" id="guide_body">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- <a href="/guides" class="btn btn-warning mb-3 border border-dark"><span data-feather="arrow-left"></span> Back to Guides</a> --}}

<div class="remove_this_after_start">
    <div class="row justify-content-center mb-3 gram_option">
        <div class="col-md-8 d-flex justify-content-between" style="max-width: 400px">
            <div class="input-group-text">Coffee Ratio ( 1 : </div>
            <div class="input-group" style="max-width: 210px;">
                <input type="number" class="form-control inputted_water" id="inlineFormInputGroupUsername" style=" text-align:center" placeholder="Water Ratio)">
            </div>
        </div>
    </div>
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

<div id="start_pour" class="container lexend mt-3 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8 d-flex justify-content-center">
            <button class="btn btn-success mx-3" id="start_brewing">
                CALCULATE THE RATIO!
            </button>
        </div>
    </div>
</div>

</div>
</div>
</div>

<script>
    var waterRatio;
    var inputChoice;
    var amountOf;
    var calculatedCoffee;
    var calculatedWater;
    $(document).ready(function(){

        $('#start_brewing').click(function(){
            waterRatio = $('.inputted_water').val();
            inputChoice = $('.selected_ratio').val();
            amountOf = $('.inputted_amount').val();
            if(waterRatio == 0 || waterRatio==''){
                alert('You need to fill the water ratio');
                return;
            }
            if(amountOf == 0 || amountOf ==''){
                alert('You need to fill the amount');
                return;
            }
            
            if(inputChoice == 1){
                calculatedWater = amountOf * waterRatio;
                $('.amount_of').attr('value','You need '+calculatedWater+' grams of water with this ratio');
                $('#amounts_of').attr('style','');
            } else if(inputChoice == 2){
                calculatedCoffee = amountOf / waterRatio;
                $('.amount_of').attr('value','You need '+calculatedCoffee+' grams of coffee with this ratio');
                $('#amounts_of').attr('style','');
            }
        });
    });
</script>



@endsection