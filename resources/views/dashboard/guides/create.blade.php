@extends('dashboard.layouts.main')

@section('container')

<div class="kosong">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="text-center">Create new Guide</h1>
        </div>
    </div>
    <div class="col-lg-8">
    <form method="post" action="/dashboard/guides" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label @error('title') is-invalid @enderror">Title</label>
          <input type="text" class="form-control" id="title" name="title">
        @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label @error('slug') is-invalid @enderror">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug">
            @error('slug')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        </div>
        <div class="mb-3">
            <label for="origin" class="form-label @error('origin') is-invalid @enderror">Origin</label>
            <input type="text" class="form-control" id="origin" name="origin">
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
            <label for="notes" class="form-label @error('notes') is-invalid @enderror">Notes</label>
            <input type="text" class="form-control" id="notes" name="notes">
            @error('notes')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        </div>
        <div class="mb-3">
            <label for="ratio" class="form-label @error('ratio') is-invalid @enderror">Coffee-Water Ratio (1 : Water)</label>
            <input type="number" class="form-control" id="ratio" name="ratio" min='1' max='50'>
            @error('ratio')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        </div>
        <div class="mb-3">
            <label for="category" name="category" class="form-label">Brewing Methods</label>
            <select name="guide_category_id" class="form-select">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        {{-- <div class="mb-3">
            <label for="image" class="form-label">Upload an Image</label>
            <img class="img-preview img-fluid mb-1 col-sm-5">
            <input class="mt-1 form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
          </div> --}}
        {{-- <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            @error('body')
        <p class="text-danger">{{ $message }}</p>
        @enderror
            <input type="text" class="form-control" id="body" name="body">
        </div> --}}
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
                <tr>
                    <td>
                        {{-- pouring time --}}
                        <input type="number" class="form-control" name="pouring_time[0]" min="5" required>
                    </td>
                    <td>
                        {{-- water ratio --}}
                        <input type="number" class="form-control ratio_0" name="water_ratio[0]" min="1" max='100' required>
                    </td>
                    <input type="hidden" class="form-control" name="pouring_order[0]" value="1">
                </tr>
            </table>
        </div>
        {{-- make this not a button --}}
        {{-- <div id="check_ratio" class="btn btn-primary mb-5">Create</div> --}}
        <button type="submit" class="btn btn-primary mb-5" id="save_to">Create Guide</button>
    </form>
    </div>
    </div>
    
<script src="{{ URL::asset('js/jquery.js') }}"></script>

<script>
    // UNTUK DYNAMIC FORM

    var id = 0;
    var step = 1;
    var totalRatio = 0;

        jQuery(document).ready(function(){
        
        $('#add_row').on('click',function(){
            if(step >= 20){
                alert("You're adding too much step!");
            } else {
                id++;
                step++;
                    $('#pouring_table').append(
                    "<tr id='pouring"+id+"'><td><input type='number' class='form-control' name='pouring_time["+id+"]' min='5' required></td><td><input type='number' class='form-control ratio_"+id+"' name='water_ratio["+id+"]' required min='1' max='100'></td><input type='hidden' class='form-control' name='pouring_order["+id+"]' value='"+step+"'></tr>"
                );
            }
        })

        $('#delete_row').click(function(){
            if(id !== 0){
                $('#pouring'+id).remove();
                id--;
                step--;
            } else {
                alert("You can't delete this step!");
            }
            
        });

        $('#save_to').click(function(){
            for(i = 0; i < step; i++){
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

    })

</script>

<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change',function(){
        fetch('/dashboard/guide/checkSlug?title=' + title.value)
        .then(response=>response.json())
        .then(data=>slug.value=data.slug)
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