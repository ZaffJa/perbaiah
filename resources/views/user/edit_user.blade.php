@extends('layout.master_user') @section('content')
<div class="widget ">
    <div class="widget-header">
        <i class="icon-book"></i>
        <h3>Maklumat Ahli</h3>
    </div>
    <div class="widget-content">
        @include('layout.error_status')
        <form class="form-horizontal" method="post" action="{{ action('UserController@updateUser') }}" autocomplete="off" enctype="multipart/form-data">
            <fieldset>
                {{ csrf_field() }}
                <h3>Gambar Profil</h3>
                <hr>
                <div class="control-group">
                    <label class="control-label" for="failGambar">Gambar</label>
                    <div class="controls">
                        <input type="file" class="span6" name="gambar" accept="image/*" id="failGambar" value="Pilih Fail Gambar">
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <img src="{{ $user->gambar ? asset($user->gambar) : 'http://via.placeholder.com/200x200' }}" id="gambar" alt="" srcset="" style="width: 200px; height:200px;border-radius: 10px;">
                    </div>
                </div>
                <h3>Maklumat Diri</h3>
                <hr>
                <div class="control-group">
                    <label class="control-label" for="barcode">No. Ahli</label>
                    <div class="controls">
                        <p style="line-height: 28px;">{{ $user->no_ahli }}</p>
                        <input type="hidden" class="span6" name="no_ahli" value="{{ $user->no_ahli }}">
                        <input type="hidden" class="span6" name="id" value="{{ $user->id }}">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="barcode">Nama</label>
                    <div class="controls">
                        <input type="text" class="span6" name="nama" value="{{ $user->nama }}">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="barcode">Emel</label>
                    <div class="controls">
                        <input type="text" class="span6" name="emel" value="{{ $user->emel }}">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="no_kp">No K/P*</label>
                    <div class="controls">
                        <input type="number" class="span6" id="no_kp" name="no_kp" value="{{ $user->no_kp }}" placeholder="Contoh: 891012023445">
                    </div>
                </div>                
                <h3>Kata Laluan</h3>
                <hr>
                <div class="control-group">
                    <label class="control-label" for="kata_laluan">Kata Laluan Baru</label>
                    <div class="controls">
                        <input type="password" class="span6" id="kata_laluan" name="kata_laluan">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="taip_kata_laluan">Taip Semula Kata Laluan Baru</label>
                    <div class="controls">
                        <input type="password" class="span6" id="taip_kata_laluan" name="taip_kata_laluan">
                    </div>
                </div>
                <h3>Maklumat Ahli</h3>
                <hr>
                <div class="control-group">
                    <label class="control-label" for="title_id">Gelaran</label>
                    <div class="controls">
                        <select class="span6" name="title_id" id="title_id">
                            @foreach($titles as $title)
                            <option value="{{ $title->id }}" {{ $user->title_id == $title->id ? 'selected' : null }}>{{ $title->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="job_id">Jawatan</label>
                    <div class="controls">
                        <select class="span6" name="job_id" id="title_id">
                            @foreach($jobs as $job)
                            <option value="{{ $job->id }}" {{ $user->job_id == $job->id ? 'selected' : null }}>{{ $job->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="keputusan">Keputusan</label>
                    <div class="controls">
                        <select class="span6" name="keputusan" id="keputusan">
                            <option value="0" {{ $user->keputusan == 0 ? 'selected' : null }}>KIV</option>
                            <option value="1" {{ $user->keputusan == 1 ? 'selected' : null }}>Lulus</option>
                            <option value="2" {{ $user->keputusan == 2 ? 'selected' : null }}>Ditolak</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="tarikh_daftar">Tarikh Daftar</label>
                    <div class="controls">
                        <input type="date" class="span6" id="tarikh_daftar" name="tarikh_daftar" value="{{ isset($user->tarikh_daftar) ? $user->tarikh_daftar->format('Y-m-d') : null }}">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="tarikh_daftar_diterima">Tarikh Permohonan Diterima</label>
                    <div class="controls">
                        <input type="date" class="span6" id="tarikh_daftar_diterima" name="tarikh_daftar_diterima" value="{{ isset($user->tarikh_daftar_diterima) ? $user->tarikh_daftar_diterima->format('Y-m-d') : null }}">
                    </div>
                </div>
                <div class="control-group">
                    <label for="gambar_ahli" class="control-label">Gambar Ahli</label>
                    <div class="controls">
                        <input type="checkbox" class="toggle-value" {{ $user->gambar_ahli == 0 ? 'checked' : null }} id="gambar_ahli" name="gambar_ahli" value="{{ $user->gambar_ahli }}">
                    </div>
                </div>
                <div class="control-group">
                    <label for="serahan_sijil" class="control-label">Serahan Sijil</label>
                    <div class="controls">
                        <input type="checkbox" class="toggle-value" {{ $user->serahan_sijil == 1 ? 'checked' : '' }} id="serahan_sijil" name="serahan_sijil" value="{{ $user->serahan_sijil }}">
                    </div>
                </div>
                <div class="control-group">
                    <label for="serahan_kad_ahli" class="control-label">Kad Ahli</label>
                    <div class="controls">
                        <input type="checkbox" class="toggle-value" {{ $user->serahan_kad_ahli == 1 ? 'checked' : '' }} id="serahan_kad_ahli" name="serahan_kad_ahli" value="{{ $user->serahan_kad_ahli }}">
                    </div>
                </div>
                <div class="control-group">
                    <label for="yuran_kad_ahli" class="control-label">Bayaran Yuran Kad Ahli RM10</label>
                    <div class="controls">
                        <input type="checkbox" class="toggle-value" {{ $user->yuran_kad_ahli == 1 ? 'checked' : '' }} id="yuran_kad_ahli" name="yuran_kad_ahli" value="{{ $user->yuran_kad_ahli }}">
                    </div>
                </div>
                <div class="control-group">
                    <label for="yuran_masuk" class="control-label">Bayaran Yuran Masuk RM20</label>
                    <div class="controls">
                        <input type="checkbox" class="toggle-value" {{ $user->yuran_masuk == 1 ? 'checked' : '' }} id="yuran_masuk" name="yuran_masuk" value="{{ $user->yuran_masuk }}">
                    </div>
                </div>
                <div class="control-group">
                    <label for="yuran_tabung_khairat" class="control-label">Bayaran Yuran Tabung Khairat dan Kebajikan RM15</label>
                    <div class="controls">
                        <input type="checkbox" class="toggle-value" {{ $user->yuran_tabung_khairat == 1 ? 'checked' : '' }} id="yuran_tabung_khairat" name="yuran_tabung_khairat" value="{{ $user->yuran_tabung_khairat }}">
                    </div>
                </div>
                <h3>Telefon</h3>
                <hr>
                <div class="control-group">
                    <label class="control-label" for="no_tel_rumah">No Tel. Rumah</label>
                    <div class="controls">
                        <input type="text" class="span6" id="no_tel_rumah" name="no_tel_rumah" value="{{ $user->no_tel_rumah }}">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="no_tel">No Tel.</label>
                    <div class="controls">
                        <input type="text" class="span6" id="no_tel" name="no_tel" value="{{ $user->no_tel }}">
                    </div>
                </div>
                <h3>Alamat</h3>
                <hr>
                <div class="control-group">
                    <label class="control-label" for="alamat">Alamat Rumah</label>
                    <div class="controls">
                        <textarea name="alamat" id="alamat" rows="5" class="span6" style="resize: none;">{{ $user->alamat }}</textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="poskod">Poskod</label>
                    <div class="controls">
                        <input type="text" class="span6" id="poskod" name="poskod" value="{{ $user->poskod }}">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="state_id">Negeri</label>
                    <div class="controls">
                        <select class="span6" name="state_id" id="state_id">
                            @foreach($states as $state)
                            <option value="{{ $state->id }}" {{ $user->state_id == $state->id ? 'selected' : null }}>{{ $state->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <h3>Tanggungan</h3>
                <hr>
                <div class="control-group">
                    <label class="control-label">Tanggungan</label>
                    <div class="controls">
                        @if(count($user->dependents) < 1)
                            <label class="checkbox inline" style="padding-bottom: 10px;">
                                <input type="checkbox" class="toggle-value" id="tiadaTanggungan"> Tiada Tanggungan
                            </label>
                        @endif
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
                            @if(count($user->dependents) > 0)
                                @foreach($user->dependents as $dependent)
                                    <tr>
                                        <td><input type="text" style="width: 90%;"  name="tanggungan_nama[]" value="{{ $dependent->nama }}"></td>
                                        <td><input type="date" style="width: 90%;"  name="tanggungan_tarikh_lahir[]" value="{{ $dependent->tarikh_lahir }}"></td>
                                        <td><input type="text" style="width: 90%;" name="tanggungan_no_kp[]" value="{{ $dependent->no_kp }}"></td>
                                        <td><input type="text" style="width: 90%;"  name="tanggungan_hubungan[]" value="{{ $dependent->hubungan }}"></td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td><input type="text" style="width: 90%;"  name="tanggungan_nama[]" value=""></td>
                                    <td><input type="date" style="width: 90%;"  name="tanggungan_tarikh_lahir[]" value=""></td>
                                    <td><input type="text" style="width: 90%;" name="tanggungan_no_kp[]" value=""></td>
                                    <td><input type="text" style="width: 90%;"  name="tanggungan_hubungan[]" value=""></td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                        <button type="button" class="btn btn-primary pull-right" id="tambahTanggungan"><i class="fa icon-plus"></i></button>
                        <button type="button" style="margin-right: 10px;" class="btn btn-danger pull-right" id="tolakTanggungan"><i class="fa icon-minus"></i></button>
                    </div>
                </div>
                <div class="form-actions">
                    <a href="/user"><button type="button" class="btn">Batal</button></a>
                    <button type="submit" class="btn btn-primary">Kemaskini</button>
                </div>
                <!-- /form-actions -->
            </fieldset>
        </form>
    </div>
</div>
@endsection 
@section('scripts') 
<script>
    var tanggunganDefaultTableRow = $('#tanggunganTable').find('tbody tr').length;

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

        if (tanggunganTable.find('tbody tr').length == tanggunganDefaultTableRow) return;
        tanggunganTable.find('tbody tr').last().remove();
    });

    $('#gambar_ahli').bootstrapToggle({
        off: 'Tiada',
        on: 'Ada',
        offstyle: 'danger',
        onstyle: 'success',
        height: 20,
        width: 100
    });

    $('#serahan_sijil').bootstrapToggle({
        off: 'Belum',
        on: 'Sudah',
        offstyle: 'danger',
        onstyle: 'success',
        height: 20,
        width: 100
    });
    $('#serahan_kad_ahli').bootstrapToggle({
        off: 'Belum',
        on: 'Siap',
        offstyle: 'danger',
        onstyle: 'success',
        height: 20,
        width: 100
    });
    $('#yuran_kad_ahli').bootstrapToggle({
        off: 'Belum',
        on: 'Sudah',
        offstyle: 'danger',
        onstyle: 'success',
        height: 20,
        width: 100
    });
    $('#yuran_masuk').bootstrapToggle({
        off: 'Belum',
        on: 'Sudah',
        offstyle: 'danger',
        onstyle: 'success',
        height: 20,
        width: 100
    });
    $('#yuran_tabung_khairat').bootstrapToggle({
        off: 'Belum',
        on: 'Sudah',
        offstyle: 'danger',
        onstyle: 'success',
        height: 20,
        width: 100
    });

    $('.toggle-value').on('change', function () {
        var $toggle = $(this);

        if ($toggle.val() == 0) {
            $toggle.val(1);
        } else {
            $toggle.val(0);
        }
    });
</script>
@endsection