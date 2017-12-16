@extends('layout.master') @section('content')
<div class="widget ">
    <div class="widget-header">
        <i class="icon-book"></i>
        <h3>Maklumat Ahli</h3>
    </div>
    <div class="widget-content">
        @include('layout.error_status')
        <form class="form-horizontal" method="post" action="{{ action('UserController@store') }}" autocomplete="off" enctype="multipart/form-data">
            <fieldset>
                {{ csrf_field() }}
                <div class="control-group">
                    <label class="control-label" for="barcode">Nama</label>
                    <div class="controls">
                        <input type="text" class="span6" name="nama" value="{{ old('nama') }}">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="barcode">Emel</label>
                    <div class="controls">
                        <input type="text" class="span6" name="emel" value="{{ old('emel') }}">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="title_id">Gelaran</label>
                    <div class="controls">
                        <select class="span6" name="title_id" id="title_id">
                            @foreach($titles as $title)
                            <option value="{{ $title->id }}" {{ old('title') == $title->id ? 'selected' : null }}>{{ $title->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="job_id">Jawatan</label>
                    <div class="controls">
                        <select class="span6" name="job_id" id="job_id">
                            @foreach($jobs as $job)
                            <option value="{{ $job->id }}" {{ old('job_id') == $job->id ? 'selected' : null }}>{{ $job->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="no_kp">No K/P*</label>
                    <div class="controls">
                        <input type="number" class="span6" id="no_kp" name="no_kp" value="{{ old('no_kp') }}" placeholder="Contoh: 891012023445">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="no_tel_rumah">No Tel. Rumah</label>
                    <div class="controls">
                        <input type="text" class="span6" id="no_tel_rumah" name="no_tel_rumah" value="{{ old('no_tel_rumah') }}">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="no_tel">No Tel.</label>
                    <div class="controls">
                        <input type="text" class="span6" id="no_tel" name="no_tel" value="{{ old('no_tel') }}">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="alamat">Alamat Rumah</label>
                    <div class="controls">
                        <textarea name="alamat" id="alamat" rows="5" class="span6" style="resize: none;">{{ old('alamat') }}</textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="poskod">Poskod</label>
                    <div class="controls">
                        <input type="text" class="span6" id="poskod" name="poskod" value="{{ old('poskod') }}">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="state_id">Negeri</label>
                    <div class="controls">
                        <select class="span6" name="state_id" id="state_id">
                            @foreach($states as $state)
                            <option value="{{ $state->id }}" {{ old('state_id') == $state->id ? 'selected' : null }}>{{ $state->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="failGambar">Gambar</label>
                    <div class="controls">
                        <input type="file" class="span6" name="gambar" accept="image/*" id="failGambar" value="Pilih Fail Gambar">
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <img src="http://via.placeholder.com/200x200" id="gambar" alt="" srcset="" style="width: 200px; height:200px;border-radius: 10px;">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="tarikh_daftar">Tarikh Daftar</label>
                    <div class="controls">
                        <input type="date" class="span6" id="tarikh_daftar" name="tarikh_daftar" value="{{ old('tarikh_daftar') }}">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="tarikh_daftar_diterima">Tarikh Permohonan Diterima</label>
                    <div class="controls">
                        <input type="date" class="span6" id="tarikh_daftar_diterima" name="tarikh_daftar_diterima" value="{{ old('tarikh_daftar_diterima') }}">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Tanggungan</label>
                    <div class="controls">
                        <label class="checkbox inline" style="padding-bottom: 10px;">
                            <input type="checkbox" id="tiadaTanggungan"> Tiada Tanggungan
                        </label>
                        <br>
                        <table class="table table-striped table-bordered" id="tanggunganTable">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Tarikh Lahir</th>
                                    <th>No. MyKad / MyKid</th>
                                    <th>Hubungan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" style="width: 90%;"  name="tanggungan_nama[]" value=""></td>
                                    <td><input type="date" style="width: 90%;"  name="tanggungan_tarikh_lahir[]" value=""></td>
                                    <td><input type="text" style="width: 90%;" name="tanggungan_no_kp[]" value=""></td>
                                    <td><input type="text" style="width: 90%;"  name="tanggungan_hubungan[]" value=""></td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="button" style="line-height: 23px;" class="btn btn-primary pull-right" id="tambahTanggungan"><i class="fa icon-plus"></i></button>
                        <button type="button" style="line-height: 23px;" style="margin-right: 10px;" class="btn btn-danger pull-right" id="tolakTanggungan"><i class="fa icon-minus"></i></button>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="keputusan">Keputusan</label>
                    <div class="controls">
                        <select class="span6" name="keputusan" id="keputusan">
                            <option value="0" {{ old('keputusan') == 0 ? 'selected' : null }}>KIV</option>
                            <option value="1" {{ old('keputusan') == 1 ? 'selected' : null }}>Lulus</option>
                            <option value="2" {{ old('keputusan') == 2 ? 'selected' : null }}>Ditolak</option>
                        </select>
                    </div>
                </div>

                <div class="form-actions">
                    <a href="/admin/user"><button type="button" class="btn">Batal</button></a>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                <!-- /form-actions -->
            </fieldset>
        </form>
    </div>
</div>
@endsection 
@section('scripts') 
<script>
    $('#tiadaTanggungan').on('change', function() {
        $('#tanggunganTable').toggle();
        $('#tambahTanggungan').toggle();
        $('#tolakTanggungan').toggle();
    });

    $('#failGambar').on('change', function() {
        var input = this
        if (input.files && input.files[0]) {
            var reader = new FileReader();
        
            reader.onload = function(e) {
              $('#gambar').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
          }
    });

    $('#tambahTanggungan').on('click', function() {
        var tanggunganTable = $('#tanggunganTable');
        var markup = 
          "<tr>"
            + "<td><input type='text' style='width: 90%;' name='tanggungan_nama[]' value=''></td>"
            + "<td><input type='date' style='width: 90%;' name='tanggungan_tarikh_lahir[]' value=''></td>"
            + "<td><input type='text' style='width: 90%;' name='tanggungan_no_kp[]' value=''></td>"
            + "<td><input type='text' style='width: 90%;' name='tanggungan_hubungan[]' value=''></td>"
        + "</tr>";

        tanggunganTable.find('tbody').append(markup)
    });

    $('#tolakTanggungan').on('click', function() {
        var tanggunganTable = $('#tanggunganTable');

        if (tanggunganTable.find('tbody tr').length == 1) return;
        tanggunganTable.find('tbody tr').last().remove();
    });


</script>
@endsection