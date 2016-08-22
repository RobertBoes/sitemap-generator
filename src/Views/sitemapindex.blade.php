{!! '<?xml version="1.0" encoding="UTF-8"?>' !!}
@include('templates.comment-section')
<sitemapindex {!! $schemas !!}>
    @foreach($tags as $tag)
        <sitemap>
            <loc>{!! $tag->getLocation() !!}</loc>
            @if($tag->hasLastModified())
                <lastmod>{{ $tag->getLastModified() }}</lastmod>
            @endif
        </sitemap>
    @endforeach
</sitemapindex>
