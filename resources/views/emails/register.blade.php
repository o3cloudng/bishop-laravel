@component('mail::message')
# Thank you for registering

Your registration for my book launch wa successful.

Details of the programme can be found below.

Address: Felicia Hall, Jogor Center Ibadan, Nigeria
Date: 1st of August, 2021
Time: 10 am

For enquiries, please, call +234 805 816 8881

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
