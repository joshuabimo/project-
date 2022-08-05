@extends('layout/v_template')

@section('title','Add Siswa')
@section('content')
<form action="/siswa/insert" method="POST" enctype="multipart/form-data">
   @csrf
   <div class="content">
    <div class="row">
        <div class="col-sm-6">
            
        <div class="form-group">
         <label>NIP</label>
         <input name="nip" class="form-control " value="{{old('nip')}}">
         <div class="text-danger">
            @error('nip')
                    {{ $message}}
            @enderror 
         </div>
        </div> 
       
        
            <div class="form-group">
         <label>Nama Siswa</label>
         <input name="nama_siswa" class="form-control " value="{{old('nama_siswa')}}">
         <div class="text-danger">
            @error('nama_siswa')
                    {{ $message}}
            @enderror 
         </div>
        </div>
        
        
            <div class="form-group">
         <label>Mata Pelajaran</label>
         <input name="mapel" class="form-control" value="{{old('mapel')}}">
         <div class="text-danger">
            @error('mapel')
                    {{ $message}}
            @enderror 
         </div>
        </div>
        
        
           

        <div class="form-group">
            <button class="btn btn-primary btn-sm">Simpan</button>

        </div>
        
    </div>
    </div>
   </div>
</form>
@endsection