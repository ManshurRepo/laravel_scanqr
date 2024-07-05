<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdukRequest extends FormRequest
{
    private const STRING_MAX_25 = 'required|string|max:25';

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama_produk' => 'required|string|max:50',
            'kode_produk' => 'required|string|max:20|unique:produk,kode_produk,NULL,id_produk,sku,' . $this->sku . ',sn,' . $this->sn,
            'jumlah_produk' => 'required|integer',
            'sku' => self::STRING_MAX_25,
            'sn' => self::STRING_MAX_25,
            'lisensi1' => self::STRING_MAX_25,
            'lisensi2' => self::STRING_MAX_25,
            'divisi' => 'required|string|max:30',
            'keterangan' => 'required|string|max:100',
            'tanggal_order' => self::STRING_MAX_25,
            'tanggal_terima' => self::STRING_MAX_25,
            'tanggal_expired' => self::STRING_MAX_25,
            'posisi' => 'required|string|max:50',
            'status' => self::STRING_MAX_25
        ];
    }
}
