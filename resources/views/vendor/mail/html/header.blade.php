@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTqjnHEbe_mazoUPJfqcdzvu38mAkNKNlYAZQ&usqp=CAU" class="logo" alt="Towel Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
