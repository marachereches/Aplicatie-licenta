@props(['url'])
<tr>
<td class="header">
<a href="{{ route('user.login') }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{asset('imagini/logo/bloom2.png')}}" class="logo" alt="Laravel Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
