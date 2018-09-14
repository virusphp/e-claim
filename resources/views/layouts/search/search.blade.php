<div class="col-md-12 form-inline">
    <div class="col-md-3 col-offset-3">
        <div class="col-md-12 col-form-label form-inline">
            <div class="form-check form-check-inline mr-1">
                <input class="form-check-input" type="radio" id="jns_rawat" value="1" name="jns_rawat" checked>
                <label class="form-check-label" for="inline-radio1">Rawat Jalan</label>
            </div>
            <div class="form-check form-check-inline mr-1">
                <input class="form-check-input" type="radio" id="jns_rawat" value="2" name="jns_rawat">
                <label class="form-check-label" for="inline-radio2">Rawat Inap</label>
            </div>
            <div class="form-check form-check-inline mr-1">
                <input class="form-check-input" type="radio" id="jns_rawat" value="3" name="jns_rawat">
                <label class="form-check-label" for="inline-radio3">IGD</label>
            </div>
        </div>
    </div>
    <!-- Cara Bayar -->
    <div class="col-md-3 col-offset-3">
    <form action="">
        <div class="controls">
        <div class="input-group">
            <select id="cara_bayar" name="cara_bayar" class="form-control">
                <option value="">Pilih</option> 
                @foreach($cara_bayar as $data)
                    <option value="{{ $data->kd_cara_bayar }}">{{ $data->keterangan }}</option> 
                @endforeach
            </select>
        </div>
        </div>
    </form>
    </div>
    <div class="col-md-3 col-offset-3">
        <div class="form-group">
            <div class="input-group date {{ $errors->has('tgl') ? 'has-error' : '' }}" id="datetimepicker" >
                <div class="input-group-append">
                    <span class="input-group-text input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </span>
                </div>                        
                <input class="form-control" id="tgl_reg_filter" 
                        value="{{ date('d-m-Y')}}" 
                        placeholder="Tanggal Kwitansi" name="tgl_reg"
                        type="text"/>
                <div class="input-group-append">                    
                    <button type="submit" class="btn btn-primary" onclick="ajaxLoad()">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-offset-3">
    <form action="">
        <div class="controls">
        <div class="input-group">
            <input name="search" id="search" value="" class="form-control" placeholder="Cari..." type="text">
            <span class="input-group-append">
            <button class="btn btn-secondary" type="submit">Cari!</button>
            </span>
        </div>
        </div>
    </form>
    </div>
</div>