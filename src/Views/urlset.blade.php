{!! '<?xml version="1.0" encoding="UTF-8"?>' !!}

@include('sitemap-generator::templates.comment-section')
<urlset {!! $schemas !!}>
    @foreach($tags as $tag)
        <url>
            <loc>{!! $tag->getLocation() !!}</loc>
            @if($tag->hasLastModified())
                <lastmod>{{ $tag->getLastModified() }}</lastmod>
            @endif
            @if($tag->hasChangeFrequency())
                <changefreq>{{ $tag->getChangeFrequency() }}</changefreq>
            @endif
            @if($tag->hasPriority())
                <priority>{{ $tag->getPriority() }}</priority>
            @endif

            @foreach($tag->extensions() as $extension)
                @include('sitemap-generator::extension.'. $extension->getView(), ['extensionTag' => $extension])
            @endforeach
        </url>
    @endforeach
</urlset>
