<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;
use Illuminate\Translation\PotentiallyTranslatedString;

class Recaptcha implements ValidationRule
{
    /**
     * Jalankan validasi token reCAPTCHA ke endpoint verify Google.
     *
     * @param  Closure(string, ?string=): PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (empty($value) || ! is_string($value)) {
            $fail('Silakan centang verifikasi reCAPTCHA.');

            return;
        }

        $secretKey = (string) config('services.recaptcha.secret_key');

        if ($secretKey === '') {
            $fail('Kunci reCAPTCHA belum dikonfigurasi di server.');

            return;
        }

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => $secretKey,
            'response' => $value,
            'remoteip' => request()->ip(),
        ]);

        if (! $response->successful() || ! (bool) $response->json('success')) {
            $fail('Verifikasi reCAPTCHA tidak valid. Silakan coba lagi.');
        }
    }
}
