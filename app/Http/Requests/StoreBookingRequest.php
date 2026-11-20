<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
{
    /**
     * Izinkan semua pengunjung publik mengirim form pemesanan.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Aturan validasi form pemesanan paket.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'package_id' => ['required', 'integer', 'exists:packages,id'],
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:30'],
            'email' => ['required', 'email', 'max:255'],
            'address' => ['required', 'string', 'max:1000'],
            'instagram' => ['nullable', 'string', 'max:100'],
            'session_date' => ['required', 'date', 'after_or_equal:today'],
            'start_time' => ['required', 'date_format:H:i'],
            'payment_type' => ['required', 'in:deposit,full'],
            'notes' => ['nullable', 'string', 'max:1000'],
        ];
    }

    /**
     * Pesan error validasi dalam bahasa Indonesia.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'package_id.required' => 'Silakan pilih paket fotografi terlebih dahulu.',
            'package_id.exists' => 'Paket yang dipilih tidak tersedia.',
            'name.required' => 'Nama lengkap wajib diisi.',
            'phone.required' => 'Nomor WhatsApp / telepon wajib diisi.',
            'email.required' => 'Alamat email wajib diisi.',
            'email.email' => 'Format alamat email tidak valid.',
            'address.required' => 'Alamat lengkap wajib diisi.',
            'session_date.required' => 'Tanggal acara / sesi wajib dipilih.',
            'session_date.after_or_equal' => 'Tanggal sesi tidak boleh kurang dari hari ini.',
            'start_time.required' => 'Jam mulai sesi wajib dipilih.',
            'start_time.date_format' => 'Format jam mulai harus JJ:MM (contoh: 09:00).',
            'payment_type.required' => 'Pilih jenis pembayaran (DP atau Lunas).',
            'payment_type.in' => 'Jenis pembayaran tidak valid.',
        ];
    }
}
