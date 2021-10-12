<?php

namespace App\Rules;
use ReCaptcha\ReCaptcha;
use Illuminate\Contracts\Validation\Rule;

class Captcha implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $recaptcha = new ReCaptcha('6LdkE6saAAAAAF9hbY5w0Tlz77QCG_Kh7E6wmAsS');
        $response = $recaptcha->verify($value, $_SERVER['REMOTE_ADDR']);
        return $response->isSuccess();

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Làm ơn check mã Captcha';	//trả về thông báo khi lỗi không xác nhận captcha
    }
}
