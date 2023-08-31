@foreach($childs as $child)
<li>
    <a href="@if($child->cust_slug != ''){{ $child->cust_slug }}@else /webpages/{{ $child->slug }}@endif" @if($child->new_tab == 1)  target="_blank" @endif>{{ $child->alis_title }}</a>
</li>
@endforeach