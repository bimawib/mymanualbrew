@extends('dashboard.layouts.main')

@section('container')
<div class="kosong">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="text-center">Edit Guide</h1>
    </div>
</div>
<div class="col-lg-8">
<form method="post" action="/dashboard/guides/{{ $guide->slug }}" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="mb-3">
      <label name="title" for="title" class="form-label">Title</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title', $guide->title), $guide->title }}">
      @error('title')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
        <label for="slug" name="slug" class="form-label">Slug</label>
        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug', $guide->slug), $guide->slug }}">
        @error('slug')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
        <label for="origin" class="form-label">Origin</label>
        <input type="text" class="form-control @error('origin') is-invalid @enderror" id="origin" name="origin" required value="{{ old('origin', $guide->origin), $guide->origin }}">
        @error('origin')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
    </div>
    <div class="mb-3">
        <label for="proses" class="form-label @error('proses') is-invalid @enderror">Process</label>
            {{-- <input type="text" class="form-control" id="proses" name="proses"> --}}
            <select name="proses" id="proses" class="form-select">
                <option value="Natural Process">Natural Process</option>
                <option value="Honey Process">Honey Process</option>
                <option value="Washed Process">Washed Process</option>
                <option value="Lactic Process">Lactic Process</option>
                <option value="Carbonic Maceration Process">Carbonic Maceration Process</option>
                <option value="Anaerobic Fermentation Process">Anaerobic Fermentation Process</option>
            </select>
        @error('proses')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
    </div>
    <div class="mb-3">
        <label for="notes" class="form-label">Notes</label>
        <input type="text" class="form-control @error('notes') is-invalid @enderror" id="notes" name="notes" required value="{{ old('notes', $guide->notes), $guide->notes }}">
        @error('notes')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
    </div>
    <div class="mb-3">
        <label for="ratio" class="form-label">Coffee-Water Ratio (1 : Water)</label>
        <input type="number" class="form-control @error('ratio') is-invalid @enderror" id="ratio" min='1' max='50' name="ratio" required value="{{ old('ratio', $guide->ratio), $guide->ratio }}">
        @error('ratio')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
    </div>
    <div class="mb-3">
        <label for="category" name="category" class="form-label">Category</label>
        <select name="guide_category_id" class="form-select">
            @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <hr>
        <h4>Pouring Steps</h4>
        <div class="btn btn-success mb-3" id="add_row" style="width: 40px">  +  </div>
        <div class="btn btn-danger mb-3" style="width: 40px" id="delete_row">  -  </div>
        <div class="mb-3">
            <table class="table table-striped" width="75%" id="pouring_table">
                <thead>
                    <tr>
                        <th>Pouring Time (second)</th>
                        <th>Water Ratio / 100%</th>
                    </tr>
                </thead>
                @php
                $index_val = 0;
                $step = 1;
                @endphp
                <script>
                    var id = 0;
                    var step = 1;
                </script>

                @foreach($pourings->pouring as $pour)
                <tr id="pouring{{ $index_val }}">
                    <td>
                        {{-- pouring time --}}
                        <input type="number" class="form-control" name="pouring_time[{{ $index_val }}]" required min='5' value="{{ $pour->pouring_time }}">
                    </td>
                    <td>
                        {{-- water ratio --}}
                        <input type="number" class="ratio_{{ $index_val }}  form-control" name="water_ratio[{{ $index_val }}]" required value="{{ $pour->water_ratio }}" min='1' max='100' >
                    </td>
                    <input type="hidden" class="form-control" name="pouring_order[{{ $index_val }}]" value="{{ $step }}">
                    <script>
                        id++;
                        step++;
                    </script>
                </tr>
                @php 
                    $index_val++;
                    $step++;
                @endphp
                
                @endforeach
                
            </table>
            
        </div>
    
    <button type="submit" id="save_to" class="btn btn-primary mb-5">Edit Guide</button>
</form>
</div>
</div>

{{-- increment id and step after appending --}}
{{-- add algorithm to prevent the first to be deleted
in controller, if less than before maka hapus yg berlebih,
if more, then create --}}

<script>

    $(document).ready(function(){

    var totalRatio = 0;

        $('#add_row').on('click',function(){
            if(id >= 20){
                alert("You're adding too much step!");
            } else {
            $('#pouring_table').append(
                "<tr id='pouring"+id+"'><td><input type='number' class='form-control' min='5' name='pouring_time["+id+"]' required></td><td><input type='number' class='form-control ratio_"+id+"' name='water_ratio["+id+"]' min='1' max='100' required></td><input type='hidden' class='form-control' name='pouring_order["+id+"]' value='"+step+"'></tr>"
            );
            id++;
            step++;
            }
        })

        $('#delete_row').click(function(){
            if(id === 1){
                alert("You can't delete this step!");
            } else {
                $('#pouring'+(id - 1)).remove();
                id--;
                step--;
            }
        });

        $('#save_to').click(function(){
            for(i = 0; i < id; i++){
                var thisRatio = parseInt($('.ratio_'+i).val());
                totalRatio = totalRatio + thisRatio;
            }
            console.log(totalRatio);
            if(totalRatio > 100){
                totalRatio = 0;
                alert('Total water ratio percentage cannot exceed 100%');
                return false;
            }
        });

    });

    

</script>

<script>
    const title = document.querySelector('.mb-3 #title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change',function(){
        fetch('/dashboard/guide/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });

    document.addEventListener('trix-file-accept',function(e){
        e.preventDefault();
    });

    function previewImage(){
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload=function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>


@endsection

