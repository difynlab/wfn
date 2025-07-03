@extends('frontend.layouts.app')

@section('title', 'Article')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/article.css') }}">
@endpush

@section('content')
    <div class="article page-global">
        <div class="section-1 container section-margin">
            <div class="row title-row">
                <div class="col-10 left">
                    <h1 class="section-title">Sed ut perspiciatis unde omnis iste natus error sit voluptatem</h1>

                    <p class="details">
                        <span class="author">Written by John doe</span>
                        <span class="line">|</span>
                        <span class="date">March 20, 2025</span>
                    </p>
                </div>

                <div class="col-2 right">
                    <i class="bi bi-share icon"></i>
                </div>
            </div>

            <img src="{{ asset('storage/frontend/single-article-1.png') }}" alt="image" class="thumbnail-image">

            <div class="section-description">
                <p>
                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque 
                    laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto 
                    beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut 
                    odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. 
                    Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, 
                    sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. 
                    Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut 
                    aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit 
                    esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?
                </p>

                <br>

                <p>
                    At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti 
                    atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique 
                    sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum 
                    facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil 
                    impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. 
                    Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates 
                    repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis
                    voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat
                </p>

                <br>

                <p>
                    At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti 
                    atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique 
                    sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum 
                    facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil 
                    impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. 
                    Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates 
                    repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut 
                    reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.
                </p>

                <br>

                <p>
                    At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti 
                    atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique 
                    sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum 
                    facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil 
                    impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. 
                    Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates 
                    repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut 
                    reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.
                </p>

                <br>

                <p>
                    At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti 
                    atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique 
                    sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum 
                    facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil 
                    impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. 
                    Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates 
                    repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut 
                    reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.
                </p>
            </div>
        </div>
        
        <div class="section-2 container">
            <p class="section-title">Related Insights & Articles</p>

            <div class="row">
                <div class="col-4 single-article">
                    <img src="{{ asset('storage/frontend/article-1.png') }}" alt="article-image" class="image">

                    <p class="date">April 4th 2025</p>

                    <p class="title">Sed do eiusmod tempor incididun ut labore et dolore</p>

                    <div class="content">Lorem ipsum dolor sit amet, consectetur adipiscin  elit, exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>

                    <a href="{{ route('frontend.articles.show', 1) }}" class="read-more">Read more</a>
                </div>

                <div class="col-4 single-article">
                    <img src="{{ asset('storage/frontend/article-2.png') }}" alt="article-image" class="image">

                    <p class="date">April 4th 2025</p>

                    <p class="title">Sed do eiusmod tempor incididun ut labore et dolore</p>

                    <div class="content">Lorem ipsum dolor sit amet, consectetur adipiscin  elit, exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>

                    <a href="{{ route('frontend.articles.show', 1) }}" class="read-more">Read more</a>
                </div>

                <div class="col-4 single-article">
                    <img src="{{ asset('storage/frontend/article-3.png') }}" alt="article-image" class="image">

                    <p class="date">April 4th 2025</p>

                    <p class="title">Sed do eiusmod tempor incididun ut labore et dolore</p>

                    <div class="content">Lorem ipsum dolor sit amet, consectetur adipiscin  elit, exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>

                    <a href="{{ route('frontend.articles.show', 1) }}" class="read-more">Read more</a>
                </div>
            </div>
        </div>
    </div>
@endsection