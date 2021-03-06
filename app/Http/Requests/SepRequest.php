<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SepRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'jnsPelayanan' => 'required',
            'noKartu' => 'required|min:8',
            'noMR' => 'required',
            'klsRawat' => 'required',
            'cob' => 'required',
            'no_reg' => 'required',
            'noRujukan' => 'required',
            'ppkRujukan' => 'required',
            'asalRujukan' => 'required',
            'tglRujukan' => 'required',
            'diagAwal' => 'required',
            'tujuan' => 'required',
            'eksekutif' => 'required',
            'noTelp' => 'required',
            // 'noSurat' => 'required',
            // 'kodeDPJP' => 'required',
            'catatan' => 'required',
            'katarak' => 'required',
            'lakaLantas' => 'required',
            'penjamin' => 'required',
            'suplesi' => 'required',
            'noSepSuplesi' => 'required',
            'tglKejadian' => 'required',
            'kdPropinsi' => 'required',
            'kdKabupaten' => 'required',
            'kdKecamatan' => 'required'
            //
        ];
    }

    public function messages()
    {
        return [
            'noRujukan.required' => 'No Rujukan tidak boleh kosong!',
            'noRujukan.min' => 'No Rujukan kurang dari 5 digit!',
            'asalRujukan.required' => 'Asal Rujukan Tidak boleh kosong!',
            'diagAwal.required' => 'Diagnosa Awal tidak boleh kosong!',
            'tujuan.required' => 'Poli Tujuan tidak boleh kosong!',
            'noTelp.required' => 'No telp tidak boleh kosong!',
            'catatan.required' => 'Catatan Tidak boleh null',
            'noSurat.required' => 'No Surat tidak boleh harus kosong!',
            'noTelp.required' => 'No Telp tidak boleh harus unit!',
            'kodeDPJP.required' => 'Kode DPJP tidak boleh kosong!',
            'klsRawat.required' => 'Kelas Rawat tidak boleh kosong!',
            'tglRujukan.required' => 'TglRujukan tidak boleh kosong!'
        ];
    }
}
