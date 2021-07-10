@component('mail::message')
# Contact Email from "User"

This message was received from "User"

@component('mail::button', ['url' => 'https://bishopkunleamoo.com'])
Visit site
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
