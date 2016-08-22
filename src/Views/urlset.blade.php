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

            @if($tag instanceof \RobertBoes\SitemapGenerator\Tag\VideoTag)
                @include('sitemap-generator::templates.video-location', ['tag' => $tag])
            @endif
        </url>
    @endforeach
</urlset>
