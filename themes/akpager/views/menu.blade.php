@foreach ($items as $item)
@if($item->children()->count())
<li class="dropdown">
    <a href="#">{{$item->title}}</a>
    <ul>
        <li class="dropdown"><a href="#">0o</a>
            <ul>
                <li><a href="index.html">Business</a></li>
                <li><a href="index2.html">Lead Capture</a></li>
                <li><a href="index3.html">Software Landing</a></li>
                <li><a href="index4.html">E-learning</a></li>
                <li><a href="index5.html">Saas Landing</a></li>
                <li><a href="index6.html">AI Software</a></li>
                <li><a href="index7.html">Website Builder</a></li>
                <li><a href="index8.html">Fintech</a></li>
                <li><a href="index9.html">Chatbot</a></li>
            </ul>
        </li>

    </ul>
</li>
@else
<li>
    <a href="{{$item->url}}">{{$item->title}}</a>
</li>
@endif
@endforeach

