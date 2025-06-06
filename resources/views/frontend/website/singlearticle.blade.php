@extends('frontend.layouts.app')

@section('title', 'Singlearticles')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/singlearticles.css') }}">
@endpush

@section('content')
    <div class="singlearticles container">
        <div class="section-1 container">
            <div class="row header-row">
                <div class="col-11">
                    <div class="title-meta">
                        <h1 class="article-title">Sed ut perspiciatis unde omnis iste natus error sit voluptatem</h1>
                        <div class="article-meta">
                            <span class="author">Written by John doe</span>
                            <span class="separator">|</span>
                            <span class="date">March 20, 2025</span>
                        </div>
                    </div>
                </div>
                <div class="col-1 text-end">
                    <div class="share-icon">
                        <i class="bi bi-share"></i>
                    </div>
                </div>
            </div>

            <div class="img">
                <img src="{{ asset('storage/frontend/singlearticle-1.png') }}" class="card-image" alt="article-image">
            </div>
        </div>


        <div class="section-2 container">
            <div class="paragraph">
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
            </div>
            <div class="paragraph">
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
            </div>
            <div class="subsection">
                <h5>Section 1</h5>
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
            <div class="subsection">
                <h5>Section 2</h5>
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

        
        <div class="section-3 container">
            <div class="title">
                <p>Related Insights & Articles</p>
            </div>
            <div class="card-grid row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                <div class="col">
                    <div class="card h-100 border-0">
                        <img src="{{ asset('storage/frontend/article-1.png') }}" class="card-img-top" alt="article-image">
                        <div class="card-body">
                            <p class="text-muted mb-1">April 4th 2025</p>
                            <h5 class="card-title mb-2">Sed do eiusmod tempor incididun ut labore et dolore</h5>
                            <p class="card-text text-secondary">Lorem ipsum dolor sit amet, consectetur adipiscin  elit, exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <p class="card-text mb-0">
                                <a href="#" class="text-decoration-none text-dark fw-semibold">Read more</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 border-0">
                        <img src="{{ asset('storage/frontend/article-2.png') }}" class="card-img-top" alt="article-image">
                        <div class="card-body">
                            <p class="text-muted mb-1">April 4th 2025</p>
                            <h5 class="card-title mb-2">Sed do eiusmod tempor incididun ut labore et dolore</h5>
                            <p class="card-text text-secondary">Lorem ipsum dolor sit amet, consectetur adipiscin  elit, exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <p class="card-text mb-0">
                                <a href="#" class="text-decoration-none text-dark fw-semibold">Read more</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 border-0">
                        <img src="{{ asset('storage/frontend/article-3.png') }}" class="card-img-top" alt="article-image">
                        <div class="card-body">
                            <p class="text-muted mb-1">April 4th 2025</p>
                            <h5 class="card-title mb-2">Sed do eiusmod tempor incididun ut labore et dolore</h5>
                            <p class="card-text text-secondary">Lorem ipsum dolor sit amet, consectetur adipiscin  elit, exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <p class="card-text mb-0">
                                <a href="#" class="text-decoration-none text-dark fw-semibold">Read more</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 border-0">
                        <img src="{{ asset('storage/frontend/article-4.png') }}" class="card-img-top" alt="article-image">
                        <div class="card-body">
                            <p class="text-muted mb-1">April 4th 2025</p>
                            <h5 class="card-title mb-2">Sed do eiusmod tempor incididun ut labore et dolore</h5>
                            <p class="card-text text-secondary">Lorem ipsum dolor sit amet, consectetur adipiscin  elit, exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <p class="card-text mb-0">
                                <a href="#" class="text-decoration-none text-dark fw-semibold">Read more</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection